<?php /* Template Name: Cupom */
/**
 * Template para exibir a página conheça.
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="oquefazemos">
			<h1 class="texto-vermelho-cupons center">Cupom gerado com sucesso!</h1>
			<p class="center">Este cupom foi enviado para o e-mail host@bulkdesign.com.br</p>
		</div>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
			<?php $ofertas = new WP_Query( array( 'post_type' => array('ofertas'), 'posts_per_page' => 1 )); ?>
			<?php while ( $ofertas->have_posts() ) : $ofertas->the_post(); ?>
			<?php $posts = get_field('estabelecimento'); ?>

			<div class="row">
				<div class="col s12 l11 push-l1" style="margin-bottom: 50px;">
					<div class="col s12 l7">
						<div class="col s12 l4">
							<img style="width: 190px;float:left;padding-right: 30px;" src="<?php echo get_field('logo_do_cliente'); ?>">
						</div>
						<div class="col s12 l8">
							<h3><?php the_title(); ?></h3>
							<?php if( $posts ): ?>
								<?php foreach( $posts as $p ): ?>
								    <p>Empresa: <?php the_field('nome_da_empresa', $p->ID); ?></p>
								<?php endforeach; ?>
							<?php endif; ?>
							<?php 
			        			$validade = get_field('validade', false, false);
			        			$validade = new DateTime($validade);
			        		?>
		        			<p>Validade: <?php echo $validade->format('j/m/y'); ?></p>
						</div>
						<div class="col s12">
							<p>Não é necessário imprimir. Basta apresentar o código pelo celular.</p>
						</div>
						<div class="col s12" style="margin-top: 30px;">
							<h3>Regulamento da oferta:</h3>
							<p><?php the_field('regulamento_da_oferta'); ?></p>
						</div>
					</div>
					<div class="col s12 l2 pull-l2 right">
						<img style="width:150px;" src="<?php bloginfo('template_url'); ?>/img/qr.png" />
						<h3 class="center">HTRSC12</h3>
					</div>
				</div>

			</div>
		<?php endwhile; wp_reset_query(); ?>
		<?php endwhile;?>
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer(); ?>