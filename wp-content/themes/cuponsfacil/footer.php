<!-- FOOTER -->
<footer class="page-footer">
  <div class="container">
    <div class="row">
      <div class="col l12 left">
        <div class="col l3 hide-on-small-only">
          <h3 class="texto-amarelo-cupons">Cupons Fácil</h3>
          <ul class="left">
            <li>Conheça</li>
            <li>Categorias</li>
            <li>Anuncie</li>
            <li>Contato</li>
            <li>Login</li>
          </ul>
        </div>
        <div class="col hide-on-large-only s12">
          <h3 class="texto-amarelo-cupons center">Cupons Fácil</h3>
          <ul class="center">
            <li>Conheça</li>
            <li>Categorias</li>
            <li>Anuncie</li>
            <li>Contato</li>
            <li>Login</li>
          </ul>
        </div>
        <div class="col l6 s12 center hide-on-small-only">
          <h3 class="texto-amarelo-cupons">Newsletter</h3>
          <div class="container">
            <p class="white-text hide-on-small-only">Inscreva-se na nossa newsletter para ficar por dentro de todas as promoções e novidades da Cupons Fácil:</p>
          </div>
          <div class="col s12">
            <div class="col s8">
              <input type="email" name="" placeholder="Seu e-mail" />
            </div>
            <div class="col s2">
              <button type="submit" class="vermelho-cupons btn btn-small">Enviar</button>
            </div>
          </div>
        </div>
        <div class="social col l3 m12 hide-on-small-only">
          <h3 class="texto-amarelo-cupons right">Nós, nas Redes Sociais</h3>
          <ul class="right">
            <li><a href="https://www.facebook.com/CuponsFacil/" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/images/facebook.png"/></a></li>
            <li><a href="https://instagram.com/cuponsfacil/" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/images/instagram.png"/></a></li>
            <li><a href="#" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/images/twitter.png"/></a></li>
            <li><a href="#" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/images/youtube.png"/></a></li>
          </ul>
        </div>
        <div class="social col s12 m12 hide-on-large-only">
          <h3 class="texto-amarelo-cupons center">Nós, nas Redes Sociais</h3>
          <ul class="center">
            <li><a href="https://www.facebook.com/CuponsFacil/" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/images/facebook.png"/></a></li>
            <li><a href="https://instagram.com/cuponsfacil/" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/images/instagram.png"/></a></li>
            <li><a href="#" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/images/twitter.png"/></a></li>
            <li><a href="#" target="blank"><img width="30" src="<?php bloginfo('template_url') ?>/images/youtube.png"/></a></li>
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
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url');?>/materialize/js/materialize.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
    $('.slider').slider();
    $('.carousel.carousel-slider').carousel({fullWidth: true});
    $('ul.tabs').tabs();
  });
</script>
<script>
var a2a_config = a2a_config || {};
a2a_config.linkname = "Cupons Fácil";
a2a_config.linkurl = "https://cuponsfacil.com.br";
a2a_config.locale = "pt-BR";
a2a_config.num_services = 4;
</script>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
<?php wp_footer(); ?>
</body>
</html>