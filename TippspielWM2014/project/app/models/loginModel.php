<?php
/**
* Model fürs Login der Teilnehmer.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class LoginModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Prüft, ob das Login vorhanden und das Passwort korrekt ist und setzt die Session-Variablen. 
	 */
	public function login() {
		$errMsg = '';
		echo $_POST['txtUser'] . '<br />';
		
		$sqlQuery = 'SELECT * FROM player WHERE (email=?);';
		$stmt = $this->db->prepare($sqlQuery);
		$stmt->bind_param('s', $_POST['txtUser']);
		$stmt->execute();
		$result = $stmt->fetch_object();
		
		echo '<br />err: '.$stmt->error;
		echo '<br />rows: '.$this->db->affected_rows;
		
		if ($this->db->affected_rows > 0) {
			$row = $result->fetch_object();
			
			echo '<br />pword: ' . $row['pword'];
			echo '<br />check: ' . Password::check($_POST['txtPwd'], $row['pword']);
			
			if (!($row['disabled'])) {
				if (Password::check($_POST['txtPwd'], $row['pword'])) {
					Session::init();
					Session::set('loggedIn', true);
					Session::set('role', $row['role']);
					Session::set('name', ((isset($row['nickname'])) ? $row['nickname'] : $row['lastName'] . ' ' . $row['firstName']));
					Session::set('dateBetPaid', $row['dateBetPaid']);
				} else {
					throw new Exception('Passwort falsch.');
				}
			} else {
				throw new Exception('Account gesperrt. Bitte an Administrator wenden.');
			}
		} else {
			throw new Exception('Kein Account mit dieser E-Mail-Adresse vorhanden.');
		}
	}
}