<?php
/**
 * The base configuration for WordPress
 */

define( 'DB_NAME', 'dietfigma_site' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY',         '.UMJB@#a:Xqt5]&y4*hLb=Tn4Z0VRPR{+r:Zb#pI/SLRBi.[n;${UKsPg&=u,~Iz' );
define( 'SECURE_AUTH_KEY',  'WyrQB*[PovrLE#4{_vxTgt&5OA/h#-OZ1c^dg_Ki@ZKEVaxq?dU51PW17#j2[g9,' );
define( 'LOGGED_IN_KEY',    'OL2.Ipb#`r~Thg<gsC3x,pq6,CfGUd5jV$DzN7R]h(:FxJ]ZZc}snzs9w1!3;; ;' );
define( 'NONCE_KEY',        '@8Q|sQ e:}ma!w(@,vT_c{k:ps?^yv:2yB+kk2WIEB.^&k At>=Ey,i)ljF##>,P' );
define( 'AUTH_SALT',        ':##P[DTF2,L%ZU(:EGe0O<v_Ob[E:8yi7IfX)TZX[[65)oRe}AYK~=RSQ5nl,ZQm' );
define( 'SECURE_AUTH_SALT', 'sM,!=h2?BSKM}Du;/>}Epa[|ZB(w>2Itu`#2D(>~6}At}aphXvzk>^4m[}M99TO4' );
define( 'LOGGED_IN_SALT',   'U;!=z~~/A^b`Hn,;*RYqRju69^CVK8oK&gow5H[xn}XHoK-TKk&76.q.`($L%o*f' );
define( 'NONCE_SALT',       'd)2{y{zRR]}gdJc3DV XHJ|uBu]X4<4HN5.!cXHIv$j~R4be;G(kJ=gKoY+p9caT' );

$table_prefix = 'wp_';

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
