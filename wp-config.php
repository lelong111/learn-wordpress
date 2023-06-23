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
define( 'DB_NAME', 'learn_laravel' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define( 'AUTH_KEY',         '}CE:w;j@Oa ^yw}{EP6g42L6YyOxG cl6?NKejV{9_pbQpJ^OxB.L`^Q&[:YYP^$' );
define( 'SECURE_AUTH_KEY',  '78^Z$.rCD-QqTv:L>kkcIG&,~FspmJl/SqhtrN83c+d1]U4Zn_C4aZ<c}(7NJ}B2' );
define( 'LOGGED_IN_KEY',    'C]Z/J|J!E~O1//vtg(GP1( u4-59m,m0/X$2@wXJQx/hRqF:JO9xdd3I.6cn.4uW' );
define( 'NONCE_KEY',        'g)3mS6]CSS(yE26Zf@Z[@UHu 6Vf)>th>Cy)zIb%Pn]2^^W`e67yIrC[$T[gMvGN' );
define( 'AUTH_SALT',        'oosfjw~cFI;3{<#FQ>jY04;Y-1^Q1l(-1%VRB3&F[+N&3l:f} W1dB]C<>M$k/HC' );
define( 'SECURE_AUTH_SALT', 'hHD=k6IMPSAJZFjySyj!U;E!9LFp!4iTj:Y0Ug$u,NH.}U$dv@^DZ|UYh9{Tk$,P' );
define( 'LOGGED_IN_SALT',   '9y_^nDIFrm~4N<^rNF&Y~Yz=c[WSIs?}z(Z@EiZ/N:BSx(eKHrADBp]2u5EFz/2g' );
define( 'NONCE_SALT',       'Iff^deKW$Zv,c9$@TL!cQ?dl=E!9{!ZA^/ C5+n_:<%[=3, &&DL<%6R%^0ZIK@A' );

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
define( 'WP_DEBUG', FALSE );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
