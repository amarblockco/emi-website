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
define('DB_NAME', 'emifound_emifoundationmain');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'InterAKT@Emi');

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
define('AUTH_KEY',         'x{4dM`MgkYro{s.rEa3J9U2 ZZ0R]YBWc%*wU>Bn>Zq{P7rFrizD1_=a0-OP;eC~');
define('SECURE_AUTH_KEY',  'J<1/ Nvc5g*Tma+!iCeAz6`P)f~DO1<sD4AE_O&|InFrv4pg;sRlAMAXe7P,v9Qo');
define('LOGGED_IN_KEY',    'X79@0oMGsXl.GOD%0{/.+6byld{_t(Kxx_QSh9JcHs4l#,lSAI)c=Gx<InP}.Qd.');
define('NONCE_KEY',        '&8CO[U!oX4KGWGH;OkKl!}F;B7s5P(EX!E#w/4J^~a4tDf)n*2*+>gE%yYc}}B18');
define('AUTH_SALT',        '70e]Whx#Jfuq=]O~_`+g619~b]:N?!am7^D*|3[K]tn:IGW!$[XY?Vm27@{WXK/Y');
define('SECURE_AUTH_SALT', 'GcT&hB8siqNt-O@MU-$gYs:J2/XhajRZu$^2VWG|=V=mxzB_D*^dkJJn a_-{QXm');
define('LOGGED_IN_SALT',   'lHZw7r%bm%^n>)R3M #mj(@)0BhF</vQPdihRP8Ht2 9)w5]a2~L<t/-S*Kx6z|S');
define('NONCE_SALT',       '2ypCFfK#uL`p: Cso*twcv6LMS$A0GL/v5z(r04[i<?n}x# <Igx1h9$BQ-iTr :');

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
