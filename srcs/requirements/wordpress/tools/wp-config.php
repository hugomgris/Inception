<?php
#1 Database configuration
define( 'DB_NAME', 'db1' );
define( 'DB_USER', 'user' );
define( 'DB_PASSWORD', 'pwd' );
define( 'DB_HOST', 'mariadb' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

#2 setup repair mode (in case the database breaks)
define( 'WP_ALLOW_REPAIR', true );

#3 security keys
define('AUTH_KEY',         '+ROYnYBsMgrQ]gvF|Ee<ad)BGwxO3 -<K6Qn)W1(G{m%l2K?cwb0hf+1fxy+2oe:');
define('SECURE_AUTH_KEY',  'f<p-XP-%c62y-#BcXpEkKuk+DmmS=bQ6zil#F)ZX-3JZvQt@450pys-zE,_Cnf3C');
define('LOGGED_IN_KEY',    'LYSYaT6I&dwfv[M/&Jag,#ujF4u{559H!4(9+WgS:IsF*HzXI/[?PH%ojq+|#)S{');
define('NONCE_KEY',        '8_&b[;2~I3;Z%IqDkro`svm=Ulm-uIa*HZVPYWf/t;lQ=Z61A?z3d$3Q ,;c;yF/');
define('AUTH_SALT',        'Z=B{<8-z/,Ne=%z^S#}h4wu6T8!{B^xVckqhX-}UO,iaxx~,*<V#;+[-.0*$TcB#');
define('SECURE_AUTH_SALT', '!pNs,Wg!E$KrC7ux80tUXp+elnqBfo_g$-<Q+L/ye+W3(!@2;]$C-;Q#+>zd@d+m');
define('LOGGED_IN_SALT',   'e>-5Z.Uhq|)!D+A%6Qovz8l|/P#9Q)?KDHkjd}^aGSqTOl+|dI_d}<8>@9&CVp6P');
define('NONCE_SALT',       'Y=UkQsR+()ahbD+@a!z]-sR0Rr*CJ-A2b#9fI+|T%7e)H5@gom_f0:oAl}|?a6Vf');

#4 Redis caching to enhance performance
define( 'WP_REDIS_HOST', 'redis' );
define( 'WP_REDIS_PORT', 6379 );     
define('WP_CACHE', true);

$table_prefix = 'wp_';

#5 Debug mode
define( 'WP_DEBUG', true );

#6 set up Wordpress root dir and load core settings
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
?>
