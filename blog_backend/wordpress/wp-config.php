<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'angara77_new_life' );

/** Database username */
define( 'DB_USER', 'manhee' );

/** Database password */
define( 'DB_PASSWORD', 'manhee33338' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'GeZp9H?[3p/h[HW`c0PD0p2$|HYYEBzQhHzdrd>iW/C#g*C;q,#jjMB(4-61M8T&' );
define( 'SECURE_AUTH_KEY',  '9c7)WpGq4%UUAIHC$mlNZs$14etqxGT~1mZ@/~HYhi3QZ}.5,@#CgIRbC-wedxl2' );
define( 'LOGGED_IN_KEY',    'ztW#Y+J88RER;2 fA}LR;^-<HjX<Oi)Bb53u Y3pN_P^%[6|YCS%fCnH3mjiiH:6' );
define( 'NONCE_KEY',        '$g}.fvp- )O}cQOBJWZKbr@P q<|=s,7~V>z.j&`P]Yas-DtYv7!h]]i06-boHMi' );
define( 'AUTH_SALT',        '>Uamn,[Mz|{gqZ*=X90GQr+tVo==>$9+VR7|.)gGeS< vl>,WlAAxYx>gaRMAolV' );
define( 'SECURE_AUTH_SALT', 'g9,evkh@P/&P Szh,=<uyz.2ThY/(gyVEnxsFa9Ies=_5jO%zfnOIc>R|U@{*Noq' );
define( 'LOGGED_IN_SALT',   'g:$U*7r6R%CHnOk}p<?$m0YN+5l%IMbpmy)]}gp@(nr4ci8P_lp`yNSCc;:4F-8$' );
define( 'NONCE_SALT',       'NrWxI;Q#:`$T7#&}OckrJPZoJ&TYe9$g?!<KbfKZy7U%^)vj!V&s3W1<vZmfQIU*' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
