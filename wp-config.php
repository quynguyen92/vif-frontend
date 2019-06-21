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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vif' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         '&YC~x>l)O9;n{QS <T6t)&|6D0y|M^PxJ2bf{H>v220Db1Yi2u(yydU?!_YAKnS-' );
define( 'SECURE_AUTH_KEY',  'cQo)@ty2|9D3]f~y8<a!1^#0+nwR&6bOs~5WuFhi|&|A>/:tB[taK7pedbTf%;7;' );
define( 'LOGGED_IN_KEY',    't_g*?&pukh)MRq_6l+K5va%qM[l8SB@?9W*ZbL!MDgr@DzCgX<X9QdX[|Ho^(UC/' );
define( 'NONCE_KEY',        'Y?uO}i%w;=y}5jvw8C   1z~LjF(dV6Ey^TMPpn~{lpy%d:{Z#x.6y*waFYJ)rBM' );
define( 'AUTH_SALT',        'R~Wzg3q~[!SAguoG$7IOI@am#G4t$pUS[TVPn{V:Y.|?T _N8]^C7WKDNn5k~Z@D' );
define( 'SECURE_AUTH_SALT', 'kTprTOy0irQ6Vchf-t1diHi20h&6$N-nVs>ty]=ne4f@!Tsta)v*r% .,w;=)`Xl' );
define( 'LOGGED_IN_SALT',   'M<LwRp; ]qf2eTA2D[^u?p^uoY6g:^KyG{9Y=^)U9/]++x*%M0XDf[ec6c-iJP<*' );
define( 'NONCE_SALT',       '_B_ksjH`dch1%FRa*g.J:h2Y~Y=3gg^VAhhqx!hH`yDQEj$X6;P#odSn}2#QS]ih' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
