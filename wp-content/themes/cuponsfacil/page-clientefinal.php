<?php /* Template Name: Cliente Final */

get_header('paginas'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header class="entry-header">
		</header><!-- .entry-header -->
	</div>
	<div class="entry-content">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();		
		?>
		<div class="container">
			<!-- TÍTULO -->
			<header class="titulo-pagina">
				<h1 class="titulo-pagina center texto-vermelho-cupons" style="margin-top: 190px;">Meus Cupons</h1>
			</header>
			<div class="row">
				<div class="col s12">
					<div class="andamento">
						<table class="striped" id="table" data-toggle="table" data-filter-control="false">
						    <thead>
						        <tr>					        	
						            <th><strong class="texto-vermelho-cupons">Cupom</strong></th>
						            <th><strong class="texto-vermelho-cupons">Código do Cupom</strong></th>
						            <th><strong class="texto-vermelho-cupons">Status</strong></th>
						            <th><strong class="texto-vermelho-cupons">Ver Cupom</strong></th>
						            <th><strong class="texto-vermelho-cupons">Marcar como Utilizado</strong></th>
						            <th><strong class="texto-vermelho-cupons">Cancelar</strong></th>
						        </tr>
						    </thead>
						    <tbody>
						    	<?php if ( is_user_logged_in() ):

						    	global $current_user;
						    	wp_get_current_user();

						    	$loop_do_cliente = new WP_Query(array('post_type' => 'cupom_gerado', 'author' => $current_user->ID)); ?>
								<?php while ( $loop_do_cliente->have_posts() ) : $loop_do_cliente->the_post(); ?>
						        <tr>
						        	<td><?php the_title(); ?></td>
						        	<td><?php the_content(); ?></td>
						        	<td><span style="text-transform:capitalize;"><?php echo get_post_status(); ?></span></td>
						        	<td><a href="<?php the_permalink(); ?>">Clique aqui</td>
						        	<td>
						        		<form action="" method="POST" >
										    <input type="checkbox" value="status_usado" checked="checked" name="utilizado">
										    <input type="submit" value="Alterar">
										</form>
										<?php toDraft($post->ID); ?>
						        	</td>
						        	<td>
						        		<form action="" method="POST" >
										    <input type="checkbox" value="status_cancelado" checked="checked" name="cancelado">
										    <input type="submit" value="Cancelar">
										</form>
										<?php toCancel($post->ID); ?>
						        	</td>
					        	</tr>
						       	
					       		<?php endwhile;
					       		endif;
					        	wp_reset_postdata(); ?>
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</article>

<div class="margin50"></div>

<?php get_footer(); ?>