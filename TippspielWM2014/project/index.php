<?php

require_once 'config/config.php';
require_once 'util/auth.php';

function __autoload($class) {
	require LIB . $class . '.php';
}

$app = Bootstrap::load(new Request());