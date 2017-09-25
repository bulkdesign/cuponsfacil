<?php
/**
 * Template padrao para exibicao de conteudo das ofertas.
 *
 * @package WordPress
 * @subpackage Cupons Facil
 * @since Cupons Facil
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php $posts = get_field('estabelecimento'); ?>

		<div class="carousel capa-oferta carousel-slider center" data-indicators="true">
		    <div class="carousel-fixed-item center">
		    	<div class="row">
		    		<div class="col s12 m8 push-m2">
				    	<h1 class="texto-amarelo-cupons nafrente"><?php the_title(); ?>
							<?php if( $posts ): ?>
								<?php foreach( $posts as $p ): ?>
								    <span class="white-text">em <?php the_field('nome_da_empresa', $p->ID); ?></span>
								<?php endforeach; ?>
							<?php endif; ?>
						</h1>
					    <a class="btn waves-effect amarelo-cupons texto-vermelho-cupons">Pegar cupom</a>
					</div>
					<div class="overlay-vermelho"></div>
				</div>
		    </div>
		    <div class="carousel-item white-text" href="#one!">
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
				    		<div class="col s12 m6">
								<div class="slider">
									<ul class="slides">
									<?php
									if( have_rows('fotos_da_oferta') ):
									    while ( have_rows('fotos_da_oferta') ) : the_row(); ?>
									        <li>
												<img src="<?php echo the_sub_field('imagem_oferta'); ?>">
											</li>
									    <?php endwhile;
										else :
									endif; ?>	
									</ul>
								</div>
				    		</div>
				    		<div class="col s12 m6">
				    			<h1 class="texto-vermelho-cupons">Desconto de <?php echo the_field('desconto'); ?>%</h1>
				    			<?php echo the_field('descricao_da_oferta'); ?>
								<div class="divider"></div>
								<!-- AddToAny BEGIN -->
								<p class="texto-pequeno">Compartilhe esta oferta:</p>
								<div class="a2a_kit a2a_kit_size_16 a2a_default_style">
									<a class="a2a_button_facebook"></a>
									<a class="a2a_button_twitter"></a>
									<a class="a2a_button_whatsapp"></a>
								</div>
								<a class="margin20 btn waves-effect vermelho-cupons texto-amarelo-cupons">Pegar cupom</a>
				    		</div>
				    	</div>
				    	<div class="col s12 margin20">
				    		<h3 class="texto-vermelho-cupons">Como utilizar o cupom:</h3>
				    		<p>Apresente o cupom no local, podendo ser tanto impresso quanto diretamente pela tela do celular.</p>
				    	</div>
				    	<div class="col s12">
				    		<h3 class="texto-vermelho-cupons">Localização:</h3>
				    		<?php $id = array(get_the_ID(), $p->ID);?>
				    		<?php echo do_shortcode('[wpsl_address id="'.$id[1].'" name="false" city="false" state="false" country="false" phone="false"]'); ?>
				    		Telefones: <?php the_field('telefone_fixo', $p->ID); ?> <?php if( get_field('telefone_2', $p->ID)): ?>| <?php the_field('telefone_2', $p->ID); ?><?php else: ?><?php endif; ?>
				    		<div class="margin20">
				    			<?php echo do_shortcode('[wpsl_map id="'.$id[1].'" zoom="16"]'); ?>
				    		</div>
				    	</div>
				    	<div class="col s12">
				    		<h3 class="texto-vermelho-cupons">Avaliações:</h3>
				    		<?php if(function_exists("kk_star_ratings")) : echo kk_star_ratings($pid); endif; ?>
				    	</div>
					</div>
				    <div id="regulamento" class="col s12 m8 push-m2">
				    	<div class="col s12">
				    		<?php echo the_field('regulamento_da_oferta'); ?>
				    	</div>
				    </div>
				    <div id="aempresa" class="col s12 m8 push-m2">
				    	<div class="col s12">
				    		<?php if( $posts ): ?>
								<?php foreach( $posts as $p ): ?>
								    <p><?php the_field('nome_da_empresa', $p->ID); ?></p>
								    <p><?php the_field('telefone_fixo', $p->ID); ?></p>
								    <p><?php the_field('e-mail', $p->ID); ?></p>
								    <p><?php the_field('funcionamento_semana', $p->ID); ?></p>
								    <p><?php the_field('funcionamento_sabado', $p->ID); ?></p>
								    <p><?php the_field('funcionamento_domingo', $p->ID); ?></p>
								    <p><?php the_field('conveniencias', $p->ID); ?></p>
								    <p><?php the_field('formas_de_pagamento', $p->ID); ?></p>
								    <p><?php the_field('sobre_a_empresa', $p->ID); ?></p>
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