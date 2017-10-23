<?php
/**
 * Template para exibição da página de resultado da busca.
 */
?>

<?php get_header('paginas'); ?>

<div class="container">

	<?php
	$s=get_search_query();
	$args = array( 's' =>$s );
	?>

	<?php  global $wp_query; ?>

	    <section id="primary" class="content-area">
	        <main id="main" class="site-main" role="main">
		        <!-- BANNER TOPO (PLANO PREMIUM) -->
	        	<ul class="bxslider">
        			<?php $loop = new WP_Query( array( 'post_type' => array('ofertas') )); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php $plano = get_field('plano'); ?>
					<?php if( $plano == 'premium' ): ?>
	            	<li>
	            		<div style="max-width:1250px;height:150px;background:linear-gradient(0deg,rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('<?php echo get_field('foto_de_capa'); ?>');background-position: 50% 50%;background-repeat: no-repeat;background-size: cover;">
	            			<div class="oferta-banner-busca">
	            				<?php $empresa = get_field('estabelecimento'); ?>
	            				<?php if( $empresa ): ?>
		                  			<?php foreach( $empresa as $e ): ?>
	            						<h3 class="white-text center"><?php the_title(); ?>, por <?php echo get_field('nome_da_empresa', $e->ID); ?></h3>
	            					<?php endforeach; ?>
	            				<?php endif; ?>
	            				<a class="texto-amarelo-cupons center" href="<?php the_permalink(); ?>">Ver oferta</a>
	            			</div>
	            		</div>
	            	</li>
                	<?php else: ?>
			    	<?php endif; ?>
			    	<?php endwhile; wp_reset_query(); ?>
				</ul>
				<!-- CAROUSEL (PLANO FLEX) -->
				<div class="col s12">
					<h3 class="center texto-vermelho-cupons" style="margin-bottom: 20px;">Confira todos os resultados encontrados para "<?php printf( esc_html__( '%s' ), '<span><strong>' . get_search_query() . '</strong></span>' ); ?>":</h3>
				</div>
				<div class="owl-carousel owl-theme">
					<?php $loop = new WP_Query( array( 'post_type' => array('ofertas') )); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php $plano = get_field('plano'); ?>
					<?php if( $plano == 'flex' ): ?>
					<div class="item">
						<a class="ofertas-carousel" href="<?php the_permalink(); ?>">
							<div style="height:100px;background:url('<?php echo get_field('foto_de_capa'); ?>');background-position: 50% 50%;background-repeat: no-repeat;background-size: cover;"></div>
							<p><?php the_title(); ?></p>	
						</a>
					</div>
					<?php else: ?>
					<?php endif; ?>
			    	<?php endwhile; wp_reset_query(); ?>
				</div>
	            <div class="divider"></div>
	            <!-- RESULTADO DOS DEMAIS -->
	 			<?php if ( have_posts() ) : ?> 
	    			<div class="search-container">
			 			<div class="row">
			 				<!-- MOSTRANDO AS OFERTAS -->
			 				<?php if( get_field('foto_de_capa') ): ?>
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
					        <!-- MOSTRANDO ESTABELECIMENTOS -->
					        <?php else: ?>
					            <div class="col s12">
						            <?php while ( have_posts() ) : the_post(); ?>
						            	<?php $loop = new WP_Query( array( 'post_type' => array('ofertas') )); ?>
							            	<div class="col s12 m6 l3 center hoverable">
							            		<a href="<?php the_permalink(); ?>">
							            			<img src="<?php echo get_field('logo_do_cliente'); ?>" style="width:100%;height:auto;">
							            		</a>
							            		<span class="search-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
							            	</div>
							            <?php wp_reset_query(); ?>
					            	<?php endwhile; ?>
					            </div>
					        <?php endif; ?>
				        </div>
				    </div>
		        <?php else : ?>
		        <?php endif; ?>
	 
	        </main><!-- #main -->
	    </section><!-- #primary -->

</div>

<?php get_footer(); ?>