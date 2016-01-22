<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'cecs300db');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'aaron');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'test');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<h,>TEh!. 7NQ<@UT/GX]/KV.y[O2^/ZE8])oH`w+bf&_iC 3g5Lb#}:zxSwt &u');
define('SECURE_AUTH_KEY',  'z&Pme|pfsTeOi_*&SuH5 g.9V9|nxc]aDQV/):Z:od79x>XzzJV_h5TXRuAo4InO');
define('LOGGED_IN_KEY',    '6Wz711L`X1i>9A+Lj#ogyA1l0[G;UaEz?2Q.P)Zn[p<wis[b$}#|l;Keits-Xh%u');
define('NONCE_KEY',        '!.:dXD^UG8+21RPhxA:gXG@.HHGnhdEXF:yq,e?0[g#DVV]dRWkf|0tE;TV|7|QF');
define('AUTH_SALT',        'L/jf^8R@DNUTA&|.Cl:}O_F.]x9--3(JQp*:!,`r-pj= Atw/o=Zcoa!WTBKd1]C');
define('SECURE_AUTH_SALT', 'e&tB%[e2%uEv#hOE.sg>]s#d5akSU9x~.}|_L97!ev*sX~ObH,KY/I;0O>Lu [A8');
define('LOGGED_IN_SALT',   'o|$VE?ev_UY=|%-``Q-HCDIC<PC|4nfCj.V+09|m,7` Hu<DBVdPSb-C:@ g5Z4m');
define('NONCE_SALT',       'q+#t^I?.[[sH-G1<4|SD_0<8v+YrRhz{wezH(v|n:T [n2Y!6[BwSBz/{(EK@9@y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
