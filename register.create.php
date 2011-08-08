<?php
include_once('include/header.php');
include_once('register.helpers.php');

//$_POST vars, pw, confirm, email
//can assume that password is valid

$response = array('type' => '', 'message' => '');

//TODO: Store into database.
//TODO: Write any responses that are bad to output.

$response['type'] = 'success';
$response['message'] = 'All good to go! Check your email for the verification link!';

echo json_encode($response);

?>