<?php include 'include/header.php'; ?>
<?php include 'register.helpers.php'; ?>

<div style="margin: 20px auto -30px auto; width: 300px; text-align: center;">
   <img src="resources/img/logo.png" />
	<div style="font-family: Lato; font-size: 16pt;">A new way to look for books.</div>
</div>

<?php send_email_verification('tacticalazn@gmail.com'); ?>

<?php include 'include/footer.php'; ?>
