<?php
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

function generate_token($email)
{
   return md5(date('WY') . $email); 
}

function check_exists($email)
{
	$result = db_query("SELECT verified FROM users WHERE email='%s'", $email);
	if (count($result) > 0) 
		if ($result[0]['verified'] == 0) return 2;
		else return 1;
		
	return 0;
}

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

   $mail->IsMail();
   $mail->Body = $body;
   $mail->AddAddress($email, $email);
   $mail->Send();
}
?>
