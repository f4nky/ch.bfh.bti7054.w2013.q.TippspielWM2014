<section class="box">
	<section class="title">Rang<span>liste</span></section>
	<section class="content">
		<table>
			<colgroup>
				<col width="10%">
				<col width="80%">
				<col width="10%">
			</colgroup>
			<thead>
				<tr>
					<th>#</th>
					<th>Teilnehmer</th>
					<th>Pkt.</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($this->data as $row) {
					echo ($row['p_id'] == Session::get('playerId')) ? "<tr class='curItem'>" : "<tr>";
					echo "		<td>{$row['rank']}.</td>";
					echo "		<td>{$row['pname']}</td>";
					echo "		<td class='right'>{$row['points']}</td>";
					echo "	</tr>";
				}
				?>
				<!--<tr><td>15.</td><td>Raphael</td><td>30</td></tr>
				<tr><td>16.</td><td>Andy</td><td>25</td></tr>
				<tr class="curItem"><td>17.</td><td>Fanky</td><td>23</td></tr>
				<tr><td>18.</td><td>Chrigu</td><td>22</td></tr>
				<tr><td>19.</td><td>Sara</td><td>19</td></tr>-->
			</tbody>
		</table><br />
		<a href="ranking">&raquo; Gesamtrangliste</a>
	</section>
</section>