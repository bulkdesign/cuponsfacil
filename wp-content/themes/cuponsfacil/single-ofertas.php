<?php
/**
 * Template padrao para exibicao de conteudo das ofertas.
 *
 * @package WordPress
 * @subpackage Cupons Facil
 * @since Cupons Facil
 */

get_header(); ?>

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
					    <a class="btn waves-effect amarelo-cupons texto-vermelho-cupons" href="?page_id=134">Pegar cupom</a>
					</div>
				</div>
		    </div>
		    <div class="carousel-item white-text" href="#one!">
		    	<div class="overlay-vermelho"></div>
		    	<img src="<?php echo get_field('foto_de_capa'); ?>">
		    </div>
		</div>
		<div class="container">
			<div class="row">
			    <div class="col s12 m8 push-m2 abas">
			    	<ul class="tabs">
			        	<li class="tab col s4"><a class="active" href="#sobreaoferta">Sobre a Oferta</a></li>
			        	<li class="tab col s4"><a href="#regulamento">Regulamento</a></li>
			        	<li class="tab col s4"><a href="#aempresa">A Empresa</a></li>
			      	</ul>
			    </div>
			    <div class="dentro-abas">
				    <div id="sobreaoferta" class="col s12 m8 push-m2">
				    	<div class="col s12">
				    		<!-- FOTO OFERTA DESKTOP -->
				    		<div class="col hide-on-small-only m6">
								<div class="slider" style="margin-top: 50px;">
									<ul class="slides">
								        <li>
											<img src="<?php echo the_field('fotos_da_oferta'); ?>">
										</li>
									</ul>
								</div>
				    		</div>
				    		<!-- FOTO OFERTA MOBILE -->
				    		<div class="col s12 hide-on-med-and-up">
								<div class="slider oferta-mobile">
									<ul class="slides">
								        <li>
											<img src="<?php echo the_field('fotos_da_oferta'); ?>">
										</li>
									</ul>
								</div>
				    		</div>
				    		<div class="col s12 m6">
				    			<h1 class="hide-on-small-only texto-vermelho-cupons">Desconto de <?php echo the_field('desconto'); ?>%</h1>
				    			<?php echo the_field('descricao_da_oferta'); ?>
								<div class="divider"></div>
								<!-- AddToAny BEGIN -->
								<div class="hide-on-small-only">
									<p class="texto-pequeno">Compartilhe esta oferta:</p>
									<div class="a2a_kit a2a_kit_size_16 a2a_default_style">
										<a class="a2a_button_facebook"></a>
										<a class="a2a_button_twitter"></a>
										<a class="a2a_button_whatsapp"></a>
									</div>
									<a class="margin20 btn waves-effect vermelho-cupons texto-amarelo-cupons hide-on-small-only" href="?page_id=134">Pegar cupom</a>
								</div>
				    		</div>
				    	</div>
				    	<div class="col s12 margin20 comousar">
				    		<h3 class="texto-vermelho-cupons">Como utilizar o cupom:</h3>
				    		<p>Apresente o cupom no local, podendo ser tanto impresso quanto diretamente pela tela do celular.</p>
				    	</div>
				    	<div class="col s12">
				    		<h3 class="texto-vermelho-cupons">Localização:</h3>
				    		<?php $id = array(get_the_ID(), $p->ID);?>
				    		<p><?php echo do_shortcode('[wpsl_address id="'.$id[1].'" name="false" city="false" state="false" country="false" phone="false"]'); ?></p>
				    		<p>Telefones: <?php the_field('telefone_fixo', $p->ID); ?> <?php if( get_field('telefone_2', $p->ID)): ?>| <?php the_field('telefone_2', $p->ID); ?><?php else: ?><?php endif; ?></p>
				    		<div class="margin20">
				    			<?php echo do_shortcode('[wpsl_map id="'.$id[1].'" zoom="16"]'); ?>
				    		</div>
				    	</div>
				    	<div class="col s12 margin20">
				    		<div class="col s12 l3">
					    		<h3 class="texto-vermelho-cupons avaliacoes">Avaliações:</h3>
					    		<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings($pid); endif; ?>
					    	</div>
					    	<?php if( get_field('facebook', $p->ID) ): ?>
						    	<div class="col s12 l5">
						    		<h3 class="texto-vermelho-cupons ofertas-redes-sociais">Redes Sociais da empresa:</h3>
						    		<!-- REDES SOCIAIS DESKTOP -->
							        <div class="social col m12 hide-on-small-only">
							        	<ul class="left">
						            		<li><a href="<?php the_field('facebook', $p->ID); ?>" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/img/redes-sociais/facebook.png"/></a></li>
						            		<li><a href="<?php the_field('instagram', $p->ID); ?>" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/img/redes-sociais/instagram.png"/></a></li>
							          	</ul>
							        </div>
							        <!-- REDES SOCIAIS MOBILE -->
							        <div class="social col hide-on-med-and-up margin20">
							        	<ul class="left">
						            		<li><a href="<?php the_field('facebook', $p->ID); ?>" target="blank"><img width="25" src="<?php bloginfo('template_url') ?>/img/redes-sociais/facebook.png"/></a></li>
						            		<li><a href="<?php the_field('instagram', $p->ID); ?>" target="blank"><img width="25" src="<?php bloginfo('template_url') ?>/img/redes-sociais/instagram.png"/></a></li>
							          	</ul>
							        </div>
						    	</div>
					    		<?php else: ?>
					    	<?php endif; ?>
				    	</div>
					</div>
				    <div id="regulamento" class="col s12 m8 push-m2">
				    	<div class="col s12">
				    		<?php echo the_field('regulamento_da_oferta'); ?>
				    	</div>
				    </div>
				    <div id="aempresa" class="col s12 m8 push-m2">
				    	<div class="col s12" style="height: 300px !important; margin-bottom: 50px">
							<img style="width: 100%; height:300px;" src="<?php echo the_field('fotos_da_oferta'); ?>">
				    	</div>
				    	<div class="col s12 grey-text text-darken-2">
				    		<?php if( $posts ): ?>
								<?php foreach( $posts as $p ): ?>
									<table>
										<thead style="background:#F2F2F2">
											<tr>
												<th>Nome da empresa</th>
												<th>Telefone fixo</th>
												<th>E-mail</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php the_field('nome_da_empresa', $p->ID); ?></td>
												<td><?php the_field('telefone_fixo', $p->ID); ?></td>
												<td><?php the_field('e-mail', $p->ID); ?></td>
											</tr>
										</tbody>
									</table>
									<table>
										<thead style="background:#F2F2F2">
											<tr>
												<th colspan="3">Horários de funcionamento:</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Dias de semana: <?php the_field('funcionamento_semana', $p->ID); ?></td>
												<td>Sábado: <?php the_field('funcionamento_sabado', $p->ID); ?></td>
												<td>Domingo: <?php the_field('funcionamento_domingo', $p->ID); ?></td>
											</tr>
										</tbody>
									</table>
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
									<table>
										<thead style="background:#F2F2F2">
											<tr>
												<th colspan="4">Formas de Pagamento</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$campo_pagamentos = array();
											$caminho_icones = '../cuponsfacil/wp-content/themes/cuponsfacil/img/pagamento/';
											$campo_pagamentos = get_field('formas_de_pagamento', $p->ID); ?>

											<tr>
												<td>
													<?php foreach ($campo_pagamentos as $opcoes) { ?>
														<img src="<?php echo $caminho_icones . $opcoes . '.png'; ?>"/>
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
												<td><?php the_field('sobre_a_empresa', $p->ID); ?></td>
											</tr>
										</tbody>
									</table>
								<?php endforeach; ?>
							<?php endif; ?>
				    	</div>
				    </div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
</article>

<?php get_footer(); ?>