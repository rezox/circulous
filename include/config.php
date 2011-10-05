<?php
if (isset($_SERVER['db_hostname']))
{
   define('DB_HOST', getenv('db_hostname'));
   define('DB_USER', getenv('db_username'));
   define('DB_NAME', getenv('db_database'));
}
else if ($_SERVER['SERVER_ADDR'] == '173.255.228.96')
{
   define('DB_HOST', 'localhost');
   define('DB_USER', 'circulous');
   define('DB_NAME', 'circulous');
}
else
{
   define('DB_HOST', '10.194.111.8');
   define('DB_USER', 'user_ab1e97b7');
   define('DB_NAME', 'db_ab1e97b7');
}

define('DB_PASS', '8zRv5Z4sRkhLpu');

define('BLOWFISH_SECRET', '4rehAJasaPrafrU2a4e4wapraS89CRa6');

include 'database.php';
db_connect();

ini_set('display_errors', 'Off');

session_start();

include_once('helpers.php');

$info = pathinfo($_SERVER['PHP_SELF']);
$filename = basename($_SERVER['PHP_SELF'], '.' . $info['extension']);

if (file_exists('helpers/' . $filename . '.php'))
	include_once('helpers/' . $filename . '.php');
?>
