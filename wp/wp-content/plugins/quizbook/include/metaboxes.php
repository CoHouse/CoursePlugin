<?php

if(!defined('ABSPATH')) exit;

/* Función get_post_meta() usada para llenar los campos en caso de que ya existan valores, dicha función recibe 3 parámetros:
*  1. ID del post para el que va a recuperar los datos
*  2. Campo o "meta_key" del campo a recuperar su valor (tabla wp_postmeta)
*  3. Determina si se usa el primer valor que encuentre del metacampo (true) o en caso de usar false, recupera todos los valores del metacampo que estén guardados en la tabla, los devuelve como un array
*
*  En el ejemplo abajo se usó $post->ID para recuperar el valor de ID del post actual, se puede usar también la función get_the_ID()
*  Más información en: https://developer.wordpress.org/reference/functions/get_post_meta/
*/

function quizbook_agregar_metaboxes(){

  // Añade el megabox a Quizes
  add_meta_box(
    'quizbook_meta_box',
    'Respuestas',
    'quizbook_metaboxes',
    'quizes',
    'normal',
    'high',
    null
  );
}

add_action('add_meta_boxes', 'quizbook_agregar_metaboxes');

// Función que muestra el contenido del metabox (HTML)
function quizbook_metaboxes( $post ){

  //Recupera el nonce en los forms
  // Más info en: https://developer.wordpress.org/reference/functions/wp_nonce_field/
  wp_nonce_field( basename(__FILE__), 'quizbook_nonce' );

  ?>

  <table class="form-table">
    <tr>
      <th class="row-title">
        <h2>Añade las respuestas aquí</h2>
      </th>
    </tr>
    <tr>
      <th class="row-title">
        <label for="respuesta_1">a)</label>
      </th>
      <td><input class="regular-text" type="text" id="respuesta_1" name="qb_respuesta_1" value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_respuesta_1', true ));  ?>" > </td>
    <tr>
    </tr>
      <th class="row-title">
        <label for="respuesta_2">b)</label>
      </th>
      <td><input class="regular-text" type="text" id="respuesta_2" name="qb_respuesta_2" value="<?php echo esc_attr( get_post_meta( $post->ID, 'qb_respuesta_2', true ) ); ?>"> </td>
    </tr>
    <tr>
      <th class="row-title">
        <label for="respuesta_3">c)</label>
      </th>
      <td><input class="regular-text" type="text" id="respuesta_3" name="qb_respuesta_3" value="<?php echo esc_attr( get_post_meta( $post->ID, 'qb_respuesta_3', true ) ); ?>"> </td>
    </tr>
    <tr>
      <th class="row-title">
        <label for="respuesta_4">d)</label>
      </th>
      <td><input class="regular-text" type="text" id="respuesta_4" name="qb_respuesta_4" value="<?php echo esc_attr( get_post_meta( $post->ID, 'qb_respuesta_4', true ) ); ?>"> </td>
    </tr>
    <tr>
      <th class="row-title">
        <label for="respuesta_correcta">Respuesta correcta</label>
      </th>
      <td>
        <?php $respuesta = esc_html( get_post_meta( $post->ID, 'quizbook_correcta', true ) ); ?>
        <select class="postbox" name="quizbook_correcta" id="respuesta_correcta">
          <option value="">Elige la respuesta correcta</option>
          <option <?php selected( $respuesta, 'qb_correcta:a' ); ?> value="qb_correcta:a">a</option>
          <option <?php selected( $respuesta, 'qb_correcta:b' ); ?> value="qb_correcta:b">b</option>
          <option <?php selected( $respuesta, 'qb_correcta:c' ); ?> value="qb_correcta:c">c</option>
          <option <?php selected( $respuesta, 'qb_correcta:d' ); ?> value="qb_correcta:d">d</option>
        </select>
      </td>
    </tr>
  </table>

  <?php
}

/*
* En este archivo se usan funciones como:
*
*  esc_attr()
*  sanitize_text_field()
*  esc_html()
*
* Todo es para hacer el código más seguro limpiando las entradas y salidas de datos antes de guardarlas/usarlas
* Más info al respecto en: https://developer.wordpress.org/themes/theme-security/data-sanitization-escaping/
*/

function quizbook_guardar_metaboxes( $post_id, $post, $update ){

  // Valida si no existe un nonce y en caso positivo valida si no es válido
  // más info en: https://developer.wordpress.org/reference/functions/wp_verify_nonce/
  if ( !isset( $_POST['quizbook_nonce'] ) || !wp_verify_nonce( $_POST['quizbook_nonce'], basename(__FILE__) ) ) {
    return $post_id;
  }

  // Valida si el usuario actual cuenta con permisos para editar el post
  if ( !current_user_can('edit_post', $post_id ) ) {
    return $post_id;
  }

  // Función PHP que valida si una constante existe
  // Más info en. https://www.php.net/manual/es/function.defined.php
  if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
    return $post_id;
  }

  $respuesta_1 = $respuesta_2 = $respuesta_3 = $respuesta_4 = $respuesta_correcta = '';

  //Más de la función update_post_meta() en: https://developer.wordpress.org/reference/functions/update_post_meta/

  if( isset( $_POST['qb_respuesta_1'] )){
    $respuesta_1 = sanitize_text_field( $_POST['qb_respuesta_1'] );
  }

  update_post_meta( $post_id, 'qb_respuesta_1', $respuesta_1 );

  if( isset( $_POST['qb_respuesta_2'] )){
    $respuesta_2 = sanitize_text_field( $_POST['qb_respuesta_2'] );
  }

  update_post_meta( $post_id, 'qb_respuesta_2', $respuesta_2 );

  if( isset( $_POST['qb_respuesta_3'] )){
    $respuesta_3 = sanitize_text_field( $_POST['qb_respuesta_3'] );
  }

  update_post_meta( $post_id, 'qb_respuesta_3', $respuesta_3 );

  if( isset( $_POST['qb_respuesta_4'] )){
    $respuesta_4 = sanitize_text_field( $_POST['qb_respuesta_4'] );
  }

  update_post_meta( $post_id, 'qb_respuesta_4', $respuesta_4 );

  if( isset( $_POST['quizbook_correcta'] )){
    $respuesta_correcta = sanitize_text_field( $_POST['quizbook_correcta'] );
  }

  update_post_meta( $post_id, 'quizbook_correcta', $respuesta_correcta );
}

add_action('save_post', 'quizbook_guardar_metaboxes', 10, 3);

 ?>
