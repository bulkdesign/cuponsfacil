<?php /* Template Name: Saúde e Beleza */
/**
 * Template padrão para exibir as páginas.
 */

get_header('categorias'); ?>

<style type="text/css">
	
.margin-categoria {
	margin-top: 220px;
}

</style>

<article class="marginb80" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header class="titulo-pagina">
			<!-- TÍTULO -->
			<?php the_title( '<h1 class="texto-vermelho-cupons titulo-pagina margin50 center">', '</h1>' );	?>
		</header>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
		<!-- INÍCIO DO LOOP -->
		<?php

		$args = array(
		    'category_name' => 'saude-e-beleza',
		    'post_type' => 'ofertas'
		);

		?>

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

		<?php if( get_field('estabelecimento') ): ?>
			<div class="row">
		        <div class="col s12 paddingl0 paddingr0">
		        	<?php $loopcategorias = new WP_Query($args); ?>
					<!-- INÍCIO DO WHILE -->
					<?php while ( $loopcategorias->have_posts() ) : $loopcategorias->the_post(); ?>
		        	<?php $empresa = get_field('estabelecimento'); ?>

						<div class="col l4 m12 s12 padding50">
				            <a href="<?php echo get_permalink(); ?>">
				            	<div class="oferta hoverable" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?php echo get_field('foto_de_capa'); ?>');">
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

		    		<?php endwhile; wp_reset_query(); ?>
		        </div>
		    </div>
			<?php else: ?>
				<div class="col s12 m6 l4 center margin-categorias" id="nao-encontrado">
		    		<p style="padding:30px;">Nenhum conteúdo encontrado nesta categoria. Volte para a <a href="/">Página Inicial</a> ou utilize o buscador de <a href="<?php echo site_url() ?>/descontos-pertinho-de-voce">Descontos Pertinho de Você.</a></p>
		    	</div>
		    <?php endif; ?>
		<?php endwhile; ?>

	</div>
</article>

<?php get_footer(); ?>