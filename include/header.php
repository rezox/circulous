<?php include_once('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <link rel="stylesheet" href="resources/css/default.css" type="text/css" />
   <link rel="stylesheet" href="resources/css/notifications.css" type="text/css" />
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="resources/js/jquery.watermark.min.js"></script>
   <script src="resources/js/jquery.form.js"></script>

   <title>circulo.us - a new way to look for textbooks.</title>
   <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
   <meta name="keywords" content="circulous textbooks" />
   <meta name="description" content="Circulo.us finds you textbooks fast, securely and for cheap within your school." />

   <script src="<?php $info = pathinfo($_SERVER['PHP_SELF']); $filename = basename($_SERVER['PHP_SELF'], '.' . $info['extension']); echo $filename . '.js'; ?>"></script>
	<link rel="stylesheet" href="resources/css/<?php $info = pathinfo($_SERVER['PHP_SELF']); $filename = basename($_SERVER['PHP_SELF'], '.' . $info['extension']); echo $filename . '.css'; ?>" />
</head>

