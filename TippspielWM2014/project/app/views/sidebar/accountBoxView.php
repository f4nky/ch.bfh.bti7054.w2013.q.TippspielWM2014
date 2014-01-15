<section class="box">
	<section class="title">Pro<span>fil</span></section>
	<section class="content">
		Angemeldet als:<br/>
		<?php
			echo Session::get('name') . '&nbsp;(';
			echo (((Session::get('role') == 'admin') || (Session::get('role') == 'owner')) ? 'Admin' : 'Teilnehmer') . ')';
		?>
		<br /><br />
		<a href="account">&raquo; Profil/Passwort ändern</a><br />
		<a href="account/logout">&raquo; Logout</a>
	</section>
</section>