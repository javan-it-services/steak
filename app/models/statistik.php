<?php

class Statistik extends AppModel{

	var $name = 'Statistik';
	var $useTable = false;

	function getJenkel(){
		$sql = "SELECT ta.id, ta.nama, (
				SELECT count( NIM )
				FROM tmahasiswas
				WHERE ttahun_ajaran_id = ta.id
				AND jenis_kelamin = 'L'
				) AS laki, (

				SELECT count( NIM )
				FROM tmahasiswas
				WHERE ttahun_ajaran_id = ta.id
				AND jenis_kelamin = 'P'
				) AS perempuan
				FROM ttahun_ajarans ta
				ORDER BY ta.nama";

		return $this->query($sql);
	}
	
	/*function gettahun(){
		
		
		$sql = "SELECT ttahun_ajarans.id as id_thn, ttahun_ajarans.nama as nama_thn, tagamas.AGAMA_NAME  as agama FROM ttahun_ajarans, tagamas";

		return $this->query($sql);
	}
	
	function getAgama1(){
		
		
		$sql = "SELECT ta.id , ta.nama , ag.AGAMA_ID, ag.AGAMA_NAME  , (
				SELECT count( NIM ) 
				FROM tmahasiswas 
				WHERE tmahasiswas.TTAHUN_AJARAN_ID = ta.id AND 
				tmahasiswas.AGAMA = ag.AGAMA_ID) AS agama_jml 
				FROM ttahun_ajarans ta, tagamas ag  
				ORDER BY ta.nama";

		return $this->query($sql);
	}*/
	
	function getAgama(){
		$sql = "SELECT ta.id, ta.nama , (
				SELECT count( NIM )
				FROM tmahasiswas
				WHERE ttahun_ajaran_id = ta.id
				AND agama = '1'
				) AS Islam, (

				SELECT count( NIM )
				FROM tmahasiswas
				WHERE ttahun_ajaran_id = ta.id
				AND agama = '2'
				) AS Kristen, (

				SELECT count( NIM )
				FROM tmahasiswas
				WHERE ttahun_ajaran_id = ta.id
				AND agama = '3'
				) AS Hindu, (

				SELECT count( NIM )
				FROM tmahasiswas
				WHERE ttahun_ajaran_id = ta.id
				AND agama = '4'
				) AS Buddha, (

				SELECT count( NIM )
				FROM tmahasiswas
				WHERE ttahun_ajaran_id = ta.id
				AND agama = '5'
				) AS Katolik, (

				SELECT count( NIM )
				FROM tmahasiswas
				WHERE ttahun_ajaran_id = ta.id
				AND agama = '6'
				) AS Kepercayaan
				FROM ttahun_ajarans ta
				ORDER BY ta.nama";

		return $this->query($sql);
	}
	
	
	
	/*function getAgama(){
		$sql = "SELECT ag.AGAMA_ID, ag.AGAMA_NAME, (
				SELECT count( NIM )
				FROM tmahasiswas
				WHERE AGAMA = ag.AGAMA_ID
				) AS mhsAgama 
				FROM tagamas ag
				ORDER BY ag.AGAMA_NAME";
		return $this->query($sql);
	}*/

	var $belongsTo = array(
		'TtahunAjaran' => array(
			'className' => 'TtahunAjaran',
			'foreignKey' => 'ttahun_ajaran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tsemester' => array(
			'className' => 'Tsemester',
			'foreignKey' => 'tsemester_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
