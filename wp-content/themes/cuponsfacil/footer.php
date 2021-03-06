<?php
/**
 * Template para exibicao do rodapé da página inicial.
 */
?>

<!-- FOOTER -->
  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <!-- DESKTOP -->
        <div class="col hide-on-med-and-down l12 left">
          <!-- SITEMAP -->
          <div class="col l3">
            <h3 class="texto-amarelo-cupons">Cupons Fácil</h3>
            <ul class="left">
              <li><a href="<?php echo site_url(); ?>/descontos-pertinho-de-voce">Descontos Pertinho de Você</a></li>
              <li><a href="<?php echo site_url(); ?>/conheca">Conheça</a></li>
              <li><a href="<?php echo site_url(); ?>/blog">Blog</a></li>
              <!-- <li>Categorias</li> -->
              <li><a href="<?php echo site_url(); ?>/anuncie">Anuncie</a></li>
              <li><a href="<?php echo site_url(); ?>/contato">Contato</a></li>
              <li><a href="<?php echo site_url(); ?>/login">Login</a></li>
            </ul>
          </div>
          <!-- NEWSLETTER -->
          <div class="col l6 center">
            <h3 class="texto-amarelo-cupons">Newsletter</h3>
            <div class="container">
              <p class="white-text">Inscreva-se na nossa newsletter para ficar por dentro de todas as promoções e novidades da Cupons Fácil:</p>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="162" title="Newsletter"]'); ?>
          </div>
          <!-- REDES SOCIAIS -->
          <div class="social col l3">
            <h3 class="texto-amarelo-cupons right right-align hide-on-med-and-down">Nós, nas Redes Sociais</h3>
            <ul class="right">
              <li><a href="https://www.facebook.com/CuponsFacil/" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/img/redes-sociais/facebook.png"/></a></li>
              <li><a href="https://instagram.com/cuponsfacil/" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/img/redes-sociais/instagram.png"/></a></li>
              <li><a href="https://www.youtube.com/channel/UCKEorUhqPYIE4u26s_TU9KA" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/img/redes-sociais/youtube.png"/></a></li>
            </ul>
          </div>
        </div>
        <!-- MOBILE -->
        <div class="col s12 m12 hide-on-large-only">
          <!-- REDES SOCIAIS -->
          <div class="social col s12 m12">
            <ul style="position: relative;left: 35%;">
              <li><a href="https://www.facebook.com/CuponsFacil/" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/img/redes-sociais/facebook.png"/></a></li>
              <li><a href="https://instagram.com/cuponsfacil/" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/img/redes-sociais/instagram.png"/></a></li>
              <li><a href="https://www.youtube.com/channel/UCKEorUhqPYIE4u26s_TU9KA" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/img/redes-sociais/youtube.png"/></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container center">
        <p class="white-text">Cupons Fácil © <?php echo date('Y'); ?> - Todos os direitos reservados | Made by <a class="purple-text text-lighten-3" href="http://www.bulkdesign.com.br" target="blank">Bulk Design</a></p>
      </div>
    </div>
  </footer>
  <!-- IMPORTAÇÃO DOS ARQUIVOS DE JAVASCRIPT -->
  <script src="<?php bloginfo('template_url') ?>/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/materialize.js"></script>
  <script src="<?php bloginfo('template_url') ?>/js/bootstrap-table.js"></script>
  <script src="<?php bloginfo('template_url') ?>/js/filter-control/bootstrap-table-filter-control.js"></script>
  <script src="<?php bloginfo('template_url') ?>/js/jquery.bxslider/jquery.bxslider.min.js"></script>
  <script src="<?php bloginfo('template_url') ?>/js/owlcarousel/dist/owl.carousel.min.js"></script>
  <script src="<?php bloginfo('template_url') ?>/js/scripts.js"></script>
  <script async src="https://static.addtoany.com/menu/page.js"></script>
  <?php wp_footer(); ?>
  </body>
</html>