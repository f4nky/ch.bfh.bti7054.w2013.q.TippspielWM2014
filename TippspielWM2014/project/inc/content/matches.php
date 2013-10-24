<?php
include_once('classes/MatchSchedule.php');
$matchSchedule = new MatchSchedule();
?>
					<h1>Meine Tipps</h1>
					<?php $matchSchedule->showMatchesByGroup(); ?>
					
<!--					<h1>Meine Tipps</h1>
					<h2>Allgemeine Tipps</h2>
					<table>
						<thead>
							<th>Kategorie</th>
							<th>Weltmeister</th>
							<th>Torschützenkönig</th>
							<th>Anz. Tore</th>
							<th>Anz. gelbe K.</th>
							<th>Anz. rote K.</th>
						</thead>
						<tbody>
							<tr>
								<td>Tipp</td>
								<td>
									<select>
										<option>Argentinien</option>
										<option>Brasilien</option>
										<option>Deutschland</option>
										<option>Schweiz</option>
									</select>
								</td>
								<td><input type="text" size="30" /></td>
								<td><input type="text" size="3" /></td>
								<td><input type="text" size="3" /></td>
								<td><input type="text" size="3" /></td>
							</tr>
							<tr>
								<td>Resultat</td>
								<td>
									<select>
										<option>Argentinien</option>
										<option>Brasilien</option>
										<option>Deutschland</option>
										<option>Schweiz</option>
									</select>
								</td>
								<td><input type="text" size="30" /></td>
								<td><input type="text" size="3" /></td>
								<td><input type="text" size="3" /></td>
								<td><input type="text" size="3" /></td>
							</tr>
						</tbody>
					</table>
					<h2>Gruppe A</h2>
					<table>
						<colgroup>
							<col width="5%">
							<col width="13%">
							<col width="15%">
							<col width="23%">
							<col width="10%">
							<col width="23%">
							<col width="10%">
							<col width="*">
						</colgroup>
						<thead>
							<tr>
								<th>#</th>
								<th>Datum/Zeit</th>
								<th>Ort</th>
								<th colspan="3">Resultat</th>
								<th>Tipp</th>
								<th>Pkt</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>12.06. 22:00</td>
								<td>Sao Paolo</td>
								<td><img src="http://img.fifa.com/imgml/flags/s/bra.gif"> Brasilien</td>
								<td class="center"><input type="text" class="score" maxlength="2" value="2" /> : <input type="text" class="score" maxlength="2" value="1" /></td>
								<td><img src="http://img.fifa.com/imgml/flags/s/arg.gif"> Argentinien</td>
								<td class="center">2 : 1</td>
								<td class="right">5</td>
							</tr>
							<tr>
								<td>2</td>
								<td>13.06. 18:00</td>
								<td>Natal</td>
								<td><img src="http://img.fifa.com/imgml/flags/s/tch.gif"> Tschechien</td>
								<td class="center"><input type="text" class="score" maxlength="2" value="" /> : <input type="text" class="score" maxlength="2" value="" /></td>
								<td><img src="http://img.fifa.com/imgml/flags/s/sui.gif"> Schweiz</td>
								<td class="center"><input type="text" class="score" maxlength="2"/> : <input type="text" class="score" maxlength="2" /></td>
								<td class="right">-</td>
							</tr>
							<tr>
								<td>2</td>
								<td>13.06. 18:00</td>
								<td>Natal</td>
								<td><img src="http://img.fifa.com/imgml/flags/s/mex.gif"> Mexiko</td>
								<td class="center"><input type="text" class="score" maxlength="2" value="" /> : <input type="text" class="score" maxlength="2" value="" /></td>
								<td><img src="http://img.fifa.com/imgml/flags/s/fra.gif"> Frankreich</td>
								<td class="center"><input type="text" class="score" maxlength="2"/> : <input type="text" class="score" maxlength="2" /></td>
								<td class="right">-</td>
							</tr>
							<tr>
								<td>2</td>
								<td>13.06. 18:00</td>
								<td>Natal</td>
								<td>A3</td>
								<td class="center"><input type="text" class="score" maxlength="2" value="" /> : <input type="text" class="score" maxlength="2" value="" /></td>
								<td>A4</td>
								<td class="center"><input type="text" class="score" maxlength="2"/> : <input type="text" class="score" maxlength="2" /></td>
								<td class="right">-</td>
							</tr>
							<tr>
								<td>2</td>
								<td>13.06. 18:00</td>
								<td>Natal</td>
								<td>A3</td>
								<td class="center"><input type="text" class="score" maxlength="2" value="" /> : <input type="text" class="score" maxlength="2" value="" /></td>
								<td>A4</td>
								<td class="center"><input type="text" class="score" maxlength="2"/> : <input type="text" class="score" maxlength="2" /></td>
								<td class="right">-</td>
							</tr>
							<tr>
								<td>2</td>
								<td>13.06. 18:00</td>
								<td>Natal</td>
								<td>A3</td>
								<td class="center"><input type="text" class="score" maxlength="2" value="" /> : <input type="text" class="score" maxlength="2" value="" /></td>
								<td>A4</td>
								<td class="center"><input type="text" class="score" maxlength="2"/> : <input type="text" class="score" maxlength="2" /></td>
								<td class="right">-</td>
							</tr>
						</tbody>
					</table>
					<h2>Gruppe B</h2>
					<table>
						<colgroup>
							<col width="5%">
							<col width="13%">
							<col width="15%">
							<col width="23%">
							<col width="10%">
							<col width="23%">
							<col width="10%">
							<col width="*">
						</colgroup>
						<thead>
							<tr>
								<th>#</th>
								<th>Datum/Zeit</th>
								<th>Ort</th>
								<th colspan="3">Resultat</th>
								<th>Tipp</th>
								<th>Pkt</th>
							</tr>
						</thead>
						<tbody>
								<tr>
								<td>1</td>
								<td>12.06. 22:00</td>
								<td>Sao Paolo</td>
								<td><img src="http://img.fifa.com/imgml/flags/s/tch.gif"> Tschechien</td>
								<td class="center">0 : 3</td>
								<td><img src="http://img.fifa.com/imgml/flags/s/sui.gif"> Schweiz</td>
								<td class="center">2 : 1</td>
								<td class="right">0</td>
							</tr>
							<tr>
								<td>2</td>
								<td>13.06. 18:00</td>
								<td>Natal</td>
								<td>A3</td>
								<td class="center">- : -</td>
								<td>A4</td>
								<td class="center">- : -</td>
								<td class="right">-</td>
							</tr>
							<tr>
								<td>2</td>
								<td>13.06. 18:00</td>
								<td>Natal</td>
								<td>A3</td>
								<td class="center">- : -</td>
								<td>A4</td>
								<td class="center">- : -</td>
								<td class="right">-</td>
							</tr>
							<tr>
								<td>2</td>
								<td>13.06. 18:00</td>
								<td>Natal</td>
								<td>A3</td>
								<td class="center">- : -</td>
								<td>A4</td>
								<td class="center">- : -</td>
								<td class="right">-</td>
							</tr>
							<tr>
								<td>2</td>
								<td>13.06. 18:00</td>
								<td>Natal</td>
								<td>A3</td>
								<td class="center">- : -</td>
								<td>A4</td>
								<td class="center">- : -</td>
								<td class="right">-</td>
							</tr>
							<tr>
								<td>2</td>
								<td>13.06. 18:00</td>
								<td>Natal</td>
								<td>A3</td>
								<td class="center">- : -</td>
								<td>A4</td>
								<td class="center">- : -</td>
								<td class="right">-</td>
							</tr>
						</tbody>
					</table>-->