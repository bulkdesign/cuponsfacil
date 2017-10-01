<?php
/**
 * Arquivo de funções PHP do WordPress.
 */

/* Remoção do post padrão do WordPress */
add_action('admin_menu','remove_default_post_type');

function remove_default_post_type() {
  remove_menu_page('edit.php');
}

/* Suporte do tema para imagem destacadas */
add_theme_support( 'post-thumbnails' );

/* Suporte do tema para menu */
function register_my_menu() {
  register_nav_menu('new-menu',__( 'Menu' ));
}
add_action( 'init', 'register_my_menu' );

/* Implementação de classes no menu */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active menu-active';
    }
    return $classes;
}

/* Remoção dos avisos de update do WordPress */
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');

add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return 'http://www.cuponsfacil.com.br';
}

?>