<?php
class ConfigurationsController extends AppController {

	var $name = 'Configurations';
	var $helpers = array('Html', 'Form');

	function index() {
		$configs = $this->Configuration->find('all');
		$this->set('configs', $configs);
		if (!empty($this->data)) {
			for($i=1;$i<=count($this->data['id']);$i++){
                $data['Configuration']['id'] = $this->data['id'][$i];
                $data['Configuration']['value'] = $this->data['value'][$i];
           		$this->Configuration->create();
           		$this->Configuration->save($data);
            }
		$this->redirect('index');
		}
	}

}
?>
