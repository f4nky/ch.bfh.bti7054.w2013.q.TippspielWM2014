<?php
/**
* Bietet Methoden zum Lesen und Setzen von Werten in einer Session an.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class Session {

	public static function init() {
		@session_start();
	}

	/**
	 * Speichert einen Wert in die Session.
	 * 
	 * @param string $key   Key unter welchem der Wert in der Session abgelegt wird
	 * @param string $value Value, welcher im Key gespeichert wird
	 */
	public static function set($key, $value) {
		$_SESSION[$key] = $value;
	}

	/**
	 * Liest den Wert anhand des Keys aus.
	 * 
	 * @param  string $key Key, dessen Wert ausgelesen werden soll
	 * @return mixed       Wert des Keys
	 */
	public static function get($key) {
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];			
		}
	}

	/**
	 * Zerstört Session.
	 */
	public static function destroy() {
		session_destroy();
	}
}