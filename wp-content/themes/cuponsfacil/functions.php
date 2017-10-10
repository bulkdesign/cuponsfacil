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

/* Suporte do tema para menu do topo */
function menu_de_categorias() {
  register_nav_menu('menu-categorias',__( 'Menu de Categorias' ));
}
add_action( 'init', 'menu_de_categorias' );

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

/* Troca de logo do login */
function logo_de_login() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
	width: 165px;
	background-size: 150px;
	background-image: url(https://www.cuponsfacil.com.br/wp-content/themes/cuponsfacil/img/logo/logo.png);
	padding-bottom: 30px; 
}
</style>
<?php 
} add_action( 'login_enqueue_scripts', 'logo_de_login' );

// SOMETHING
function my_pre_get_posts($query) {

    if( is_admin() ) 
        return;

    if( is_search() && $query->is_main_query() ) {
        $query->set('post_type', array('ofertas', 'wpsl_stores'));
    } 

}

add_action( 'pre_get_posts', 'my_pre_get_posts' );

?>