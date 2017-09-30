<?php get_header();?>
    <section class="slidepremium section scrollspy header-home" id="slidepremium"> <!--CLAASE HEADER-HOME É PARA O SLIDESHOW-->
    <?php $loop = new WP_Query( array( 'post_type' => array('ofertas') )); ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php $posts = get_field('estabelecimento'); ?>
    <!--SLIDESHOW-->
      <div class="slider">
        <ul class="slides">
          <li>
            <img src="<?php echo get_field('foto_de_capa'); ?>"> <!-- random image -->
            <div class="caption left-align">
              <div class="row">
                <div class="col m8 conteudoinicial">
                  <h1><?php the_title(); ?> em
                    <?php if( $posts ): ?>
                      <?php foreach( $posts as $p ): ?>
                          <span class="texto-amarelo-cupons"><?php the_field('nome_da_empresa', $p->ID); ?></span>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </h1>
                  <p><?php the_field('descricao_da_oferta'); ?></p>
                  <a href="<?php echo get_permalink(); ?>" class="btn texto-amarelo-cupons">Ver Oferta</a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    <?php endwhile; wp_reset_query(); ?>
    </section>
    <!--SESSÃO PRINCIPAIS OFERTAS-->
    <section id="principaisofertas">
      <div class="container">
        <div class="row">
          <div class="col l12 m12">
            <h1>Principais Ofertas</h1>
          </div>
          <div class="col l6 m12 s12">
            <a href="#">
              <div class="oferta primeiro">
                <h3>Bavatos</h3>
              </div>
              <div class="descricaooferta">
                <h3>Desconto de 10% no valor total - <span>Bavatos</span></h3>
              </div>
            </a>
            <br>
          </div>
          <div class="col l6 m12 s12">
            <a href="#">
              <div class="oferta segundo">
                <h3>ISCO Sistemas</h3>
              </div>
              <div class="descricaooferta">
                <h3>30% de desconto na taxa de instalação - <span>ISCO Sistemas</span></h3>
              </div>
            </a>
            <br>
          </div>
          <div class="col l4 m12 s12">
            <a href="#">
              <div class="oferta terceiro">
                <h3>Hookah</h3>
              </div>
              <div class="descricaooferta">
                <h3>10% no combo: 2 essências + 10 unidades de carvão - <span>Hookah Beats Tabacaria</span></h3>
              </div>
            </a>
            <br>
          </div>
          <div class="col l4 m12 s12">
            <a href="#">
              <div class="oferta quarto">
              <img src="<?php bloginfo('template_url'); ?>/images/Yu.png">
              </div>
              <div class="descricaooferta">
                <h3>15% na troca de tela de qualquer iphone - <span>YuService</span></h3>
              </div>
            </a>
            <br>
          </div>
          <div class="col l4 m12 s12">
            <a href="#">
              <div class="oferta quinto">
                <img src="<?php bloginfo('template_url'); ?>/images/mega.png" style="width: 250px;">
              </div>
              <div class="descricaooferta">
                <h3>20% de desconto no Extrator de E-mail - <span>MegaMailing</span></h3>
              </div>
            </a>
            <br>
          </div>
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
            <?php echo do_shortcode('[wpsl]');?>
            <div class="btn vermelho-cupons"><a href="#" class="texto-amarelo-cupons"><h6 style="padding-top: 4px;">Ver todas as ofertas<h6></a></div>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>