<?php
/**
* Controller für den Administrations-Navigationsbereich in der Sidebar
*
* @author		Fanky
* @copyright	2014 Fanky
* @version		1.0 released 14.01.2014
*/
class AdminNavController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Prüft, ob im Hauptbereich eine Admin-View angezeigt wird (denn nur
	 * dann braucht es die Admin-Navigationselemente in der Sidebar) und
	 * zeigt dann den Teilbereich in der Sidebar an
	 */
	public function loadView() {
		if ((isset($_GET['url']) && (($_GET['url'] == 'adminPlayer') || ($_GET['url'] == 'adminResult')))) {
			$this->view->render('sidebar/adminNavBoxView', true);
		} else if ((isset($_GET['url'])) && ($_GET['url'] == 'adminNav')) {
			header('Location: ' . SITE_PATH . 'pageNotFound');
		}
	}
}