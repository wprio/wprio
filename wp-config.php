<?php
/**
 * Modern Tribe Skeleton configuration
 * Based on Mark Jaquith's Skeleton repository
 * @link https://github.com/markjaquith/WordPress-Skeleton
 */


// ==============================================================
// Load database info and local development parameters
// ==============================================================

if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	include( dirname( __FILE__ ) . '/local-config.php' );
}

// ==============================================================
// Assign default constant values
// ==============================================================

$config_defaults = array(

	// Paths
	'WP_CONTENT_DIR'          => dirname( __FILE__ ) . '/wp-content',
	'WP_CONTENT_URL'          => 'https://' . ( ! empty( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : '' ) . '/wp-content',
	'ABSPATH'                 => dirname( __FILE__ ) . '/wp/',

	// Multisite
	//'WP_ALLOW_MULTISITE'    => true,
	//'MULTISITE'             => true,
	//'SUBDOMAIN_INSTALL'     => false,
	//'DOMAIN_CURRENT_SITE'   => '%%PRIMARY_DOMAIN%%',
	//'PATH_CURRENT_SITE'     => '/',
	//'SITE_ID_CURRENT_SITE'  => 1,
	//'BLOG_ID_CURRENT_SITE'  => 1,

	// DB settings
	'DB_CHARSET'              => 'utf8',
	'DB_COLLATE'              => '',

	// Language
	'WPLANG'                  => '',

	// Security Hashes (grab from: https://api.wordpress.org/secret-key/1.1/salt)
	'AUTH_KEY'                => 'PZE-$j3m=[u#sNzik6Lz3-{pW(p*rp6qc1`>c.k$Hz(((a3 $W(rA,~!<U6$aU7)',
	'SECURE_AUTH_KEY'         => 'V<F@&]Km2#:gN3]e1-qTT?s-/#-fbfjIP,![I`?aqgSkKAn_Tbg-@Hpt1_K038C%',
	'LOGGED_IN_KEY'           => 'iW[R08g3Vg2rGmjKw,xb+V-2}0H1rB+$Q%K[|?1LOO+[z/DJ43k7NRc-=:Qh)8Gr',
	'NONCE_KEY'               => 'u_,6A+>c,&nCMii@1 )/*.9SJ-T4y*e,Zcla(b{YGQ+-DzLtV8Q~*#Vy}Qm[2F!$',
	'AUTH_SALT'               => 'hbU*.E4(F[2.9t8P@wu#~k&|GN+P 0<oq1k4RY41KO$TCImTMo.XL[R431f4EhDw',
	'SECURE_AUTH_SALT'        => 'j(31<&E*^|asCl+,G+RfrEF^b,gn=|bf~/tqEM<&DfZjLqOR+&}!r-l.|h$,I4t4',
	'LOGGED_IN_SALT'          => 'Dy?p)Ke<m)zOZq9x8)eOYHI|7{jyr$fZ;8VmuVKqrPF}+xu=b`sm18C+uc~=|7VR',
	'NONCE_SALT'              => '7(<pSes9a}e9||X$PHQ6D1o|Y>I^_&M!w|00=`-3OzAmrP3$_>F,yP{jG/qnzktc',

	// Security Directives
	'DISALLOW_FILE_EDIT'      => true,
	'DISALLOW_FILE_MODS'      => true,
	'FORCE_SSL_LOGIN'         => false,
	'FORCE_SSL_ADMIN'         => false,

	// Performance
	'WP_CACHE'                => false,
	'DISABLE_WP_CRON'         => true, // We always disable cron on large installs
	'WP_MEMORY_LIMIT'         => '96M',
	'WP_MAX_MEMORY_LIMIT'     => '256M',
	'EMPTY_TRASH_DAYS'        => 7,
	'WP_APC_KEY_SALT'         => 'wprio',
	'WP_MEMCACHED_KEY_SALT'   => 'wprio',

	// Dynamic Image Resizing
	'FILE_CACHE_MAX_FILE_AGE' => 315000000, // about 10 years

	// Debug
	'WP_DEBUG'                => true,
	'WP_DEBUG_LOG'            => true,
	'WP_DEBUG_DISPLAY'        => true,
	'SAVEQUERIES'             => true,
	'SCRIPT_DEBUG'            => true,
	'CONCATENATE_SCRIPTS'     => false,
	'COMPRESS_SCRIPTS'        => false,
	'COMPRESS_CSS'            => false,

	// Domain Mapping
	//'SUNRISE'                 => true,

	// Miscellaneous
	'WP_POST_REVISIONS'       => true,
	'WP_DEFAULT_THEME'        => 'core'
);

// ==============================================================
// Assign default constant value overrides for production
// ==============================================================

if ( defined( 'ENVIRONMENT' ) && ENVIRONMENT == 'PRODUCTION' ) {
	$config_defaults['WP_CACHE']            = true;
	$config_defaults['WP_DEBUG']            = false;
	$config_defaults['WP_DEBUG_LOG']        = false;
	$config_defaults['WP_DEBUG_DISPLAY']    = false;
	$config_defaults['SAVEQUERIES']         = false;
	$config_defaults['CONCATENATE_SCRIPTS'] = true;
	$config_defaults['COMPRESS_SCRIPTS']    = true;
	$config_defaults['COMPRESS_CSS']        = true;
}

// ==============================================================
// Use defaults array to define constants where applicable
// ==============================================================

foreach ( $config_defaults AS $config_default_key => $config_default_value ) {
	if ( ! defined( $config_default_key ) )
		define( $config_default_key, $config_default_value );
}

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================

if ( empty( $table_prefix ) )
	$table_prefix = 'wprio_';

// ==============================================================
// Manually back up the WP_DEBUG_DISPLAY directive
// ==============================================================

if ( ! defined( 'WP_DEBUG_DISPLAY' ) || WP_DEBUG_DISPLAY == false )
	ini_set( 'display_errors', 0 );

// ==============================================================
// Load a Memcached config if we have one
// ==============================================================

if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ==============================================================
// Load a Cache config if we have one
// ==============================================================

if ( file_exists( dirname( __FILE__ ) . '/cache-config.php' ) )
	include( dirname( __FILE__ ) . '/cache-config.php' );

// ==============================================================
// Bootstrap WordPress
// ==============================================================

require_once( ABSPATH . 'wp-settings.php' );
