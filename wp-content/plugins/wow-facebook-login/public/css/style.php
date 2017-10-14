<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
.wow-fb-login {
	font-size:<?php echo $wow_fb_settings['fb_text_size']; ?>px;
	padding: <?php echo $wow_fb_settings['fb_button_padding_top']; ?>px <?php echo $wow_fb_settings['fb_button_padding_right']; ?>px <?php echo $wow_fb_settings['fb_button_padding_bottom']; ?>px <?php echo $wow_fb_settings['fb_button_padding_left']; ?>px;
	border: <?php echo $wow_fb_settings['fb_button_border']; ?>px solid <?php echo $wow_fb_settings['fb_color_border']; ?>;
	border-radius: <?php echo $wow_fb_settings['fb_button_border_radius']; ?>px;
	background: <?php echo $wow_fb_settings['fb_background']; ?>;
	color: <?php echo $wow_fb_settings['fb_color_text']; ?>;
}
<?php if ($wow_fb_settings['fb_icon_show'] != 'none'){ ?>
.wow-fb-login:<?php echo $wow_fb_settings['fb_icon_show']; ?> {
   font-family: "FontAwesome";
    content: "\f09a";    
	font-size: <?php echo $wow_fb_settings['fb_text_icon']; ?>px;
	color: <?php echo $wow_fb_settings['fb_color_icon']; ?>;
	<?php if ($wow_fb_settings['fb_icon_show'] == 'before'){ $margin = 'margin-right:';} else {$margin = 'margin-left:';} echo $margin.' '.$wow_fb_settings['fb_margin_icon'].'px;'; ?>
}
<?php } ?>
.wow-fb-login:hover {
	background: <?php echo $wow_fb_settings['fb_background_hover']; ?>;
	color: <?php echo $wow_fb_settings['fb_color_text']; ?>; 
}