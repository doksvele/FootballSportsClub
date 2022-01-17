$(document).ready(function() {
  $('.description').hide();
  function showFullHeight() {
    $('.news li').each(function() {
      $(this).find('.more').click(function(e) {
        console.log('Botão clicado');
        e.preventDefault();
        $('.description').slideUp('normal');
        if($(this).next().is(':hidden') == true) {
          $(this).addClass('on');
          $(this).next().slideDown('normal');
        }
      });
    });
  }
  showFullHeight();
});
