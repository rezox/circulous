<?php 
	$info = pathinfo($_SERVER['PHP_SELF']);
	$filename = basename($_SERVER['PHP_SELF'], '.' . $info['extension']);
	
	include_once('config.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="shortcut icon" href="resources/img/favicon.ico" type="image/x-icon" />
   <link rel="apple-touch-icon" href="resources/img/ios-icon.png" />
   <link rel="stylesheet" href="resources/css/reset.css" type="text/css" />
   <link rel="stylesheet" href="resources/css/default.css" type="text/css" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
   <script src="resources/js/default.js"></script>

	<title>circulo.us - A new way to look for textbooks.</title>
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
	<meta name="keywords" content="circulous textbooks" />
	<meta name="description" content="Circulo.us finds you textbooks fast, securely and for cheap within your school." />

   <? if (file_exists('resources/js/' . $filename . '.js')): ?>
	   <script src="resources/js/<?= $filename ?>.js"></script>
   <? endif ?>
   <? if (file_exists('resources/css/' . $filename . '.css')): ?>
	   <link rel="stylesheet" href="resources/css/<?= $filename ?>.css" />
   <? endif ?>
</head>

<body>
