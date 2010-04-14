<?php

class JavanController extends JavanAppController
{
    var $name = 'Javan';
	var $uses = array('Link');

    function login()
    {
    }

    function logout()
    {

    }

/**
 * Returns a series of Link models indicate current path.
 *
 * @return array An array of Link model indicates current path
 * @access public
 * @static
 */
	function breadcrumb()
	{
		$breadcrumbs = array();
		pr($this->Link);
		//$cLink = ClassRegistry::init('JavanLink');pr($cLink);
		//$conditions = array("controller"=>$this->info['controller'], "action"=>$this->info['action']);
		//$link = $cLink->find("first", array("conditions"=>$conditions, "recursive"=>-1));
		//if(!$link){
		//	//trigger_error(__('Alamat yang Anda akses tidak terdaftar.', true), E_USER_WARNING);
		//	return false ;
		//}else{
		//	$breadcrumbs = $cLink->getpath($link['Link']['id']);
		//}
		return $breadcrumbs;
	}

}

?>
