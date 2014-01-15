<?php
/**
* Model für die Daten der Tipps.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class BetsModel extends Model {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Liest die allgemeinen Tipps des aktuellen Teilnehmers aus der Datenbank.
	 * 
	 * @return array Datensatz
	 */
	public function getGeneralBets() {
		$sqlQuery = 'SELECT * FROM generalBet gb INNER JOIN player p ON (gb.player_id = p.p_id) '.
					'WHERE p.p_id = "'. Session::get('playerId') .'";';
		$result = $this->db->query($sqlQuery);
		$row = $result->fetch_array();
		return $row;
	}

	/**
	 * Liest die Match-Tipps des aktuellen Teilnehmers aus der Datenbank.
	 * 
	 * @return Resultat Abfrage-Resultat
	 */
	public function getMatches() {
		$sqlQuery = 'SELECT * FROM qryAllMatches '.
					'LEFT JOIN (SELECT fbmatch_id, betTeamHome, betTeamGuest, score, corBet FROM qryMatchBetsPerUser WHERE player_id=1) AS mbpu '.
					'ON (qryAllMatches.fbm_id = mbpu.fbmatch_id) '.
					'ORDER BY ph_id, fbm_id';
		$result = $this->db->query($sqlQuery);
		return $result;
	}

	/**
	 * Liest alle Teams aus der Datenbank.
	 * 
	 * @return Resultat Abfrage-Resultat
	 */
	public function getTeamList() {
		$sqlQuery = 'SELECT t_id, teamName FROM team ORDER BY teamName';
		$result = $this->db->query($sqlQuery);
		return $result;
	}

	/**
	 * Liest pro Phase (Gruppenphase, Achtelfinal, usw.) die Anspielzeit des ersten Matches aus der Datenbank.
	 * 
	 * @return array Anspielzeiten der ersten Matches pro Phase
	 */
	public function getDateTimeFirstMatchesPerPhase() {
		$sqlQuery = 'SELECT phase_id, MIN(matchDay) AS matchDay, matchTimeLocal FROM fbmatch GROUP BY phase_id;';
		$result = $this->db->query($sqlQuery);

		foreach ($result as $row) {
			$dateTimeFirstMatches[$row['phase_id']]['matchDay'] = $row['matchDay'];
			$dateTimeFirstMatches[$row['phase_id']]['matchTimeLocal'] = $row['matchTimeLocal'];
		}
		return $dateTimeFirstMatches;
	}

	/**
	 * Ruft Methoden zum Speichern der allgemeinen sowie der Match-Tipps auf.
	 */
	public function saveAll() {
		$this->saveGeneralBets();
		$this->saveMatchBets();
	}

	/**
	 * Speichert die allgemeinen Tipps in der Datenbank.
	 */
	private function saveGeneralBets() {
		$worldChampion = empty($_POST['selWorldChampion'])? null : $_POST['selWorldChampion'];
		$topScorer = empty($_POST['txtTopScorer']) ? null : $_POST['txtTopScorer'];
		$nrOfGoals = empty($_POST['txtGoals']) ? null : $_POST['txtGoals'];
		$nrOfYellowCards = empty($_POST['txtYellowCards']) ? null : $_POST['txtYellowCards'];
		$nrOfRedCards = empty($_POST['txtRedCards']) ? null : $_POST['txtRedCards'];
		
		if (($worldChampion != '--') || !(empty($topScorer) || empty($nrOfGoals) || empty($nrOfYellowCards) || empty($nrOfRedCards))) {
			$sqlQuery = 'SELECT gb_id FROM generalBet gb INNER JOIN player p ON (gb.player_id = p.p_id) WHERE p.p_id = "'. $_SESSION['playerId'] .'";';
			$result = $this->db->query($sqlQuery);
			$row = $result->fetch_array();
			
			if ($this->db->affected_rows == 0) {
				$sqlQuery = 'INSERT INTO generalBet (player_id, worldChampion_id, topScorer, numberOfGoals, numberOfYellowCards, numberOfRedCards) VALUES
							((SELECT p_id FROM player WHERE email="'. $_SESSION['email'] .'"), ?, ?, ?, ?, ?);';
			} else {
				$sqlQuery = 'UPDATE generalBet SET worldChampion_id=?, topScorer=?, numberOfGoals=?, numberOfYellowCards=?, numberOfRedCards=?, updated=now()
							 WHERE gb_id = ' . $row['gb_id'] . ';';
			}
			$stmt = $this->db->prepare($sqlQuery);
			$stmt->bind_param('ssiii', $worldChampion, $topScorer, $nrOfGoals, $nrOfYellowCards, $nrOfRedCards);
			$stmt->execute();
		}
	}

	/**
	 * Speichert die Match-Tipps in der Datenbank.
	 */
	private function saveMatchBets() {
		$betTeamHome = $_POST['txtBetScoreTeamHome'];
		$betTeamGuest = $_POST['txtBetScoreTeamGuest'];
		
		for ($i = 1; $i <= 64; $i++) {
			$sqlQuery = 'SELECT fbmB_id FROM fbmatchbet WHERE fbmatch_id=' . $i . ' AND player_id=' . Session::get('playerId') . ';';
			$result = $this->db->query($sqlQuery);
			
			if (array_key_exists($i, $betTeamHome) && array_key_exists($i, $betTeamGuest)) {
				if (!(empty($betTeamHome[$i]) && empty($betTeamGuest[$i])) || (($betTeamHome[$i] === '0') || ($betTeamGuest[$i] === '0'))) {
					$playerId = Session::get('playerId');

					if ($this->db->affected_rows == 0) {
						$sqlQuery = 'INSERT INTO fbmatchbet (betTeamHome, betTeamGuest, fbmatch_id, player_id) VALUES (?, ?, ?, ?);';
					} else {
						$sqlQuery = 'UPDATE fbmatchbet SET betTeamHome=?, betTeamGuest=?, updated=now() WHERE fbmatch_id=? AND player_id=?;';
					}
					$stmt = $this->db->prepare($sqlQuery);
					$stmt->bind_param('iiii', $betTeamHome[$i], $betTeamGuest[$i], $i, $playerId);
					$stmt->execute();
				} else {
					if ($this->db->affected_rows > 0) {
						$sqlQuery = 'DELETE FROM fbmatchbet WHERE fbmatch_id=' . $i . ' AND player_id=' . Session::get('playerId') . ';';
						$this->db->query($sqlQuery);
					}
				}
			}
		}
	}
	}