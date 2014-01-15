<?php
/**
* Model für die Registrierung.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class RegisterModel extends Model {

	private $_form;

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Überprüft die Eingaben und speichert den Teilnehmer in der Datenbank.
	 */
	public function registerPlayer() {
		if ($this->validateInput()) {
			echo 'input ok';
			if ($this->checkEmailAvailability($this->_form->getData('txtEmail'))) {
				$pwordHash = Password::hash($_POST['txtPwd']);
				
				$sqlQuery = 'INSERT INTO player (lastName, firstName, nickname, mobile, email, pword, disabled, playerGroup_id, role_id) VALUES (?, ?, ?, ?, ?, ?, true, 1, 1);';
				$stmt = $this->db->prepare($sqlQuery);
				$stmt->bind_param('ssssss', $this->_form->getData('txtLastName'), $this->_form->getData('txtFirstName'), $this->_form->getData('txtNick'), $this->_form->getData('txtMobile'), $this->_form->getData('txtEmail'), $pwordHash);
				$stmt->execute();
			} else {
				throw new Exception('E-Mail bereits vorhanden.');
			}
		} else {
			throw new Exception('Bitte &uuml;berpr&uuml;fe die Angaben.');
		}
	}
	
	/**
	 * Validiert die nötigen Formularfelder
	 * 
	 * @return boolean Status der Validierung
	 */
	private function validateInput() {
		$this->_form = new Form();
		$this->_form->setData('txtLastName');
		$this->_form->setData('txtFirstName');
		$this->_form->setData('txtNick');
		$this->_form->setData('txtMobile');
		$this->_form->setData('txtEmail');
		$this->_form->setData('txtPwd');
		$this->_form->setData('txtPwdConfirm');

		return (Validator::validateName($this->_form->getData('txtLastName')) &&
				Validator::validateName($this->_form->getData('txtFirstName')) &&
				Validator::validateNickname($this->_form->getData('txtNick')) &&
				Validator::validateEmail($this->_form->getData('txtEmail')) &&
				Validator::validatePwd($this->_form->getData('txtPwd'), $this->_form->getData('txtPwdConfirm')));
	}

	/**
	 * Prüft, ob die zu registrierende E-Mail-Adresse noch verfügbar ist.
	 * 
	 * @param  string $email zu prüfende E-Mail-Adresse
	 * @return boolean       true, wenn Adresse verfügbar
	 */
	private function checkEmailAvailability($email) {
		echo 'checkEmail';
		$sqlQuery = 'SELECT email FROM player WHERE email="'. $email . '";';
		$result = $this->db->query($sqlQuery);
		echo $this->db->affected_rows;
		
		if ($this->db->affected_rows == 0) {
			return true;
		}
		return false;
	}

	/**
	 * Zurückliefern der via POST übertragenen Daten.
	 * 
	 * @return array übertragene Daten
	 */
	public function getPostedData() {
		return $this->_form->getData();
	}
}