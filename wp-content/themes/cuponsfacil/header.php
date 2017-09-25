<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url');?>/materialize/css/materialize.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/style.css">
    <meta charset="utf-8">
    <title>
        <?php if ( is_category() ) { echo 'Categoria de &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' ); } elseif ( is_tag() ) { echo 'Arquivo de &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' ); } elseif ( is_archive() ) { wp_title( ''); echo ' Arquivo | '; bloginfo( 'name' ); } elseif ( is_search() ) { echo 'Buscar por &quot;'.wp_specialchars($s). '&quot; | '; bloginfo( 'name' ); } elseif ( is_home() || is_front_page() ) { bloginfo( 'name' ); echo ' | '; bloginfo( 'description' ); } elseif ( is_404() ) { echo 'Erro 404 - Não Encontrado | '; bloginfo( 'name' ); } elseif ( is_single() ) { wp_title( ''); } else { echo wp_title( ' | ', false, right ); bloginfo( 'name' ); } ?>
    </title>
    <?php wp_head(); ?>
</head>
<body>
    <!--BARRA DE NAVEGAÇÃO-->
    <div class="navegacao">
        <div class="row">
            <div class="container">
                <!--LOGO-->
                <div class="col s2 push-s2 m2 brand-logo">
                    <a href="index.html"><img src="<?php bloginfo('template_url');?>/images/Logo.png"></a>
                </div>
                <!--FORMULÁRIO E MENU-->
                <div class="col m8 hide-on-small-only">
                    <div class="row">
                        <!--FORMULÁRIO-->
                        <div class="col m12 busca">
                            <form>
                                <input type="text" placeholder="O que você está procurando? Digite aqui...">
                                <input type="submit" value="ENCONTRAR">
                            </form>
                        </div>
                        <!--OPÇÕES-->
                        <div class="col m12 menu">
                            <ul>
                                <li><a href="#">BARES E RESTAURANTES</a>
                                </li>
                                <li><a href="#">SAÚDE E BELEZA</a>
                                </li>
                                <li><a href="#">SERVIÇOS</a>
                                </li>
                                <li><a href="#">AUTOMÓVEIS</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--LOGIN E CADASTRO-->
                <div class="col m2 login hide-on-small-only">
                  <ul>
                    <li><a href="#">LOGIN/CADASTRO</a></li>
                    <li><a href="#">ANUNCIE</a></li>
                  </ul>
                </div>
            </div>
        </div>
    </div>