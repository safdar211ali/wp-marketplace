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
define('DB_NAME', 'market');

/** MySQL database username */
define('DB_USER', 'safdar');

/** MySQL database password */
define('DB_PASSWORD', 'safdar');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
/**Custom setting */
define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '&k7WQ+`n1Oiqa#]!d|-BcL+d@a.2>vwY|R+d9pta`}QjSW:zgYmMFm9t-:q%W60U');
define('SECURE_AUTH_KEY',  'laEjC2s;,`t,k>smpdY226nJwXY`M#/{FW0HJkyZL|+(,f9Fh2]OSMUesy29id?v');
define('LOGGED_IN_KEY',    'm+&wZNxY,6y(}ao:[=T:+X*x01R8bK(suTnXBcbFDL4^z4CmRYFLDAAduos1/Q6L');
define('NONCE_KEY',        ',.iazeV]/XPc>B$SO5DT8Ic[qM^HR=#l1$Ia]EuNC=OFwlZ>=qj})k}{js(#&+$[');
define('AUTH_SALT',        'E7&FNO;oM0ZPim|s&9?QE86D2R-s_*61d^Yc%L2h) (1aC]3fuz46zV~q()Mf n}');
define('SECURE_AUTH_SALT', 'QBB#&&4f?uf%&Qm/=m$=H:NxhSV?(D.8`0F8!L:w@3oF5*K*$:,o;?b#.]+j lSm');
define('LOGGED_IN_SALT',   '2+IgAK-_VAh?x8~fiei2D1imWf#fxfee}lK8RL;oGx8jlve6@U6M}Z-MIZsLZsy4');
define('NONCE_SALT',       'd?`2RxA:6}=O+4on>GAVo(yN a-5QX~]Q& &64uay :zBr)3Rq,6ct!6:7KEwcPo');

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
