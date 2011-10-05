<?php 
include('include/config.php');

if (isset($_GET['verify']))
	include_once('handlers/register/verify.php');
else if (isset($_GET['create']))
	include_once('handlers/register/create.php');
else if (isset($_GET['check-email']))
	include_once('handlers/register/check-email.php');
?>