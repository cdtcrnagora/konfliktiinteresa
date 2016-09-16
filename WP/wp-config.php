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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'konfliktiinteresa_me');

/** MySQL database username */
define('DB_USER', 'test');

/** MySQL database password */
define('DB_PASSWORD', 'test');

/** MySQL hostname */
define('DB_HOST', 'mysql.konfliktiinteresa.me');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '_7"xUk1?9%RBUBS69"q%("1t$O0S4pG1cX;;A_JWaxQM?RbhLLtACJPv:qu@~?H?');
define('SECURE_AUTH_KEY',  'ECE8@ZnO/YLY?D?URUCPC"|&(?J*pNUZ*Z(0#:!wPezyh3~Wlf!^?bsKzj+tP96x');
define('LOGGED_IN_KEY',    'I`HDO5rR8l~^D+W@0W$+kjPRjaBvGct5n6/ldIu:V|B2BW+U%5dRHZ71BDo?uUXM');
define('NONCE_KEY',        'S_4a|2J/lg(kRX6yph:?mM(qn|$?8UO_?DT/N5p_qTL:fszxueOuw#KXWPRih1u|');
define('AUTH_SALT',        'ci5k0oY2DKRn51Al@IbH&RdC6~#D`F#XzmZ#RBF"Ut!Mh/tPJaQ8D9*bn+2rpAsu');
define('SECURE_AUTH_SALT', 'A^:VivR^2Dqz2Ov^;CiQ:+7s^tsHZTyzm0^$/ydGpMQoNVUU$a8~tb3S#Ca_Krc(');
define('LOGGED_IN_SALT',   '8b6C"js2H+uG2^Wf@FZcTBm(Y7)bU#Cpufd*E!";vnA%%`;5q3^2Lz^!pp)ZoHN4');
define('NONCE_SALT',       '!a#toF:JkU`Pd!B+IXf&7?q89nbW)D!""0Bzf0J8pF|+99vXIu?6$7Sd#&rZzMF5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cdt_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

