
<?php
showGeneralBets($this->data['generalBets'], $this->data['dateTimeFirstMatches'], $this->data['teamList']);

function showGeneralBets($data, $dateTimeFirstMatches, $dataTeamList) {
	$isEnabled = isInputEnabled($dateTimeFirstMatches[1]);
?>
<h2>Allgemeine Tipps</h2>
<table>
	<colgroup>
		<col width='22%'>
		<col width='22%'>
		<col width='15%'>
		<col width='15%'>
		<col width='15%'>
	</colgroup>
	<thead>
		<th>Weltmeister</th>
		<th>Torsch&uuml;tzenkönig</th>
		<th class='right'>Anz. Tore</th>
		<th class='right'>Anz. gelbe Karten</th>
		<th class='right'>Anz. rote Karten</th>
	</thead>
	<tbody>
		<td>
		<?php
		if (!isset($data['worldChampion_id'])) {
			showTeamsList($dataTeamList, -99, $isEnabled);
		} else {
			showTeamsList($dataTeamList, $data['worldChampion_id'], $isEnabled);
		}
		?>
		</td>
		</td>
		<td><input type='text' name='txtTopScorer' size='25' value="<?php echo $data['topScorer']; ?>" <?php echo ($isEnabled) ? '' : 'disabled' ?>/> </td>
		<td class='right'><input type='number' name='txtGoals' size='3' maxlength='3' value="<?php echo $data['numberOfGoals']; ?>" <?php echo ($isEnabled) ? '' : 'disabled' ?> pattern="\d+" min="0" max="999" oninvalid="this.setCustomValidity('Muss eine Zahl zwischen 1 und 999 sein')"/></td>
		<td class='right'><input type='number' name='txtYellowCards' size='3' maxlength='3' value="<?php echo $data['numberOfYellowCards']; ?>" <?php echo ($isEnabled) ? '' : 'disabled' ?> pattern="\d+" min="0" max="999" oninvalid="this.setCustomValidity('Muss eine Zahl zwischen 1 und 999 sein')"/></td>
		<td class='right'><input type='number' name='txtRedCards' size='3' maxlength='3' value="<?php echo $data['numberOfRedCards']; ?>" <?php echo ($isEnabled) ? '' : 'disabled' ?> pattern="\d+" min="0" max="999" oninvalid="this.setCustomValidity('Muss eine Zahl zwischen 1 und 999 sein')" />
		</td>
	</tbody>
</table>
<?php
}

function showTeamsList($data, $worldChampion_id, $isEnabled) {	
	echo ($isEnabled) ? "<select name='selWorldChampion'>" : "<select name='selWorldChampion' disabled>";
	
	foreach ($data as $row) {
		if ($row['t_id'] == $worldChampion_id) {
			echo "<option value='{$row['t_id']}' selected>{$row['teamName']}</option>";
		} else {
			echo "<option value='{$row['t_id']}'>{$row['teamName']}</option>";
		}
	}
	
	echo "</select>";
}

function isInputEnabled($dateTimeFirstMatch) {
	$matchTimestamp = strtotime($dateTimeFirstMatch['matchDay'] . ' ' . $dateTimeFirstMatch['matchTimeLocal']);
	$nowTimestamp = time();
	if ($nowTimestamp < $matchTimestamp) {
		return true;
	}
	return false;
}
?>