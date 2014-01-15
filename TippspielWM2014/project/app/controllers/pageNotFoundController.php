<?php
/**
* Controller für die Fehler-Seite.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class PageNotFoundController extends Controller {

	public function __construct() {
		parent::__construct();
		Session::init();
	}

	/**
	 * Lädt die Default-View.
	 */
	public function loadView() {
		$this->view->title = 'Vertippt?';
		$this->view->render('error/pageNotFoundView');
	}
}