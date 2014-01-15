<h1>Meine Tipps</h1>
<form action="<?php echo SITE_PATH; ?>bets/saveAll" method="post">
	<?php include_once('generalBets.inc.php'); ?>
	<input type="submit" name="btnSaveAll1" value="alle Tipps speichern" />
	<?php include_once('matchBets.inc.php'); ?>
	<input type="submit" name="btnSaveAll2" value="alle Tipps speichern" />
</form>