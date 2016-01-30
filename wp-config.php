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
define('DB_NAME', 'wp_757');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

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
define('AUTH_KEY',         'lmqeyohzlxi6ckpthpevzzfqjgxwnegrhcvkrsxh2mj3nwvdceqsqx9o26wnm5eu');
define('SECURE_AUTH_KEY',  'dbtxbat6mlgbiiqpaya3lzuylvtxaw3hxyzjoil8nlzxf3pcqocc9igp1kqavnd7');
define('LOGGED_IN_KEY',    'xk4m1vvy0umex408hopxrhjbohhltgjuenixawk5qbraaqkso4rv939t2nj2jtg1');
define('NONCE_KEY',        '6yiofynp3dfxbth3vatzjqzfjqo2krn5050zvzyfhlozrllhhmkgfm5izrdahzkq');
define('AUTH_SALT',        'bpd3c3ifiikmusuiuxpczmbthtdgispsqsmmdbdjtopdmtdqt1rqi67ywluyk2vv');
define('SECURE_AUTH_SALT', 'k5jefd5zr9pugp6diwhzl7gzlu6attrq4wbo6pozn2dddasw4l2wonn4hvxkwbll');
define('LOGGED_IN_SALT',   'ytmppx7x4gu6wnyn1xldncvlvracb5dx2jwbghjwuapkvih5p11siec8thz6xsa1');
define('NONCE_SALT',       'mpbq1johj305s8f6f81dtmngogb0dxwtb0vo0sx7tbpohwwfh92hevwqwbao2h6b');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'vis_';

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
