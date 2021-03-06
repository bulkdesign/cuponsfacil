<?php
/**
 * Template padrão para exibir as páginas.
 */

get_header('paginas'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header class="titulo-pagina">
			<!-- TÍTULO -->
			<?php the_title( '<h1 class="titulo-pagina">', '</h1>' );	?>
		</header>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="col s12">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer(); ?>