<?php /* Template Name: Serviços */
/** 
 * Template padrão para exibir as páginas.
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header class="titulo-pagina">
			<!-- TÍTULO -->
			<?php the_title( '<h1 class="texto-vermelho-cupons titulo-pagina margin50 center">', '</h1>' );	?>
		</header>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
		<!-- INÍCIO DO LOOP -->
		<?php

		$args = array(
		    'category_name' => 'servicos',
		    'post_type' => 'ofertas'
		);

		?>

		<div class="search-container">
 			<div class="row">
	            <div class="col s12">
	            	<?php $loopcategorias = new WP_Query($args); ?>
					<!-- INÍCIO DO WHILE -->
					<?php while ( $loopcategorias->have_posts() ) : $loopcategorias->the_post(); ?>
	            	<?php $empresa = get_field('estabelecimento'); ?>

	            	<div class="col s12 m6 l4 center margin-categorias">
	            		<a href="<?php the_permalink(); ?>">
	            			<img class="capa-oferta" src="<?php echo get_field('foto_de_capa'); ?>">
	            		</a>
	            		<span class="search-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>

	            		<?php if( $empresa ): ?>
          					<?php foreach( $empresa as $e ): ?>
		            			<span class="texto-vermelho-cupons search-post-business"><?php the_field('nome_da_empresa', $e->ID); ?></span>
		            			<div class="divider search-post"></div>
		            			<a style="text-transform: none;" class="btn waves-effect vermelho-cupons texto-amarelo-cupons" href="<?php the_permalink(); ?>">Ver detalhes da oferta</a>
		            		<?php endforeach; ?>
	            		<?php endif; ?>
	            	</div>

            		<?php endwhile; wp_reset_query(); ?>
	            </div>
	        </div>
	    </div>

		<?php endwhile; ?>
	</div>
</article>

<?php get_footer(); ?>