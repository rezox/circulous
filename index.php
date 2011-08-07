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
            $('#message_text').html('<strong>'+response.message+'</strong>');
            $('#message').fadeTo('normal', 1);

            if (response.type == 'success') $('#register').slideUp('normal'); 
         });
      }
   </script>
</head>

<body>
 
   <div style="margin: 40px auto 0 auto; width: 260px;">
      <img src="resources/images/logo.png" border="0" />
   </div>
 
   <div style="margin: 0px auto; width: 800px; margin-top: 10px;">
      <div style="position: absolute; margin-left: 0px; width: 200px;">
         <img src="resources/images/books.png" border="0" />
      </div>
      <div style="position: absolute; margin-left: 150px; width: 600px" class="phrase">
         Circulo.us helps you quickly buy or sell your textbooks with people at your school so you can make the most of your money. Best of all, it's completely free.
      </div>.
   </div>

   <div style="padding: 120px 0 20px 0;">
      <div id="message" class="notification warning" style="width: 500px; margin: 0 auto;">
         <p id='message_text'>
            <strong>To get started, type in your school's email address, then click 'register'.</strong> 
         </p>
      </div>
   </div>
   
   <div style="margin: -30px auto 0 auto; padding-left: 80px; width: 600px;"> 
   <form id="register" class="form" action="register.email.php" method="post">
      <input type="text" name="email" id="email"/>
      <button type="submit" class="button"></button>
   </form>
   </div>

   <div style="margin: 0px auto 0 auto; width: 747px; padding-top: 20px;">
      <img src="resources/images/bar.png" border="0" />
   </div>

   <div style="margin: -70px auto 0  auto; width: 750px;">
   <div class="infobox" style="position: absolute;">
      <img src="resources/images/mailsr.png" valign="top" style="margin-right: 15px;" /><strong>A simple way to find the books you need.</strong><br />
      <div style="margin: 3px 0 0 32px;">Circulous asks for you .edu email address so it can find people at your school who are also looking to buy and sell. The result? A simple and effective way to match you with someone else on campus for a book exchange. Nice.</div>
   </div>

   <div class="infobox" style="position: absolute; margin-top: 140px;">
      <img src="resources/images/check.png" valign="top" style="margin-right: 15px" /><strong>Safer.</strong><br />
      <div style="margin: 3px 0 0 32px;">Because you're dealing with students in your school, you can perform an exchange on your campus; avoiding middle-man shipping and payment gateways, and perform inspections before you buy.</div>
   </div>
   
   <div class="infobox" style="position: absolute; margin-left: 400px;">
      <img src="resources/images/moneyp.png" valign="top" style="margin-right: 15px;" /><strong>How does it all work?</strong><br />
      <div style="margin: 3px 0 0 32px;">To sell your books, just list the condition and offer a price. We'll take care of the rest by promoting your listing to potential buyers.</div>
   </div>
   
   <div class="infobox" style="position: absolute; margin: 100px 0 0 400px;">
      <img src="resources/images/moneyc.png" valign="top" style="margin-right: 15px;" /><strong>Buying is just as easy.</strong><br />
      <div style="margin: 3px 0 0 32px;">Tell us the book you want at the price you're looking for. Then we'll show you waht's available. If you don't find what you want, we'll be sure to send you an email when we find your match.</div>
   </div>
</body>
