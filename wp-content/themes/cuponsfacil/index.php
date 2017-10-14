<?php get_header();?>
    <section class="slidepremium section scrollspy header-home" id="slidepremium"> <!--CLAASE HEADER-HOME É PARA O SLIDESHOW-->
    <!--SLIDESHOW-->
      <div class="slider">
        <ul class="slides">
          <?php $loop = new WP_Query( array( 'post_type' => array('ofertas') )); ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <?php $posts = get_field('estabelecimento'); ?>
          <!-- Selecao do plano -->
          <?php $plano = get_field('plano'); ?>
          <?php if( $plano == 'premium' ): ?>
          <li>
            <img src="<?php echo get_field('foto_de_capa'); ?>">
            <div class="caption left-align">
              <div class="row">
                <div class="col s12 m8 conteudoinicial">
                  <?php if( $posts ): ?>
                    <?php foreach( $posts as $p ): ?>
                    <img style="background-size:200px;max-height: 150px;background-repeat: no-repeat;" src="<?php echo get_field('logo_do_cliente', $p->ID); ?>" />
                    <h1><?php the_title(); ?> em
                            <span class="texto-amarelo-cupons"><?php the_field('nome_da_empresa', $p->ID); ?></span>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </h1>
                  <p class="hide-on-med-and-down"><?php the_field('descricao_resumida'); ?></p>
                  <a href="<?php echo get_permalink(); ?>" class="btn texto-amarelo-cupons">Ver Oferta</a>
                </div>
              </div>
            </div>
          </li>
          <?php else: ?>
          <?php endif; ?>
          <?php endwhile; wp_reset_query(); ?>
        </ul>
      </div>
    </section>
    <!--SESSÃO PRINCIPAIS OFERTAS-->
    <section id="principaisofertas">
      <div class="container">
        <div class="row">
          <div class="col l12 m12">
            <h1>Principais Ofertas</h1>
          </div>
          <!-- OFERTA -->
          <!-- Início do Loop -->
          <?php $ofertas = new WP_Query( array( 'post_type' => array('ofertas'), 'posts_per_page' => 6, 'orderby' => 'rand' )); ?>
          <?php while ( $ofertas->have_posts() ) : $ofertas->the_post(); ?>
          <?php $empresa = get_field('estabelecimento'); ?>
          <div class="col l4 m12 s12">
            <a href="<?php echo get_permalink(); ?>">
              <div class="oferta hoverable" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_field('foto_de_capa'); ?>');">
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
          </div>
          <?php endwhile; wp_reset_query(); ?>
          <!-- FIM OFERTA -->
        </div>
      </div>
    </section>   
    <!--SESSÃO MAPA-->
    <section id="mapa">
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h1>Descontos pertinho de você</h1>
            <p class="texto-amarelo-cupons hide-on-small-only">Encontre os descontos que estão próximos à você! <br>
            Procure pelas categorias no mapa abaixo e aproveite o melhor da cidade, pelo preço mais baixo!</p>
            <?php echo do_shortcode('[wpsl zoom="21"]');?>
            <div class="btn vermelho-cupons">
              <a href="#" class="texto-amarelo-cupons">
                <h6 style="padding-top: 4px;font-size:12px;">Ver todas as ofertas<h6>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>