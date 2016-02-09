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

//define('WP_HOME','http://nilonxanh.com/');
//define('WP_SITEURL','http://nilonxanh.com/');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'viduwebv_nixa');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'p#sh0`OAn.:*lI:RxZ-P5ms_GK-;?nS7uH10-<9Jy%0N5#.z<dC=l&-nrrYue]wt');
define('SECURE_AUTH_KEY',  'Px+cPrCmEga-pP-}t-A=XBLww@wt:E+Zj/;qQHn{[.5u1ac[F+Z+e*&9FK$87B-P');
define('LOGGED_IN_KEY',    'gx*syEL|b ?Q/~ce1p]^Uv|2UE_hS3>}wBD!P/(ht)?yC-$:9T,FPG F,Kt?#%}-');
define('NONCE_KEY',        '|H>V-ZY;#B0jb8k[-rV8:d-+Ec9u,#K_yl1 c8||th(_:-B.bFl|#Z_)?Yf-=ZGC');
define('AUTH_SALT',        '>Q+IY^MO?6k92s}HoV@J`|l}9+fqFj[^}4QtCFqr<!}?~;f-fCG/UC+RX(jBQ0u6');
define('SECURE_AUTH_SALT', 'D+[aQhN_k9}1O7]?S{0^`]wFQhU|MD^l+mWX=a*>Dd&KVAHNq|*yZg;=p#wwJ/X+');
define('LOGGED_IN_SALT',   'rJOG8zSJgk#tL^d*}XH($euUG_ljq|$&EP~~7DYZPm*D@lGZ4--2rH66%r-8bd!@');
define('NONCE_SALT',       '*|_}u)|b7+~>66cbo_4GGfx7b5@.$|@$o]<];p^q8<+.:-S:F&K.KU-{8FD<Em5`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'nixa_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
