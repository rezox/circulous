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
		$_SESSION['user'] = $_POST['email'];
      $_SESSION['has_registered'] = 1;
		header('Location: index.php');
	}
}
?>