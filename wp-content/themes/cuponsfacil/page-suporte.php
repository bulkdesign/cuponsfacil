<?php /* Template Name: Suporte */
/**
 * Template para exibir a página com todos os artigos do blog.
 */

get_header('categorias'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header class="titulo-pagina">
			<!-- TÍTULO -->
			<h1 class="titulo-pagina center texto-vermelho-cupons" style="margin-top: 80px;"><?php the_title(); ?></h1>
		</header>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="col s12 center">
					<?php
					    $current_user = wp_get_current_user();
					?>

					<p>Prezado <?php echo $current_user->display_name; ?>, se você possui dúvidas ou está enfrentando alguma dificuldade, entre em contato através do formulário abaixo:</p>
				</div>
				<div class="col s12 l8 push-l2 margin20">
					<?php echo do_shortcode('[contact-form-7 id="1218" title="Suporte"]'); ?>
				</div>
			</div>
		<?php endwhile; ?>
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer(); ?>