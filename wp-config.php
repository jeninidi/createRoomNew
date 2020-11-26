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

define( 'DB_NAME', "Hamsto" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "1234" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8mb4');


/** The Database Collate type. Don't change this if in doubt. */

define('DB_COLLATE', '');


define('FS_METHOD','direct');


/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define('AUTH_KEY',         'oe#^z#i{<5?f]j-o4TRnF6w}0H 4o=h @s+fES!g]QuL55}{GDWGK/0Xu=KWC8e@');

define('SECURE_AUTH_KEY',  'e-sK JRCE -g?X_OM3r9P8H@:Xkcl<I8?>@6svky*g*x+N%fHS3?xv&BNt<)H7.K');

define('LOGGED_IN_KEY',    '!VH#SI8] |pIQG4mmxlqngYkf~J4(^- _w!N-Y45}xBN#=q]3M$qy<JOqBApN6h$');

define('NONCE_KEY',        '1Y11V@~(=bmpv>QB+%To:6]Kt%~WyvFH*?$Y3.>V;)4 gbSi9t_%NJ8O#uXf07uk');

define('AUTH_SALT',        'c>[be1{7IA{SkXcbF %(c*R;dq+}1-Al*7=ru5H?H/O&C<2R?9/}VfNiB$1?ys&*');

define('SECURE_AUTH_SALT', 'Du5m&x,Kv%0Akq/o+<U]/#:B<Jyr|7y.k5AhH5oQ&<NT1Bz,1og})BZ+n2NT~bx#');

define('LOGGED_IN_SALT',   'NANyD+tfo*-$UD O*hzU{s2 nfE@;/HKV<c?fn4za}mUOTDb[N9oLM*TXCd9hsM]');

define('NONCE_SALT',       'RbsX$`TbFT6QGYhj)Sn49>UHsf:9.Wdv*;K&/wA-5#IoM0;Q[klLJd!CeMYH.Yj%');


/**#@-*/


define( 'WP_MEMORY_LIMIT', '128M' );

define( 'WP_MAX_MEMORY_LIMIT', '1024M' );

define( 'AUTOMATIC_UPDATER_DISABLED', true );


/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each a unique

 * prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'wp_';


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

