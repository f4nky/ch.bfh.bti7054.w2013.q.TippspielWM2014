<?php
showGeneralResults($this->data['generalResults'], $this->data['teamList']);

function showGeneralResults($data, $dataTeamList) {
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
			showTeamsList($dataTeamList, -99);
		} else {
			showTeamsList($dataTeamList, $data['worldChampion_id']);
		}
		?>
		</td>
		</td>
		<td><input type='text' name='txtTopScorer' size='25' value="<?php echo $data['topScorer']; ?>"/></td>
		<td class='right'><input type='number' name='txtGoals' size='3' maxlength='3' value="<?php echo $data['numberOfGoals']; ?>" pattern="\d+" min="1" max="999" oninvalid="this.setCustomValidity('Bitte Zahl zwischen 1 und 999 angeben')"/></td>
		<td class='right'><input type='number' name='txtYellowCards' size='3' maxlength='3' value="<?php echo $data['numberOfYellowCards']; ?>" pattern="\d+" min="1" max="999" oninvalid="this.setCustomValidity('Bitte Zahl zwischen 1 und 999 angeben')"/></td>
		<td class='right'><input type='number' name='txtRedCards' size='3' maxlength='3' value="<?php echo $data['numberOfRedCards']; ?>" pattern="\d+" min="1" max="999" oninvalid="this.setCustomValidity('Bitte Zahl zwischen 1 und 999 angeben')"/></td>
	</tbody>
</table>
<?php
}

function showTeamsList($data, $worldChampion_id) {	
	echo "<select name='selWorldChampion'>";
	
	foreach ($data as $row) {
		if ($row['t_id'] == $worldChampion_id) {
			echo "<option value='{$row['t_id']}' selected>{$row['teamName']}</option>";
		} else {
			echo "<option value='{$row['t_id']}'>{$row['teamName']}</option>";
		}
	}
	
	echo "</select>";
}
?>