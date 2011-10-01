include('jquery.watermark.min.js');

$(document).ready(function() { 
	$("#email").watermark("email");
	$("#password").watermark("password");
});