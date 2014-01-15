<?php
/**
* Model für die Daten der Rangliste.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class RankingModel extends Model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Generiert die Rangliste in der Datenbank und liefert diese als Resultat zurück.
	 * Optional kann angegeben werden, welcher Bereich der Rangliste ausgelesen werden soll.
	 * 
	 * @param  int $from     Zeilennummer, ab wo die Rangliste ausgegeben werden soll
	 * @param  int $nrOfRows Anz. auszulesende Zeilen
	 * @return array         Array mit Abfrage-Resultat
	 */
	public function getRanking($from = null, $nrOfRows = null) {
		$sqlQuery = 'SELECT rank, p_id, pname, points, correctBets
					FROM (SELECT p_id, pname, points, correctBets, 
							IF((@prevValue <> points) OR ((@prevValue = points) AND (@prevBets <> correctBets)),
							   @curRank := @curRank + @nextRank,
							   @curRank) AS rank,
							IF((@prevValue = points) AND (@prevBets = correctBets),
							   @nextRank := @nextRank + 1,
							   @nextRank := 1),
							@prevValue := points,
							@prevBets := correctBets
						  FROM qryRanking, (SELECT @prevValue := 0, @prevBets := 0, @curRank := 0, @nextRank := 1) var
						  ORDER BY points DESC, correctBets DESC, pname) ranking
					ORDER BY points DESC, correctBets DESC, pname';
		if (!(empty($from) && empty($nrOfRows))) {
			$sqlQuery .= ' LIMIT ' . $from . ', ' . $nrOfRows;
		}
		$sqlQuery .= ';';
		$result = $this->db->query($sqlQuery);
		return $result;
	}

	/**
	 * Speichert die einzelnen Angaben der Rangliste in einem Array und codiert dieses
	 * in json-Format
	 * 
	 * @return array Angaben der Rangliste im json-Format
	 */
	public function getRankingForChart() {
		$result = $this->getRanking();

		foreach ($result as $row) {
			$data['points'][] = $row['points'];
			$data['correctBets'][] = $row['correctBets'];
			$data['players'][] = $row['pname'];
		}
		return json_encode($data, JSON_NUMERIC_CHECK);
	}

	/**
	 * Liest die gesamte Rangliste aus, sucht dort den aktuell angemeldeten Teilnehmer,
	 * und berechnet, von wo bis wo die Rangliste ein zweites Mal gelesen werden muss,
	 * um dem Teilnehmer eine Teilrangliste auszugeben.
	 *
	 * Die Rangliste soll den aktuellen Teilnehmer plus idealerweise die zwei Teilnehmer
	 * vor und nach ihm anzeigen. Somit sollen immer 5 Datensätze gelesen werden.
	 * 
	 * @return Resultat Abfrage-Resultat der Teil-Rangliste
	 */
	public function getPartialRanking() {
		// gesamte Rangliste auslesen
		$ranking = $this->getRanking()->fetch_all();
		$count = sizeof($ranking);
		$diffBefore = 2;
		$diffAfter = 2;


		// Prüfen, ob überhaupt 5 Einträge in der Rangliste vorhanden sind
		if ($count <= 5) {
			$from = 0;
		} else {
			// Rangliste durchlaufen und Keys zwischenspeichern
			foreach ($ranking as $key => $value) {
				$players[$key] = $value[1];
			}

			// in den Keys den aktuellen Teilnehmer suchen
			$rowNr = array_search(Session::get('playerId'), $players);
			
			// Berechnen, von welchem Datensatz an die Rangliste ausgelesen werden muss 
			if (($rowNr - 2) < 0) {
				$diffBefore = $rowNr;
			}
			if (($rowNr + 2) > ($count - 1)) {
				$diffAfter = ($rowNr + 2) - ($count - 1);
			}
			
			if ($diffBefore > $diffAfter) {
				$from = $rowNr - $diffBefore - $diffAfter;
			} else if ($diffBefore < $diffAfter) {
				$from = $rowNr - $diffBefore;
			} else {
				$from = $rowNr - 2;
			}
		}
		return $this->getRanking($from, 5);
	}
}