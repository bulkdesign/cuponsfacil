<?php 

get_header('paginas'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- INÍCIO DO LOOP -->
			<?php $loop_cupomgerado = new WP_Query( array( 'post_type' => array('cupom_gerado') )); ?>
				<!-- AQUI DENTRO VEM O CONTEÚDO PRINCIPAL -->
				<div class="row">
					<div class="col s12 m12 l12" style="margin-bottom: 50px;">
						<div class="col s12 m12 l8 push-l2">
							<?php echo do_shortcode('[qrcode text="'. $post->post_content .'" height=300 width=300 transparency=1]'); ?>
							<p class="center">O seu código de desconto:</p>
							<div class="display-public-wpgenerapass">
								<?php echo the_content(); ?>
							</div>
						</div>
						<div class="col s12 m12 l8 push-l2">
							<div class="col s12 center">
								<p>Não é necessário imprimir. Basta apresentar o código pelo celular.</p>
							</div>
						</div>
					</div>
				</div>

			<?php wp_reset_query(); ?>
			<!-- FIM DO LOOP -->
		<?php endwhile; ?>
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer(); ?>