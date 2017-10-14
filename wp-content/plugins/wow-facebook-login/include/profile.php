<?php if ( ! defined( 'ABSPATH' ) ) exit;
	function wow_fb_is_user_connected() {
		global $wpdb;
		$current_user = wp_get_current_user();
		$ID = $wpdb->get_var($wpdb->prepare('
		SELECT identifier FROM ' . $wpdb->prefix . 'wow_social_users WHERE type = "fb" AND ID = "%d"
		', $current_user->ID));
		if ($ID === NULL) return false;
		return $ID;
	}
	function wow_fb_get_user_access_token($id) {
		return get_user_meta($id, 'fb_user_access_token', true);
	}
	function wow_add_fb_connect_field() {
		global $wow_is_social_header;
		//if(wow_fb_is_user_connected()) return;
		if ($wow_is_social_header === NULL) {
		?>
		<h3>Social connect</h3>
		<?php
			$wow_is_social_header = true;
		}
	?>
	<table class="form-table">
		<tbody>
			<tr>	
				<th>
				</th>	
				<td>
					<?php
						if (wow_fb_is_user_connected()) {
							echo wow_fb_unlink_button();
							} else {
							echo wow_fb_link_button();
						}
					?>
				</td>
			</tr>
		</tbody>
	</table>
	<?php
	}
	add_action('profile_personal_options', 'wow_add_fb_connect_field');
	add_filter('get_avatar', 'wow_fb_insert_avatar', 5, 5);
	function wow_fb_insert_avatar($avatar = '', $id_or_email, $size = 96, $default = '', $alt = false) {
		$id = 0;
		if (is_numeric($id_or_email)) {
			$id = $id_or_email;
			} else if (is_string($id_or_email)) {
			$user = get_user_by('email', $id_or_email);
			$id = $user->ID;
			} else if (is_object($id_or_email)) {
			$id = $id_or_email->user_id;
		}
		if ($id == 0) return $avatar;
		$pic = get_user_meta($id, 'fb_profile_picture', true);
		if (!$pic || $pic == '') return $avatar;
		$avatar = preg_replace('/src=("|\').*?("|\')/i', 'src=\'' . $pic . '\'', $avatar);
		return $avatar;
	}
	add_filter('bp_core_fetch_avatar', 'wow_fb_bp_insert_avatar', 3, 5);
	function wow_fb_bp_insert_avatar($avatar = '', $params, $id) {
		if(!is_numeric($id) || strpos($avatar, 'gravatar') === false) return $avatar;
		$pic = get_user_meta($id, 'fb_profile_picture', true);
		if (!$pic || $pic == '') return $avatar;
		$avatar = preg_replace('/src=("|\').*?("|\')/i', 'src=\'' . $pic . '\'', $avatar);
		return $avatar;
	}
	function wow_fb_edit_profile_redirect() {
		global $wp;
		if (isset($wp->query_vars['editProfileRedirect'])) {
			if (function_exists('bp_loggedin_user_domain')) {
				header('LOCATION: ' . bp_loggedin_user_domain() . 'profile/edit/group/1/');
				} else {
				header('LOCATION: ' . self_admin_url('profile.php'));
			}
			exit;
		}
	}
add_action('parse_request', 'wow_fb_edit_profile_redirect');