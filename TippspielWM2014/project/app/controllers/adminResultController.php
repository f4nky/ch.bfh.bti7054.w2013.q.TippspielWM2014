<?php
/**
* Controller für die Verwaltung der Resultate
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class AdminResultController extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleAdminLogin();
	}

	/**
	 * Holt diverse Daten und lädt die Default-View.
	 */
	public function loadView() {
		$this->view->title = 'Resultate eintragen';
		$this->view->data['generalResults'] = $this->getGeneralResults();
		$this->view->data['matches'] = $this->getMatches();
		$this->view->data['teamList'] = $this->getTeamList();
		$this->view->render('admin/adminResultView');
	}
	
	/**
	 * Holt die Daten für die allgemeinen Tipps.
	 */
	public function getGeneralResults() {
		return $this->model->getGeneralResults();
	}
	
	/**
	 * Holt die Match-Daten.
	 */
	public function getMatches() {
		return $this->model->getMatches();
	}
	
	/**
	 * Holt die Daten sämtlicher Teams.
	 */
	public function getTeamList() {
		return $this->model->getTeamList();
	}
	
	/**
	 * Ruft die Methode zum Speichern der Daten auf aktualisiert die Seite.
	 */
	public function saveAll() {
		$this->model->saveAll();
		header('Location: ' . SITE_PATH . 'adminResult');
	}
}