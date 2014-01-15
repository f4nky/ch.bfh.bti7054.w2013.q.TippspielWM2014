<?php
/**
* Controller für den Login-Bereich.
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class LoginController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Lädt die Default-View.
	 * 
	 * @param  string $errMsg Fehlermeldung
	 */
	public function loadView($errMsg) {
		$this->view->errMsg = $errMsg;
		$this->view->render('sidebar/loginBoxView', true);
	}

	/**
	 * Lädt die Default-View.
	 * 
	 * @param  string $errMsg Fehlermeldung
	 */
	public function loadHomeView($errMsg) {
		$this->view->errMsg = $errMsg;
		$this->view->render('home/homeView');
	}
	
	/**
	 * Ruft die Methode zum Einloggen auf und leitet den Teilnehmer auf die Home-Seite weiter.
	 */
	public function login() {
		try {
			$this->model->login();
			header('Location: ' . SITE_PATH);
		} catch (Exception $e) {
			$this->view->formData = $this->model->getPostedData();
			$errMsg = $e->getMessage();
			$this->loadHomeView($errMsg);
		}
	}
}