<?php
// ... (toute la partie supérieure du fichier)

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '{{ wp_db_name }}' );

/** Database username */
define( 'DB_USER', '{{ wp_db_user }}' );

/** Database password */
define( 'DB_PASSWORD', '{{ wp_db_password }}' );

/** Database hostname */
define( 'DB_HOST', '{{ wp_db_host }}' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
// NOTE : Pour une meilleure sécurité, ces clés devraient être générées dynamiquement.
// Pour cet exercice, nous laissons les placeholders.
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = '{{ wp_table_prefix }}';

// ... (le reste du fichier)