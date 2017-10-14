<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wowbox"> 
    <?php _e('<ol><li><a href="https://developers.facebook.com/apps/" target="_blank">Create a facebook app!</a></li>', 'wow-fb-login'); ?>
  <?php _e('<li>Don\'t choose from the listed options, but click on <b>advanced setup</b> in the bottom.</li>', 'wow-fb-login'); ?>
  <?php _e('<li>Choose an <b>app name</b>, and a <b>category</b>, then click on <b>Create App ID</b>.</li>', 'wow-fb-login'); ?>
  <?php _e('<li>Pass the security check.</li>', 'wow-fb-login'); ?>
  <?php _e('<li>Go to the <b>Settings</b> of the application.</li>', 'wow-fb-login'); ?>
  <?php _e('<li>Click on <b>+ Add Platform</b>, and choose <b>Website</b>.</li>', 'wow-fb-login'); ?>
  <?php _e('<li>Enter your website\'s address at the <b>Site URL</b>, for example: <b>' . get_option('siteurl') . '</b></li>', 'wow-fb-login'); ?>
  <?php _e('<li>Enter a <b>Contact Email</b> and click on <b>Save Changes</b>.</li>', 'wow-fb-login'); ?>
  <?php _e('<li>Go to <b>App Review</b>, and change the availability for the general public to <b>YES</b>.</li>', 'wow-fb-login'); ?>
  <?php _e('<li>Go back to the <b>Settings</b>, and copy the <b>App ID</b>, and <b>APP Secret</b>, which you have to copy and paste below.</li>', 'wow-fb-login'); ?>
  <?php _e('<li><b>Save changes!</b></li></ol>', 'wow-fb-login'); ?>   
  </div>