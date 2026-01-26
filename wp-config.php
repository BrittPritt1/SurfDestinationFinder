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
define( 'AUTH_KEY',          '-t4I.X5DUEKbqrbebd8;iFvOUz2~2RWzbxG@et| c)`k&v:p4yz`WHXxZ=fZVY-[' );
define( 'SECURE_AUTH_KEY',   '%xhImZp$(xk]9lIa~%tL%SPVbunZ>U+B/J dqi)(<*bIE4jYP}$U*fPF~[B<l7pN' );
define( 'LOGGED_IN_KEY',     'YZ^|q[L<@f,uW5^/3%qlL>b>O>f_5x.),z*y+-db]!FI;YJ<To?SKvAd_/ oSG~K' );
define( 'NONCE_KEY',         '8K>E5QC:{An}P7$CxC9]G8zX~@*2$(SM%2q{l`5.Z%jBe-t0kI6ue*KO]U*Mdjzk' );
define( 'AUTH_SALT',         '#K7PM@{^&(<&{GM3C$dzMN5uDsA27*f?~~.v2XEGi[Q-$)5dV<;,LY0OvX`A~`/H' );
define( 'SECURE_AUTH_SALT',  '$OL(*N^UPj$P_7I=JW %{}KkwbiZaV>r~ZB};HV$*p:`$AAR)j/@ORDwE#lnJ3.r' );
define( 'LOGGED_IN_SALT',    '3W@owRk<|{Z Kh&lk>F:i:&~g8&.D*,Tfy}3O>htyK84Z>$FtU06TOF!yV#N,dI6' );
define( 'NONCE_SALT',        'wc]tF@.Z.K4p$]gT^kTGKl|eF=PUgZHC3Yy;Sk:d&0?l%H&V.}Q:,J/cQ7~k;`u)' );
define( 'WP_CACHE_KEY_SALT', '{aRA:L$T#DO;|O*1cf!m*Wxprp]5WSW%rb  |%BDvJ;3q,o}rmw;IGfx~cm>RJ0d' );


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
