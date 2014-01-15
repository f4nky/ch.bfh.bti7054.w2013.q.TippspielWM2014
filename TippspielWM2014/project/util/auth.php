<?php
/**
* Stellt Methoden zur Verfügung, die prüfen, ob der Besucher eingeloggt ist.
* Falls er eine Seite aufrufen will, die nur mit Login angezeigt wird, wird er
* auf die Fehlerseite weitergeleitet.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class Auth {

	/**
	 * Prüft, ob die Session-Variable 'loggedIn' gesetzt ist. Wenn nicht,
	 * wird geprüft, ob es sich um die Registierungsseite handelt (die muss ohne Login aufrufbar sein).
	 * Ist dies nicht der Fall, wird der Benutzer auf die Fehlerseite weitergeleitet.
	 */
	public static function handleLogin() {
		Session::init();
		if (!Session::get('loggedIn')) {
			Session::destroy();
			header('Location: ' . SITE_PATH . 'pageNotFound');
			exit;
		} else {
			if ((isset($_GET['url'])) && ($_GET['url'] == 'register')) {
				header('Location: ' . SITE_PATH . 'pageNotFound');
				exit;
			}
		}
	}

	/**
	 * Prüft, ob der Benutzer eingeloggt ist und wenn keine Admin-Rechte vorhanden sind, wird er
	 * auf die Fehlerseite weitergeleitet.
	 */
	public static function handleAdminLogin() {
		Session::init();
		if ((!Session::get('loggedIn')) || (Session::get('role') == 'default')) {
			header('Location: ' . SITE_PATH . 'pageNotFound');
			exit;
		}
	}
}