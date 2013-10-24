<?php
class Db extends mysqli {
	private $host = 'localhost';
	private $user = 'root';
	private $pwd = '';
	private $db = 'tippspielwm2014_testing';

	public function __construct() {
		parent::__construct($this->host, $this->user, $this->pwd, $this->db);
	}
	
	public function __destruct() {
		return parent::close();
	}
}
?>