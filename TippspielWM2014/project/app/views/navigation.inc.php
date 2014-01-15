<?php
$page = (isset($_GET['url'])) ? $_GET['url'] : null;
?>
<ul>
	<li><a href="<?php echo SITE_PATH; ?>" title="Home" <?php echo ($page == null) ? 'class="curItem"' : ''; ?>>Home</a></li>
	<?php if (Session::get('loggedIn')) { ?>
		<li><a href="bets" title="Meine Tipps" <?php echo ($page == 'bets') ? 'class="curItem"' : ''; ?>>Meine Tipps</a></li>
		<li><a href="ranking" title="Rangliste" <?php echo ($page == 'ranking') ? 'class="curItem"' : ''; ?>>Rangliste</a></li>
		<li><a href="statistics" title="Statistik" <?php echo ($page == 'statistics') ? 'class="curItem"' : ''; ?>>Statistik</a></li>
		<li><a href="rules" title="Regeln" <?php echo ($page == 'rules') ? 'class="curItem"' : ''; ?>>Spielregeln</a></li>
		<?php if ((Session::get('role') == 'admin') || (Session::get('role') == 'owner')) { ?>
			<li><a href="adminPlayer" title="Administration" <?php echo ($page == 'admin') ? 'class="curItem"' : ''; ?>>Administration</a></li>
		<?php } ?>
	<?php } else { ?>
		<li><a href="register" title="Registrierung" <?php echo ($page == 'register') ? 'class="curItem"' : ''; ?>>Registrierung</a></li>
	<?php } ?>
</ul>