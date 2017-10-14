<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<form method="post" name="wow_fb_login" action="options.php">
	<?php wp_nonce_field('update-options'); ?>
	<?php $options = get_option('wow_fb_login'); ?>
	<div class="wowcolom">
		
		<div id="wow-leftcol">
			
			<div class="tab-box wow-admin">
				<ul class="tab-nav">
					<li><a href="#t1"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li>
					<li><a href="#t2"><i class="fa fa-css3" aria-hidden="true"></i> Style</a></li>
					<li><a href="#t3"><?php echo $propage; ?></a></li>
				</ul>
				
				
				
				<div class="tab-panels">
					
					<div id="t1">
						<div class="wow-admin-col">
							<div class="wow-admin-col-4"><?php _e('Facebook App ID', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_appid]" value="<?php echo esc_html($options['fb_appid']); ?>"/>
							</div>
							<div class="wow-admin-col-4"><?php _e('Facebook App Secret', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_secret]" value="<?php echo esc_html($options['fb_secret']); ?>"/>
							</div>
							<div class="wow-admin-col-4"><?php _e('New user prefix', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_user_prefix]" value="<?php echo esc_html($options['fb_user_prefix']); ?>"/>
							</div>
						</div> 
						<div class="wow-admin-col">
							<div class="wow-admin-col-4"><?php _e('Fixed redirect url for login', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_redirect]" value="<?php echo esc_html($options['fb_redirect']); ?>"/>
							</div>
							
							<div class="wow-admin-col-4"><?php _e('Fixed redirect url for register', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_redirect_reg]" value="<?php echo esc_html($options['fb_redirect_reg']); ?>"/>
							</div>
							<div class="wow-admin-col-4"><?php _e('Login text', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_login_button]" value="<?php echo esc_html($options['fb_login_button']); ?>">
							</div>
						</div> 
						<div class="wow-admin-col">
							<div class="wow-admin-col-4"><?php _e('Link account text', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_link_button]" value="<?php echo esc_html($options['fb_link_button']); ?>">
							</div>
							<div class="wow-admin-col-4"><?php _e('Unlink account text', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_unlink_button]" value="<?php echo esc_html($options['fb_unlink_button']); ?>">
							</div>
						</div>
						
						
					</div>
					
					<div id="t2">
						
						<div class="wow-admin-col">
							<div class="wow-admin-col-4"><?php _e('Padding top', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_button_padding_top]" value="<?php echo esc_html($options['fb_button_padding_top']); ?>"> px
							</div>
							<div class="wow-admin-col-4"><?php _e('Padding right', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_button_padding_right]" value="<?php echo esc_html($options['fb_button_padding_right']); ?>"> px 
							</div>
							<div class="wow-admin-col-4"><?php _e('Padding bottom', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_button_padding_bottom]" value="<?php echo esc_html($options['fb_button_padding_bottom']); ?>"> px
							</div>
							
						</div>
						<div class="wow-admin-col">
							<div class="wow-admin-col-4"><?php _e('Padding left', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_button_padding_left]" value="<?php echo esc_html($options['fb_button_padding_left']); ?>"> px 
							</div>
							<div class="wow-admin-col-4"><?php _e('Border', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_button_border]" value="<?php echo esc_html($options['fb_button_border']); ?>"> px 
							</div>
							<div class="wow-admin-col-4"><?php _e('Border radius', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_button_border_radius]" value="<?php echo esc_html($options['fb_button_border_radius']); ?>"> px 
							</div>
						</div>
						<div class="wow-admin-col">	
							
							<div class="wow-admin-col-4"><?php _e('Font size text', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_text_size]" value="<?php echo esc_html($options['fb_text_size']); ?>"> px 
							</div>
							<div class="wow-admin-col-4"><?php _e('Font size icon', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_text_icon]" value="<?php echo esc_html($options['fb_text_icon']); ?>"> px 
							</div>
							
							<div class="wow-admin-col-4"><?php _e('Display icon', 'wow-fb-login'); ?>:<br/>
								<select name="wow_fb_login[fb_icon_show]">
									<option value="before" <?php if ($options['fb_icon_show'] == 'before'){echo 'selected';}; ?> ><?php _e('Before text', 'wow-fb-login'); ?></option>
									<option value="after" <?php if ($options['fb_icon_show'] == 'after'){echo 'selected';}; ?>><?php _e('After text', 'wow-fb-login'); ?></option>
									<option value="none" <?php if ($options['fb_icon_show'] == 'none'){echo 'selected';}; ?>><?php _e('none', 'wow-fb-login'); ?></option>
								</select>
							</div>
						</div>
						<div class="wow-admin-col">	
							
							<div class="wow-admin-col-4"><?php _e('Margin between icon and text', 'wow-google-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_margin_icon]" value="<?php echo esc_html($options['fb_margin_icon']); ?>"> px 
							</div>
							
							<div class="wow-admin-col-4"><?php _e('Background', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_background]" value="<?php echo esc_html($options['fb_background']); ?>" class="wp-color-picker-field" data-alpha="true">
							</div>
							<div class="wow-admin-col-4"><?php _e('Background hover', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_background_hover]" value="<?php echo esc_html($options['fb_background_hover']); ?>" class="wp-color-picker-field" data-alpha="true">
							</div>
						</div>
						<div class="wow-admin-col">
							
							<div class="wow-admin-col-4"><?php _e('Text color', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_color_text]" value="<?php echo esc_html($options['fb_color_text']); ?>" class="wp-color-picker-field" data-alpha="true">
							</div>
							
							<div class="wow-admin-col-4"><?php _e('Icon color', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_color_icon]" value="<?php echo esc_html($options['fb_color_icon']); ?>" class="wp-color-picker-field" data-alpha="true">
							</div>
							<div class="wow-admin-col-4"><?php _e('Border color', 'wow-fb-login'); ?>:<br/>
								<input type="text" name="wow_fb_login[fb_color_border]" value="<?php echo esc_html($options['fb_color_border']); ?>" class="wp-color-picker-field" data-alpha="true">
							</div>
							
							</div>
						
						
					</div>
					<div id="t3">
					<?php if (!defined('WOW_FB_LOGIN')){ ?>
					<div class="wow-admin-col">
						<ul>
							<li>Enable in Woocommerce</li>
							<li>Enable in EDD's login shortcode</li>
							<li>Enablein EDD's register shortcode</li>
							<li>Enable in EDD's checkout page</li>
							<li>Send mail to user</li>
							<li>Integration with Mailchimp ang Getresponse</li>
							<li>Hide Admin Bar for Users </li>							
						</ul>					
					</div>
					<?php }
					else {
						 do_action('wow_fb_login_pro_settings');
					} 
					?>
					</div>
					
				</div>
			</div>
			
		</div>
		
		
		<div id="wow-rightcol">
			<div class="wowbox">
				<h3><?php esc_attr_e("Publish", "wow-marketings") ?></h3>
				<div class="wow-admin" style="display: block;">
					<div class="wowcolom">
						
						<div style="float:right;">
							
							<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
							
						</div>
					</div>	
				</div>
			</div>
			
			<div class="wowbox">
				<h3>Shortcode</h3>
				<div class="inside wow-admin" style="display: block;">
					<p/>
					<div class="wow-admin-col-12">
						<b>[Wow-Facebook-Login]</b>
					</div>
					
				</div>
			</div>
			
			<div class="wowbox">
				<h3><i class="fa fa-plug" aria-hidden="true"></i> WP plugins for:</h3>
				<div class="wow-admin wow-plugins">
					<ul>						
						<li><a href="https://wow-estore.com/en/tag/wordpress-plugins-marketing/" target="_blank">Marketing</a></li>
						<li><a href="https://wow-estore.com/en/tag/wordpress-plugins-for-forms/" target="_blank">Forms</a></li>
						<li><a href="https://wow-estore.com/en/tag/wordpress-plugins-menu/" target="_blank">Menu</a></li>	
						<li><a href="https://wow-estore.com/en/tag/wordpress-plugins-authorization/" target="_blank">Authorization</a></li>	
					</ul>
				</div>
			</div>
			
			<div class="wowbox">
				
				<div class="wow-admin">
					<div class="wow-admin-col-12">
						<center><a href='http://wow-company.com/' target="_blank"><img src="<?php echo plugin_dir_url(__FILE__). 'img/icon.png' ?>"></a></center>
					</div>
					
					<div class="wow-admin-col-12 wowicon">						
						<a href='https://www.facebook.com/wowaffect/' title="Join Us on Facebook" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>												
						<a href='https://wpbiker.com/' target="_blank" title="Blog"><img src="<?php echo plugin_dir_url(__FILE__). 'img/wpbiker.png' ?>"></a>
						<a href='https://wow-estore.com' target="_blank" title="Wow-Estore"><img src="<?php echo plugin_dir_url(__FILE__). 'img/estore.png' ?>"></a>
						<a href='https://wpcalc.com/' target="_blank" title="Online Calculators"><img src="<?php echo plugin_dir_url(__FILE__). 'img/wpcalc.png' ?>"></a>
						
					</div>
					
				</div>
			</div>
			
			
			
			
			
		</div>
	</div>
	
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="wow_fb_login" />
	
</form>