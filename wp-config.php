<?php
define('FS_METHOD','direct');
define('WP_MEMORY_LIMIT', '5000M');

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
define('DB_NAME', 'nagaraja');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
/*
define('DB_NAME', '_nagaraja');
define('DB_USER', '_razorbee');
define('DB_PASSWORD', '_razorbee@projects');
*/

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('WP_HOME','http://192.168.0.109/razorbee/nagaraj');
define('WP_SITEURL','http://192.168.0.109/razorbee/nagaraj');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '.a/IqblI{J58ljj(F7<c/fYc;Vq4?`cT_AB.n{+EyGXUMMQ;_mSSi/q2IE[el)vM');
define('SECURE_AUTH_KEY',  'tlZOd2+.97q$ARwd:nV}X5%KR)-f4fW-;=go/!>.qN}5!>c/Z%+^9<2H=K<6KB_,');
define('LOGGED_IN_KEY',    'NgKeZN.bXg,zuk(C&!gdLz]&&^[]eMJhwZ4V(uJWO%a@]+v7](FE6]<]10M[F ;;');
define('NONCE_KEY',        'uViSp=S^?H6vpy q%%.=~98Cw-h>CaT5tW5>0_NHtbsEPJP~_]%,(qH$Vs-HJI~$');
define('AUTH_SALT',        'y)*HdM+}]tUZ+PZ;hS55#oKi L~X`9l6]PO>jf*AVk%a/sEP+:.<4c?p7-nMiz^n');
define('SECURE_AUTH_SALT', 'TQu{<.yRJ=Jv`L~]}L($)GOeDMs?$(Y !tid|inz~ciI=DBN|7/u6?vPmf<604Jh');
define('LOGGED_IN_SALT',   '1bP6:t@j{n`Uf7y$NH{!Tw ?J=79+2;i:x6Q$3~()34y%n_}$84i~ZevcXNMRvrs');
define('NONCE_SALT',       'z4!>b_zu=j-] [ g$[JpD)S8d[u=3f^vTcMWyE&ON+|-&T~ r`R?4FA{ k/)OqJ}');

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
