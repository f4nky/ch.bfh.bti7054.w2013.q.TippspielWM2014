<?php
class AdminResultModel extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function getGeneralResults() {
		$sqlQuery = 'SELECT * FROM generalResult;';
		$result = $this->db->query($sqlQuery);
		$row = $result->fetch_array();
		return $row;
	}
	
	public function getMatches() {
		$sqlQuery = 'SELECT * FROM qryAllMatches '.
					'LEFT JOIN (SELECT * FROM fbMatchBet WHERE player_id='. Session::get('playerId') .') AS fbmBet '.
					'ON (qryAllMatches.fbm_id = fbmBet.fbmatch_id) '.
					'ORDER BY ph_id, fbm_id';
		$result = $this->db->query($sqlQuery);
		return $result;
	}

	public function getTeamList() {
		$sqlQuery = 'SELECT t_id, teamName FROM team ORDER BY teamName';
		$result = $this->db->query($sqlQuery);
		return $result;
	}
	
	public function saveAll() {
		$this->saveMatchResults();
		$this->saveGeneralResults();
	}

	private function saveGeneralResults() {
		$worldChampion = empty($_POST['selWorldChampion'])? null : $_POST['selWorldChampion'];
		$topScorer = $_POST['txtTopScorer'];
		$nrOfGoals = empty($_POST['txtGoals']) ? null : $_POST['txtGoals'];
		$nrOfYellowCards = empty($_POST['txtYellowCards']) ? null : $_POST['txtYellowCards'];
		$nrOfRedCards = empty($_POST['txtRedCards']) ? null : $_POST['txtRedCards'];
		$playerId = Session::get('playerId');
		
		if (($worldChampion != '--') || !(empty($topScorer) || empty($nrOfGoals) || empty($nrOfYellowCards) || empty($nrOfRedCards))) {
			$sqlQuery = 'SELECT gr_id FROM generalResult;';
			$result = $this->db->query($sqlQuery);
			$row = $result->fetch_array();
			
			if ($this->db->affected_rows == 0) {
				$sqlQuery = 'INSERT INTO generalResult (worldChampion_id, topScorer, numberOfGoals, numberOfYellowCards, numberOfRedCards) VALUES
							(?, ?, ?, ?, ?);';
			} else {
				$sqlQuery = 'UPDATE generalResult SET worldChampion_id=?, topScorer=?, numberOfGoals=?, numberOfYellowCards=?, numberOfRedCards=?, updated=now() 
							 WHERE gr_id = ' . $row['gr_id'] . ';';
			}
			$stmt = $this->db->prepare($sqlQuery);
			$stmt->bind_param('ssiii', $worldChampion, $topScorer, $nrOfGoals, $nrOfYellowCards, $nrOfRedCards);
			$stmt->execute();
		}
	}

	private function saveMatchResults() {
		$scoreTeamHome = $_POST['txtScoreTeamHome'];
		$scoreTeamGuest = $_POST['txtScoreTeamGuest'];

		for ($i = 1; $i <= count($scoreTeamHome); $i++) {
			if (!(empty($scoreTeamHome[$i]) && empty($scoreTeamGuest[$i])) || (($scoreTeamHome[$i] === '0') || ($scoreTeamGuest[$i] === '0'))) {
				$sqlQuery = 'UPDATE fbmatch SET scoreTeamHome=?, scoreTeamGuest=?, updated=now() WHERE fbm_id=?;';
				$stmt = $this->db->prepare($sqlQuery);
				$stmt->bind_param('iii', $scoreTeamHome[$i], $scoreTeamGuest[$i], $i);
				$stmt->execute();
			} else {
				$sqlQuery = 'UPDATE fbmatch SET scoreTeamHome=null, scoreTeamGuest=null, updated=now() WHERE fbm_id=' . $i . ';';
				$this->db->query($sqlQuery);
			}
		}
	}


}