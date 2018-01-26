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
define('DB_NAME', 'HiveUp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '$P :R)8@$ySOYH/z7ka*3i>.P{.<Q6V@@JghnL W_Z_L?XZQ;I}(z}T^M!Bo>/}P');
define('SECURE_AUTH_KEY',  '4Fm[0z0}Y$eOga|c^2UdBk(umy7?*PfcFB~4:uG!MS,J:G5RSYqiA&/zlEm)TZRl');
define('LOGGED_IN_KEY',    'w+Z|Cki_6S}5gKA3Aul6?|QK,vor3_?1+2h~XdO_9Smw@@`Qx_dRVDw,6`|.|/_|');
define('NONCE_KEY',        'O*@%]sX!=3C-H1qzc|jL;,fq<RB|_Bii6L!57]mh>I6lA}:(gfSw|Jobg6A>bqVX');
define('AUTH_SALT',        'i_[Jk65$ K-ZnWQw/io;1xj_ZBCx|h;_<1:pw2Da{+z2n~.p4HRuG0*GBhbkUsun');
define('SECURE_AUTH_SALT', 'Y&7yx.w%/2Y:y=SWTXeBBI|+fDfoSFB[7sJ)^zAdJ>>6$k;O87-pQd&E.fB{?& 5');
define('LOGGED_IN_SALT',   '>]Y}bN?S)lqA.sYgk.:ck|TJkgm+%.1A]qBaf+mkt,@PUm&v!~9k-f6?kAbyI*i0');
define('NONCE_SALT',       '8v;:)]QbJ;/yv?>gI&teVT?8dk+e@vV!ASu[PVXc$Sl#1`|Hj/^6Ln#mpS{C-;.X');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
