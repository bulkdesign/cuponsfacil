<?php if ( ! defined( 'ABSPATH' ) ) exit;
$wow = (isset($_REQUEST["wow"])) ? sanitize_text_field($_REQUEST["wow"]) : '';
include_once( 'facebook/menu.php' );
if ($wow == ""){
	include_once( 'facebook/settings.php' );
	return;	
}
if ($wow == "members"){
	include_once( 'facebook/members.php' );
	return;
}
if ($wow == "readme"){
	include_once( 'facebook/readme.php' );	
	return;
}
if ($wow == "discount"){
	include_once( 'facebook/discount.php' );	
	return;
}
if ($wow == "items"){
	include_once( 'facebook/items.php' );	
	return;
}
?>
</div>