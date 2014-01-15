<section class="box">
	<section class="title">Log<span>in</span></section>
	<section class="content">
		<form action="<?php echo SITE_PATH; ?>account/login" method="post">
			<label for="email">E-Mail</label>
			<input type="email" name="txtUser" id="email" size="25" required oninvalid="this.setCustomValidity('Bitte gültige E-Mail-Adresse angeben')"/>
			<label for="pwd">Passwort</label>
			<input type="password" name="txtPwd" id="pwd" size="25"  required oninvalid="this.setCustomValidity('Bitte Passwort angeben')"/>
			<input type="submit" name="btnLogin" value="login" />
		</form>
		<div id="errMsg">
		<?php if (!empty($this->errMsg)) {
			echo $errMsg;
		}?>
		</div>
		<a href="register">&raquo; Registrieren</a>	
	</section>
</section>