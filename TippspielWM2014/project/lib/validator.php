<?php
/**
* Bietet Methoden zum Validieren von entsprechenden Formularfeldern an.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class Validator {

	public function __construct() {

	}

	/**
	 * Validiert ein Fomularfeld, das Namen enthalten soll.
	 * 
	 * @param  string $name Name des Formularfeldes
	 * @return bool         Status der Validierung
	 */
	public static function validateName($name) {
		if (!empty($name)) {
			if (preg_match('/^[a-z0-9 ]{3,}$/i', $name)) {
				return true;
			}
		}
		return false;
	}
	
	/**
	 * Validiert ein Fomularfeld, das den Nicknamen enthalten soll.
	 * 
	 * @param  string $name Name des Formularfeldes
	 * @return bool         Status der Validierung
	 */
	public static function validateNickname($nickname) {
		if (!empty($nickname)) {
			if (preg_match('/^[\w ]{3,}$/', $nickname)) {
				return true;
			} else {
				return false;
			}
		}
		return true;
	}
	
	/**
	 * Validiert ein Fomularfeld, das Email-Adressen enthalten soll.
	 * 
	 * @param  string $name Name des Formularfeldes
	 * @return bool         Status der Validierung
	 */
	public static function validateEmail($email) {
		if (!empty($email)) {
			if (strlen($email) >= 8) {
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					return true;
				}
			}
		}
		return false;
	}
	
	/**
	 * Validiert ein Fomularfeld, das ein Passwort enthalten soll.
	 * 
	 * @param  string $name Name des Formularfeldes
	 * @return bool         Status der Validierung
	 */
	public static function validatePwd($pwd, $pwdConf) {
		if (!empty($pwd)) {
			if (preg_match('/^[\w\W]{8,}$/', $pwd)) {
				if ($pwd == $pwdConf) {
					return true;
				}
			}
		}
		return false;
	}
}
