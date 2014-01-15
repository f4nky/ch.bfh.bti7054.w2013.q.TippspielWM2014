<h1>Resultate eintragen</h1>
<form action="adminResult/saveAll" method="post">
	<?php include_once('generalResults.inc.php'); ?>
	<input type="submit" name="btnSaveAll1" value="alle Resultate speichern" />
	<?php include_once('matchResults.inc.php'); ?>
	<input type="submit" name="btnSaveAll2" value="alle Resultate speichern" />
</form>