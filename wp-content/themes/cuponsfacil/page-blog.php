<?php /* Template Name: Blog */
/**
 * Template para exibir a página com todos os artigos do blog.
 */

get_header('categorias'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header class="titulo-pagina">
			<!-- TÍTULO -->
			<h1 class="titulo-pagina center texto-vermelho-cupons" style="margin-top: 80px;">Artigos recentes do Blog</h1>
		</header>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="col s12">
					<?php echo do_shortcode("[post_grid id='95']"); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer(); ?>