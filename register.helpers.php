<?php
function check_email($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
         if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_<?php|}~-][A-Za-z0-9!#$%&'*+/=?^_<?php|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
            return false;
        }
    }    
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
                return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
                return false;
            }
        }
    }
    return true;
}

function domain_exists($email, $record = 'MX')
{
   list($user, $domain) = split('@', $email);
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

   $mail->Body = $body;
   $mail->AddAddress($email, $email);
   $mail->Send();
}
?>
