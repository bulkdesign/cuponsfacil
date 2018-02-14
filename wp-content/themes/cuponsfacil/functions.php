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
add_filter('login_redirect', 'redirect_after_cupom', 10, 20);

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
add_action('new_to_gerado', 'send_emails_on_new_event');

function send_emails_on_new_event($post) {

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

// CHANGE POST STATUS ON BUTTON (UTILIZADO)
function toDraft($pid) {

    $post_id = $_GET['post_id'];
    $the_post = get_post( $post_id );

    if( $the_post->post_status = 'gerado') {
        wp_update_post(array($the_post, 'post_status' => 'utilizado'));
    }
}

// CHANGE POST STATUS ON BUTTON (CANCELADO)
function toCancel($pid) {

$toCancel = $_POST['cancelado'];
   if($toCancel == 'status_cancelado'){
      wp_update_post(array('ID' => $pid, 'post_status'   =>  'cancelado'));
  }
}

// REMOVING DASH FILTERS FROM TITLE
remove_filter( 'the_title' , 'wptexturize' );
remove_filter( 'the_content' , 'wptexturize' );
remove_filter( 'the_excerpt' , 'wptexturize' );
remove_filter( 'comment_text' , 'wptexturize' );
remove_filter( 'list_cats' , 'wptexturize' );

/**
 * SEARCH BY CUSTOM FIELDS
 *
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

//FILTER BY LOCATION
 
class WP_Query_Geo extends WP_Query {
  var $lat;
  var $lng;
  var $distance;
 
  function __construct($args=array()) {
    if(!empty($args['lat'])) {
      $this->lat = $args['lat'];
      $this->lng = $args['lng'];
      $this->distance = $args['distance'];
      add_filter('posts_fields', array($this, 'posts_fields'));
      add_filter('posts_groupby', array($this, 'posts_groupby'));
      add_filter('posts_join_paged', array($this, 'posts_join_paged'));
    }
 
    parent::query($args);
 
    remove_filter('posts_fields', array($this, 'posts_fields'));
    remove_filter('posts_groupby', array($this, 'posts_groupby'));
    remove_filter('posts_join_paged', array($this, 'posts_join_paged'));
  }
 
  function posts_fields($fields) {
    global $wpdb;
    $fields = $wpdb->prepare(" ((ACOS(SIN(%f * PI() / 180) * SIN(mtlat.meta_value * PI() / 180) + COS(%f * PI() / 180) * COS(mtlat.meta_value * PI() / 180) * COS((%f - mtlng.meta_value) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance", $this->lat, $this->lat, $this->lng);
    return $fields;
  }
 
  function posts_groupby($where) {
    global $wpdb;
    $where .= $wpdb->prepare(" HAVING distance < %d ", $this->distance);
    return $where;
  }
 
  function posts_join_paged($join) {
    $join .= " INNER JOIN uc_postmeta AS mtlat ON (IF(mtmaster.meta_value != uc_posts.ID, mtmaster.meta_value, uc_posts.ID) = mtlat.post_id AND mtlat.meta_key = 'lat') ";
    $join .= " INNER JOIN uc_postmeta AS mtlng ON (IF(mtmaster.meta_value != uc_posts.ID, mtmaster.meta_value, uc_posts.ID) = mtlng.post_id AND mtlng.meta_key = 'lng') ";
    return $join;
  }
}

// AJAX TAXONOMY FILTER
function misha_filter_function(){
    $args = array(
        'orderby' => 'date', // we will sort posts by date
        'order' => $_POST['date'], // ASC или DESC
        'post_type' => 'ofertas',
        'lat' =>  $distance['lat'],
        'lng' =>  $distance['lng'],
        'distance' => $distance['range']
    );
 
    // for taxonomies / categories
    if( isset( $_POST['categoryfilter'] ) )
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $_POST['categoryfilter']
            )
        );
 
    $query = new WP_Query_Geo( $args );
 
    if( $query->have_posts() ) :
        while( $query->have_posts() ): $query->the_post(); ?>

            <?php $empresa = get_field('estabelecimento'); ?>
            <?php if( get_field('foto_de_capa')): ?>
                <div class="col l4 m12 s12 padding50">
                    <a href="<?php echo get_permalink(); ?>">
                        <div class="oferta hoverable" style="background-size: cover;background-position:50%;background-image: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_field('foto_de_capa'); ?>');">
                            <?php if( $empresa ): ?>
                            <?php foreach( $empresa as $e ): ?>
                            <img src="<?php echo the_field('logo_do_cliente', $e->ID); ?>" />
                        </div>
                        <div class="descricaooferta">
                            <h3 class="white-text"><?php the_title(); ?></h3>
                                <span class="texto-amarelo-cupons"><?php the_field('nome_da_empresa', $e->ID); ?></span>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </a>
                    <br>
                    <?php if( $empresa ): ?>
                        <?php foreach( $empresa as $e ): ?>
                            <div class="col s12 center">
                                <a style="text-transform: none;" class="btn waves-effect vermelho-cupons texto-amarelo-cupons" href="<?php the_permalink(); ?>">Ver detalhes da oferta</a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        <?php endwhile;
        wp_reset_postdata();
    else :
        echo 'Não foram encontradas ofertas';
    endif;
 
    die();
}
 
add_action('wp_ajax_myfilter', 'misha_filter_function'); 
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');