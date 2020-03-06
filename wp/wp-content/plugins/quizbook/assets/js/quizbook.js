(function($){
  $('#quizbook ul li .respuesta').on('click', function(){
    $(this).siblings().removeClass( 'seleccionada' );
    $(this).siblings().removeAttr( 'data-seleccionada' );
    $(this).addClass( 'seleccionada' );
    $(this).attr( 'data-seleccionada', true );

  });
})(jQuery);
