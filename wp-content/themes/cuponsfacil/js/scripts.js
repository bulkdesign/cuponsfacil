/*!
 * Arquivo de JavaScript para funções.
 * Desenvolvido em 2017 pela Bulk Design.
 * Todos os direitos reservados.
 */
 
$(document).ready(function(){
  $('.parallax').parallax();
  $('.scrollspy').scrollSpy();
  $('.slider').slider();
  $('.carousel.carousel-slider').carousel({fullWidth: true});
  $('ul.tabs').tabs();
  $('.toggle-overlay').click(function() {
    $('aside').toggleClass('open');
  })
  var a2a_config = a2a_config || {};
  a2a_config.linkname = "Cupons Fácil";
  a2a_config.linkurl = "https://cuponsfacil.com.br";
  a2a_config.locale = "pt-BR";
  a2a_config.num_services = 4;
});