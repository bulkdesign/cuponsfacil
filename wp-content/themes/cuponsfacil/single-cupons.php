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

			<div class="row">
				<div class="col s12 l11 push-l1" style="margin-bottom: 50px;">
					<div class="col s12 l7">
						<div class="col s12 l4">
							<img style="width: 190px;float:left;padding-right: 30px;" src="<?php echo get_field('logo_do_cliente', $e->ID); ?>">
						</div>
						<!-- ESTABELECIMENTO -->
						<div class="col s12 l8">
						<?php $estabelecimento = get_field('estabelecimento', $o->ID); ?>
						<?php if( $estabelecimento ): ?>
							<?php foreach( $estabelecimento as $e ): ?>
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

						<?php global $current_user;
						      get_currentuserinfo();
						      // echo 'Username: ' .  . "\n";
						      // echo 'User email: ' . $current_user->user_email . "\n";
						      // echo 'User level: ' . $current_user->user_level . "\n";
						      // echo 'User first name: ' . $current_user->user_firstname . "\n";
						      // echo 'User last name: ' . $current_user->user_lastname . "\n";
						      // echo 'User display name: ' . $current_user->display_name . "\n";
						      // echo 'User ID: ' . $current_user->ID . "\n";
						?>

						<?php wp_insert_post( 
							array(  //'ID'   => (if its update, you have to provide existing post, you can use the ID to update it),  // optional
								'post_author' => get_current_user_id(),   
								'post_content' => 'Código do cupom: ' . strip_tags(do_shortcode('[wpgenerapass]')) . "\n". $o->ID,  // content of the article,
								'post_title' => $current_user->user_login . ' - ' . $o->post_title,  // title of the article
								'post_status' => 'publish',   // i just published the post directly, but you can change the status as of your need
								'post_type' => 'cupom_gerado',   // if any custom post type, you can use it here 
								// 'post_category' => array(25, 35),
								// 'tax_input' => array('WordPress', 'post')
							) 
						); ?>

						<?php //echo do_shortcode('[qrcode url=asdasd height=100 width=2 transparency=1]'); ?>
						<p class="center"><?php // echo do_shortcode('[wpgenerapass]'); ?></p>
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