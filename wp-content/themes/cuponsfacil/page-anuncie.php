<?php /* Template Name: Anuncie */
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
			<div class="row">
				<div class="col s12">
					<div class="col s12 m6">
						<?php echo do_shortcode("[contact-form-7 id='161' title='Anuncie']"); ?>
					</div>
					<div class="col s12 l4 push-l1">
						<p class="texto-vermelho-cupons">ATENDIMENTO COMERCIAL</p>
						<h1 class="margin20 texto-vermelho-cupons">41 3373-6922</h1>
						<h3 class="margin20 texto-vermelho-cupons">comercial@cuponsfacil.com.br</h3>
						<div class="divider margin20"></div>
						<p class="texto-vermelho-cupons">PARA ALTERAR UMA OFERTA ENVIE UM E-MAIL PARA:</p>
						<h3 class="margin20 texto-vermelho-cupons">oferta@cuponsfacil.com.br</h3>
						<div class="divider margin20"></div>
						<p class="texto-vermelho-cupons">Atendimento de segunda a sábado das 9h às 18h</p>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer(); ?>