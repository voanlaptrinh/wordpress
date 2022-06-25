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
define( 'DB_NAME', 'wp_we16306' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'A[Cp67`w5>S03LAbk{S#+nTc[G0zaVsojFK1psY|Mc{rIQQ+E MgE(PP(6;ou6Nr' );
define( 'SECURE_AUTH_KEY',  'j}uV!PI-$)/ PT>uuo{;#LQ-6bv@J0?J[z<(Db#;_o| $R= (aj%ly$N#HmPNA?y' );
define( 'LOGGED_IN_KEY',    'z+g;ssJ.r+kQA+8u>,Qx# [r^6yym*iO?UA^p:|[sq[+evuZyt}j;X[ayG,=-aYc' );
define( 'NONCE_KEY',        'I6fWPHtVNc1W+hQ6x-B<o54X>Fq|nZsJ:E`?v|K`a[eLtE:wVschI?8`Oiqc%_<_' );
define( 'AUTH_SALT',        '7-<~y&TyrL;`*4LS=k~-2p.x7v@:U/EF|*,wj7o&(qbBeuE?wkd^2tl^gGCm5c[i' );
define( 'SECURE_AUTH_SALT', '3JV8g6 e3emjuL4wHW]8ze!vWJG}sL`elIAXS9IFU(<rS6klFpI`M9$jx%;B5N~N' );
define( 'LOGGED_IN_SALT',   '^9,_49sLmb$x$Mw|4=M~z_d1<FQ5>sA7(Vhr WYu|A`[wDqZg%utCw41IlOoNLxD' );
define( 'NONCE_SALT',       'mNp#?0Gsw.(E#RflT]2-*+;*`a!d>jR+6VE/Pg+RJe0I~vn4n iZV*@8Xv|a{p#%' );

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
