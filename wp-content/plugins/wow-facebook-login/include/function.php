<?php if ( ! defined( 'ABSPATH' ) ) exit;
	function wow_fb_sign_button() {
		global $wow_fb_settings;
		return '<a href="' . esc_url(wow_fb_login_url() . (isset($_GET['redirect']) ? '&redirect=' . $_GET['redirect'] : '')) . '" rel="nofollow" class="wow-fb-login">' . $wow_fb_settings['fb_login_button'] . '</a><br />';
	}
	function wow_fb_link_button() {
		global $wow_fb_settings;
		return '<a href="' . esc_url(wow_fb_login_url() . '&redirect=' . wow_fb_curPageURL()) . '">' . $wow_fb_settings['fb_link_button'] . '</a><br />';
	}
	function wow_fb_unlink_button() {
		global $wow_fb_settings;
		return '<a href="' . esc_url(wow_fb_login_url() . '&action=unlink&redirect=' . wow_fb_curPageURL()) . '">' . $wow_fb_settings['fb_unlink_button'] . '</a><br />';
	}
	function wow_fb_curPageURL() {
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
			$pageURL.= "s";
		}
		$pageURL.= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL.= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
			} else {
			$pageURL.= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
	function wow_fb_login_url() {
		return site_url('wp-login.php') . '?loginFacebook=1';
	}
	function wow_fb_redirect() {
		$redirect = get_site_transient( wow_facebook_uniqid().'_fb_r');	
		
		if (!$redirect || $redirect == '' || $redirect == wow_fb_login_url()) {
			if (isset($_GET['redirect'])) {
				$redirect = $_GET['redirect'];
				} else {
				$redirect = site_url();
			}
		}
		
		
		$redirect = wp_sanitize_redirect($redirect);
		$redirect = wp_validate_redirect($redirect, site_url());		
		header('LOCATION: ' . $redirect);
		delete_site_transient( wow_facebook_uniqid().'_fb_r');
		
		exit;
	}			