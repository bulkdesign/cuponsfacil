<?php /* Template Name: Busca Avançada */
/**
 * Template padrão para exibir as páginas.
 */

get_header('categorias'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header class="titulo-pagina">
			<!-- TÍTULO -->
			<?php the_title( '<h1 class="texto-vermelho-cupons titulo-pagina margin50 center">', '</h1>' );	?>
		</header>
		<!-- INÍCIO DO WHILE -->
		<?php 
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); ?>
				<div class="search-container">
		 			<div class="row">
			            <div class="col s12">
			            	<div class="col s12">
			            		<p class="center marginb20">Encontrar no mapa abaixo todos os estabelecimentos mais próximos de você:</p>
			            	</div>
			            	<div class="col s12 center margin-categorias">
            					<?php echo do_shortcode('[gmw form="1"]'); ?>
			            	</div>
			            </div>
			        </div>
			    </div>
			<?php } // end while
		} // end if
		?>
	</div>
</article>

<?php get_footer(); ?>