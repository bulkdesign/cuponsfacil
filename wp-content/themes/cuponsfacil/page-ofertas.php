<?php /* Template Name: Ofertas */
/**
 * Template para exibir a página com todos os artigos do blog.
 */

get_header('paginas'); ?>

<style type="text/css">
	
.margin-categoria {
	margin-top: 220px;
}

</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header class="titulo-pagina">
			<!-- TÍTULO -->
			<h1 class="titulo-pagina center texto-vermelho-cupons" style="margin-top: 190px;">Todas as ofertas</h1>
		</header>
		<!-- INÍCIO DO WHILE -->
			<!-- OFERTA -->
          	<!-- Início do Loop -->
          	<div class="row">
	          	<div class="col s12 margin40">
		         	<?php $ofertas = new WP_Query( array( 'post_type' => array('ofertas'), 'posts_per_page' => -1, 'orderby' => 'rand' )); ?>
		          	<?php while ( $ofertas->have_posts() ) : $ofertas->the_post(); ?>
		         	<?php $empresa = get_field('estabelecimento'); ?>
         			<div class="col l4 m6 s12">
		            	<a href="<?php echo get_permalink(); ?>">
		              		<div class="oferta hoverable" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_field('foto_de_capa'); ?>');">
			                	<?php if( $empresa ): ?>
			                  	<?php foreach( $empresa as $e ): ?>
			                  	<img src="<?php echo the_field('logo_do_cliente', $e->ID); ?>" />
		              		</div>
		              		<div class="descricaooferta">
		                		<h3 class="white-text"><?php the_title(); ?></h3>
		                    	<span class="texto-amarelo-cupons"><?php the_field('nome_da_empresa', $e->ID); ?></span>
			                  	<?php endforeach; ?>
			                	<?php endif; ?>
		              		</div>
		            	</a>
		            	<br>
		        	</div>
		          	<?php endwhile; wp_reset_query(); ?>
			    </div>
			</div>
          	<!-- FIM OFERTA -->
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer(); ?>