<?php
/*
Plugin Name: Quizbook
Plugin URI: https://eltepitazo.com
Description: Primer plugin del curso en udemy, crear cuestionarios con wordpress.
Version: 1.0
Author: Pepe Sosa
Author URI: http://unaurl.com
License: GPL2
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Text Domain: newplugin
Domain Path: /lenguajes
*/

require_once plugin_dir_path(__FILE__) . 'include/posttypes.php';
require_once plugin_dir_path(__FILE__) . 'include/metaboxes.php';
require_once plugin_dir_path(__FILE__) . 'include/roles.php';


// Funcion que regenera las URL's al activar el plugin
// Más info: https://developer.wordpress.org/reference/functions/register_activation_hook/
register_activation_hook(__FILE__, 'quizbook_rewrite_flush' );
register_activation_hook(__FILE__, 'quizbook_create_role' );

// Funcion que se ejecutará antes de desactivar el plugin
// Más info en: https://developer.wordpress.org/reference/functions/register_deactivation_hook/
register_deactivation_hook( __FILE__, 'quizbook_remove_role');

 ?>
