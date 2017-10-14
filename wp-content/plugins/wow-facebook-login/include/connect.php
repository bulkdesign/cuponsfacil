<?php if ( ! defined( 'ABSPATH' ) ) exit;
	function wow_fb_login_compat() {
		global $wp;
		if ($wp->request == 'loginFacebook' || isset($wp->query_vars['loginFacebook'])) {
			wow_fb_login_action();
		}
	}
	add_action('parse_request', 'wow_fb_login_compat');
	function wow_fb_login() {
		if (isset($_REQUEST['loginFacebook']) && $_REQUEST['loginFacebook'] == '1') {
			wow_fb_login_action();
		}
	}
	add_action('login_init', 'wow_fb_login');
	function wow_fb_login_action() {
		global $wp, $wpdb, $wow_fb_settings;
		if (isset($_GET['action']) && $_GET['action'] == 'unlink') {
			$user_info = wp_get_current_user();
			if ($user_info->ID) {
				$wpdb->query($wpdb->prepare('DELETE FROM ' . $wpdb->prefix . 'wow_social_users
				WHERE ID = %d
				AND type = \'fb\'', $user_info->ID));
				set_site_transient($user_info->ID.'_wow_fb_admin_notice',__('Your Facebook profile is successfully unlinked from your account.', 'wow-fb-login'), 3600);
			}
			wow_fb_redirect();
		}
		include (plugin_dir_path( __FILE__ ) . 'facebook/autoload.php');
		$action = isset( $_GET['action'] ) ? $_GET['action'] : '';
		$callBackUrl = callBackUrl();
		$config = array(
		'app_id' => $wow_fb_settings['fb_appid'],
		'app_secret' => $wow_fb_settings['fb_secret'],
		'default_graph_version' => 'v2.4'
		);
		$fb = new Facebook\Facebook( $config );
		
		$encoded_url = isset( $_GET['redirect_to'] ) ? $_GET['redirect_to'] : '';	
		
		if( isset( $encoded_url ) && $encoded_url != '' ) {
			$callback = $callBackUrl . 'loginFacebook' . '=1&redirect_to=' . $encoded_url;
		} 
		else {
			$callback = $callBackUrl . 'loginFacebook' . '=1';
		}
		
		if( $action == 'login' ) {			
			// Well looks like we are a fresh dude, login to Facebook!
			$helper = $fb->getRedirectLoginHelper();
			$permissions = array(
			'email',
			'public_profile'
			);
			// optional
			$loginUrl = $helper->getLoginUrl( $callback, $permissions );
			redirect( $loginUrl );
			
		}
		else {
			if( isset( $_REQUEST['error'] ) ) {
				$response->status = 'ERROR';
				$response->error_code = 2;
				$response->error_message = 'INVALID AUTHORIZATION';
				return $response;
				die();
			}
			if( isset( $_REQUEST['code'] ) ) {
				$helper = $fb->getRedirectLoginHelper();
				// Trick below will avoid "Cross-site request forgery validation failed. Required param "state" missing." from Facebook
				if (isset($_GET['state'])) {
					$helper->getPersistentDataHandler()->set('state', $_GET['state']);
				}
				
				$_SESSION['FBRLH_state'] = $_REQUEST['state'];
				try {
					$accessToken = $helper->getAccessToken();
				}
				catch( Facebook\Exceptions\FacebookResponseException $e ) {
					
					// When Graph returns an error
					echo 'Graph returned an error: ' . $e->getMessage();
					exit;
				}
				catch( Facebook\Exceptions\FacebookSDKException $e ) {
					
					// When validation fails or other local issues
					echo 'Facebook SDK returned an error: ' . $e->getMessage();
					exit;
				}
				
				if( isset( $accessToken ) ) {
					
					// Logged in!
					$_SESSION['facebook_access_token'] = (string)$accessToken;
					$fb->setDefaultAccessToken( $accessToken );
					
					try {
						// $response = $fb->get( '/me?fields=email,name, first_name, last_name, gender, link, about, address, bio, birthday, education, hometown, is_verified, languages, location, website' );
						$response = $fb->get( '/me?fields=id,name,email,first_name,last_name' );
						$userNode = $response->getGraphUser();
					}
					catch( Facebook\Exceptions\FacebookResponseException $e ) {
						
						// When Graph returns an error
						echo 'Graph returned an error: ' . $e->getMessage();
						exit;
					}
					catch( Facebook\Exceptions\FacebookSDKException $e ) {
						
						// When validation fails or other local issues
						echo 'Facebook SDK returned an error: ' . $e->getMessage();
						exit;
					}
					
					$user_profile = $response->getGraphUser();
					if( $user_profile != null ) {
						$ID = $wpdb->get_var($wpdb->prepare('SELECT ID FROM ' . $wpdb->prefix . 'wow_social_users WHERE type = "fb" AND identifier = "%d"', $user_profile['id']));						
						if (!get_user_by('id', $ID)) {
							$wpdb->query($wpdb->prepare('
							DELETE FROM ' . $wpdb->prefix . 'wow_social_users WHERE ID = "%d"
							', $ID));
							$ID = null;
							
						}
						if (!defined('WOW_FB_LOGIN')){
							$checkmail = true;						
						}
						else {
							if (empty($wow_fb_settings['checkmail'])){
								$checkmail = true;
							}
							else {
								if (!isset($user_profile['email'])){									
									$checkmail = false;
									$redirecturl = $encoded_url;
								}
								else {
									$checkmail = true;
								}
								
							}
						}
						
						if (!is_user_logged_in() && $checkmail == true) {
							if ($ID == NULL) { // Register
								if (!isset($user_profile['email'])) 									
								$user_profile['email'] = $user_profile['id'] . '@facebook.com';
								$ID = email_exists($user_profile['email']);
								if ($ID == false) { // Real register									
									$random_password = wp_generate_password($length = 12, $include_standard_special_chars = false);
									if (!isset($wow_fb_settings['fb_user_prefix'])) $wow_fb_settings['fb_user_prefix'] = 'facebook-';
									$username = strtolower( $user_profile['first_name'] . $user_profile['last_name'] );
									$sanitized_user_login = sanitize_user($wow_fb_settings['fb_user_prefix'] . $username);
									if (!validate_username($sanitized_user_login)) {
										$sanitized_user_login = sanitize_user('facebook' . $user_profile['id']);
									}
									$defaul_user_name = $sanitized_user_login;
									$i = 1;
									while (username_exists($sanitized_user_login)) {
										$sanitized_user_login = $defaul_user_name . $i;
										$i++;
									}
									$ID = wp_create_user($sanitized_user_login, $random_password, $user_profile['email']);
									if (!is_wp_error($ID)) {
										wp_new_user_notification($ID);
										$user_info = get_userdata($ID);
										wp_update_user(array(
										'ID' => $ID,
										'display_name' => $user_profile['name'],
										'first_name' => $user_profile['first_name'],
										'last_name' => $user_profile['last_name']
										));
										} else {
										return;
									}									  		  
									$wpdb->insert($wpdb->prefix . 'wow_social_users', array(
									'ID' => $ID,
									'type' => 'fb',
									'identifier' => $user_profile['id'],
									'first_name' => $user_profile['first_name'],
									'last_name' => $user_profile['last_name'],
									'email' => $user_profile['email'],
									'link' => $user_profile['link'],
									) , array(
									'%d',
									'%s',
									'%s',
									'%s',
									'%s',
									'%s',
									'%s'
									));
									
									$name = sanitize_user( $user_profile['first_name'], true );
									do_action('wow_fb_login_sendmail_users', $user_profile);
									do_action('wow_fb_login_mail_integration', $user_profile);
									
									$register = true;
								}
								
							}
							if ($ID) { // Login
								$secure_cookie = is_ssl();
								$secure_cookie = apply_filters('secure_signon_cookie', $secure_cookie, array());
								global $auth_secure_cookie; // XXX ugly hack to pass this to wp_authenticate_cookie
								$auth_secure_cookie = $secure_cookie;
								wp_set_auth_cookie($ID, true, $secure_cookie);
								$user_info = get_userdata($ID);
								update_user_meta($ID, 'fb_profile_picture', 'https://graph.facebook.com/' . $user_profile['id'] . '/picture?type=large');
								do_action('wp_login', $user_info->user_login, $user_info);
								update_user_meta($ID, 'fb_user_access_token', $accessToken);
								if (!empty($register)){
									if (isset($wow_fb_settings['fb_redirect_reg']) && $wow_fb_settings['fb_redirect_reg'] != '' && $wow_fb_settings['fb_redirect_reg'] != 'auto') {
										$redirecturl = $wow_fb_settings['fb_redirect_reg'];
									}
									else {
										$redirecturl = $encoded_url;
									}
								}
								else {
									if (isset($wow_fb_settings['fb_redirect']) && $wow_fb_settings['fb_redirect'] != '' && $wow_fb_settings['fb_redirect'] != 'auto') {
										$redirecturl = $wow_fb_settings['fb_redirect'];
									}
									else {
										$redirecturl = $encoded_url;
									}
								}
							}
						}
						if (is_user_logged_in()) {
							$current_user = wp_get_current_user();
							if ($current_user->ID == $ID) {
								
								// It was a simple login
								
							} 
							elseif ($ID === NULL) { // Let's connect the accout to the current user!
								
								$wpdb->insert($wpdb->prefix . 'wow_social_users', array(
								'ID'         => $current_user->ID,
								'type'       => 'fb',
								'identifier' => $user_profile['id']
								), array(
								'%d',
								'%s',
								'%s'
								));
								update_user_meta($current_user->ID, 'fb_user_access_token', $accessToken);								
								$user_info = wp_get_current_user();
								set_site_transient($user_info->ID . '_wow_fb_admin_notice', __('Your Facebook profile is successfully linked with your account. Now you can sign in with Facebook easily.', 'nextend-facebook-connect'), 3600);
							} 
							else {
								$user_info = wp_get_current_user();
								set_site_transient($user_info->ID . '_wow_fb_admin_notice', __('This Facebook profile is already linked with other account. Linking process failed!', 'wow-fb-login'), 3600);
							}
						}
						
						
						set_site_transient(wow_facebook_uniqid() . '_fb_r', $redirecturl, 3600);
						
						wow_fb_redirect();						
						
					}					
					else {
						echo "INVALID AUTHORIZATION!";
						
					}
				}
			}
			else {
				
				// Well looks like we are a fresh dude, login to Facebook!
				$helper = $fb->getRedirectLoginHelper();
				$permissions = array(
				'email',
				'public_profile'
				);
				// optional
				$loginUrl = $helper->getLoginUrl( $callback, $permissions );
				redirect( $loginUrl );
			}
			
			
		}
		
		
		
		
		
		
	}	
	
	function callBackUrl() {
		$connection = !empty( $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
		$url = $connection . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"];
		if( strpos( $url, '?' ) === false ) {
			$url.= '?';
		} 
		else {
			$url.= '&';
		}
		return $url;
	}
	
	
	function redirect( $redirect ) {
		if( headers_sent() ) {
			
			// Use JavaScript to redirect if content has been previously sent (not recommended, but safe)
			echo '<script language="JavaScript" type="text/javascript">window.location=\'';
			echo $redirect;
			echo '\';</script>';
		} 
		else {
			
			// Default Header Redirect
			header( 'Location: ' . $redirect );
		}
		exit;
	}											