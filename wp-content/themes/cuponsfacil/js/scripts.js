/*!
 * Arquivo de JavaScript para funções.
 * Desenvolvido em 2017 pela Bulk Design.
 * Todos os direitos reservados.
 */
 
$(document).ready(function(){
  $('ul.tabs').tabs();
  $('.parallax').parallax();
  $('.scrollspy').scrollSpy();
  $('.slider').slider();
  $('.modal').modal();
  $('.carousel.carousel-slider').carousel({fullWidth: true});
  $('.toggle-overlay').click(function() {
    $('aside').toggleClass('open');
  })
  $('.bxslider').bxSlider({
    pager: false,
    adaptiveHeight: true,
    mode: 'horizontal'
  });
  $('.loop').owlCarousel({
      center: true,
      items:2,
      loop:true,
      margin:10,
      responsive:{
          600:{
              items:4
          }
      }
  });

  var scrollTop = 0;
  $(window).scroll(function(){
    scrollTop = $(window).scrollTop();
      $('.counter').html(scrollTop);
    
      if (scrollTop >= 100) {
        $('.categorias').css('display', 'none');
        $('#global-nav').addClass('scrolled-nav');
        
        }
        
        else if (scrollTop < 100) {
          $('.categorias').css('display', 'block');
          $('#global-nav').removeClass('scrolled-nav');
        }   
  }); 

  var a2a_config = a2a_config || {};
  a2a_config.linkname = "Cupons Fácil";
  a2a_config.linkurl = "https://cuponsfacil.com.br";
  a2a_config.locale = "pt-BR";
  a2a_config.num_services = 4;
});