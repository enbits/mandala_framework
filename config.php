<?php
define('SITE_URL','http://localhost/mandala_framework');
define('BASE_PATH', '/mandala_framework');

define('HOME_PAGE','home');

//sqlite config
define('DB_TYPE','sqlite');
$db_file = FULL_PATH.'/mandala_framework.sqlite';
define('DB_FILE',$db_file);


//mysql config
/*
define('DB_TYPE', 'mysql');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','pk1321');
define('DB_NAME','mandala_framework');
 */

define('DB_SHOW_ERRORS',TRUE);
ini_set('display_errors','on');

//GitHub: https://github.com/enbits/mandala_framework
