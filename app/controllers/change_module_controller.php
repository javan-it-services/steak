<?php

class ChangeModuleController extends AppController
{
	var $uses = array();
	function index($module=null)
	{
		if($module){			
			$this->Session->write('currentModule',$module);
			$this->redirect($this->modules[$module]['defaultLink']);
		}
		else{
			if($this->currentModule)
				$this->redirect($this->modules[$this->currentModule]['defaultLink']);
			else
				$this->redirect('/');
		}
	}
}
