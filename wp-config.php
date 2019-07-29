<?php
# Database Configuration
define( 'DB_NAME', 'wp_atlantaoffice' );
define( 'DB_USER', 'atlantaoffice' );
define( 'DB_PASSWORD', 'yokKCUSiCOB2tz35XYBp' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '&i]BBxa}Z3|alNxg0o-^bS]BY/-A~lK) .DZUG!V}-MykJ6DMH;P4=L^a/Mn?pr-');
define('SECURE_AUTH_KEY',  '`c+$!;?F!7S<?CfhZhh}[,]5S$^T5aR02G W<[UG*K;=B{,|%+YkqFW},|Ss3%f6');
define('LOGGED_IN_KEY',    'Alu*K>1_w| TRIEB3}3kMW|T4#RvD[/DlCIg9{m7?J]H{|(NEU3>Q=D[%XYvGM0V');
define('NONCE_KEY',        'BglFQ&Tmik*Z(?{-Ia#p@eOKlE^3$v1l5zh`}@U*NgDFHBj;710_Nx@]*poNk:m/');
define('AUTH_SALT',        '2SsF`K;mX;Gc9yAn~K].v[|.q/5t,?7o91cdHv~4!@Oqh[76XS#+yAf;GTKYDy-*');
define('SECURE_AUTH_SALT', '<i3[B^F72$_*[[HnwHRix}ixZiiaw?d:1~%-t0`=V/U0WUJ6loF[>aib|YKTotRw');
define('LOGGED_IN_SALT',   '%uzN=Q>~zxC_EZ@53%XfFgfXe|K@Eux#:@LYzX4vQ}+3K9uzoz64+<JWsp|]VtFi');
define('NONCE_SALT',       '=F,5a[0.=/M:|JY$^{ 4)bxsM|nJn+-$ VI7,g#A/wkA$c- Z+{A-Ter5::)!9+C');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'atlantaoffice' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '9e061b5deff0f1e8d2be71bc062351af82fbfe16' );

define( 'WPE_CLUSTER_ID', '130303' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'aomcopy.com', 1 => 'www.aomcopy.com', 2 => 'atlantaoffice.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-130303', );

$wpe_special_ips=array ( 0 => '35.185.45.51', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
