<?php if ( ! defined( 'ABSPATH' ) ) exit;
	global $wpdb;
	$table_users = $wpdb->prefix . "wow_social_users";
	$info = (isset($_REQUEST["info"])) ? $_REQUEST["info"] : '';
	if ($info == "saved") {
		echo "<div class='updated' id='message'><p><strong>".__("Record Added", "wow-fb-login")."</strong>.</p></div>";
	}
	if ($info == "update") {
		echo "<div class='updated' id='message'><p><strong>".__("Record Updated", "wow-fb-login")."</strong>.</p></div>";
	}
	if ($info == "del") {
		$delid = $_GET["did"];
		$wpdb->query("delete from " . $table_users . " where id=" . $delid);
		echo "<div class='updated' id='message'><p><strong>".__("Record Deleted", "wow-fb-login").".</strong>.</p></div>";
	}
	$resultat = $wpdb->get_results("SELECT * FROM " . $table_users . " WHERE type='fb' order by id desc");
?>
<div class="wow">
	<h1><?php
		if (!defined('WOW_FB_LOGIN')){
			echo 'Wow Facebook Login';
			$propage = '<i class="fa fa-product-hunt" aria-hidden="true"></i> Pro version';
		}
		else {
			echo 'Wow Facebook Login Pro';
			$propage = '<i class="fa fa-product-hunt" aria-hidden="true"></i> Pro settings';
		}
	?>	<a href='https://www.facebook.com/wowaffect/' target="_blank" title="Join us on Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
	</h1>
	<ul class="wow-admin-menu">
		<li><a href='admin.php?page=wow-fb-login'><?php esc_attr_e("Settings", "wow-fb-login") ?></a></li>	
		<li><a href='admin.php?page=wow-fb-login&wow=members' ><?php esc_attr_e("Members", "wow-fb-login") ?></a></li>
		<li><a href='admin.php?page=wow-fb-login&wow=readme' ><?php esc_attr_e("Readme", "wow-fb-login") ?></a></li>
		<?php if (!defined('WOW_FB_LOGIN')){ ?>
			<li><a href='admin.php?page=wow-fb-login&wow=discount'><b><?php esc_attr_e("Pro version", "wow-fb-login") ?></b></a></li>
		<?php } ?>
		<li><a href='admin.php?page=wow-fb-login&wow=items'>Plugins</a></li>
		<?php do_action('wow_fb_login_menu') ?>
	</ul>	