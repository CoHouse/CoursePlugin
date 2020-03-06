<?php
if(!defined('ABSPATH')) exit;

/*
* Crea un shortcode, uso: [quizbook preguntas="" orden=""]
*/

function quizbook_shortcode( $atts ){

  $args = array(
    'post_type' => 'quizes',
    'posts_per_page' => $atts['preguntas'],
    'orderby' => $atts['orden']
  );

  $quizbook = new WP_Query( $args );

  // Iniciamos el almacenamiento de búfer de salida para que el get_template_part o el HTML no se muestre en la página.
  ob_start();

  // Se continúa con el HTML propiamente, ya sea get_template_part(); o directamente HTML.
  ?>

  <form name="quizbook_enviar" id="quizbook_enviar" class="" action="index.html" method="post">
    <div class="quizbook" id="quizbook">
      <ul>
        <?php
          while ( $quizbook->have_posts() ): $quizbook->the_post(); ?>
          <li data-pregunta="">
            <?php the_title( '<h2>', '</h2>' ); ?>
            <?php the_content(); ?>

            <?php
              $opciones = get_post_meta( get_the_ID() );

              foreach ($opciones as $llave => $opcion){
                $resultado = quizbook_filtrar_preguntas( $llave );
                $numero = explode( '_', $llave );

                if ( $resultado === 0 ) {
                  ?>

                  <div class="respuesta" id="<?php echo get_the_id() . ':' . $numero[2]; ?>">
                    <?php echo $opcion[0]; ?>
                  </div>

                  <?php
                }
              }
             ?>
          </li>
        <?php endwhile; wp_reset_postdata(); ?>
      </ul>
    </div>
  </form>

  <?php

  // el método ob_get_clean() Obtiene el contenido del búfer actual y elimina el búfer de salida actual.
  // Más info aquí: https://www.php.net/manual/es/function.ob-get-clean.php
  $output = ob_get_clean();

  // Retorna $post a su estado original
  wp_reset_postdata();

  // Retorna el contenido del buffer de salida para ser mostrado en el output en la ubicación del shortcode
  return $output;
}

add_shortcode( 'quizbook', 'quizbook_shortcode' );

?>
