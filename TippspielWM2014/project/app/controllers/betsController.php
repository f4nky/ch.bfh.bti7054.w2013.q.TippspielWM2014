<?php
/**
* Controller für die Verwaltung Tipps
* 
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class BetsController extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleLogin();
	}

	/**
	 * Holt diverse Daten und lädt die Default-View.
	 */
	public function loadView() {
		$this->view->title = 'Meine Tipps';
		$this->view->data['dateTimeFirstMatches'] = $this->getDateTimeFirstMatchesPerPhase();
		$this->view->data['generalBets'] = $this->getGeneralBets();
		$this->view->data['matches'] = $this->getMatches();
		$this->view->data['teamList'] = $this->getTeamList();
		$this->view->render('bets/betsView');
	}

	/**
	 * Holt die Daten der allgemeinen Tipps.
	 */
	public function getGeneralBets() {
		return $this->model->getGeneralBets();
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
	 * Holt die Daten der ersten Matches pro Phase.
	 */
	public function getDateTimeFirstMatchesPerPhase() {
		return $this->model->getDateTimeFirstMatchesPerPhase();
	}

	/**
	 * Ruft die Methode zum Speichern der Daten auf aktualisiert die Seite.
	 */
	public function saveAll() {
		$this->model->saveAll();
		header('Location: ' . SITE_PATH . 'bets');
	}
}