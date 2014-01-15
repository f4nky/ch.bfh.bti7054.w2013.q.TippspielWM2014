<?php
/**
* Controller für die Statistik-Seite.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class StatisticsController extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleLogin();
	}

	/**
	 * Lädt die Default-View.
	 */
	public function loadView() {
		$this->view->title = 'Statistik';
		$this->view->render('statistics/statisticsView');
	}
}