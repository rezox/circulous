<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

   <link rel="stylesheet" href="resources/css/frontpage.css" type="text/css" />
   <link rel="stylesheet" href="resources/css/notifications.css" type="text/css" />
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
   <script src="resources/js/jquery.watermarkinput.js"></script>
   <script src="resources/js/jquery.form.js"></script>

   <title>circulo.us - a new way to look for textbooks.</title>
   <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
   <meta name="keywords" content="circulous textbooks" />
   <meta name="description" content="Circulo.us finds you textbooks fast, securely and for cheap within your school." />

   <script type="text/javascript">
      jQuery(function($){
         $("#email").Watermark("you@yourschool.edu");
      });

      $(document).ready(function() { 
         $('#register').ajaxForm({
            dataType: 'json',
            success: processServerMessage
         }); 
      }); 

      function processServerMessage(response)
      {
         $('#message').fadeTo('normal', 0, function() 
         { 
            $('#message').removeClass("warning").removeClass("error").removeClass("success");
            $('#message').addClass(response.type);
            $('#message_text').html('<strong>'+response.type.charAt(0).toUpperCase()+response.type.slice(1)+'</strong><br />' + response.message);
            $('#message').fadeTo('normal', 1);

            if (response.type == 'success') $('#register').slideUp('normal'); 
         });
      }
   </script>
</head>

<body>
   <h1>circulo.us</h1>
   <h2>a new way to look for textbooks.</h2>
   <div class="infobox" style="margin-bottom: 30px;">
      Circulo.us finds you textbooks fast, securely and for cheap within your school. With your .edu address, you know you are only dealing with someone within your school.<br />
      <br /> 
      To <b>sell</b> your books, all you need is to find your book, list the condition, and offer a price. We'll do the rest by finding you buyers and notify you when we find one.<br />
      <br />
      <b>Buying</b> is just as easy, tell us the book you want and your asking price, then we'll show you what's available. If there isn't anything that we can catch your attention with, we'll email you when anyone has put a new listing for the book you want.<br />
      <br />
      The best part about Circulo.us is that there are <b><u>no fees</u></b> to sell or buy.  
   </div>

   <div style="margin: 10px auto;">
      <div id="message" class="notification warning" style="width: 550px; margin: 10px auto;">
         <p id='message_text'>
            <strong>Under Development</strong><br />Already have an account? Well you already know where to go. :) 
         </p>
      </div>
   </div>

   <form id="register" class="form" action="register.email.php" method="post" style="margin: 0px auto;">
      <input type="text" name="email" id="email"/>
      <button type="submit" class="button">Register</button>
   </form>

</body>
