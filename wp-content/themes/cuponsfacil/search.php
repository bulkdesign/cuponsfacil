<?php
/**
 * Template para exibição da página de resultado da busca.
 */
?>

<?php get_header(); ?>

<div class="container">

	<?php
	$s=get_search_query();
	$args = array( 's' =>$s );
	?>

	<?php  global $wp_query; ?>

	    <section id="primary" class="content-area">
	        <main id="main" class="site-main" role="main">
	 
	        <?php if ( have_posts() ) : ?>

	        	<ul class="bxslider">
					<li><img src="http://via.placeholder.com/1250x150"></li>
					<li><img src="http://via.placeholder.com/1250x150"></li>
					<li><img src="http://via.placeholder.com/1250x150"></li>
					<li><img src="http://via.placeholder.com/1250x150"></li>
				</ul>

				<div class="col s12">
					<h3 class="center texto-vermelho-cupons" style="margin-bottom: 50px;">Confira todos os resultados encontrados para "<?php printf( esc_html__( '%s' ), '<span><strong>' . get_search_query() . '</strong></span>' ); ?>":</h3>
				</div>

				<div class="owl-carousel loop">
					<div>
						<a class="ofertas-carousel" href="<?php the_permalink(); ?>">
							<img src="<?php echo get_field('foto_de_capa'); ?>">
							<p><?php the_title(); ?></p>	
						</a>
					</div>
					<div>
						<a class="ofertas-carousel" href="<?php the_permalink(); ?>">
							<img src="<?php echo get_field('foto_de_capa'); ?>">
							<p><?php the_title(); ?></p>	
						</a>
					</div>
					<div>
						<a class="ofertas-carousel" href="<?php the_permalink(); ?>">
							<img src="<?php echo get_field('foto_de_capa'); ?>">
							<p><?php the_title(); ?></p>	
						</a>
					</div>
					<div>
						<a class="ofertas-carousel" href="<?php the_permalink(); ?>">
							<img src="<?php echo get_field('foto_de_capa'); ?>">
							<p><?php the_title(); ?></p>	
						</a>
					</div>
				</div>
	 
	            <header class="page-header">
	                <div class="divider"></div>
	            </header><!-- .page-header -->
    			<div class="search-container">
	 			
		 			<div class="row">
			            <div class="col s12">

				            <?php while ( have_posts() ) : the_post(); ?>
				            	<?php $empresa = get_field('estabelecimento'); ?>

				            	<div class="col s12 m6 l4 center">
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
			 
			            	<?php endwhile; ?>

			            </div>
			        </div>

			    </div>
	 
	        <?php else : ?>
	 
	            <?php //get_template_part( 'template-parts/content', 'none' ); ?>
	 
	        <?php endif; ?>
	 
	        </main><!-- #main -->
	    </section><!-- #primary -->

</div>

<?php get_footer(); ?>