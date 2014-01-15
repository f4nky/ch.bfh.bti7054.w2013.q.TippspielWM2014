<h1>Willkommen</h1>
<?php if (Session::get('loggedIn')) { ?>
<h2>Kurze Einleitung</h2>
<p>Folgende Seiten stehen dir zur Verf&uuml;gung:</p>
<table>
	<colgroup>
		<col width="20%">
		<col withd="*">
	</colgroup>
	<tbody>
		<tr>
			<td>Meine Tipps</td>
			<td>Eingabe der Match- und Spezialtipps, &Uuml;bersicht &uuml;ber die erhaltenen Punkte pro Tipp</td>
		<tr>
		<tr>
			<td>Rangliste</td>
			<td>Gesamtrangliste aller Teilnehmer, inkl. Anzahl korrekt abgegebener Tipps</td>
		<tr>
		<tr>
			<td>Statistik</td>
			<td>&Uuml;bersicht über aktuelle Anzahl Tore/Karten/bisher mögliche Punkte, Hochrechnung auf 64 Spiele</td>
		<tr>
		<tr>
			<td>Spielregeln</td>
			<td>Auflistung der Spielregeln, &Uuml;bersicht über Punktevergabe</td>
		<tr>
	</tbody>
</table>
<br />
<h2>Tipp</h2>
<p>Zu viele Daten auf einer Seite? Dann klicke auf die &Uuml;berschrift, um den darunterstehenden Bereich zuzuklappen.</p>
<br />
<p>Viel Spass und Erfolg beim Tippen.<br /><br/>
Liebe Gr&uuml;sse<br />
Fanky</p>
<?php } else { ?>
<h2>Bist du ein Fussball-Experte?</h2>
<p>Dann beweise es und mach mit beim Tippspiel für die Weltmeisterschaft 2014 in Brasilien.<br />
Nebst den ordentlichen Resultattipps, können auch Spezialtipps abgegeben werden (TopScorer, Anz. Tore, usw).<br /><br />
Da es sich um ein Tippspiel im privaten Rahmen handelt, muss der Account nach der Registierung von einem Administrator freigeschaltet werden.<br /><br />
Nun w&uuml;nsch ich euch viel Erfolg.<br /><br />
Liebe Grüsse<br/>
Fanky</p>
<?php } ?>