<?php

if(!class_exists('Facebook')){
  require(dirname(__FILE__).'/facebook.php');
}

$settings = maybe_unserialize(get_option('wow_fb_connect'));

$facebook = new Facebook(array(
  'appId' => $settings['fb_appid'],
  'secret' => $settings['fb_secret'],
));
