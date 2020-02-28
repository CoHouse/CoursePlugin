<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'wp_plugin' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'root' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', '' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'U?Y~b^/T5r^Cw!.N`R(!nyoCJPpJh)xt:@sO<ZH(yT1:t]=WX%x =@}m?m@mVvon' );
define( 'SECURE_AUTH_KEY', '-ReoMBQRS%{!.lJj`,Fk|ueUl?&X7Z4?./bZ:>`V6{rv^q$(b*YP6@71fL-/*9rA' );
define( 'LOGGED_IN_KEY', 'OUgA~[+:Ki-311}D?>F,_Eu+ryETuvK.D^9Ha&R5_>%}7|0a4q;S1Z+w=5ziv@$O' );
define( 'NONCE_KEY', 'e Qi%`I:[F_jQxK_69;nIbSIL ,$v$V_%,@1rRHi,-9_.sjLV2cA6lr/fT#J?*=]' );
define( 'AUTH_SALT', 'H@4VxN=VnhB|_[$s}kLd2`MERC(.5rVjH?1M!0`7~?fX0VknZl).wi02KTY0@/j%' );
define( 'SECURE_AUTH_SALT', 'mZX^C u?A$tFTgPBHC&<`!J/QuA[~R5uwJ=rB:3k`MQB._G6V<~u4X_cpg1P|^W6' );
define( 'LOGGED_IN_SALT', 'yF)$,=8k]#b,eZUeCpXfxYN7b2S:]pN55{fRumN[2;R1.3CU`UT9h:+&poA9u#L3' );
define( 'NONCE_SALT', 'gN9k-?^L~PplE+|oJA~*O?JA;~vXNhy[3a.6-*=#Cs5&?6pO|Q/}a#}=?sfT6,XM' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

