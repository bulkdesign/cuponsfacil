<?php /* Template Name: Login */
/**
 * Template para exibir a página com todos os artigos do blog.
 */

get_header('login'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container" style="margin-top: 5%;">
		<header class="titulo-pagina">
			<!-- TÍTULO -->
			<div class="col s12 center margin50">
				<img src="<?php bloginfo('template_url'); ?>/img/logo/logo.png" width="250" />
			</div>
		</header>
		<!-- INÍCIO DO WHILE -->
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="col s12 margin20">
					<div class="col s12 center">
						<p>É comerciante? <a href="<?php echo site_url(); ?>/login-comerciante">Clique aqui para fazer seu login.</a></p>
					</div>
					<div class="col s12 center">
						<a href="https://www.cuponsfacil.com.br/wp-login.php?loginFacebook=1&redirect=https://www.cuponsfacil.com.br" onclick="window.location = 'https://www.cuponsfacil.com.br/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;'clientes">
						<div class="new-fb-btn new-fb-1 new-fb-default-anim"><div class="new-fb-1-1"><div class="new-fb-1-1-1">Entrar com Facebook</div></div></div>
						</a>
					</div>
					<div class="col s12">
						<?php echo do_shortcode('[ultimatemember form_id=238]'); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<!-- FIM DO WHILE -->
	</div>
</article>

<?php get_footer('login'); ?>