<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after the core bootstrap.php
 *
 * This is an application wide file to load any function that is not used within a class
 * define. You can also use this to include or require any files in your application.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 * This is related to Ticket #470 (https://trac.cakephp.org/ticket/470)
 *
 * App::build(array(
 *     'plugins' => array('/full/path/to/plugins/', '/next/full/path/to/plugins/'),
 *     'models' =>  array('/full/path/to/models/', '/next/full/path/to/models/'),
 *     'views' => array('/full/path/to/views/', '/next/full/path/to/views/'),
 *     'controllers' => array(/full/path/to/controllers/', '/next/full/path/to/controllers/'),
 *     'datasources' => array('/full/path/to/datasources/', '/next/full/path/to/datasources/'),
 *     'behaviors' => array('/full/path/to/behaviors/', '/next/full/path/to/behaviors/'),
 *     'components' => array('/full/path/to/components/', '/next/full/path/to/components/'),
 *     'helpers' => array('/full/path/to/helpers/', '/next/full/path/to/helpers/'),
 *     'vendors' => array('/full/path/to/vendors/', '/next/full/path/to/vendors/'),
 *     'shells' => array('/full/path/to/shells/', '/next/full/path/to/shells/'),
 *     'locales' => array('/full/path/to/locale/', '/next/full/path/to/locale/')
 * ));
 *
 */

/**
 * As of 1.3, additional rules for the inflector are added below
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */
date_default_timezone_set('Asia/Jakarta');
define('ADMIN','ADMIN');
define('DOSEN','DOSEN');
define('MAHASISWA','MAHASISWA');
define('PEGAWAI','PEGAWAI');

define('GROUP_ADMIN', 1);
define('GROUP_PEGAWAI', 2);
define('GROUP_DOSEN', 3);
define('GROUP_MAHASISWA', 4);

define('REQUEST_MISSING_ID', 11);
define('REQUEST_INVALID_ID', 12);
define('REQUEST_OK', 13);

define('COLUMN_SELECTOR', 21);
define('COLUMN_ACTION', 22);

define('EPSBED_DIR',WWW_ROOT.'files'.DS.'epsbed'.DS);

function rupiah(){
	return array(
				'before'=>'', 'after' => '', 'zero' => 0, 'places' => 0, 'thousands' => '.',
				'decimals' => ',', 'negative' => '()', 'escape' => false);
}

class Constant{
	public static $group  = array('ADMIN'=>1,'PEGAWAI'=>2,'DOSEN'=>3,'MAHASISWA'=>4);
	public static $group_list = array("ADMIN"=>"ADMIN","MAHASISWA"=>"MAHASISWA","DOSEN"=>"DOSEN","PEGAWAI"=>"PEGAWAI");
}
?>
