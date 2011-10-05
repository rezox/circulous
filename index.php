<?php include 'include/header.php'; ?>

<?php 
if (isset($_SESSION['user']))
	header('Location: home.php');
else if (isset($_SESSION['has_registered']) && $_SESSION['has_registered'] == 1)
   header('Location: login.php');
?>

<div style="width: 650px; text-align: right; margin: 10px auto -20px auto;">
   Have an account? <a href="login.php"><b>Login</b></a>
</div>

<div style="margin: 20px auto 0 auto; width: 237px;">
   <img src="resources/img/logo.png" border="0" />
</div>

<div style="margin: 0 auto; width: 740px; margin-top: 10px;">
   <div style="position: absolute; margin-left: 0px; width: 120px;">
      <img src="resources/img/books.png" border="0" />
   </div>
   <div style="position: absolute; margin-left: 140px; width: 600px" class="phrase">
      Circulo.us helps you quickly buy or sell your textbooks with people at your school so you can make the most of your money. Best of all, it's completely free.
   </div>.
</div>

<div style="padding: 120px 0 0 0;">
   <div id="message" class="notification warning" style="width: 510px; margin: 0 auto;">
      <p id='message_text'>
         <b>To get started, type in your school's email address, then click 'register'.</b> 
      </p>
   </div>
</div>

<div id="form" style="margin: 10px auto 20px auto; width: 480px;"> 
<form class="form" id="reg_email" action="register.php?check-email" method="post">
   <table border="0">
   <tr>
      <td valign="top">
         <input type="text" name="email" id="email" style="width: 350px;"/>
      </td>
      <td class="button_col" valign="top">
         <button type="submit" class="button"></button>
      </td>
   </tr>
   </table>
</form>
</div>

<div id="form_next" style="display: none;">
<form id="reg_password" class="form" action="register.php?create" method="post">
	<table border="0">
		<tr>
			<td>
				<input type="hidden" id="email" name="email" value="" />
				<input type="password" id="pw" name="pw" style="width: 160px;" />
				<input type="password" id="confirm" name="confirm" style="width: 160px;" />
			</td>
			<td class="button_col" valign="top">
				<button type="submit" class="button"></button>
			</td>
		</tr>
	</table>
</form>
</div>

<div style="margin: 0px auto 0 auto; width: 747px; padding-top: 0px;">
   <img src="resources/img/bar.png" border="0" />
</div>

<div style="margin: -70px auto 0 auto; width: 750px;">
   <div class="infobox" style="position: absolute;">
      <img src="resources/img/mailsr.png" valign="top" style="margin-right: 15px;" /><b>A simple way to find books.</b><br />
      <div style="margin: 3px 0 0 32px;">Circulous asks for you .edu email address so it can find people at your school who are also looking to buy and sell. The result? A simple and effective way to match you with someone else on campus for a book exchange. Nice.</div>
   </div>

   <div class="infobox" style="position: absolute; margin-top: 135px; padding-bottom: 20px;">
      <img src="resources/img/check.png" valign="top" style="margin-right: 15px" /><b>Safer.</b><br />
      <div style="margin: 3px 0 0 32px;">Because you're dealing with students in your school, you can perform an exchange on your campus; avoiding middle-man shipping and payment gateways, and perform inspections before you buy.</div>
   </div>

   <div class="infobox" style="position: absolute; margin-left: 400px;">
      <img src="resources/img/moneyp.png" valign="top" style="margin-right: 15px;" /><b>How does it all work?</b><br />
      <div style="margin: 3px 0 0 32px;">To sell your books, just list the condition and offer a price. We'll take care of the rest by promoting your listing to potential buyers.</div>
   </div>

   <div class="infobox" style="position: absolute; margin: 100px 0 0 400px;">
      <img src="resources/img/moneyc.png" valign="top" style="margin-right: 15px;" /><b>Buying is just as easy.</b><br />
      <div style="margin: 3px 0 0 32px;">Tell us the book you want at the price you're looking for. Then we'll show you what's available. If you don't find what you want, we'll be sure to send you an email when we find your match.</div>
	</div>
</div>

<?php include 'include/footer.php'; ?>