<?php
/**
* Haupt-View-Klasse. Lädt das entsprechende Template.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class View {
	
	public function __construct() {
		
	}

	/**
	 * Lädt Template
	 * 
	 * @param  string  $name     Name der Template
	 * @param  boolean $viewOnly Lädt Template ohne Header und Footer, wenn true
	 */
	public function render($name, $viewOnly = false) {
		if ($viewOnly) {
			require_once('app/views/' . $name . '.php');
		} else {
			ob_start();
			require_once('app/views/header.inc.php');
			require_once('app/views/' . $name . '.php');
			require_once('app/views/footer.inc.php');
		}		
	}
}