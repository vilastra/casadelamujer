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
define( 'DB_NAME', 'dev_cdlm' );

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
define( 'AUTH_KEY',         'vMTn,!e~MG;L^Wltc]0W~!3d[lsfJ}5}16?dW|i()vDhy8XCs4V)yR[|7<tDW]O.' );
define( 'SECURE_AUTH_KEY',  'e8l)L~@Iu.Wx<qXi.h`/DP*>)@?F+ihVoc[)Af)k`Ue^Hc&7hz9FZkKC}?2(JX*^' );
define( 'LOGGED_IN_KEY',    'J*@3uP4UBYy{QLiQI_R]pAVo(Nm|K~@$o]F;Z]}q]V,_*vwBEgqL#g.:DewAt;jr' );
define( 'NONCE_KEY',        '8U!|y=(d]f-bm<Aw]F$ ^r1(;`t!6yZKA#{8wG [RGo#D$>pBZtbw>WQ+osvnxqq' );
define( 'AUTH_SALT',        ':UW>~R@|~)|NUYZ(tES3:6ORKq0+~v6+FD{#]<dT<v:$OtV!0F)_)xzJH|}%./ho' );
define( 'SECURE_AUTH_SALT', 'Ktb@a1#$Y>-cv8V^h=Td?;uQC|0GwU+Vb=kk rR|-~5/E7~4|URMEHCZP ~0xyh/' );
define( 'LOGGED_IN_SALT',   'SHDlbg8t-.>*F_#(j2YH6,[|Qrj[4CaN Pa`wA(#Omu_n~v!+O-cKYaIvj_Ld=z0' );
define( 'NONCE_SALT',       'x=73T77^yv.eo`qB(F;svq7ZOOvvqV(Ik6j`sQ{ZTLCD=D}&q>$8.S}FdVR@pVLU' );

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
