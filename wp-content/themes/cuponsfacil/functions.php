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
#loginform .newsociallogins, #loginform h3 {
  display: none;
} 
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

// REDIRECT
function redirect_after_cupom( $redirect_to, $request, $user ){
    // instead of using $redirect_to we're redirecting back to $request
    return $request;
}
add_filter('login_redirect', 'redirect_after_cupom', 10, 3);

// CUSTOM POST STATUS
/**
 * Add 'Unread' post status.
 */
function wpdocs_custom_post_status(){
    register_post_status( 'utilizado', array(
        'label'                     => _x( 'Utilizado', 'post' ),
        'public'                    => true,
        'exclude_from_search'       => true,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Utilizado <span class="count">(%s)</span>', 'Utilizado <span class="count">(%s)</span>' ),
    ) );
}
add_action( 'init', 'wpdocs_custom_post_status' );

// BLOQUEIO DE VISUALIZACAO DE CUPONS SEM ESTAR LOGADO
function get_out_cupons( $content ) {
    global $post;

    if ( $post->post_type == 'cupons' ) {
        if ( !is_user_logged_in() ) {
            $content = 'Faça o login para visualizar esta página.';
        }
    }

    return $content;
}

add_filter( 'the_content', 'get_out_cupons' );

?>