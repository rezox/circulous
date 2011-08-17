<?php
include('include/header.php');
include_once('register.helpers.php');
?>

<?php 
if (generate_token($_GET['email']) == $_GET['code'])
   db_query('UPDATE users WHERE user="%s" SET verified="1"', $_GET['email']);
else
   die();
?>

<div id="message" class="notification success" style="width: 510px; margin 0 auto;">
   <p id="message_text">
      <strong>You've successfully registered! Now you can go login!</strong>
   </p>
</div>

<?php include('include/footer.php'); ?>
