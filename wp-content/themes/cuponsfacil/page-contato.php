<?php /* Template Name: Contato */
/**
 * Template para exibir a página com todos os artigos do blog.
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header class="titulo-pagina">
			<!-- TÍTULO -->
			<h1 class="titulo-pagina center texto-vermelho-cupons" style="margin-top: 80px;"><?php the_title(); ?></h1>
		</header>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
			<?php echo do_shortcode("[contact-form-7 id='160' title='Contato']"); ?>
		<?php endwhile; ?>
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer(); ?>