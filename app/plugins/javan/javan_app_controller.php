<?php

class JavanAppController extends AppController {

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array("*");
	}

}

?>
