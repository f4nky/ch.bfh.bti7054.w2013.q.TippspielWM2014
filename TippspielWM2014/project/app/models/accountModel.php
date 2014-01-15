<?php
class AccountModel extends Model {
	
	private $_form;

	public function __construct() {
		parent::__construct();
	}
	
	public function login() {
		$errMsg = '';
		
		$sqlQuery = 'SELECT p_id, lastName, firstName, nickname, email, pword, dateBetPaid, disabled, r.roleName '.
					'FROM player p INNER JOIN role r ON (p.role_id = r.r_id) WHERE (email=?);';
		$stmt = $this->db->prepare($sqlQuery);
		$stmt->bind_param('s', $_POST['txtUser']);
		$stmt->execute();
		$result = $stmt->get_result();
		
		if ($this->db->affected_rows > 0) {
			$row = $result->fetch_array();
			
			if (!($row['disabled'])) {
				if (Password::check($_POST['txtPwd'], $row['pword'])) {
					Session::init();
					Session::set('loggedIn', true);
					Session::set('role', $row['roleName']);
					Session::set('playerId', $row['p_id']);
					Session::set('email', $row['email']);
					Session::set('name', ((isset($row['nickname']) && ($row['nickname'] != '')) ? $row['nickname'] : $row['lastName'] . ' ' . $row['firstName']));
					Session::set('dateBetPaid', $row['dateBetPaid']);
				}
			} else {
				throw new Exception('Account gesperrt. Bitte an Administrator wenden.');
			}
		} else {
			throw new Exception('Kein Account mit dieser E-Mail-Adresse vorhanden.');
		}
	}

	public function getAccountInfos() {
		$sqlQuery = 'SELECT * FROM player WHERE p_id = ' . Session::get('playerId') . ';';
		$result = $this->db->query($sqlQuery);
		$row = $result->fetch_array();
		return $row;
	}

	public function saveAccountInfos() {
		if ($this->validateInfos()) {
			if ($this->checkEmailAvailability($this->_form->getData('txtEmail'))) {
				$sqlQuery = 'UPDATE player SET firstName=?, lastName=?, nickname=?, mobile=?, email=?, updated=now() WHERE p_id = ' . Session::get('playerId') . ';';
				$stmt = $this->db->prepare($sqlQuery);
				$stmt->bind_param('sssss', $this->_form->getData('txtFirstName'), $this->_form->getData('txtLastName'), $this->_form->getData('txtNick'), $this->_form->getData('txtMobile'), $this->_form->getData('txtEmail'));
				$stmt->execute();
			} else {
				throw new Exception('E-Mail bereits vorhanden.');
			}
		} else {
			throw new Exception('Bitte &uuml;berpr&uuml;fe die Angaben.');
		}
	}

	public function saveNewPassword() {
		if ($this->validatePwd()) {
			$pwordHash = Password::hash($_POST['txtPwd']);
			$sqlQuery = 'UPDATE player SET pword=?, updated=now() WHERE p_id = ' . Session::get('playerId') . ';';
			$stmt = $this->db->prepare($sqlQuery);
			$stmt->bind_param('s', $pwordHash);
			$stmt->execute();
		} else {
			throw new Exception('Bitte &uuml;berpr&uuml;fe deine Passwort-Eingaben.');
		}		
	}

	private function validateInfos() {
		$this->_form = new Form();
		$this->_form->setData('txtLastName');
		$this->_form->setData('txtFirstName');
		$this->_form->setData('txtNick');
		$this->_form->setData('txtMobile');
		$this->_form->setData('txtEmail');

		return (Validator::validateName($this->_form->getData('txtLastName')) &&
				Validator::validateName($this->_form->getData('txtFirstName')) &&
				Validator::validateNickname($this->_form->getData('txtNick')) &&
				Validator::validateEmail($this->_form->getData('txtEmail')));
	}

	private function validatePwd() {
		if ($this->_form == null) {
			$this->_form = new Form();
		}
		$this->_form->setData('txtPwd');
		$this->_form->setData('txtPwdConfirm');
		return (Validator::validatePwd($this->_form->getData('txtPwd'), $this->_form->getData('txtPwdConfirm')));
	}

	/**
	* Prüft, ob die zu registrierende E-Mail-Adresse noch verfügbar ist.
	*/
	private function checkEmailAvailability($email) {
		$sqlQuery = 'SELECT email FROM player WHERE (email="'. $email . '") AND (p_id != ' . Session::get('playerId') . ');';
		$result = $this->db->query($sqlQuery);
		
		if ($this->db->affected_rows == 0) {
			return true;
		}
		return false;
	}

	public function getPostedData() {
		return $this->_form->getData();
	}
}