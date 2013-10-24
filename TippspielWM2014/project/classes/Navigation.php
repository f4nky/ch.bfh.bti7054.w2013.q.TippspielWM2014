<?php
class Navigation {
	private $pages;
	
	public function __construct() {
		$this->pages = array(
			"home" => array(
				"title"	=> "Home",
				"file"	=> "home.php"),		
			"register" => array(
				"title"	=> "Registrierung",
				"file"	=> "register.php"),		
			"matches" => array(
				"title"	=> "Meine Tipps",
				"file"	=> "matches.php"),
			"ranking" => array(
				"title"	=> "Rangliste",
				"file"	=> "ranking.php"),
			"impressum"	=> array(
				"title"	=> "Impressum",
				"file"	=> "impressum.php")
		);
	}
	
	public function showNavigation() {
		foreach ($this->pages as $key => $value) {
			if ((isset($_GET['page'])) && ($key == $_GET['page'])) {
				echo "<li><a href='index.php?page={$key}' title='{$value['title']}' class='curItem'>{$value['title']}</a>";
			} else {
				echo "<li><a href='index.php?page={$key}' title='{$value['title']}'>{$value['title']}</a>";
			}
		}
	}
	
	public function getContent() {
		if (!isset($_GET['page'])) {
			$page = 'home.php';
		} elseif ((isset($this->pages[$_GET['page']])) && (file_exists("inc/content/".$this->pages[$_GET['page']]['file']))) {
			$page = $this->pages[$_GET['page']]['file'];
		} else {
			$page = 'pageNotFound.php';
		}
	
		return 'inc/content/'.$page;
	}
}
?>