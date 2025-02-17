<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "opan" );

/** Database username */
define( 'DB_USER', "root" );

/** Database password */
define( 'DB_PASSWORD', "" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'e8nxWN&0C%IIXjl8y$KkLtN(Y^H.FSILS?qt<G-rNS>]sS~qLGEX/YEoe:O+qzry' );
define( 'SECURE_AUTH_KEY',  'ZB[&hI=~$]yAV`{cD/QeaS3&|l8l)?B3WV_P#<+whj/R}#u~Z{-L[Oz{bh}B=!pm' );
define( 'LOGGED_IN_KEY',    'P7>1Ns3B//7l_uJ~UeO_0`{U#Wez{WyDfzs6xiDSVOd|*)Iz*9ew]k?M|BF%=jLJ' );
define( 'NONCE_KEY',        'Chg{INIgTr%U4{Hck3ZAVDX;6n]#o XppN.=JJV3sGtxQtYd}wcmvzNeK88vVIMG' );
define( 'AUTH_SALT',        'zl@HL^6F@acmQUl1IPyz%9%%avK5(j,MLy?:0.)ujjEUav`Ol~3lyX`ygU,q@vH@' );
define( 'SECURE_AUTH_SALT', '`VC?RG@h54Bz*+/.(Kmb/g#>,f{Fq.Fh`%C1S/U%MI*Ab}b9.e>;-oGBHTUELXts' );
define( 'LOGGED_IN_SALT',   'n2j@6k-D|cx9zrkTa7!k[15n|!!ol,2Z_)0BLDuZs9U^otm_<(j?_V?kC?Zg9>|Q' );
define( 'NONCE_SALT',       ']Ak(v{>;2gjK.IhfOFE9NXgWCH+5R7MvH}yqeYP ]#2^``V;Xsww FzlzV?lnkYF' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = '127.0.0.1';
}

define( 'WP_HOME', 'https://localhost/opan' );
define( 'WP_SITEURL', 'https://localhost/opan' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname(__FILE__) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}
