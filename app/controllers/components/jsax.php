<?php
class JsaxComponent extends Object {

/**
 * Controller reference
 *
 * @var object
 */
	public $controller = null;

	public $jsonView = '/elements/json';

	public $missingIdView= '/elements/jsax/missing_id';

	public $invalidIdView = '/elements/jsax/invalid_id';

	public $successRedirect ;

	public function initialize(&$controller) {
	}

	public function startup(&$controller) {
		$this->controller =& $controller;
		$this->successRedirect = $this->controller->referer();
	}

	public function save($data, &$model, $options = array()) {
		if ($model->save($data)) {
			$response['error'] = array("code"=>0);
			$response['redirect'] = (isset($options['redirect'])) ? $options['redirect']: $this->successRedirect;
		} else {
			$errorMessages = $this->controller->validateErrors($model);
			$response['error'] = array("code"=>1, "messages"=>$errorMessages);
		}
		$this->controller->set(compact("response"));
		$this->controller->render($this->jsonView);
	}

	public function delete($id, &$model, $options = array()) {
		if ($model->delete($id)) {
			$response['error'] = array("code"=>0);
			$response['redirect'] = (isset($options['redirect'])) ? $options['redirect']: $this->successRedirect;
		}else{
			$response['error'] = array("code"=>1, "messages"=>array($model->name.__(' gagal dihapus', true)));
		}
		$this->controller->set(compact("response"));
		$this->controller->render($this->jsonView);
	}

	public function deleteAll(&$model, $conditions = array(), $cascade = true, $callbacks = false) {
		if ($model->deleteAll($conditions, $cascade, $callbacks)) {
			$response['error'] = array("code"=>0);
			$response['redirect'] = (isset($options['redirect'])) ? $options['redirect']: $this->successRedirect;
		}else{
			$response['error'] = array("code"=>1, "messages"=>array($model->name.__(' gagal dihapus', true)));
		}
		$this->controller->set(compact("response"));
		$this->controller->render($this->jsonView);
	}

	public function confirmDelete($id, &$model, $options = array()) {
		if ($id == null) {
			$this->controller->render($this->missingIdView);
		}else{
			$this->controller->data = $model->read(null, $id);
			if(empty($this->controller->data)){
				$modelName = (isset($options['name'])) ? $options['name']: $model->name;
				$this->controller->set(compact('id', 'modelName'));
				$this->controller->render($this->invalidIdView);
			}else{
				// render normal view
			}
		}
	}

}
?>
