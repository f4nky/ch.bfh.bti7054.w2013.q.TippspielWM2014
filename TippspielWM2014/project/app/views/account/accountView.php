<h1>Profil bearbeiten</h1>
<h2>Profil</h2>
<form action="<?php echo SITE_PATH; ?>account/saveAccountInfos" method="post">
	<div id="errMsg" <?php echo (empty($this->errMsg)) ? 'style="display: none;"' : ''; ?>>
	<?php if (!empty($this->errMsg)) {
		echo $this->errMsg;
	}?>
	</div>
	<table class="layout">
		<colgroup>
			<col width="18%">
			<col width="25%">
			<col width="*">
		</colgroup>
		<thead>
			<th colspan="3">Pers&ouml;nliche Angaben</th>
		</thead>
		<tbody>
			<tr>
				<td><label for="firstName">Vorname*</label></td>
				<td><input type="text" name="txtFirstName" id="firstName" size="30" value="<?php echo (isset($this->formData['txtFirstName'])) ? $this->formData['txtFirstName'] : $this->data['firstName']; ?>" required pattern="[a-zA-Z]{2,}" oninvalid="this.setCustomValidity('Bitte Vornamen angegeben (mind. 2 Zeichen)')"/></td>
				<td></td>
			</tr>
			<tr>
				<td><label for="lastName">Nachname*</label></td>
				<td><input type="text" name="txtLastName" id="lastName" size="30" value="<?php echo (isset($this->formData['txtLastName'])) ? $this->formData['txtLastName'] : $this->data['lastName']; ?>" required pattern="[a-zA-Z]{2,}" oninvalid="this.setCustomValidity('Bitte Nachname angegeben (mind. 2 Zeichen)')"/></td>
				<td></td>
			</tr>
			<tr>
				<td><label for="nick">Nickname</label></td>
				<td><input type="text" name="txtNick" id="nick" size="30" value="<?php echo (isset($this->formData['txtNick'])) ? $this->formData['txtNick'] : $this->data['nickname']; ?>" pattern=".{2,}" oninvalid="this.setCustomValidity('Nickname muss mind. 2 Zeichen lang sein')"/></td>
				<td>(wenn angegeben, wird dieser als Anzeigename verwendet)</td>
			</tr>
			<tr>
				<td><label for="mobile">Mobile</label></td>
				<td><input type="text" name="txtMobile" id="mobile" size="30" value="<?php echo (isset($this->formData['txtMobile'])) ? $this->formData['txtMobile'] : $this->data['mobile']; ?>" pattern="[0-9]{10,13}" oninvalid="this.setCustomValidity('Bitte gültige Mobile-Nr. angeben')"/></td>
				<td>Format: 0791234567</td>
			</tr>
		</tbody>
	</table>
	<br />
	<table class="layout">
		<colgroup>
			<col width="18%">
			<col width="20%">
			<col width="*">
		</colgroup>
		<thead>
			<th colspan="3">Login</th>
		</thead>
		<tbody>
			<tr class="meta">
				<td><label for="email_">E-Mail (dieses Feld ZWINGEND leer lassen!)*</label></td>
				<td><input type="text" name="txtEmail_" id="email_" size="30" /></td>
				<td></td>
			</tr>
			<tr>
				<td><label for="email">E-Mail*</label></td>
				<td><input type="email" name="txtEmail" id="email" size="30" value="<?php echo (isset($this->formData['txtEmail'])) ? $this->formData['txtEmail'] : $this->data['email']; ?>" required oninvalid="this.setCustomValidity('Bitte gültige E-Mail-Adresse angegeben')"/></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<input type="submit" name="btnSaveAccount" value="speichern" />
</form>
<br />
<h2>Passwort</h2>
<form action="<?php echo SITE_PATH; ?>account/saveNewPassword" method="post">
	<table class="layout">
		<colgroup>
			<col width="18%">
			<col width="20%">
			<col width="*">
		</colgroup>
		<thead>
			<th colspan="3">Neues Passwort</th>
		</thead>
		<tbody>
			<tr>
				<td><label for="pwd">Passwort</label></td>
				<td><input type="password" name="txtPwd" id="pwd" size="30" required pattern=".{8,}" oninvalid="this.setCustomValidity('Bitte Passwort angeben')"/></td>
				<td>mind. 8 Zeichen lang</td>
			</tr>
			<tr>
				<td><label for="pwdConfirm">Passwort wiederholen</label></td>
				<td><input type="password" name="txtPwdConfirm" id="pwdConfirm" size="30" required pattern=".{8,}" oninvalid="this.setCustomValidity('Bitte Passwort angeben')" /></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<input type="submit" name="btnSavePassword" value="passwort speichern" />
</form>




