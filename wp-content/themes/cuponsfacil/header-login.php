<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    <!-- METAS -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"/>
    <meta name="keywords" content="cupons, cupons de desconto, desconto, promoção, oferta, comércio, negócio local, geolocalização, descontos, pertinho, cupons fácil, curitiba, paraná, descontos em curitiba, ofertas, ofertas em curitiba">
    <meta name="description" content="Encontre na Cupons Fácil todos os Cupons de Desconto e Promoções das empresas que estão pertinho de você.">
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