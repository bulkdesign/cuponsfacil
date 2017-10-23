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
#loginform .newsociallogins {
    margin: 0px 0 20px;
}

#loginform .wow-fb-login {
  padding: padding: 10px 40px 10px 40px;
}

#loginform h3 {
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

// GETTING POST TYPES TO SEARCH QUERY
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

// SEND EMAIL AFTER GENERATED COUPON
add_action('new_to_publish', 'send_emails_on_new_event');

function send_emails_on_new_event($wp_query) {

    global $post;
    global $current_user; get_currentuserinfo();
    
    $emails = $current_user->user_email;
    
    $cupons_gerados = new WP_Query( array('post_type' => 'cupom_gerado', 'posts_per_page' => '1', 'orderby' => 'ID', 'order' => 'DESC', 'author' => $current_user->ID));

        while ( $cupons_gerados->have_posts() ) : $cupons_gerados->the_post();
    
            $subject = 'Cupons Fácil - ' . get_the_title();

            $headers = array('Content-Type: text/html; charset=UTF-8','From: Cupons Fácil <no-reply@cuponsfacil.com.br>');

            $message = "Olá, " . $current_user->display_name . ". ";
            $message .= "Obrigado por utilizar a Cupons Fácil.";
            $message .= "<br><br>Seguem abaixo os dados do seu Cupom:<br><br>";
            $message .= "<span style='font-weight:bold'>CÓDIGO DO CUPOM:</span><br>";
            $message .= $post->post_content;
            $message .= "<br><br><span style='font-weight:bold'>COMO UTILIZAR:</span><br>";
            $message .= "Apresente o cupom no local, apenas apresentando o código ou a página do cupom.";
            $message .= "<br><br>Link do cupom: " . get_the_permalink();
            $message .= "<br><br>Obs.: o cupom é individual e intransferível.<br><br>";
            $message .= "<span style='font-weight:bold'>VOCÊ NÃO PRECISA IMPRIMIR</span><br>";
            $message .= "No momento da compra basta apresentar para o atendente o código do cupom e pronto!";
            $message .= "<br><br>--";
            $message .= "<br>Atenciosamente,<br>";
            $message .= "Equipe Cupons Fácil.<br>";
            $message .= "cuponsfacil.com.br<br>comercial@cuponsfacil.com.br";

        endwhile;

    wp_reset_query();

    wp_mail($emails, $subject, $message, $headers);

}

// CUSTOM POST STATUS
function post_status_bulk_edit() {

echo '

<script>

jQuery(document).ready(function($){

$(".inline-edit-status select ").append("<option value=\"gerado\">Gerado</option>");
$(".inline-edit-status select ").append("<option value=\"utilizado\">Utilizado</option>");
$(".inline-edit-status select ").append("<option value=\"cancelado\">Cancelado</option>");

});

</script>

';

}

add_action( 'admin_footer-edit.php', 'post_status_bulk_edit' );

?>
