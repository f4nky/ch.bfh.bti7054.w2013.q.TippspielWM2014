<?php
/**
* Controller für den ganzen Account-Bereich
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class AccountController extends Controller {

	public function __construct() {
		parent::__construct();
		Session::init();
	}

	/**
	 * Holt die Account-Daten und lädt die Default-View.
	 */
	public function loadView() {
		Auth::handleLogin();
		$this->view->title = 'Profil bearbeiten';
		$this->view->data = $this->getAccountInfos();
		$this->view->render('account/accountView');
	}

	/**
	 * Lädt die Teil-View für die Login-Box in der Sidebar.
	 */
	public function loadLoginView() {
		$this->view->render('sidebar/loginBoxView', true);
	}

	/**
	 * Lädt die Teil-View für die Account-Box in der Sidebar.
	 */
	public function loadAccountView() {
		Auth::handleLogin();
		$this->view->render('sidebar/accountBoxView', true);
	}
	
	/**
	 * Ruft die Login-Methode auf und leitet bei erfolgreichem Login auf die Homeseite weiter. 
	 */
	public function login() {
		try {
			$this->model->login();
			header('Location: ' . SITE_PATH);
			exit;
		} catch (Exception $e) {
			$this->view->errMsg = $e->getMessage();
			$this->loadAccountView();
		}
	}

	/**
	 * Loggt den Teilnehmer aus und verwirft die Session.
	 */
	public function logout() {
		Session::destroy();
		header('Location: ' . SITE_PATH);
		exit;
	}

	/**
	 * Holt die Account-Daten.
	 */
	public function getAccountInfos() {
		return $this->model->getAccountInfos();
	}

	/**
	 * Ruft die Speichern-Methode auf.
	 */
	public function saveAccountInfos() {
		try {
			$this->model->saveAccountInfos();
			header('Location: ' . SITE_PATH . 'account');
			exit;
		} catch (Exception $e) {
			$this->view->formData = $this->model->getPostedData();
			$this->view->errMsg = $e->getMessage();
			$this->loadView();
		}
		
	}

	/**
	 * Ruft die Methode zum Speichern des neuen Passwortes auf.
	 */
	public function saveNewPassword() {
		try {
			$this->model->saveNewPassword();
			header('Location: ' . SITE_PATH . 'account');
			exit;
		} catch (Exception $e) {
			$this->view->errMsg = $e->getMessage();
			$this->loadView();
		}
	}
}