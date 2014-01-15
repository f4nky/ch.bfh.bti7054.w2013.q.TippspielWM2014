<?php
class AdminPlayerModel extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function getPlayers() {
		$sqlQuery = 'SELECT p_id, lastName, firstName, nickname, email, mobile, disabled, r.roleName '.
					'FROM player p INNER JOIN role r ON (p.role_id = r.r_id) '.
					'ORDER BY r.r_id DESC, lastName, firstName;';
		$result = $this->db->query($sqlQuery);
		return $result;
	}

	public function enablePlayer($playerId) {
		$sqlQuery = 'UPDATE player SET disabled=false, updated=now() WHERE p_id=?;';
		$stmt = $this->db->prepare($sqlQuery);
		$stmt->bind_param('i', $playerId);
		$stmt->execute();
	}

	public function setInitPwd($playerId) {
		$pwordHash = INIT_PWD;
		$sqlQuery = 'UPDATE player SET pword=?, updated=now() WHERE p_id=?;';
		$stmt = $this->db->prepare($sqlQuery);
		$stmt->bind_param('si', $pwordHash, $playerId);
		$stmt->execute();
	}
}