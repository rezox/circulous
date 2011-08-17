<?php
include('include/header.php');
include_once('register.helpers.php');
?>


<?php 
if (!isset($_GET['email']) || !isset($_GET['code']))
   $message = array('type' => 'error', 'message' => 'Not a properly encoded verification link.');   
else
{
   $response = db_query('SELECT COUNT(*) FROM users WHERE email="%s" AND verified="0"', $_GET['email']);
   if ($response['COUNT(*)'] !== 1)
      $message = array('type' => 'error', 'message' => 'No such user registration needed verification.'); 
   else
   {
      if (generate_token($_GET['email']) == $_GET['code'])
      {
         db_query('UPDATE users WHERE email="%s" SET verified="1"', $_GET['email']);
         $message = array('type' => 'success', 'message' => 'Successfully verified, you may now login.');
      }
      else
         $message = array('type' => 'error', 'message' => 'Email and code mismatch.');        
   }
}
?>

<div id="message" class="notification <?= $message['type']; ?>" style="width: 510px; margin 0 auto;">
   <p id="message_text">
      <strong><?= $message['message'] ?></strong>
   </p>
</div>

<?php include('include/footer.php'); ?>
