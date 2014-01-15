<h1>Rangliste</h1>
<h2>&Uuml;bersicht</h2>
<table>
	<colgroup>
		<col width='5%'>
		<col width='75%'>
		<col width='10%'>
		<col width='10%'>
	</colgroup>
	<thead>
		<tr>
			<th>#</th>
			<th>Teilnehmer</th>
			<th class='right'>Pkt.</th>
			<th class='right'>richtige Tipps</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($this->data as $row) {
			echo ($row['p_id'] == Session::get('playerId')) ? "<tr class='curItem'>" : "<tr>";
			echo "		<td>{$row['rank']}.</td>";
			echo "		<td>{$row['pname']}</td>";
			echo "		<td class='right'>{$row['points']}</td>";
			echo "		<td class='right'>{$row['correctBets']}</td>";
			echo "	</tr>";
		}
		?>
	</tbody>
</table>
<br />
<h2>Chart</h2>
<div id="chart">
	<script type="text/javascript">
		showJqPlotChart(<?php echo $this->dataChart; ?>);
	</script>
</div>