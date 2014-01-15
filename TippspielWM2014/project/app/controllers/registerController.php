<?php
class RegisterController extends Controller {

	public function __construct() {
		parent::__construct();
		//Auth::handleLogin();
	}

	public function loadView() {
		$this->view->title = 'Registrierung';
		$this->view->render('register/registerView');
	}

	public function loadAfterRegisterView() {
		$this->view->render('register/afterRegister');
	}

	public function registerPlayer() {
		try {
			$this->model->registerPlayer();
			header('Location: ' . SITE_PATH . 'register/loadAfterRegisterView');
			exit;
		} catch (Exception $e) {
			$this->view->formData = $this->model->getPostedData();
			$this->view->errMsg = $e->getMessage();
			$this->loadView();
		}
	}
}