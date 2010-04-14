<?php

class EpsbedController extends AppController
{
	var $uses = array();
	var $helpers = array('Ajax');
	var $components = array('RequestHandler');

	function index()
	{
	}

	function msyys(){

		$this->layout = 'ajax';
		$this->autoRender = false;
		// database "definition"
		$def = array(
		  array("KDYYSMSYYS",	"C",	7),
		  array("NMYYSMSYYS", 	"C",	50),
		  array("ALMT1MSYYS",	"C",	30),
		  array("ALMT2MSYYS",	"C", 	30),
		  array("KOTAAMSYYS",	"C", 	20),
		  array("KDPOSMSYYS",	"C", 	5),
		  array("TELPOMSYYS",	"C", 	20),
		  array("FAKSIMSYYS",	"C", 	20),
		  array("TGYYSMSYYS",	"D"),
		  array("NOMSKMSYYS",	"C", 	30),
		  array("TGLBNMSYYS",	"D"),
		  array("NOMBNMSYYS",	"C", 	30),
		  array("EMAILMSYYS",	"C", 	40),
		  array("HPAGEMSYYS",	"C", 	40),
		  array("TGAWLMSYYS",	"D",)
		);

		$epsbed_file = EPSBED_DIR.'MSYYS.dbf';

        try{
        if (!dbase_create($epsbed_file, $def)) {
		  echo "Error, can't create the database\n";
		  exit;
		}else{
			$db = dbase_open($epsbed_file, 2);
			if ($db) {

				$this->loadModel('Configuration');
				$yys = $this->Configuration->getYYS();
				dbase_add_record($db, array(
					$yys['YYS_KODE'],
					$yys['YYS_NAMA'],
					$yys['YYS_ALAMAT_1'],
					$yys['YYS_ALAMAT_2'],
					$yys['YYS_KOTA'],
					$yys['YYS_KODE_POS'],
					$yys['YYS_TELEPON'],
					$yys['YYS_FAX'],
					str_replace('-','/',$yys['YYS_TANGGAL_AKTA']),
					$yys['YYS_NOMOR_AKTA'],
					str_replace('-','/',$yys['YYS_TANGGAL_PN']),
					$yys['YYS_NOMOR_PN'],
					$yys['YYS_EMAIL'],
					$yys['YYS_WEBSITE'],
					str_replace('-','/',$yys['YYS_TANGGAL_BERDIRI'])
					));
				echo "<a href='files/epsbed/MSYYS.dbf'>Download file MSYYS.dbf</a>";
				dbase_close($db);
			} else {
				echo "Error";
            }
		}

        } catch(Exception $e) {
            echo $e->text();
        }
	}

	function mspti(){

		$this->layout = 'ajax';
		$this->autoRender = FALSE;

		// database "definition"
		$def = array(
		  array("KDYYSMSPTI",	"C",	7),
		  array("KDPTIMSPTI",	"C",	6),
		  array("NMPTIMSPTI", 	"C",	50),
		  array("ALMT1MSPTI",	"C",	30),
		  array("ALMT2MSPTI",	"C", 	30),
		  array("KOTAAMSPTI",	"C", 	20),
		  array("KDPOSMSPTI",	"C", 	5),
		  array("TELPOMSPTI",	"C", 	20),
		  array("FAKSIMSPTI",	"C", 	20),
		  array("TGPTIMSPTI",	"D"),
		  array("NOMSKMSPTI",	"C", 	30),
		  array("EMAILMSPTI",	"C", 	40),
		  array("HPAGEMSPTI",	"C", 	40),
		  array("TGAWLMSPTI",	"D",)
		);

		$epsbed_file = EPSBED_DIR.'MSPTI.dbf';
		if (!dbase_create($epsbed_file, $def)) {
		  echo "Error, can't create the database\n";
		  exit;
		}else{
			$db = dbase_open($epsbed_file, 2);
			if ($db) {

				$this->loadModel('Configuration');
				$yys = $this->Configuration->getPTI();
				$yys['YYS_KODE']='';
				dbase_add_record($db, array(
					$yys['YYS_KODE'],
					$yys['PTI_KODE'],
					$yys['PTI_NAMA'],
					$yys['PTI_ALAMAT_1'],
					$yys['PTI_ALAMAT_2'],
					$yys['PTI_KOTA'],
					$yys['PTI_KODE_POS'],
					$yys['PTI_TELEPON'],
					$yys['PTI_FAX'],
					str_replace('-','/',$yys['PTI_TANGGAL_SK']),
					$yys['PTI_NOMOR_SK'],
					$yys['PTI_EMAIL'],
					$yys['PTI_WEBSITE'],
					str_replace('-','/',$yys['PTI_TANGGAL_BERDIRI'])
					));
				echo "<a href='files/epsbed/MSPTI.dbf'>Download file MSPTI.dbf</a>";
				dbase_close($db);
			}
		}

	}

}
