<?php
/**
* Haupt-Controller-Klasse. Instanziert die View und lädt das dazugehörige Model.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class Controller {

	public function __construct() {
		$this->view = new View();
	}

	/**
	 * Lädt und instanziert anhand des mitgeliefertem Modelnames das Model-Objekt.
	 * @param  string $name Name der Model-Klasse
	 */
	public function loadModel($name) {
		$modelName = $name . 'Model';
		$file = APP_PATH . 'models/' . $modelName . '.php';
		
		if (is_readable($file)) {
			require_once $file;
			$this->model = new $modelName();
		}
	}
}