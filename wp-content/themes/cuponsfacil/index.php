<?php get_header();?>
    <section class="slidepremium section scrollspy header-home" id="slidepremium"> <!--CLAASE HEADER-HOME É PARA O SLIDESHOW-->
    <!--SLIDESHOW-->
      <div class="slider">
        <ul class="slides">
          <li>
            <img src="<?php bloginfo('template_url');?>/images/veterinario.jpg"> <!-- random image -->
            <div class="caption left-align">
              <div class="row">
                <div class="col m8 conteudoinicial">
                  <h1>Consulta veterinária com 10% de desconto em <span class="texto-amarelo-cupons">Vet Diniz</span></h1>
                  <p>Atendimento médico personalizado, com respeito e qualidade. <br>
                  Realize uma consulta para o seu bichano em um ambiente diferenciado, com uma equipe preparada para melhor atendê-lo.</p>
                  <a href="#" class="btn texto-amarelo-cupons">Ver Oferta</a>
                </div>
              </div>
            </div>
          </li>
          <li>
            <img src="<?php bloginfo('template_url');?>/images/papelaria.jpeg"> <!-- random image -->
            <div class="caption left-align">
              <div class="row">
                <div class="col m8 conteudoinicial">
                  <h1>10% de Desconto no total da compra em <span class="texto-amarelo-cupons">Bavatos Papelaria e Informática</span></h1>
                  <p>Com uma missão extremamente atual, a Bavatos procura sempre a satisfação do seu cliente, procurando soluções simples, eficazes e menos burocráticas possíveis, personalizando o atendimento e visando o reconhecimento no mercado.</p>
                  <a href="#" class="btn texto-amarelo-cupons">Ver Oferta</a>
                </div>
              </div>
            </div>
          </li>
          <li>
            <img src="<?php bloginfo('template_url');?>/images/seguranca.png"> <!-- random image -->
            <div class="caption left-align">
              <div class="row">
                <div class="col m8 conteudoinicial">
                  <h1>30% de Desconto na taxa de instalação em <span class="texto-amarelo-cupons">Isco Sistemas</span></h1>
                  <p>Visando a agilidade e a confiabilidade, nosso sistema de gestão empresarial é um software na medida certa para o seu negócio e com um preço justo.</p>
                  <a href="#" class="btn texto-amarelo-cupons">Ver Oferta</a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </section>
    <!--SESSÃO PRINCIPAIS OFERTAS-->
    <section id="principaisofertas">
      <div class="container">
        <div class="row">
          <div class="col l12 m12">
            <h1>Principais Ofertas</h1>
          </div>
          <div class="col l6 m12 s12">
            <a href="#">
              <div class="oferta primeiro">
                <h3>Bavatos</h3>
              </div>
              <div class="descricaooferta">
                <h3>Desconto de 10% no valor total - <span>Bavatos</span></h3>
              </div>
            </a>
            <br>
          </div>
          <div class="col l6 m12 s12">
            <a href="#">
              <div class="oferta segundo">
                <h3>ISCO Sistemas</h3>
              </div>
              <div class="descricaooferta">
                <h3>30% de desconto na taxa de instalação - <span>ISCO Sistemas</span></h3>
              </div>
            </a>
            <br>
          </div>
          <div class="col l4 m12 s12">
            <a href="#">
              <div class="oferta terceiro">
                <h3>Hookah</h3>
              </div>
              <div class="descricaooferta">
                <h3>10% no combo: 2 essências + 10 unidades de carvão - <span>Hookah Beats Tabacaria</span></h3>
              </div>
            </a>
            <br>
          </div>
          <div class="col l4 m12 s12">
            <a href="#">
              <div class="oferta quarto">
              <img src="<?php bloginfo('template_url'); ?>/images/Yu.png">
              </div>
              <div class="descricaooferta">
                <h3>15% na troca de tela de qualquer iphone - <span>YuService</span></h3>
              </div>
            </a>
            <br>
          </div>
          <div class="col l4 m12 s12">
            <a href="#">
              <div class="oferta quinto">
                <img src="<?php bloginfo('template_url'); ?>/images/mega.png" style="width: 250px;">
              </div>
              <div class="descricaooferta">
                <h3>20% de desconto no Extrator de E-mail - <span>MegaMailing</span></h3>
              </div>
            </a>
            <br>
          </div>
        </div>
      </div>
    </section>
    <!--SESSÃO MAPA-->
    <section id="mapa">
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h1>Descontos pertinho de você</h1>
            <p class="texto-amarelo-cupons hide-on-small-only">Encontre os descontos que estão próximos à você! <br>
            Procure pelas categorias no mapa abaixo e aproveite o melhor da cidade, pelo preço mais baixo!</p>
            <?php echo do_shortcode('[wpsl]');?>
            <div class="btn vermelho-cupons"><a href="#" class="texto-amarelo-cupons"><h6 style="padding-top: 4px;">Ver todas as ofertas<h6></a></div>
          </div>
        </div>
      </div>
    </section>
<?php get_footer(); ?>