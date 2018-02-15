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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'alexander');

/** MySQL database password */
define('DB_PASSWORD', 'Boogs1996!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'BkpK|z,{:/D4yQ4e-88mCtfj*n+iw{ZE<d9^B:]wDH<n)JtB:YRQEhW6s O0zHWq');
define('SECURE_AUTH_KEY',  '-|dSWC neAP5=.,&/h=7UaS:s3 +q|3!S$0K$:xUGcn))&ROH}$-~3Z~t)z.8I.z');
define('LOGGED_IN_KEY',    'b,sw[!|~)).dBZ)#) ah|4a_`82K2q<M=>OUdMyfqSIZ|&|4b&Z?(S|~3R4@rQ#<');
define('NONCE_KEY',        'a9PZZ6O~@ixjL~vOp`pO2OTFcbBSyFVafAq2lp!3sGcMWoqD&bY?^0ZlgY8+sHwl');
define('AUTH_SALT',        'oUBk3$-^2k+Q6I:a8h`&?>QOjc<kz~Eao3)SzL!f:>+)0O>I^6cY+|[*FPe+{/UY');
define('SECURE_AUTH_SALT', 'X|pb rcZ-9q]ERjh[h?q[-py37#{+VX5eIz xJSL$4g 51-X3$V2vHpiJa#5?#2B');
define('LOGGED_IN_SALT',   'Je./O911(w/@QE%1[;-*gU?a:/WQQ$0%z|s{dz+3H g5&df8=[6=zN9IX+i&xE1@');
define('NONCE_SALT',       'c:ENs|O9@]]|gs YMtbN-lTga#8)<qt)q1~5v!UL?Vx+H3JR%+BL(!K+bDx=HRdm');

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
