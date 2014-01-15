<?php
showMatchesByPhase($this->data['matches']);

function showMatchesByPhase($data) {
	$phaseTmp = '';
	
	foreach ($data as $row) {
		if ($row['phaseName'] != $phaseTmp) {
			if (!empty($phaseTmp)) {
				showTableFooter();
			}
			
			// print the headline (phase name) and table header
			echo "<h2>{$row['phaseName']}</h2>";
			showTableHeader($row['phaseName']);
			$phaseTmp = $row['phaseName'];
		}
		showTableData($row);			
	}
	showTableFooter();
}

/**
 * Shows the table header
 */
function showTableHeader($phaseName) {
?>
	<table>
		<colgroup>
			<col width='4%'>
			<col width='10%'>
			<col width='15%'>
			<col width='5%'>
			<col width='23%'>
			<col width='10%'>
			<col width='23%'>
			<!--<col width='10%'>
			<col width='*'>-->
		</colgroup>
		<thead>
			<tr>
				<th>#</th>
				<th>Datum/Zeit</th>
				<th>Ort</th>
				<?php echo ($phaseName == 'Gruppenphase') ? "<th>Grp</th>" : "<th></th>" ?>
				<th colspan='3'>Resultat</th>
				<!--<th>Tipp</th>
				<th>Pkt</th>-->
			</tr>
		</thead>
		<tbody>
<?php
}

function showTableData($row) {
	// print the necessary information for each match
	echo "<tr>";
	echo "	<td>{$row['fbm_id']}</td>";
	echo "	<td>". formatDate($row['matchDay']) ."&nbsp;{$row['matchTimeLocal']}</td>";
	echo "	<td>{$row['city']}</td>";
	echo ($row['phaseName'] == 'Gruppenphase') ? "	<td>{$row['groupName']}</td>" : "	<td></td>";
	echo "	<td>". getTeamFlag($row['teamHomeCC']) . (($row['scoreTeamHome'] > $row['scoreTeamGuest']) ? " <strong>{$row['teamNameHome']}</strong></td>" : " {$row['teamNameHome']}</td>");
	echo "	<td><input type='text' name='txtScoreTeamHome[{$row['fbm_id']}]' size='1' value='{$row['scoreTeamHome']}' class='score' pattern='\d+' min='1' max='999' oninvalid='this.setCustomValidity(&quot;Bitte Zahl zwischen 1 und 999 angeben&quot;)'/> : <input type='text' name='txtScoreTeamGuest[{$row['fbm_id']}]' size='1' value='{$row['scoreTeamGuest']}' class='score' pattern='\d+' min='1' max='999' oninvalid='this.setCustomValidity(&quot;Bitte Zahl zwischen 1 und 999 angeben&quot;)'/></td>";
	echo "	<td>". getTeamFlag($row['teamGuestCC']) . (($row['scoreTeamHome'] < $row['scoreTeamGuest']) ? " <strong>{$row['teamNameGuest']}</strong></td>" : " {$row['teamNameGuest']}</td>");
	echo "</tr>";
}
	
/**
 * Shows the table footer
 */
function showTableFooter() {
	echo "	</tbody>";
	echo "</table>";
}

/**
 * Returns the image tag for the corresponding team flag
 */
function getTeamFlag($countryCode) {
	if (!empty($countryCode)) {
		return "<img src='http://img.fifa.com/imgml/flags/s/{$countryCode}.gif' title='{$countryCode}' />";
	}
}

/**
 * Returns the match day as a formated date
 */
function formatDate($matchDay) {
	return date("d.m.", strtotime($matchDay));
}