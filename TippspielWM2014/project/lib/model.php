<?php
/**
* Haupt-Model-Klasse. Datenbankinstanz wird initialisiert.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class Model {
	
	public function __construct() {
		$this->db = new Database();
	}
}