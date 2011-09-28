<?php
include('include/header.php');
include_once('register.helpers.php');
?>

<?php 
if (!isset($_GET['email']) || !isset($_GET['code']))
   header('Location: login.php?verify_error');
else
{
   $response = db_query('SELECT COUNT(*) FROM users WHERE email="%s" AND verified="0"', $_GET['email']);
   if ($response['COUNT(*)'] !== 1)
      header('Location: login.php?verified');
   else
   {
      if (generate_token($_GET['email']) == $_GET['code'])
      {
         db_query('UPDATE users WHERE email="%s" SET verified="1"', $_GET['email']);
         header('Location: login.php?verified');
      }
      else
         header('Location: login.php?verify_error');      
   }
}
?>

<?php include('include/footer.php'); ?>