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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          '7|03>~,$:B5:$7`gu/u:@By6uPG&^a!.PYO:L`,<(6V+aLt%s9B!C}T;.Ax>>A[m' );
define( 'SECURE_AUTH_KEY',   'G(x8lP~pVdy?q) s(oAV94q;2?f m>E9x|}wWvX2tjw|]`<mPU+DqeN%RI<U1T8&' );
define( 'LOGGED_IN_KEY',     'd~gA4U17RZ9Y~aa+.xWgD&9^8A+V #a8>~/8eXZ|[wC63,_[f,-A%iI61,oq+0T.' );
define( 'NONCE_KEY',         'tYl9><<q,5!@Rmqx`L-2.ue]:9+>^GqP-)#H5WJ=_[*ylphPc!Yg1-/Tg!A,h`_d' );
define( 'AUTH_SALT',         ';;-j(6M~3wecEp9;rbU45NP_NuDK mEGFPGJq/~)F]61USaB f_TW_nt@5SawVWy' );
define( 'SECURE_AUTH_SALT',  ',nJ8XCK4!<P2&K3P=}EoP;a{v? ,Mp W|H%b7m14{qsFv+X#=DR:,y>{|pPzfz1R' );
define( 'LOGGED_IN_SALT',    '{|Pjuow<]u(VUo{B8g(AQ2${P^P#5)%ad,>GOXI8f{`/KOuGkI,a&DqL+Inh;J{C' );
define( 'NONCE_SALT',        '#iv,zZ6V#E(~%)FoL2u-K*=op1[-BU-sW8+ICXa!=Xv366(f=S!mIw}w7DEYdsld' );
define( 'WP_CACHE_KEY_SALT', 'gE=QwLe7f6W,v{K2Ap(ls}|f%KOqDYFG<Ou4HCC{,b.!ghv^nh2~F`cPhHTkoJIh' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
