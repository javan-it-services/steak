<?php
class UtilComponent extends Object{

	public $info = array();

	var $__controller = null ;

	function initialize(&$controller) {

		$this->info['controller'] = $controller->params['controller'];
		$this->info['action'] = $controller->params['action'];
		$this->__controller = $controller;
    }

    function startup(&$controller) {

    }

	function beforeFilter () {

	}

	function beforeRender(&$controller) {
		$this->__controller->set('breadcrumbs', $this->requestAction('/javan/breadcrumb'));
	}
	function setPublic($publics) {
		foreach($publics as $public)
		{
			extract($public);
			if($controller === $this->info['controller'])
			{
				$this->Auth->allowedActions = $action;
				return true;
			}
		}
		return false;
	}

/**
 * gets all available actions in controller.
 *
 * @param array		$reserved reserved action (for example, that already inserted to databse)
 * @return array 	An array of action in key=>value format (suitable for listbox, checkbox, etc)
 * @access public
 * @static
 */
    function listActions($reserved=array()){

		$menu = array();
        $reservedPath = array();
        foreach($reserved as $res){
            $reservedPath[] = $res['Link']['controller'].'/'.$res['Link']['action'];
        }

        $controllers = Configure::listObjects('controller');
		$controllers = array_diff($controllers,array('App','Pages'));

        $baseMethods = get_class_methods('Controller');

        // look at each controller in app/controllers
        foreach ($controllers as $ctrlName) {
            App::import('Controller', $ctrlName);
            $ctrlclass = $ctrlName . 'Controller';
            $methods = get_class_methods($ctrlclass);

            //clean the methods. to remove those in Controller and private actions.
            foreach ($methods as $k => $method) {
				$path = Inflector::underscore($ctrlName).'/'.$method;

                if (strpos($method, '_', 0) === 0) {
                    unset($methods[$k]);
                    continue;
                }
                if (in_array($method, $baseMethods)) {
                    unset($methods[$k]);
                    continue;
                }
                if(in_array($path, $reservedPath)) {
                    unset($methods[$k]);
                    continue;
                }
				$menu[$path] = $path;
            }
        }
		ksort($menu);
		return $menu;
    }

}

?>
