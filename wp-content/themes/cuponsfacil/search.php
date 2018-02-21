<?php
/**
 * Template para exibição da página de resultado da busca.
 */
?>

<?php get_header('paginas'); ?>

<div class="container marginb80">

	<?php $s=get_search_query(); ?>

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
		                  				<div style="max-width:110px;height:50px;background: linear-gradient(0deg,rgba(255, 255, 255, 0.8),rgba(255, 255, 255, 0.8));background-position: center;background-repeat: no-repeat;background-size: cover;margin: 0px auto;position: relative;top: 17%;">
		                  					<div style="background:url('<?php echo get_field('logo_do_cliente', $e->ID); ?>');background-size: cover;height: 50px;background-position: center;"/></div>
		                  				</div>
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
						<?php $empresa = get_field('estabelecimento'); ?>
	        				<?php if( $empresa ): ?>
	                  			<?php foreach( $empresa as $e ): ?>
									
									<div style="height:100px;background:url('<?php echo get_field('foto_de_capa'); ?>');background-position: 50% 50%;background-repeat: no-repeat;background-size: cover;">

										<div style="max-width:110px;height:60px;background: linear-gradient(0deg,rgba(255, 255, 255, 0.8),rgba(255, 255, 255, 0.8));background-position: center;background-repeat: no-repeat;background-size: cover;margin: 0px auto;position: relative;top: 17%;">

	                  						<div style="background:url('<?php echo get_field('logo_do_cliente', $e->ID); ?>');background-repeat:no-repeat;background-size: 90%;height: 60px;background-position: center;"/>
	                  						</div>

	                  					</div>
									</div>
	                  			<?php endforeach; ?>
	                  		<?php endif; ?>
							<p><?php the_title(); ?></p>	
						</a>
					</div>
					<?php else: ?>
					<?php endif; ?>
			    	<?php endwhile; wp_reset_query(); ?>
				</div>
	            <div class="divider"></div>
	            <!-- RESULTADO DOS DEMAIS -->
	 			<div class="row" style="margin-bottom: 0;">
	 				<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
						<div class="col s12">
							<p class="marginb20">Não encontrou o que precisava? Experimente os filtros abaixo ou utilize o buscador de <a href="<?php echo site_url() ?>/descontos-pertinho-de-voce">Descontos Pertinho de Você</a>:</p>
							<div class="col s12 l4 paddingl0">
								<?php
									if( $terms = get_terms( 'category', 'orderby=name' ) ) :
										echo '<select name="categoryfilter"><option>Escolha uma categoria...</option>';
										foreach ( $terms as $term ) :
											echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
										endforeach;
										echo '</select>';
									endif;
								?>
							</div>
							<div class="hide-on-med-and-down">
								<div class="col l2">
									<label>
										<input type="radio" name="date" value="ASC" /> Ofertas mais recentes
									</label>
								</div>
								<div class="col l2">
									<label>
										<input type="radio" name="date" value="DESC" selected="selected" /> Ofertas mais antigas
									</label>
								</div>
								<div class="col l2">
									<button>Filtrar</button>
									<input type="hidden" name="action" value="myfilter">
								</div>
							</div>
							<div class="hide-on-large-only">
								<div class="col s12 margin20">
									<label>
										<input type="radio" name="date" value="ASC" /> Ofertas mais recentes
									</label>
								</div>
								<div class="col s12 margin20">
									<label>
										<input type="radio" name="date" value="DESC" selected="selected" /> Ofertas mais antigas
									</label>
								</div>
								<div class="col s12 margin20">
									<button>Filtrar</button>
									<input type="hidden" name="action" value="myfilter">
								</div>
							</div>
						</div>
					</form>
					<div id="response"></div>
				</div>

		 			<div id="resultado-inicial">
			 			<div class="row">
	 						<?php if ( have_posts() ) { ?>

				 				<!-- MOSTRANDO AS OFERTAS -->
					            <div class="col s12 paddingl0 paddingr0">
					            	<?php while ( have_posts() ) { the_post(); ?>

						            	<?php $empresa = get_field('estabelecimento'); ?>
						            	<?php if( get_field('foto_de_capa')): ?>
											<div class="col l4 m12 s12 padding50">
									            <a href="<?php echo get_permalink(); ?>">
									            	<div class="oferta hoverable" style="background-size: cover;background-position:50%;background-image: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_field('foto_de_capa'); ?>');">
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
							            		<?php if( $empresa ): ?>
						          					<?php foreach( $empresa as $e ): ?>
						          						<div class="col s12 center">
								            				<a style="text-transform: none;" class="btn waves-effect vermelho-cupons texto-amarelo-cupons" href="<?php the_permalink(); ?>">Ver detalhes da oferta</a>
								            			</div>
								            		<?php endforeach; ?>
							            		<?php endif; ?>
									        </div>
								    	<?php endif; ?>

	 								<?php } ?>
					            </div>

				            <?php } ?>

				        </div>
				    </div>
	        </main><!-- #main -->
	    </section><!-- #primary -->

</div>

<?php get_footer(); ?>