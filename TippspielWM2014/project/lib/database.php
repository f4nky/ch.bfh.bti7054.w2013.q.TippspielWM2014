<?php
/**
* Stellt die Verbindung zur Datenbank her und setzt den Zeichensatz auf UTF-8.
* Die Methoden des mysqli-Frameworks werden nicht überladen, sondern über das
* Datenbank-Objekt direkt aufgerufen.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class Database extends mysqli {

	public function __construct() {
		parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$this->query('SET NAMES "utf8";');
	}

	public function __destruct() {
		parent::close();
	}
}