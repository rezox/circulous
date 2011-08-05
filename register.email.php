<?php
include_once('register.helpers.php');

$email = $_POST['email'];

$response = array('type' => '', message => '');

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
   $response['type'] = 'success';
   $response['message'] = 'All good to go! Now go check your email for the next steps!';

   //TODO: send validation email with key
}

echo json_encode($response);
?>
