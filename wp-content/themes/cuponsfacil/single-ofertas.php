<?php
/**
 * Template padrao para exibicao de conteudo das ofertas.
 *
 * @package WordPress
 * @subpackage Cupons Facil
 * @since Cupons Facil
 */

get_header('paginas'); ?>

<style type="text/css">
	
ul.slides {
	height: 300px !important;
}

ul.indicators {
	display: none;
}

.carousel.carousel-slider {
	top: 0px !important;
	margin-bottom: 0px;
}

.carousel.carousel-slider .carousel-fixed-item {
	bottom: 10% !important;
}

</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php $posts = get_field('estabelecimento'); ?>
		<?php $cupom = get_field('cupom'); ?>

		<div class="carousel capa-oferta carousel-slider center" data-indicators="true">
		    <div class="carousel-fixed-item center">
		    	<div class="row">
		    		<div class="col s12 m8 push-m2">
				    	<h1 class="texto-amarelo-cupons"><?php the_title(); ?>
							<?php if( $posts ): ?>
								<?php foreach( $posts as $p ): ?>
								    <span class="white-text">em <?php the_field('nome_da_empresa', $p->ID); ?></span>
								<?php endforeach; ?>
							<?php endif; ?>
						</h1>
						<span class="hide-on-med-and-down">
						<?php if( $cupom ): ?>
							<?php $user_id = get_current_user_id(); ?>
							<?php foreach( $cupom as $c ): ?>
								<?php if( is_user_logged_in() ): ?>
									<div class="margin-top">
					    				<a class="btn amarelo-cupons texto-vermelho-cupons hide-on-med-and-down" href="<?php echo get_permalink($c->ID); ?>">Pegar cupom</a>
					    			</div>					
								<?php else: ?>
									<a class="btn amarelo-cupons texto-vermelho-cupons" href="https://www.cuponsfacil.com.br/wp-login.php?loginFacebook=1&redirect=https://www.cuponsfacil.com.br" onclick="window.location = 'https://www.cuponsfacil.com.br/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;">Faça o login</a>
					    		<?php endif; ?>
					    	<?php endforeach; ?>
					    <?php endif; ?>
						</span>
					</div>
				</div>
		    </div>
		    <div class="hide-on-med-and-down">
			    <div class="white-text">
			    	<div class="overlay-vermelho"></div>
			    	<img src="<?php echo get_field('foto_de_capa'); ?>" style="width:100%;margin:-120px 0">
			    </div>
			</div>
		    <div class="hide-on-large-only">
			    <div class="white-text">
			    	<div class="overlay-vermelho"></div>
			    	<img src="<?php echo get_field('foto_de_capa'); ?>" style="width:100%;height:300px">
			    </div>
			</div>
		</div>
		<div class="container">
			<div class="row">
			    <div class="dentro-abas">
				    <div id="sobreaoferta" class="col s12 m8 push-m2">
				    	<div class="col s12">
				    		<!-- FOTO OFERTA DESKTOP -->
							<?php if( have_rows('fotos_da_oferta') ): ?>
								<div class="col hide-on-med-and-down l6">
									<div class="slider" style="margin-top: 50px;">
										<ul class="slides">
											<?php while( have_rows('fotos_da_oferta') ): the_row(); 
												$image = get_sub_field('adicionar_imagem');
											?>
												<li><img src="<?php echo $image; ?>" /></li>
											<?php endwhile; ?>
										</ul>
									</div>
								</div>
							<?php endif; ?>
				    		<!-- FOTO OFERTA MOBILE -->
				    		<?php if( have_rows('fotos_da_oferta') ): ?>
					    		<div class="col s12 hide-on-large-only">
									<div class="slider oferta-mobile" style="margin-top:20px;">
										<ul class="slides">
											<?php while( have_rows('fotos_da_oferta') ): the_row(); 
												$image = get_sub_field('adicionar_imagem');
											?>
												<li><img style="background-size:contain;background-repeat: no-repeat;background-color: #FFFFFF" src="<?php echo $image; ?>" /></li>
											<?php endwhile; ?>
										</ul>
									</div>
					    		</div>
					    	<?php endif; ?>
				    		<div class="col s12 l6 margin20">
				    			<h1 class="hide-on-small-only texto-vermelho-cupons"><?php the_title(); ?></h1>
								<div class="divider"></div>
								<!-- AddToAny BEGIN -->
								<div class="hide-on-small-only">
									<p class="texto-pequeno">Compartilhe esta oferta:</p>
									<div class="a2a_kit a2a_kit_size_16 a2a_default_style">
										<a class="a2a_button_facebook"></a>
										<a class="a2a_button_twitter"></a>
										<a class="a2a_button_whatsapp"></a>
									</div>
									<div class="margin20">
									<?php if( $cupom ): ?>
										<?php $user_id = get_current_user_id(); ?>
										<?php foreach( $cupom as $c ): ?>
											<?php if( $user_id == 0 ): ?>
												<a class="btn vermelho-cupons texto-amarelo-cupons" href="https://www.cuponsfacil.com.br/wp-login.php?loginFacebook=1&redirect=https://www.cuponsfacil.com.br" onclick="window.location = 'https://www.cuponsfacil.com.br/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;">Faça o login</a>
											<?php else: ?>
								    			<a class="btn waves-effect vermelho-cupons texto-amarelo-cupons" href="<?php echo get_permalink($c->ID); ?>">Pegar cupom</a>
								    		<?php endif; ?>
								    	<?php endforeach; ?>
								    <?php endif; ?>
									</div>
								    <!-- VALIDADE DA OFERTA -->
					        		<?php 
					        			$validade_oferta = get_field('validade', false, false);
					        			$validade_oferta = new DateTime($validade_oferta);
					        		?>
				        			<p>Validade da oferta: <?php echo $validade_oferta->format('j/m/y'); ?></p>
								</div>
								<div class="hide-on-med-and-up">
									<p class="texto-pequeno">Compartilhe esta oferta:</p>
									<div class="a2a_kit a2a_kit_size_16 a2a_default_style">
										<a class="a2a_button_facebook"></a>
										<a class="a2a_button_twitter"></a>
										<a class="a2a_button_whatsapp"></a>
									</div>
								    <!-- VALIDADE DA OFERTA -->
					        		<?php 
					        			$validade_oferta = get_field('validade', false, false);
					        			$validade_oferta = new DateTime($validade_oferta);
					        		?>
				        			<p>Validade da oferta: <?php echo $validade_oferta->format('j/m/y'); ?></p>
				        			<?php if( $cupom ): ?>
										<?php $user_id = get_current_user_id(); ?>
										<?php foreach( $cupom as $c ): ?>
											<?php if( $user_id == 0 ): ?>
												<a class="btn amarelo-cupons texto-vermelho-cupons" href="https://www.cuponsfacil.com.br/wp-login.php?loginFacebook=1&redirect=https://www.cuponsfacil.com.br" onclick="window.location = 'https://www.cuponsfacil.com.br/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;">Faça o login</a>
											<?php else: ?>
								    			<a class="col s12 btn waves-effect vermelho-cupons texto-amarelo-cupons" href="<?php echo get_permalink($c->ID); ?>">Pegar cupom</a>
								    		<?php endif; ?>
								    	<?php endforeach; ?>
								    <?php endif; ?>
								</div>
				    		</div>
				    	</div>
				    	<!-- DESCRICAO -->
				    	<div id="regulamento" class="col s12 margin20">
				    		<h3 class="texto-vermelho-cupons avaliacoes">Descrição da oferta:</h3>
				    		<div class="margin20">
				    			<?php echo the_field('descricao_da_oferta'); ?>
				    		</div>
				    	</div>
						<!-- REGULAMENTO -->
					    <div id="regulamento" class="col s12">
					    	<div class="col s12">
					    	<h3 class="texto-vermelho-cupons avaliacoes">Regulamento:</h3>
					    		<?php echo the_field('regulamento_da_oferta'); ?>
					    	</div>
					    </div>
				    	<!-- COMO USAR -->
				    	<div id="regulamento" class="col s12">
				    		<h3 class="texto-vermelho-cupons avaliacoes">Como utilizar o cupom:</h3>
				    		<p>Apresente o cupom no local, podendo ser tanto impresso quanto diretamente pela tela do celular.</p>
				    	</div>
					</div>
				    <!-- A EMPRESA -->
				    <div id="aempresa" class="col s12 m8 push-m2">
			    		<?php if( $posts ): ?>
						<?php foreach( $posts as $p ): ?>
			    			<?php if( get_field('fotos_da_empresa', $p->ID)): ?>
				    			<div class="col l12 hide-on-med-and-down" style="height: 390px !important;">
				    				<h3 class="texto-vermelho-cupons avaliacoes">Sobre a empresa:</h3>
				    				<!-- FOTO -->
				    				<?php if( have_rows('fotos_da_empresa', $p->ID) ): ?>

										<div class="slider" style="margin-top: 30px;">
											<ul class="slides">
												<?php while( have_rows('fotos_da_empresa', $p->ID) ): the_row(); 
													$image = get_sub_field('adicionar_fotos', $p->ID);
												?>
													<li>
														<img style="width: 100%; height:390px;background-size:contain;background-repeat:no-repeat;background-color:#FFFFFF;" src="<?php echo $image; ?>" />
													</li>
												<?php endwhile; ?>
											</ul>
										</div>

									<?php endif; ?>
				    			</div>
				    			<div class="col s12 m12 hide-on-large-only" style="height: 260px !important;">
				    				<h3 class="texto-vermelho-cupons avaliacoes">Sobre a empresa:</h3>

				    				<div class="margin20" style="width: 100%; height:100%;max-height:225px;background-image:url('<?php echo $image; ?>');background-size:contain;background-position:center;background-repeat: no-repeat;">
										<img width="100%" height="200" border="0">
									</div>

				    			</div>
							<?php else: ?>
								<h3 class="texto-vermelho-cupons avaliacoes center">Sobre a empresa:</h3>
								<div class="margin20"></div>
							<?php endif; ?>
				    		<div class="col s12 grey-text text-darken-2">
					    		<div class="hide-on-med-and-down">
									<table>
										<thead style="background:#F2F2F2">
											<tr>
												<th>Nome da empresa</th>
												<th>Telefone(s)</th>
												<th>E-mail</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php the_field('nome_da_empresa', $p->ID); ?></td>
												<td>
													<ul>
														<li><?php echo get_field('telefone_fixo', $p->ID); ?></li> 
														<li><?php echo get_field('telefone_2', $p->ID); ?></li>
														<li><?php echo get_field('celular', $p->ID); ?></li>
													</ul>
												</td>
												<td><?php the_field('e-mail', $p->ID); ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="hide-on-large-only">
									<!-- NOME -->
									<table>
										<thead style="background:#F2F2F2">
											<tr>
												<th>Nome da empresa</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php the_field('nome_da_empresa', $p->ID); ?></td>
											</tr>
										</tbody>
									</table>
									<!-- TELEFONE -->
									<table>
										<thead style="background:#F2F2F2">
											<tr>
												<th>Telefone(s)</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<ul>
														<li><?php echo get_field('telefone_fixo', $p->ID); ?></li> 
														<li><?php echo get_field('telefone_2', $p->ID); ?></li>
														<li><?php echo get_field('celular', $p->ID); ?></li>
													</ul>
												</td>
											</tr>
										</tbody>
									</table>
									<!-- EMAIL -->
									<table>
										<thead style="background:#F2F2F2">
											<tr>
												<th>E-mail</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php the_field('e-mail', $p->ID); ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<table>
									<thead style="background:#F2F2F2">
										<tr>
											<th colspan="3">Horários de funcionamento</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Dias de semana: <?php the_field('funcionamento_semana', $p->ID); ?></td>
											<?php if ( get_field('funcionamento_sabado', $p->ID) ): ?>
												<td>Sábado: <?php echo get_field('funcionamento_sabado', $p->ID); ?></td>
											<?php else: ?>
												<td>Sábado: fechado</td>
											<?php endif; ?>
											<?php if ( get_field('funcionamento_domingo', $p->ID) ): ?>
												<td>Domingo: <?php echo get_field('funcionamento_domingo', $p->ID); ?></td>
											<?php else: ?>
												<td>Domingo: fechado</td>
											<?php endif; ?>
										</tr>
									</tbody>
								</table>
								<?php if( get_field('conveniencias', $p->ID) ): ?>
								<table>
									<thead style="background:#F2F2F2">
										<tr>
											<th colspan="4">Conveniências</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php the_field('conveniencias', $p->ID); ?></td>
										</tr>
									</tbody>
								</table>
								<?php else: ?>
								<?php endif; ?>
								<table>
									<thead style="background:#F2F2F2">
										<tr>
											<th colspan="4">Formas de Pagamento</th>
										</tr>
									</thead>
									<tbody>
										<?php

										$campo_pagamentos = array();
										$caminho_icones = '/img/pagamento/';
										$campo_pagamentos = get_field('formas_de_pagamento', $p->ID); ?>

										<tr>
											<td>
												<?php foreach ($campo_pagamentos as $opcoes) { ?>
													<img src="<?php echo bloginfo('template_url') . $caminho_icones . $opcoes . '.png'; ?>"/>
												<?php } ?>
											</td>
										</tr>

									</tbody>
								</table>
								<table>
									<thead style="background:#F2F2F2">
										<tr>
											<th>Sobre a empresa</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="sobreaempresa"><?php the_field('sobre_a_empresa', $p->ID); ?></td>
										</tr>
									</tbody>
								</table>
						    	<!-- LOCALIZACAO -->
						    	<table>
						    		<thead style="background:#F2F2F2">
						    			<tr>
						    				<th colspan="2">Localização</th>
						    			</tr>
						    		</thead>
						    		<tbody>
				    					<?php $id = array(get_the_ID(), $p->ID);?>
			    							<tr>
				    							<td>Endereço:</td>
					    						<td>
					    							<?php echo do_shortcode('[wpsl_address id="'.$id[1].'" name="false" city="false" state="false" country="false" phone="false"]'); ?>
					    						</td>
					    					</tr>
											<tr>
												<td>Telefones:</td>
												<td>
													<ul>
														<li><?php echo get_field('telefone_fixo', $p->ID); ?></li> 
														<li><?php echo get_field('telefone_2', $p->ID); ?></li>
														<li><?php echo get_field('celular', $p->ID); ?></li>
													</ul>
												</td>
											</tr>
						    				<tr>
						    					<td colspan="2" style="padding:0;margin:0;">
										    		<?php echo do_shortcode('[wpsl_map id="'.$id[1].'" zoom="16"]'); ?>
										    	</td>
							    			</tr>
						    		</tbody>
						    	</table>
					    	</div>
				    		<div class="col s12 margin40">
					    		<div class="col s12 l3">
						    		<h3 class="texto-vermelho-cupons ofertas-redes-sociais">Avaliações:</h3>
						    		<?php echo kk_star_ratings(); ?>
						    	</div>
						    	<div class="col s12 l5">
						    		<!-- REDES SOCIAIS DESKTOP -->
						    		<h3 class="texto-vermelho-cupons ofertas-redes-sociais hide-on-med-and-down">Redes Sociais da empresa:</h3>
							        <div class="social col m12 hide-on-med-and-down">
							        	<ul class="left">
							        		<!-- FACEBOOK -->
							        		<?php if( get_field('facebook', $p->ID) ): ?>
						            			<li>
						            				<a href="<?php echo get_field('facebook', $p->ID); ?>" target="blank">
						            					<img width="30" src="<?php bloginfo('template_url') ?>/img/redes-sociais/facebook.png"/>
						            				</a>
						            			</li>
						            		<?php endif; ?>
						            		<!-- INSTAGRAM -->
						            		<?php if (get_field('instagram', $p->ID)): ?>
						            			<li>
						            				<a href="<?php echo get_field('instagram', $p->ID); ?>" target="blank">
						            					<img width="30" src="<?php bloginfo('template_url') ?>/img/redes-sociais/instagram.png"/>
						            				</a>
						            			</li>
						            		<?php endif; ?>
							          	</ul>
							        </div>
							        <!-- REDES SOCIAIS MOBILE -->
							        <h3 class="texto-vermelho-cupons ofertas-redes-sociais hide-on-large-only margin20">Redes Sociais da empresa:</h3>
							        <div class="social col hide-on-large-only">
							        	<ul class="left">
						            		<li><a href="<?php the_field('facebook'); ?>" target="blank"><img width="25" src="<?php bloginfo('template_url') ?>/img/redes-sociais/facebook.png"/></a></li>
						            		<li><a href="<?php the_field('instagram'); ?>" target="blank"><img width="25" src="<?php bloginfo('template_url') ?>/img/redes-sociais/instagram.png"/></a></li>
							          	</ul>
							        </div>
						    	</div>
			    			</div>
						<?php endforeach; ?>
						<?php endif; ?>
				    </div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
</article>

<?php get_footer(); ?>