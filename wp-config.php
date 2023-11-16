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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpcode' );

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
define( 'AUTH_KEY',         '>H7>H+,QBM5pIW_|b/}V)^hGFPAw|p3%!B@BBz2|z)[o8nIi:,t08BZHEH/q+1]7' );
define( 'SECURE_AUTH_KEY',  ')d&y:HMs~UT<9fb<E|JG=v==h1+8Oq},vw;}:I~tB}l0MH7BxC(NTC|>-6vG_[nr' );
define( 'LOGGED_IN_KEY',    '#V:)c+(w|p9$ FMCD`r6[TOPjG]-q^KMZu3C(tJ}=x:MLw;rL5fR2}*K#)+3?|8 ' );
define( 'NONCE_KEY',        'KRPguvlP$Uu;U-sVAr<MEj%oaoL0|6ORHtmPl.%:<@JP(+Zw&fG0}6JE$_1uKncD' );
define( 'AUTH_SALT',        '_M&~{i0Qno(ys!Ox%/JH<HioM{lD?aGK 5M{tGkqA!d,*Pri8Gy-PfYZ<j)Y5!Si' );
define( 'SECURE_AUTH_SALT', 'xw}B2_tdaad%.zH4uYy9XhAMEAcxUFHqTJ;5m{g-gPt8/}&XzQ (<VIcA;{15)7?' );
define( 'LOGGED_IN_SALT',   '?_?$zukv 8b@~~:n[_HFPzO(h@bb{&nIvAzOYOk!=7vVy&|cg}oX9b y]HVf&qQu' );
define( 'NONCE_SALT',       'Hny,xMqh,3WF;aH]cztqH alfC:;;D-4ggh&YKYM*?Tfq-d7=|G6<.zM<:zC7Wae' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
