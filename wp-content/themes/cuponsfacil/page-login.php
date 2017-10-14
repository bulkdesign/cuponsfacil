<?php /* Template Name: Login */
/**
 * Template para exibir a página com todos os artigos do blog.
 */

get_header('login'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container" style="margin-top: 5%;">
		<header class="titulo-pagina">
			<!-- TÍTULO -->
			<div class="col s12 center margin50">
				<img src="<?php bloginfo('template_url'); ?>/img/logo/logo.png" width="250" />
			</div>
		</header>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="col s12 margin20">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer('login'); ?>