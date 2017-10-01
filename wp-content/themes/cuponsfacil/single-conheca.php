<?php /* Template Name: Conheça */
/**
 * Template para exibir a página conheça.
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- INÍCIO DO WHILE -->
	<?php while ( have_posts() ) : the_post(); ?>
		<!-- INÍCIO DO LOOP -->
		<?php $conheca = new WP_Query( array( 'post_type' => array('conheca') )); ?>
		<?php while ( $conheca->have_posts() ) : $conheca->the_post(); ?>

			<!-- AQUI DENTRO VEM O CONTEÚDO PRINCIPAL -->
			<div class="acupons" style="background: url('<?php echo get_field("imagem_do_banner"); ?>'); background-size: cover; background-attachment: fixed;">
				<h1 class="texto-amarelo-cupons frase-destaque center"><?php the_field('frase_de_destaque'); ?></h1>
			</div>
			<div class="container">
				<div class="oquefazemos">
					<h1 class="texto-vermelho-cupons">O que nós fazemos?</h1>
					<?php the_field('o_que_nos_fazemos'); ?>
				</div>
			</div>
			<div class="parallax-container">
		    	<div class="parallax"><img src="<?php bloginfo('template_url'); ?>/img/assets/divisor-conheca.jpg" /></div>
		    </div>
		    <div class="container">
				<div class="comofunciona">
					<h1 class="texto-vermelho-cupons">Como funciona?</h1>
					<div class="grupo-icones">
						<div class="row">
							<div class="col s12 passos">
								<div class="col s12 l4">
									<img class="responsive-img" src="<?php bloginfo('template_url'); ?>/img/assets/passo1.png" />
									<h3 class="texto-vermelho-cupons">Passo 1:</h3>
									<p><?php the_field('como_funciona_passo_1'); ?></p>
								</div>
								<div class="col s12 l4">
									<img class="responsive-img" src="<?php bloginfo('template_url'); ?>/img/assets/passo2.png" />
									<h3 class="texto-vermelho-cupons">Passo 2:</h3>
									<p><?php the_field('como_funciona_passo_2'); ?></p>
								</div>
								<div class="col s12 l4">
									<img class="responsive-img" src="<?php bloginfo('template_url'); ?>/img/assets/passo3.png" />
									<h3 class="texto-vermelho-cupons">Passo 3:</h3>
									<p><?php the_field('como_funciona_passo_3'); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="grey lighten-4">
				<div class="container">
					<div class="ultimos-artigos-blog">
						<h1 class="texto-vermelho-cupons">Últimos artigos do Blog</h1>
						<?php echo do_shortcode("[post_grid id='96']"); ?>
					</div>
				</div>
			</div>

		<?php endwhile; wp_reset_query(); ?>
		<!-- FIM DO LOOP -->
	<?php endwhile; ?>
	<!-- FIM DO WHILE -->

</article>

<?php get_footer(); ?>