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
define('REVISR_GIT_PATH', ''); // Added by Revisr
$url = parse_url(getenv('DATABASE_URL') ? getenv('DATABASE_URL') : getenv('CLEARDB_DATABASE_URL'));

/** The name of the database for WordPress */
define('DB_NAME', 'nguyen_firstwordpress');

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
define('AUTH_KEY',         'd!4`BpkWPndyD_?G<}:TK[k{DWizU&1D8_h]M`[qJYq>:XSM8[PF4`vGMyyj<oW*');
define('SECURE_AUTH_KEY',  'F0upxX0N*/xOp0`)pS A&K9JJrIu_>D8+5:&*}hj R0N}{nz~Ql7f#WE2a(cnc[i');
define('LOGGED_IN_KEY',    'P9X5]a Cb2E^)CW]ynqc*E<e_ayaad42V9:yT*A^#O)-[Z;AfE#-eW4oW}B *0%9');
define('NONCE_KEY',        'GC+_5:5`z|Hto7!99hjJf9m D*}OFdO^JKNv2>nP$Uzq36ZHpK8H8S?$+P=,f08O');
define('AUTH_SALT',        '0J]F[yFe#kF4GN2uacbT>=,taY?Gp]^)`#]d2Jj_+t{-Fg^imq|m0O}23A;r(|.j');
define('SECURE_AUTH_SALT', '{z(8kN(J4#u)BJgb)1T@0/8dl:)sgthz5/EHs A>LZ&zfWg$h) G}M*RyNr`UKm5');
define('LOGGED_IN_SALT',   '{J*[h> =g0hQ|{NSGz}mn,F<6AX]vyL6?&?FWUmCrEW9Nm@BA;_@l}Mz~2XiD=Td');
define('NONCE_SALT',       '3G!Ea0HR85$..:&ki8aiP.Z]WfN<V[OJy +xD9W`z2t!GR~W/T0f<?Ysq+wz<Rij');

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
