<?php
/**
 * Plugin Name:       Wow Facebook Login
 * Plugin URI:        https://wordpress.org/plugins/wow-facebook-login/
 * Description:       Facebook Login
 * Version:           1.2
 * Author:            Wow-Company
 * Author URI:        http://wow-company.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wow-fb-login
  */
if ( ! defined( 'WPINC' ) ) {die;}

if ( ! defined( 'WOW_FB_LOGIN_NAME' ) ) {	
	define( 'WOW_FB_LOGIN_FREE_VERSION', '1.2' );
	define( 'WOW_FB_LOGIN_BASENAME', dirname(plugin_basename(__FILE__)) );	
	define( 'WOW_FB_LOGIN_URL', plugin_dir_url( __FILE__ ) );
}

function activate_wow_facebook_login() {
	require_once plugin_dir_path( __FILE__ ) . 'include/activator.php';	
}	
register_activation_hook( __FILE__, 'activate_wow_facebook_login' );

global $wow_fb_settings;
$wow_fb_settings = maybe_unserialize(get_option('wow_fb_login'));
function wow_fb_add_query_var() {
  global $wp;
  $wp->add_query_var('editProfileRedirect');
  $wp->add_query_var('loginFacebook');
  $wp->add_query_var('loginFacebookdoauth');
}
add_filter('init', 'wow_fb_add_query_var');
if(!function_exists('wow_facebook_uniqid')){
    function wow_facebook_uniqid(){
        if(isset($_COOKIE['wow_facebook_uniqid'])){
            if(get_site_transient('n_'.$_COOKIE['wow_facebook_uniqid']) !== false){
                return $_COOKIE['wow_facebook_uniqid'];
            }
        }
        $_COOKIE['wow_facebook_uniqid'] = uniqid('wow_facebook', true);
        setcookie('wow_facebook_uniqid', $_COOKIE['wow_facebook_uniqid'], time() + 3600, '/');
        set_site_transient('n_'.$_COOKIE['wow_facebook_uniqid'], 1, 3600);
        return $_COOKIE['wow_facebook_uniqid'];
    }
}

require_once plugin_dir_path( __FILE__ ) . 'admin/admin.php';
require_once plugin_dir_path( __FILE__ ) . 'include/connect.php';
require_once plugin_dir_path( __FILE__ ) . 'include/profile.php';
require_once plugin_dir_path( __FILE__ ) . 'include/function.php';
require_once plugin_dir_path( __FILE__ ) . 'public/public.php';
function wow_facebook_row_meta( $meta, $plugin_file ){
	if( false === strpos( $plugin_file, basename(__FILE__) ) )
		return $meta;
	$meta[] = '<a href="https://wow-estore.com/support/" target="_blank">Support </a> | <a href="https://www.facebook.com/wowaffect/" target="_blank">Join us on Facebook</a>';
	return $meta;
}
add_filter( 'plugin_row_meta', 'wow_facebook_row_meta', 10, 4 );
function wow_facebook_action_links( $actions, $plugin_file ){
	if( false === strpos( $plugin_file, basename(__FILE__) ) )
		return $actions;
	$settings_link = '<a href="admin.php?page=wow-facebook' .'">Settings</a>'; 
	array_unshift( $actions, $settings_link ); 
	return $actions; 
}
add_filter( 'plugin_action_links', 'wow_facebook_action_links', 10, 2 );
function wow_fb_admin_notice() {
  $user_info = wp_get_current_user();
  $notice = get_site_transient($user_info->ID.'_wow_fb_admin_notice');
  if ($notice !== false) {
    echo '<div class="updated">
       <p>' . $notice . '</p>
    </div>';
    delete_site_transient($user_info->ID.'_wow_fb_admin_notice');
  }
}
add_action('admin_notices', 'wow_fb_admin_notice');