<?php include 'include/header.php'; ?>

<div style="margin: 20px auto -30px auto; width: 237px;">
   <img src="resources/img/logo.png" />
</div>

<div id="message" class="notification warning" style="width: 460px; margin: 60px auto -25px auto;">
   <p id='message_text'>
      <b>Please login to continue.</b> 
   </p>
</div>

<div id="formholder">
	<form>
		<ul class="formul">
			<li>
				<span class="intyp">
					Email
				</span>
				<input type="text" name="email" />
			</li>
			<li>
				<span class="intyp">
					Password
				</span>
				<input type="password" name="password" />
			</li>
			<li>
				<input type="submit" name="submit" value="Login" />
			</li>
		</ul>
	</form>
</div>

<?php include 'include/fooder.php'; ?>
