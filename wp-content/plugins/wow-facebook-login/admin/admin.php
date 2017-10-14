<?php if ( ! defined( 'ABSPATH' ) ) exit;
	function wow_fb_login_admin_menu() {
		if (!defined('WOW_FB_LOGIN')){
			$page_name = 'Wow Facebook Login';
		}
		else {
			$page_name = 'Wow Facebook Login Pro';
		}
		add_menu_page($page_name, $page_name, 'manage_options', 'wow-fb-login', 'wow_fb_login_page', 'dashicons-facebook-alt', null);		
	}
	add_action('admin_menu', 'wow_fb_login_admin_menu', 999);
	function wow_fb_login_page() {
		global $wow_plugin;	
		$wow_plugin = true;
		require_once 'partials/facebook.php';	
		wp_enqueue_style( 'wow-data', plugin_dir_url(__FILE__) . 'css/data_style.css');
		wp_enqueue_style( 'font-awesome', WOW_FB_LOGIN_URL . 'asset/font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
		wp_enqueue_script( 'wow-facebook', plugin_dir_url(__FILE__) . 'js/facebook.js', array( 'jquery' ));
		wp_enqueue_script( 'wow-data', plugin_dir_url(__FILE__) . 'js/dataTables.js', array( 'jquery' ));
		do_action('wow_fb_login_pro_admin');
		wp_enqueue_style('wow-fb-login', plugin_dir_url(__FILE__) . 'css/style.css');	 	
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script( 'wp-color-picker-alpha', plugin_dir_url(__FILE__) . 'js/wp-color-picker-alpha.js', array( 'wp-color-picker' ));
	}
	
	if ( ! function_exists ( 'wow_plugins_admin_footer_text' ) ) {
		function wow_plugins_admin_footer_text( $footer_text ) {
			global $wow_plugin;
			if ( $wow_plugin == true ) {
				$rate_text = sprintf( '<span id="footer-thankyou">Developed by <a href="http://wow-company.com/" target="_blank">Wow-Company</a> | <a href="https://wow-estore.com/" target="_blank">Wow Estore</a> | <a href="https://www.facebook.com/wowaffect/" target="_blank">Join us on Facebook</a></span>'
				);
				return str_replace( '</span>', '', $footer_text ) . ' | ' . $rate_text . '</span>';
			}
			else {
				return $footer_text;
			}	
		}
		add_filter( 'admin_footer_text', 'wow_plugins_admin_footer_text' );
	}	