<?php
/**
* Separiert und analysiert die einzelnen Teile der angeforderten URL
* und setzt wenn nötig Default-Werte.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class Request {

	private $reqVars;

	/**
	 * Analysiert die GET-Variable 'url', trennt die einzelnen Teile und
	 * teilt sie den entsprechenden Plätzen im Array zu. Sind die einzelnen Teile nicht gesetzt,
	 * so wird ein Defalt-Wert zugewiesen.
	 *
	 * Werden die Werte bereits als Parameter übergeben, wird ein Auslesen der GET-Variable verhindert
	 * und stattdessen der Controller aus dem Parameter-Array geladen. 
	 * 
	 * @param array $reqParam Array mit Angaben zu Controller, Methode und Parameter
	 */
	public function __construct($reqParam = null) {
		if (isset($reqParam)) {
			$this->reqVars['controller'] = (isset($reqParam['controller'])) ? $reqParam['controller'] : 'home';
			$this->reqVars['method'] = (isset($reqParam['method'])) ? $reqParam['method'] : 'loadView';
			$this->reqVars['param1'] = (isset($reqParam['param1'])) ? $reqParam['param1'] : null;
		} else {
			$url = isset($_GET['url']) ? $_GET['url'] : null;
			$url = rtrim($url, '/');
			$url = explode('/', $url);

			$this->reqVars['controller'] = ($part = array_shift($url)) ? $part : 'home';
			$this->reqVars['method'] = ($part = array_shift($url)) ? $part : 'loadView';
			$this->reqVars['param1'] = ($part = array_shift($url)) ? $part : null;
		}
	}

	/**
	 * Liefert die Angaben über Controller, Methode und Parameter zurück.
	 * @return array Array mit Angaben über Controller, Methode und Parameter
	 */
	public function getReqVars() {
		return $this->reqVars;
	}
}