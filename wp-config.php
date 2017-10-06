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
define('DB_NAME', 'copachisa');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '');

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
define('AUTH_KEY',         'k~!hO&FFd#!qpZ-(C9z!z,bmlnj@&2PprM w-R7#VZ8j9.[#Y@/Hps>ryzjL~ri9');
define('SECURE_AUTH_KEY',  'KTmztvfD`^-7Gum(1]*dP| <&.,>s=59I5KP+q8LtK)93=k@B8w!!V3A}id/nc7z');
define('LOGGED_IN_KEY',    '0%5Qh[eYDpN.o6_^8E9nYGG~ru||BUCW,V3*eI~Z/kf9SK+N%cW)5`CE~;F-:BGC');
define('NONCE_KEY',        '^Q? />0$+]k(LX<oB6tR9&fPu+jczif|d4m@|6K]iiqxPTV~+2rAwI7$^[h=f6NR');
define('AUTH_SALT',        '*=f=1ab`-{Pa**Ak.deN_$Q9hjY{j3)f^AFm!pJSWGfhVg{I5p6qVf/+kV#uOTVp');
define('SECURE_AUTH_SALT', 'ulUrxZg7-DjwwysXE,RWS/QmlgxaQc%Lw+*x]75Ta||7wX{OxW9rg*|+<Z`#kEi{');
define('LOGGED_IN_SALT',   'zSDi&ctL(*Q8Ytx`(-M;*0ypx-@1~#vjT@TQ.^cvTDdi|Claf =>W/&r5(CX,yAU');
define('NONCE_SALT',       'xBjUY?;%P<da9E%hHHO&FT3uP-[`Re=$kROTy ZvP$_(8(XC_wDg8}ogIMp_k%h6');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define( 'CONCATENATE_SCRIPTS', false );

define('WP_MEMORY_LIMIT', '128M');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');