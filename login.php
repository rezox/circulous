<?php include 'include/header.php'; ?>

<div style="margin: 20px auto -30px auto; width: 300px; text-align: center;">
   <img src="resources/img/logo.png" />
	<div style="font-family: Lato; font-size: 16pt;">A new way to look for books.</div>
</div>

<?php
if (isset($_GET['verified']))
	$msg = array('type' => 'success', 'text' => 'Your account has been activated, login to continue.');
else if (isset($_GET['verify_error']))
	$msg = array('type' => 'error', 'text' => 'Bad verification, please check the link and try again.');
?>

<div id="message" class="notification <?php if (isset($msg)) echo $msg['type']; else echo 'warning'; ?>" style="width: 460px; margin: 60px auto -25px auto;">
   <p id='message_text'>
      <b><?php if (isset($msg)) echo $msg['text']; else echo 'Please login to continue.'; ?></b> 
   </p>
</div>

<div id="formholder">
	<form action="login.php?process" method="POST">
		<ul class="formul">
			<li>
				<span class="intyp">
					Email
				</span>
				<input type="text" name="email" value="<?php if (isset($_POST)) echo $_POST['email']; ?>"/>
			</li>
			<li>
				<span class="intyp">
					Password
				</span>
				<input type="password" name="password" />
			</li>
			<li>
				<input type="submit" name="submit" value="Login" />
			</li>
		</ul>
	</form>
</div>

<?php include 'include/fooder.php'; ?>
