<?php
include_once('classes/Navigation.php');
$navigation = new Navigation();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Tippspiel WM 2014</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/functions.js"></script>
	</head>	
	<body>
		<div id="wrapper">
			<header>
				<div id="logo"></div>
				<div id="title">Tippspiel WM 2014</div>
				<?php include_once('inc/navigation.inc.php'); ?>
			</header>
			<section id="container">
				<section id="sidebar">
					<?php include_once('inc/sidebar/loginBox.inc.php'); ?>
					<?php //include_once('inc/sidebar/profileBox.inc.php'); ?>
					<?php //include_once('inc/sidebar/rankingBox.inc.php'); ?>
				</section>
				<section id="content">
					<?php include_once($navigation->getContent()); ?>
				</section>
				<div style="clear: both;"></div>
			</section>
			<footer>copyright &copy; 2013 Fanky &middot; <a href="index.php?page=impressum">Impressum</a></footer>
		</div>
	</body>
</html>