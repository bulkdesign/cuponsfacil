<?php 

get_header('paginas'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="oquefazemos cupom-gerado">
			<h1 class="texto-vermelho-cupons center">Cupom gerado com sucesso!</h1>

			<?php global $current_user; get_currentuserinfo(); ?>
			<p class="center">Este cupom foi enviado para o e-mail <?php echo $current_user->user_email; ?></p>
		</div>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
			<?php $cupons = new WP_Query( array( 'post_type' => 'cupons')); ?>
			<?php $oferta_relacionada = get_field('oferta_cupom'); ?>
			<!-- OFERTA -->
			<?php if( $oferta_relacionada ): ?>
			<?php foreach( $oferta_relacionada as $o ): ?>

			<div class="row">
				<div class="col s12 m12 l11 push-l1" style="margin-bottom: 50px;">
					<div class="col s12 m12 l6 push-l1">
						<?php $estabelecimento = get_field('estabelecimento', $o->ID); ?>
						<?php if( $estabelecimento ): ?>
							<?php foreach( $estabelecimento as $e ): ?>
						<div class="col hide-on-small-only m4 l4">
							<img style="width: 190px;float:left;padding-right: 30px;" src="<?php echo get_field('logo_do_cliente', $e->ID); ?>">
						</div>
						<div class="col s12 hide-on-med-and-up center">
							<img style="width: 80%;margin: 0 0 30px;" src="<?php echo get_field('logo_do_cliente', $e->ID); ?>">
						</div>
						<!-- ESTABELECIMENTO -->
						<div class="col s12 m8 push-l1 l8">
								<h3><?php echo $o->post_title; ?></h3>
									<p>Empresa: <?php echo get_field('nome_da_empresa', $e->ID); ?></p>
									<?php 
				        			$validade = get_field('validade', $o->ID);
				        			$validade = new DateTime($validade);
				        		?>
		        				<p>Validade: <?php echo $validade->format('j/m/y'); ?></p>
							<?php endforeach; ?>
						<?php endif; ?>
						</div>
						<div class="col s12">
							<p>Não é necessário imprimir. Basta apresentar o código pelo celular.</p>
						</div>
						<div class="col s12" style="margin-top: 30px;">
							<h3>Regulamento da oferta:</h3>
							<p><?php the_field('regulamento_da_oferta', $o->ID); ?></p>
						</div>
					</div>
					<div class="col s12 m12 l3 pull-l1 right">
						<?php wp_insert_post( 
							array(
								'post_author' => get_current_user_id(),   
								'post_content' => strip_tags(do_shortcode('[wpgenerapass]')),
								'post_title' => $current_user->display_name . ' - ' . $o->post_title,
								'post_status' => 'publish',
								'post_type' => 'cupom_gerado'
							) 
						); ?>

						<?php echo do_shortcode('[qrcode text="Cupons Fácil" height=200 width=200 transparency=1]'); ?>
						<p class="center">O seu código de desconto:</p>
							<?php echo do_shortcode('[wpgenerapass]'); ?>
					</div>
				</div>

			</div>

			<?php endforeach; ?>
			<?php endif; ?>
		<?php wp_reset_query(); ?>
		<?php endwhile;?>
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer(); ?>