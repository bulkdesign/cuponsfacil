<?php 

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="oquefazemos">
			<h1 class="texto-vermelho-cupons center">Cupom gerado com sucesso!</h1>
			<!-- <p class="center">Este cupom foi enviado para o e-mail cadastrado</p> -->
		</div>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
			<?php $cupons = new WP_Query( array( 'post_type' => 'cupons')); ?>
			<?php $oferta_relacionada = get_field('oferta_cupom'); ?>
			<!-- OFERTA -->
			<?php if( $oferta_relacionada ): ?>
			<?php foreach( $oferta_relacionada as $o ): ?>
			<!-- ESTABELECIMENTO -->
			<?php $estabelecimento = get_field('estabelecimento', $o->ID); ?>
			<?php if( $estabelecimento ): ?>
			<?php foreach( $estabelecimento as $e ): ?>

			<div class="row">
				<div class="col s12 l11 push-l1" style="margin-bottom: 50px;">
					<div class="col s12 l7">
						<div class="col s12 l4">
							<img style="width: 190px;float:left;padding-right: 30px;" src="<?php echo get_field('logo_do_cliente', $e->ID); ?>">
						</div>
						<div class="col s12 l8">
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
					<div class="col s12 l2 pull-l2 right">
						<?php echo do_shortcode('[barcode text=4930127000019 height=100 width=2 transparency=1]'); ?>
						<p class="center"><?php echo do_shortcode('[wpgenerapass]'); ?></p>
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