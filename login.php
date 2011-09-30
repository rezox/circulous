<?php include 'include/header.php'; ?>

<div style="margin: 20px auto -30px auto; width: 300px; text-align: center;">
   <img src="resources/img/logo.png" />
	<div style="font-family: Lato; font-size: 16pt;">A new way to look for books.</div>
</div>

<?php
function verify_login($email, $password)
{
	// 0 => bad password
	// 1 => good to go
	// -1 => account not found or verification bad
	$pw_verify = db_query('SELECT AES_DECRYPT(password, "%s") AS secret FROM users WHERE email="%s" AND verified="1" LIMIT 1', $_POST['password'], $_POST['email']);
	if (count($pw_verify) == 0)
		return -1;
	else if ($pw_verify[0]['secret'] !== BLOWFISH_SECRET)
		return 0;
	else
		return 1;
}

if (isset($_GET['verified']))
	$msg = array('type' => 'success', 'text' => 'Your account has been activated, login to continue.');
else if (isset($_GET['verify_error']))
	$msg = array('type' => 'error', 'text' => 'Bad verification, please check the link and try again.');

if (isset($_POST['email']) && isset($_POST['password']))
{
	$_POST['email'] = strtolower($_POST['email']);
	$login = verify_login($_POST['email'], $_POST['password']);
	if ($login == -1)
		$msg = array('type' => 'error', 'text' => 'No such account or the account has not been verified yet.');
	else if ($login == 0)
		$msg = array('type' => 'error', 'text' => 'Email/password mismatch.');
	else
	{
		session_start();
		session_register($_POST['email']);
		header('Location: index.php');
	}
}
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
				<input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"/>
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
