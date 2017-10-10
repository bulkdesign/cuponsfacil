<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    <!-- METAS -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="keywords" content="insira aqui palavras-chave, separadas por vírgula">
    <meta name="description" content="insira aqui uma descrição do site">
    <!-- TÍTULO -->
    <title>
      <?php if ( is_category() ) {
        echo 'Categoria de &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
      } elseif ( is_tag() ) {
        echo 'Arquivo de &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
      } elseif ( is_archive() ) {
        wp_title(''); echo ' Arquivo | '; bloginfo( 'name' );
      } elseif ( is_search() ) {
        echo 'Buscar por &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
      } elseif ( is_home() || is_front_page() ) {
        bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
      }  elseif ( is_404() ) {
        echo 'Erro 404 - Não Encontrado | '; bloginfo( 'name' );
      } elseif ( is_single() ) {
        wp_title('');
      } else {
        echo wp_title( ' | ', false, right ); bloginfo( 'name' );
      } ?>
    </title>
    <!-- IMPORTAÇÃO DOS ÍCONES-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- IMPORTAÇÃO DO MATERIALIZE -->
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/materialize.css"  media="screen,projection"/>
    <!-- IMPORTAÇÃO DO STYLE.CSS -->
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url') ?>/style.css"  media="screen,projection"/>
    <!-- bxSlider CSS file -->
    <link href="<?php bloginfo('template_url') ?>/js/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/js/owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/js/owlcarousel/dist/assets/owl.theme.default.min.css">
    <!-- WP PINGBACK -->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!-- WP HEAD -->
    <?php wp_head(); ?>
    </head>
    <body>
    <!--BARRA DE NAVEGAÇÃO-->
    <nav id="global-nav" class="navegacao z-depth-0">
        <div class="container">
            <div class="nav-wrapper">
                <div class="row">
                    <div class="col s12">
                        <!-- LOGO -->
                        <div class="col hide-on-small-only l2">
                            <a href="/" class="brand-logo">
                            <img src="<?php bloginfo('template_url');?>/img/logo/logo.png"/>
                            </a>
                        </div>
                        <div class="col s12 center hide-on-med-and-up">
                            <a href="/" class="brand-logo">
                            <img src="<?php bloginfo('template_url');?>/img/logo/logo.png"/>
                            </a>
                        </div>
                        <!-- BUSCA -->
                        <div class="col hide-on-small-only l8">
                            <?php get_search_form(); ?>
                            <div class="col l11 push-l1 categorias">
                                <ul class="menu hide-on-med-and-down">
                                    <div class="col l12">
                                    <?php wp_nav_menu( array( 'theme_location' => 'menu-categorias' ) ); ?>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <!-- LOGIN -->
                        <div class="col s12 l2">
                            <ul class="right hide-on-med-and-down menu-de-acesso">
                                <li><a href="/?wp-login.php">Login/Cadastro</a></li>
                                <li><a href="/?page_id=156">Anuncie</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <main class="hide-on-large-only">
                    <a class="white-text toggle-overlay"><i class="small material-icons">menu</i></a>
                </main>
            </div>
        </div>
    </nav>
    <!-- Mobile Menu -->
    <aside>
        <div class="outer-close toggle-overlay">
            <a class="white-text right close"><i class="margin-clear small material-icons">clear</i></a>
        </div>
        <nav class="mobile-menu">
            <ul class="menu-de-acesso">
                <li><a href="/?wp-login.php">Login/Cadastro</a></li>
                <li><a href="/?page_id=156">Anuncie</a></li>
                <?php wp_nav_menu( array( 'theme_location' => 'menu-categorias', 'menu_class' => 'menu-de-acesso' ) ); ?>
            </ul>
        </nav>
    </aside>