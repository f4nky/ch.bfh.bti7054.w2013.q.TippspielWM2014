<h1>Admin Teilnehmer</h1>
<h2>Teilnehmer</h2>
<form action="" method="post">
	<h3>Standard</h3>
	<table>
		<colgroup>
			<col width="6%">
			<col width="20%">
			<col width="20%">
			<col width="20%">
			<col width="15%">
			<col width="*">
		</colgroup>
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Nickname</th>
				<th>E-Mail</th>				
				<th>Mobile</th>
				<th>Funktion</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($this->data as $row) {
				echo ($row['disabled']) ? "<tr class='disabled'>" : "<tr>";
				echo "	<td>";
				echo ($row['disabled']) ? "<a href='" . SITE_PATH . "adminPlayer/enablePlayer/{$row['p_id']}'><img src='public/img/disabled.png' title='gesperrt' /></a>" : "";
				echo (($row['roleName'] == 'admin') | ($row['roleName'] == 'owner')) ? "<img src='public/img/admin.png' title='Administrator' />" : "";
				echo "	</td>";
				echo "	<td>{$row['lastName']} {$row['firstName']}</td>";
				echo "	<td>{$row['nickname']}</td>";
				echo "	<td><a href='mailto:{$row['email']}'>{$row['email']}</a></td>";
				echo "	<td>{$row['mobile']}</td>";
				echo "	<td><a href='" . SITE_PATH . "adminPlayer/setInitPwd/{$row['p_id']}'><img src='public/img/key.png' title='Init-Passwort setzen = &lsquo;TippspielWM2014&rsquo;' /></a></td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>