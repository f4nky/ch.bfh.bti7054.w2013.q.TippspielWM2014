<?php
class Form {

	private $_postData = array();

	public function __construct() {
		
	}

	public function setData($fieldName) {
		$this->_postData[$fieldName] = $this->sanitizeData($_POST[$fieldName]);
	}

	public function getData($fieldName = false) {
		if ($fieldName) {
			if (isset($this->_postData[$fieldName])) {
				return $this->_postData[$fieldName];
			} else {
				return false;
			}
		} else {
			return $this->_postData;
		}
	}

	private function sanitizeData($data) {
		return htmlspecialchars(stripslashes(trim($data)));
	}
}