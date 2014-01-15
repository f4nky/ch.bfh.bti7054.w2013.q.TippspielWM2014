<?php
/**
* Entscheidet anhand der URL, welcher Controller geladen wird und ruft
* die dazugehörige Methode auf.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class Bootstrap {

	/**
	 * Holt die Werte für Controller, Methode und Parameter aus dem Request und prüft,
	 * ob generiert, bzw. aufgerufen werden können. Ist dies der Fall, wird der
	 * entsprechende Controller instanziert und mit der gewünschten Methode und dazugehörigem
	 * Parameter aufgerufen.
	 * 
	 * @param  Request $request Request-Objekt
	 */
	public static function load($request) {
		$reqVars = $request->getReqVars();
		$ctrlName = $reqVars['controller'] . 'Controller';
		$methodName = $reqVars['method'];
		$param1 = $reqVars['param1'];

		$file = 'app/controllers/' . $ctrlName . '.php';

		// Prüfen, ob gewünschter Controller vorhanden
		if (file_exists($file)) {
			// Controller-Datei laden
			require_once $file;

			// Controller instanzieren
			$ctrl = new $ctrlName();
			$ctrl->loadModel($reqVars['controller']);
			
			// Prüfen, ob Methode in dem Controller aufrufbar ist (dann existiert sie auch)
			$method = (is_callable(array($ctrl, $methodName)) ? $methodName : 'loadView');

			// Methode mit oder ohne Parameter aufrufen
			if (isset($param1)) {
				$ctrl->$methodName($param1);
			} else {
				$ctrl->$method();
			}
		} else {
			// keinen entsprechenden Controller gefunden, auf Fehlerseite weiterleiten
			require_once 'app/controllers/pageNotFoundController.php';
			$ctrl = new PageNotFoundController();
			$ctrl->loadView();
		}
	}
}