<?php
class UsersController extends JavanAppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form');

    //function beforeFilter(){
    //    parent::beforeFilter();
    //    $this->Auth->allow(array('login','home'));
    //}

    function login()
    {

    }

    function logout()
    {

    }

    function home()
    {

    }

    function _hidden()
    {
        $this->autoRender = false;
        echo "ini halaman hidden";
    }

    function allow(){
        $this->autoRender = false;
    }
    function deny(){
        $this->autoRender = false;
    }

}
?>
