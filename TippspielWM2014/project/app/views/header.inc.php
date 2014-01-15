<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Tippspiel WM 2014<?php echo (isset($this->title)) ? ' - ' . $this->title : ''; ?></title>
		<link href="<?php echo SITE_PATH; ?>public/css/style.css" rel="stylesheet" type="text/css">
		<?php
		if (isset($this->css)) {
			foreach ($this->css as $css) {
				echo '<link href="' . SITE_PATH . 'public/css/' . $css . '" rel="stylesheet" type="text/css">';
			}
		}
		?>
		<link href="http://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo SITE_PATH; ?>public/js/validation/jquery.validate.min.js" type="text/javascript"></script>
		<script src="<?php echo SITE_PATH; ?>public/js/funcs.js" type="text/javascript" ></script>
		<?php
		if (isset($this->js)) {
			foreach ($this->js as $js) {
				echo '<script src="' . SITE_PATH . 'public/js/' . $js . '" type="text/javascript"></script>';
			}
		}
		?>
	</head>	
	<body>
		<div id="wrapper">
			<header>
				<div id="logo"></div>
				<div id="title">Tippspiel WM 2014</div>
				<nav>
					<?php include_once('navigation.inc.php'); ?>
				</nav>
			</header>
			<section id="container">
				<section id="sidebar">
					<?php
						if (Session::get('loggedIn')) {
							if (((Session::get('role') == 'admin') || (Session::get('role') == 'owner'))) {
								Bootstrap::load(new Request(array('controller' => 'adminNav', 'method' => 'loadView')));
							}
							Bootstrap::load(new Request(array('controller' => 'account', 'method' => 'loadAccountView')));
							Bootstrap::load(new Request(array('controller' => 'ranking', 'method' => 'loadBoxView')));
						} else {
							Bootstrap::load(new Request(array('controller' => 'account', 'method' => 'loadLoginView')));
						}
					?>
				</section>
				<section id="content">