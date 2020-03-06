<?php

// Añade estilos y JS al frontend
function quizbook_frontend_styles(){
  wp_enqueue_style( 'quizbook_css_a', plugins_url( '../assets/css/quizbook.css', __FILE__ ) );
  wp_enqueue_script( 'quizbook.js', plugins_url( '../assets/js/quizbook.js', __FILE__ ), array('jquery'), '1.0', true );
}

// Añade estilos y JS al admin
function quizbook_admin_styles( $hook ){
  global $post;

  if( $hook == 'post-new.php' || $hook == 'post.php' ){
    if ( $post->post_type === 'quizes' ) {
      wp_enqueue_style( 'quizbook_css_b', plugins_url( '../assets/css/admin-quizbook.css', __FILE__ ) );
    }
  }
}

add_action( 'wp_enqueue_scripts', 'quizbook_frontend_styles' );
add_action( 'admin_enqueue_scripts', 'quizbook_admin_styles' );

 ?>
