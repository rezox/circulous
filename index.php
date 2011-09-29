<?php include 'include/header.php'; ?>
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

<div id="form" style="margin: -10px auto 0 auto; width: 520px;"> 
<form id="emailForm" action="email-check.php" method="post">
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

<div style="margin: 0px auto 0 auto; width: 747px; padding-top: 0px;">
   <img src="resources/img/bar.png" border="0" />
</div>

<div style="margin: -70px auto 0 auto; width: 750px;">
   <div class="infobox" style="position: absolute;">
      <img src="resources/img/mailsr.png" style="margin-right: 15px;" /><b>A simple way to find the books you need.</b><br />
      <div style="margin: 3px 0 0 32px;">Circulous asks for you .edu email address so it can find people at your school who are also looking to buy and sell. The result? A simple and effective way to match you with someone else on campus for a book exchange. Nice.</div>
   </div>

   <div class="infobox" style="position: absolute; margin-top: 135px;">
      <img src="resources/img/check.png" style="margin-right: 15px" /><b>Safer.</b><br />
      <div style="margin: 3px 0 0 32px;">Because you're dealing with students in your school, you can perform an exchange on your campus; avoiding middle-man shipping and payment gateways, and perform inspections before you buy.</div>
   </div>

   <div class="infobox" style="position: absolute; margin-left: 400px;">
      <img src="resources/img/moneyp.png" style="margin-right: 15px;" /><b>How does it all work?</b><br />
      <div style="margin: 3px 0 0 32px;">To sell your books, just list the condition and offer a price. We'll take care of the rest by promoting your listing to potential buyers.</div>
   </div>

   <div class="infobox" style="position: absolute; margin: 100px 0 0 400px;">
      <img src="resources/img/moneyc.png" style="margin-right: 15px;" /><b>Buying is just as easy.</b><br />
      <div style="margin: 3px 0 0 32px;">Tell us the book you want at the price you're looking for. Then we'll show you what's available. If you don't find what you want, we'll be sure to send you an email when we find your match.</div>
	</div>
</div>

<?php include 'include/footer.php'; ?>
