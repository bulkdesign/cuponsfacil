<?php
/**
 * Template para exibir a página do artigo.
 */

get_header('paginas'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- INÍCIO DO WHILE -->
	<?php while ( have_posts() ) : the_post(); ?>
		<!-- INÍCIO DO LOOP -->
		<?php $blog = new WP_Query( array( 'post_type' => array('blog') )); ?>
		<?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
		<?php $post_thumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>

			<!-- AQUI DENTRO VEM O CONTEÚDO PRINCIPAL -->
			<div class="acupons" style="background: url('<?php echo $post_thumbnail; ?>'); background-size: cover; background-attachment: fixed;">
				<h1 class="texto-amarelo-cupons frase-destaque center"><?php the_title(); ?></h1>
			</div>
			<div class="container blog">
				<?php the_content(); ?>
			</div>

		<?php endwhile; wp_reset_query(); ?>
		<!-- FIM DO LOOP -->
	<?php endwhile; ?>
	<!-- FIM DO WHILE -->

</article>

<?php get_footer(); ?>