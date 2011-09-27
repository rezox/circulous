<?php
if (isset($_SERVER['db_hostname']))
{
   define('DB_HOST', getenv('db_hostname'));
   define('DB_USER', getenv('db_username'));
   define('DB_PASS', getenv('db_password'));
   define('DB_NAME', getenv('db_database'));
}
else
{
   define('DB_HOST', '10.194.111.8');
   define('DB_USER', 'user_ab1e97b7');
   define('DB_PASS', '8zRv5Z4sRkhLpu');
   define('DB_NAME', 'db_ab1e97b7');
}

define('FACEBOOK_APP_ID', '138740612879677');
define('FACEBOOK_SECRET', '2ff5f3463d2e14376c92c7643308fa4e');

define('BLOWFISH_SECRET', '4rehAJasaPrafrU2a4e4wapraS89CRa6');

include 'database.php';
db_connect();

ini_set('display_errors', 'Off');
?>
