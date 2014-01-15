<?php
/**
* Controller für die Spielregeln-Seite.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class RulesController extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleLogin();
	}

	/**
	 * Lädt die Default-View.
	 */
	public function loadView() {
		$this->view->title = 'Spielregeln';
		$this->view->render('rules/rulesView');
	}
}