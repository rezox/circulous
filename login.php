<?php include 'include/header.php'; ?>

<div id="horizon">
   <div id="center">
      <div style="margin: 20px auto -30px auto; width: 300px; text-align: center;">
         <img src="resources/img/logo.png" />
	      <div style="font-family: Lato; font-size: 16pt;">A new way to look for books.</div>
      </div>

      <div id="message" class="notification <?php if (isset($msg)) echo $msg['type']; else echo 'warning'; ?>" style="width: 460px; margin: 60px auto -25px auto;">
         <p id='message_text'>
            <b><?php if (isset($msg)) echo $msg['text']; else echo 'Please login to continue.'; ?></b> 
         </p>
      </div>

      <form class="form" action="login.php?process" method="POST" style="width: 560px; margin: 40px auto;">
	      <table border="0">
		      <tr>
			      <td valign="top">
				      <input type="text" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" style="width: 250px;"/>
				      <input type="password" id="password" name="password" style="width: 150px;" />
			      </td>
			      <td class="button_col" valign="top">
				      <button type="submit" class="button"></button>
			      </td>
		      </tr>
	      </table>
      </form>
   </div>
</div>

<?php include 'include/footer.php'; ?>
