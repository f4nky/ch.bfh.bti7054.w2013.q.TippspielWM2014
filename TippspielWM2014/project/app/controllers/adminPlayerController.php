<?php
/**
* Controller für die Verwaltung der Teilnehmer
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class AdminPlayerController extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleAdminLogin();
	}

	/**
	 * Holt die Daten und lädt die Default-View.
	 */
	public function loadView() {
		$this->view->title = 'Admin Teilnehmer';
		$this->view->data = $this->getplayers();
		$this->view->render('admin/adminPlayerView');
	}

	/**
	 * Holt die Daten.
	 */
	public function getPlayers() {
		return $this->model->getPlayers();
	}

	/**
	 * Ruft die Aktivierungsmethode auf.
	 */
	public function enablePlayer($playerId) {
		$this->model->enablePlayer($playerId);
		header('Location: ' . SITE_PATH . 'adminPlayer');
	}

	/**
	 * Ruft die Methode zum Setzen eines Init-Passwortes auf.
	 */
	public function setInitPwd($playerId) {
		$this->model->setInitPwd($playerId);
		header('Location: ' . SITE_PATH . 'adminPlayer');
	}
}