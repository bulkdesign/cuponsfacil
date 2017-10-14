<?php
/**
 * Template para exibir a página da loja.
 */

get_header('categorias'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- INÍCIO DO WHILE -->
	<?php while ( have_posts() ) : the_post(); ?>
		<!-- INÍCIO DO LOOP -->
		<?php $loja = new WP_Query( array( 'post_type' => array('wpsl_stores') )); ?>

			<!-- AQUI DENTRO VEM O CONTEÚDO PRINCIPAL -->
			<div class="col s12">
				<h1 class="texto-vermelho-cupons center"><?php the_title(); ?></h1>
			</div>
			<div class="container">
				<div class="margin40">
					<h3 class="texto-vermelho-cupons">Informações gerais</h3>
					<table class="margin20 striped">
						<thead>
							<tr>
								<th><strong class="texto-vermelho-cupons">Nome da empresa</strong></th>
								<th><strong class="texto-vermelho-cupons">Razão Social</strong></th>
								<th><strong class="texto-vermelho-cupons">CNPJ</strong></th>
								<th><strong class="texto-vermelho-cupons">E-mail</strong></th>
								<th><strong class="texto-vermelho-cupons">Telefone Fixo</strong></th>
								<th><strong class="texto-vermelho-cupons">Celular</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php the_field('nome_da_empresa'); ?></td>
								<td><?php the_field('razao_social'); ?></td>
								<td><?php the_field('cnpj'); ?></td>
								<td><?php the_field('e-mail'); ?></td>
								<td><?php the_field('telefone_fixo'); ?></td>
								<?php if( get_field('celular') ): ?>
									<td><?php the_field('celular'); ?></td>
								<?php else: ?>
									<td>Não possui</td>
								<?php endif; ?>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="margin40">
					<h3 class="texto-vermelho-cupons">O Estabelecimento</h3>
					<table class="margin20 striped">
						<table>
							<thead style="background:#F2F2F2">
								<tr>
									<th colspan="3"><strong class="texto-vermelho-cupons">Horários de funcionamento</strong></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Dias de semana: <?php the_field('funcionamento_semana', $p->ID); ?></td>
									<?php if ( get_field('funcionamento_sabado') ): ?>
										<td>Sábado: <?php the_field('funcionamento_sabado', $p->ID); ?></td>
									<?php else: ?>
										<td>Sábado: fechado</td>
									<?php endif; ?>
									<?php if ( get_field('funcionamento_domingo') ): ?>
										<td>Domingo: <?php the_field('funcionamento_domingo', $p->ID); ?></td>
									<?php else: ?>
										<td>Domingo: fechado</td>
									<?php endif; ?>
								</tr>
							</tbody>
						</table>
						<table>
							<thead style="background:#F2F2F2">
								<tr>
									<th colspan="4"><strong class="texto-vermelho-cupons">Conveniências</strong></th>
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
									<th colspan="4"><strong class="texto-vermelho-cupons">Formas de Pagamento</strong></th>
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
					</table>
				</div>
			</div>
			<div class="container margin40">
				<h3 class="texto-vermelho-cupons">Localização</h3>
				<div class="margin20">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="margin40"></div>

		<?php wp_reset_query(); ?>
		<!-- FIM DO LOOP -->
	<?php endwhile; ?>
	<!-- FIM DO WHILE -->

</article>

<?php get_footer(); ?>