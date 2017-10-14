/*!
 * Arquivo de JavaScript para funções.
 * Desenvolvido em 2017 pela Bulk Design.
 * Todos os direitos reservados.
 */
 
$(document).ready(function(){
  $('.parallax').parallax();
  $('.scrollspy').scrollSpy();
  $('.slider').slider();
  $('.modal').modal();
  $('.tooltipped').tooltip({delay: 50});
  $('.carousel.carousel-slider').carousel({fullWidth: true});
  $('.toggle-overlay').click(function() {
    $('aside').toggleClass('open');
  })
  $('.bxslider').bxSlider({
    pager: false,
    adaptiveHeight: true,
    mode: 'horizontal'
  });
  $('.owl-carousel').owlCarousel({
    autoWidth:true,
    margin:10,
    loop:true,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
  })
  var scrollTop = 0;
  $(window).scroll(function(){
    scrollTop = $(window).scrollTop();
      $('.counter').html(scrollTop);
    
      if (scrollTop >= 100) {
        $('#ajaxsearchpro1_1 .probox, #ajaxsearchpro1_2 .probox, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox, #ajaxsearchpro1_1 .probox .proinput, #ajaxsearchpro1_2 .probox .proinput, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proinput, #ajaxsearchpro1_1 .probox .proinput input.orig, #ajaxsearchpro1_2 .probox .proinput input.orig, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proinput input.orig, #ajaxsearchpro1_1 .probox .promagnifier, #ajaxsearchpro1_2 .probox .promagnifier, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .promagnifier').css('height', '40px');
        $('#ajaxsearchpro1_1 .probox .promagnifier div.asp_text_button, #ajaxsearchpro1_2 .probox .promagnifier div.asp_text_button, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .promagnifier div.asp_text_button').css('line-height', '40px');
        $('#ajaxsearchpro1_1 .probox .promagnifier div.asp_text_button, #ajaxsearchpro1_2 .probox .promagnifier div.asp_text_button, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .promagnifier div.asp_text_button').css('height', '40px');
        $('#ajaxsearchpro1_1 .probox .proloading, #ajaxsearchpro1_1 .probox .proclose, #ajaxsearchpro1_1 .probox .promagnifier, #ajaxsearchpro1_1 .probox .prosettings, #ajaxsearchpro1_2 .probox .proloading, #ajaxsearchpro1_2 .probox .proclose, #ajaxsearchpro1_2 .probox .promagnifier, #ajaxsearchpro1_2 .probox .prosettings, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proloading, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proclose, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .promagnifier, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .prosettings').css('height', '40px');
        $('#ajaxsearchpro1_1 .probox .proinput input.autocomplete, #ajaxsearchpro1_2 .probox .proinput input.autocomplete, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proinput input.autocomplete').css('padding-top', '10px');
        $('#ajaxsearchpro1_1 .probox .proinput input.autocomplete, #ajaxsearchpro1_2 .probox .proinput input.autocomplete, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proinput input.autocomplete').css('height', '40px');
        $('div#ajaxsearchpro1_1').css('margin', '10px auto');
        $('.categorias').css('display', 'none');
        $('#global-nav').addClass('scrolled-nav');
        $('.brand-logo img').attr('src',"/cuponsfacil/wp-content/themes/cuponsfacil/img/logo/logo-scroll.png");
        $('.brand-logo img').css('padding', '12px 0');
        $('ul.menu-de-acesso').css('margin', '10px 0');
        $('ul.menu-de-acesso > li a').css('font-size', '14px');
        $('ul.menu-de-acesso > li a').css('padding', '5px 0');
        }
        
        else if (scrollTop < 100) {
          $('#ajaxsearchpro1_1 .probox, #ajaxsearchpro1_2 .probox, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox, #ajaxsearchpro1_1 .probox .proinput, #ajaxsearchpro1_2 .probox .proinput, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proinput, #ajaxsearchpro1_1 .probox .proinput input.orig, #ajaxsearchpro1_2 .probox .proinput input.orig, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proinput input.orig, #ajaxsearchpro1_1 .probox .promagnifier, #ajaxsearchpro1_2 .probox .promagnifier, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .promagnifier').css('height', '56px');
          $('#ajaxsearchpro1_1 .probox .promagnifier div.asp_text_button, #ajaxsearchpro1_2 .probox .promagnifier div.asp_text_button, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .promagnifier div.asp_text_button').css('line-height', '56px');
          $('#ajaxsearchpro1_1 .probox .promagnifier div.asp_text_button, #ajaxsearchpro1_2 .probox .promagnifier div.asp_text_button, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .promagnifier div.asp_text_button').css('height', '56px');
          $('#ajaxsearchpro1_1 .probox .proloading, #ajaxsearchpro1_1 .probox .proclose, #ajaxsearchpro1_1 .probox .promagnifier, #ajaxsearchpro1_1 .probox .prosettings, #ajaxsearchpro1_2 .probox .proloading, #ajaxsearchpro1_2 .probox .proclose, #ajaxsearchpro1_2 .probox .promagnifier, #ajaxsearchpro1_2 .probox .prosettings, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proloading, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proclose, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .promagnifier, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .prosettings').css('height', '56px');
          $('#ajaxsearchpro1_1 .probox .proinput input.autocomplete, #ajaxsearchpro1_2 .probox .proinput input.autocomplete, div.ajaxsearchpro[id*="ajaxsearchpro1_"] .probox .proinput input.autocomplete').css('height', '56px');
          $('div#ajaxsearchpro1_1').css('margin', '30px auto 0')
          $('.categorias').css('display', 'block');
          $('#global-nav').removeClass('scrolled-nav');
          $('.brand-logo img').attr('src',"/cuponsfacil/wp-content/themes/cuponsfacil/img/logo/logo.png");
          $('.brand-logo img').css('padding', '4px 0');
          $('ul.menu-de-acesso').css('margin', '30px 0');
          $('ul.menu-de-acesso > li a').css('font-size', '15px');
          $('ul.menu-de-acesso > li a').css('padding', '10px 0');
        }   
  }); 

  var a2a_config = a2a_config || {};
  a2a_config.linkname = "Cupons Fácil";
  a2a_config.linkurl = "https://cuponsfacil.com.br";
  a2a_config.locale = "pt-BR";
  a2a_config.num_services = 4;
});