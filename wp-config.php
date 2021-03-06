<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cdb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );




/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'ih+.oRi&^hZ?v~MkfYWHcRSZ|~(zREleCo$~{I}+GV-rJyGYO BjT)Zu.) vuuP_' );
define( 'SECURE_AUTH_KEY',  'gKBk#:n&S=8rnj.K*b|@[}NRI8S#)s0FoP.ib6}Qa<(=1kn=Pl7q)PJLn>r?%%31' );
define( 'LOGGED_IN_KEY',    'r8_=b$&kvW_7L nGjR$H-pW$Wv{=~oR6tM*~O3{O7VdjCI^a4:u.gbDAXta71dkP' );
define( 'NONCE_KEY',        'LBx_HF9CGHwCcIa/O!bqC@ aE2^yyX}#=vbi|!WHW<:y64p|QfUv^tO}/}y+hwI^' );
define( 'AUTH_SALT',        's;Dc!DEfC-cW[96iQ4va6nauc.KD%r a3_n@mv#xu@RB%JYMJ^Aa/hRt7pMs #+b' );
define( 'SECURE_AUTH_SALT', '2+^S{{>uW!zfs*&tjT=Fa$Ni}Q &,R)R1Z$ SC/vU/?su~t7$8ZhD7a3=PJTcH0A' );
define( 'LOGGED_IN_SALT',   '*Wn4EJbbg=O>`K_)eHi48ipACA#2qC2_;&9AYc;4}/FgBAgZiQo$Y.wQ9d~m@%] ' );
define( 'NONCE_SALT',       'tHG6B2n<=#Ed:M+@`!CyWSn>o8UVDN39gSuvPTC<%sUyun@$*[CF)4[r4&](U3Ro' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
//debug
/*define( 'WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);*/

define( 'WP_DEBUG', true);
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'www.v2.com');
//define('DOMAIN_CURRENT_SITE', 'xxx.141154.cd-web.org');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

$host = $_SERVER['HTTP_HOST'];


if (!preg_match('/www\.v2\.com/i', $host)) {
//if (!preg_match('/xxx\.141154\.cd-web\.org/i', $host)) {
    define('SUNRISE', true);
    /** This should be the TLD in the database */
//    define('WP_PROD_TLD', 'xxx.141154.cd-web.org');
    define('WP_PROD_TLD', 'www.v2.com');
    /** This should be the tld of your local copy */
    define('WP_DEV_TLD', $host);
}
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

//???????????????
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST']);

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
