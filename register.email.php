<?php
include_once('include/config.php');
include_once('register.helpers.php');

function send_email_verification($email)
{
   include 'include/classes/class.phpmailer.php';
   $mail = new PHPMailer();
   
   $mail->From = "noreply@circulo.us";
   $mail->FromName = "Circulo.us";

   $mail->Subject = "Email Verification";
   
   $body = "Circulo.us - a new way to look for textbooks.\n";
   $body .= "Thanks for your interest in circulo.us!\n";
   $body .= "\n";
   $body .= "In order to continue creating your account,\n";
   $body .= "we need to verify that you're email works.\n";
   $body .= "\n";
   $body .= "To do so, please visit the following link.\n";
   $body .= "http://circulo.us/register.php?email=" . $email . "&code=" . generate_token($email);

   $mail->Body = $body;
   $mail->AddAddress($email, $email);
   $mail->Send();
}

$email = $_POST['email'];

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
else if (check_exists($email))
{
	$response['type'] = 'error';
	$response['message'] = "This email account has already been registered!";
}
else
{
   $response['type'] = 'success';
   $response['message'] = 'Last thing, I swear! Type in a password to continue.';
	$response['email'] = $email;

   // send_email_verification($email);
}

echo json_encode($response);
?>
