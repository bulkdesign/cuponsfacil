<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	global $wpdb;
	$wow_social_users = $wpdb->prefix . 'wow_social_users';
	$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} COLLATE {$wpdb->collate}";
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	$sql = "CREATE TABLE $wow_social_users (
    `ID` int(11) NOT NULL,
    `type` varchar(20) NOT NULL,
    `identifier` varchar(100) NOT NULL,
	`first_name` TEXT,
	`last_name` TEXT,	
	`email` TEXT,
	`link` TEXT,
    UNIQUE KEY id (id)
	) {$charset_collate};";
	dbDelta($sql);
	$wow_fb_login = array(  
	'fb_appid' => '',
	'fb_secret' => '',
	'fb_user_prefix' => 'wow_fb_',
	'fb_redirect' => 'auto',
	'fb_redirect_reg' => 'auto',
	'fb_login_button' => 'LOGIN',
	'fb_link_button' => 'LINK ACCOUNT TO',
	'fb_unlink_button' => 'UNLINK ACCOUNT',
	'fb_button_padding_top' => '5',
	'fb_button_padding_right' => '20',
	'fb_button_padding_bottom' => '5',
	'fb_button_padding_left' => '20',
	'fb_button_border' => '0',
	'fb_button_border_radius' => '0',
	'fb_text_size' => '18',
	'fb_text_icon' => '18',
	'fb_icon_show' => 'before',
	'fb_margin_icon' => '5',
	'fb_background' => '#3b5998',
	'fb_background_hover' => '#8b9dc3',
	'fb_color_text' => '#ffffff',
	'fb_color_icon' => '#ffffff',
	'fb_color_border' => '#ffffff'
	);
add_option('wow_fb_login', $wow_fb_login);