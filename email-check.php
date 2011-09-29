<?php
include_once('include/config.php');
include_once('register.helpers.php');

function check_email($email) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
	else return false;
}

function domain_exists($email, $record = 'MX')
{
   list($user, $domain) = preg_split('/@/', $email);
   return checkdnsrr($domain, $record);
}

function check_extension($email, $extension = 'edu')
{
   if (end(explode(".", $email)) !== $extension)
      return false;

   return true;
}

$email = strtolower($_POST['email']);

$response = array('type' => '', 'message' => '', 'email' => '');

if (!check_email($email))
{
   $response['type'] = 'error';
   $response['message'] = "The email address you entered isn't valid.";
}
else if (!domain_exists($email))
{
   $response['type'] = 'error';
   $response['message'] = "That email server does not seem to exist.";
}
else if (!check_extension($email))
{
   $response['type'] = 'error';
   $response['message'] = "Sorry, this service is only available to .edu addresses.";
}
else
{	
	$exists = check_exists($email);
	
	if ($exists == 1)
	{
		$response['type'] = 'error';
		$response['message'] = "This email account has already been registered!";
	}
	else if ($exists == 2)
	{
		$response['type'] = 'error';
		$response['message'] = "We've sent a verification email already, we resent just incase.";
		
		send_email_verification($email);
	}
	else
	{
		$response['type'] = 'success';
	   $response['message'] = 'Last thing, I swear! Type in a password to continue.';
		$response['email'] = $email;
	}
}

echo json_encode($response);
?>
