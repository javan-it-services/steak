<?php
class KeuanganTransaksi extends AppModel {

	var $name = 'KeuanganTransaksi';
	var $useTable = 'keuangan_transaksi';
    var $primaryKey = 'id';
    
	var $validate = array(
		'jumlah' => array('not-empty'=>array("rule"=>"notEmpty", "message"=>"Jumlah Uang tidak boleh kosong"))
	);
    var $belongsTo = array (
		'Tbank' => array (
			'className' => 'Tbank',
			'foreignKey' => 'bank',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tmahasiswa' => array (
			'className' => 'Tmahasiswa',
			'foreignKey' => 'mahasiswa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tjurusan' => array (
			'className' => 'Tjurusan',
			'foreignKey' => 'tjurusan_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TtahunAjaran' => array (
			'className' => 'TtahunAjaran',
			'foreignKey' => 'ttahun_ajaran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tsemester' => array (
			'className' => 'Tsemester',
			'foreignKey' => 'tsemester_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
	);
	
	 function getAllFilter($tanggal, $tjurusan_id){
        $conditions = array('tanggal' => $tanggal);
        if($tanggal){
            $conditions[] = "tanggal LIKE '%$tanggal%' ";
        }
        if($tjurusan_id){
            $conditions[] = " tjurusan_id LIKE '%$tjurusan_id%' ";
        }

        $this->recursive = -1;
        $listMahasiswa = $this->find('all', array('conditions' => $conditions));

        foreach($listMahasiswa as $key => $mhs) {
            $sql = "
                SELECT keuangan_transaksi.*, tmahasiswas.NAMA, tjurusans.namaJurusan,tbanks.nama
                	FROM
                	keuangan_transaksi
                	INNER JOIN tmahasiswas ON keuangan_transaksi.mahasiswa_id = tmahasiswas.NIM
                	INNER JOIN tjurusans ON keuangan_transaksi.tjurusan_id = tjurusans.kodejurusan
                	INNER JOIN tbanks ON keuangan_transaksi.bank = tbanks.id
                WHERE
                	                 	
                	keuangan_transaksi.tanggal = ? and
                	keuangan_transaksi.tjurusan_id = ?
            ";
            $nilai = $this->query($sql, array($mhs['KeuanganTransaksi']['tanggal'], $mhs['KeuanganTransaksi']['tjurusan_id']));
            $listMahasiswa[$key]['Keuangan'] = $nilai;
        }

        return $listMahasiswa;
    }
    
}
?>
