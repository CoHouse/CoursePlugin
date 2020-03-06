(function($){
  $('#quizbook ul li .respuesta').on('click', function(){
    $(this).siblings().removeClass( 'seleccionada' );
    $(this).siblings().removeAttr( 'data-seleccionada' );
    $(this).addClass( 'seleccionada' );
    $(this).attr( 'data-seleccionada', true );
  });

  $( '#quizbook_enviar' ).on('submit', function(e){
    e.preventDefault();

    var respuestas = $('[data-seleccionada]');
    var id_respuestas = [];

    $.each(respuestas, function(llave, valor){
      id_respuestas.push(valor.id);
    });

    var datos = {
      action: 'quizbook_resultados',
      data: id_respuestas
    }

  });

})(jQuery);
