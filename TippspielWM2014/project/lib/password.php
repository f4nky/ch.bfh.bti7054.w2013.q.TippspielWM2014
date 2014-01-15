<?php
/**
* Generiert und überprüft einen Passwort-Hash (Blowfish Algorithmus).
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class Password {
	// Erlaubte Zeichen zum Generieren des zufälligen Salt
    const SALTCHARS = './0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	// Zu verwendenden Algorithmus
	const ALGO = '$2a$'; // Blowfish
	// Anzahl Durchgänge zum Generieren des Hashes
	const COST = 12;
	
	/**
	* Generiert aus dem Benutzerpasswort und einem zufälligen Salt einen Hash
	*
	* @param	string 	$pwd 	Benutzerpasswort
	* @param	int 	$cost	Anzahl Durchgänge
	* @return	string			Hashwert
	*/
	public static function hash($pwd, $cost = self::COST) {
		$rdmSalt = self::getRandomSalt();
		$salt = self::ALGO . $cost .'$'. $rdmSalt;
		$hash = crypt($pwd, $salt);
		return $hash;
	}
	
	/**
	* Überprüft Passwort und Hashwert auf Gleichheit.
	*
	* @param	string	$pwd	Benutzerpasswort
	* @param	string	$hash	Hashwert des Passwortes
	* @return	boolean			true, wenn identisch
	*/
	public static function check($pwd, $hash) {
		$tmpHash = crypt($pwd, $hash);
		return ($tmpHash == $hash);		
	}
	
	/**
	* Generiert ein zufälliges 22-stelliges Salt auf Basis der erlaubten Zeichen
	* A-Za-z0-9./
	*
	* @return	string			22-stelliges Salt
	*/
	private static function getRandomSalt() {
		$salt = '';
		for ($i = 0; $i <= 21; $i++) {
			$tmpStr = str_shuffle(self::SALTCHARS);
			$salt .= $tmpStr[0];
		}
		return $salt;
	}
}
?>