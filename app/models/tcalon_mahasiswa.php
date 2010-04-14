<?php
class TcalonMahasiswa extends AppModel {

	var $name = 'TcalonMahasiswa';
	var $primaryKey = 'NO_REGISTRASI';
	var $validate = array(

		'NO_REGISTRASI' => array('notempty'),
		'NAMA' => array('notempty'),
		'AGAMA' => array('notempty'),
		'JENIS_KELAMIN' => array('notempty'),
		'TGL_LAHIR' => array('notempty'),
		'TGL_DAFTAR' => array('notempty'),
		'TJURUSAN_ID' => array('notempty'),
		'NAMA_SMU' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array (
		'FormStudi' => array (
			'className' => 'FormStudi',
			'foreignKey' => 'NIM',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Presence' => array (
			'className' => 'Presence',
			'foreignKey' => 'nim',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'TstatusPembayaran' => array (
			'className' => 'TstatusPembayaran',
			'foreignKey' => 'NIM',
			'dependent' => '',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PmbNilai' => array (
			'className' => 'PmbNilai',
			'foreignKey' => 'nomor_registrasi',
			'dependent' => '',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array (
		'Tagama' => array (
			'className' => 'Tagama',
			'foreignKey' => 'AGAMA',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'T2calonMahasiswa' => array (
			'className' => 'T2calonMahasiswa',
			'foreignKey' => 'NO_REGISTRASI',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tfakultase' => array (
			'className' => 'Tfakultase',
			'foreignKey' => 'TFAKULTAS_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tprogram' => array (
			'className' => 'Tprogram',
			'foreignKey' => 'TPROGRAM_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tjurusan' => array (
			'className' => 'Tjurusan',
			'foreignKey' => 'TJURUSAN_ID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tprogram2' => array (
			'className' => 'Tprogram',
			'foreignKey' => 'TPROGRAM_ID2',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tjurusan2' => array (
			'className' => 'Tjurusan',
			'foreignKey' => 'TJURUSAN_ID2',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'Tdosen' => array (
			'className' => 'Tdosen',
			'foreignKey' => 'NIP_WALI',
			'conditions' => '',
			'fields' => array('NAMA_DOSEN','NIP_DOSEN'),
			'order' => ''
		),

		'TtahunAjaran' => array (
			'className' => 'TtahunAjaran',
			'foreignKey' => 'TTAHUN_AJARAN_ID',

			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'Tkelase' => array (
			'className' => 'Tkelase',
			'foreignKey' => 'KELAS',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	'GelombangPendaftaran' => array (
			'className' => 'GelombangPendaftaran',
			'foreignKey' => 'gelombang_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
'Refkela' => array (
			'className' => 'Refkela',
			'foreignKey' => 'refkelas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
'Tambil' => array (
			'className' => 'Tambil',
			'foreignKey' => 'NO_REGISTRASI',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
 'Tperguruan_tinggi' => array (
			'className' => 'Tperguruan_tinggi',
			'foreignKey' => 'UNIV_ASAL',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

	var $hasAndBelongsToMany = array(
		'Tperlengkapan' => array(
			'className' => 'Tperlengkapan',
			'joinTable' => 'tperlengkapans_tcalon_mahasiswas',
			'foreignKey' => 'tcalon_mahasiswa_id',
			'associationForeignKey' => 'tperlengkapan_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		
	);
	
 function getAllWithFilter($noreg, $nama, $jurusan,  $program, $gelombang_id, $status){
        $conditions = array('gelombang_id' => $gelombang_id);
        if($jurusan){
            $conditions[] = "TJURUSAN_ID LIKE '%$jurusan%' ";
        }
        if($noreg){
            $conditions[] = "NO_REGISTRASI LIKE '%$noreg%' ";
        }
        
 		if($program){
            $conditions[] = "TPROGRAM_ID LIKE '%$program%' ";
        }
        
 		if($nama){
            $conditions[] = "NAMA LIKE '%$nama%' ";
        }
 		if($status){
            $conditions[] = "status LIKE '%$status%' ";
        }

        $this->recursive = -1;
        $listMahasiswa = $this->find('all', array('conditions' => $conditions));

        foreach($listMahasiswa as $key => $mhs) {
            $sql = "
                SELECT tcalon_mahasiswas.*, tjurusans.namaJurusan, refdetil.value
                	FROM tcalon_mahasiswas 
                	
                	INNER JOIN tjurusans ON tcalon_mahasiswas.TJURUSAN_ID = tjurusans.kodejurusan
                	INNER JOIN refdetil ON  tcalon_mahasiswas.TPROGRAM_ID = refdetil.id
               
                WHERE tcalon_mahasiswas.NO_REGISTRASI = ? and
                		tcalon_mahasiswas.NAMA = ? and
                		tcalon_mahasiswas.TJURUSAN_ID = ? and
                		tcalon_mahasiswas.TPROGRAM_ID = ? and
                		tcalon_mahasiswas.gelombang_id = ? and
                		tcalon_mahasiswas.status = ?
                
                ORDER BY tcalon_mahasiswas.NO_REGISTRASI
            ";
            $Calon = $this->query($sql, array($mhs['TcalonMahasiswa']['NO_REGISTRASI'],$mhs['TcalonMahasiswa']['NAMA'],$mhs['TcalonMahasiswa']['TJURUSAN_ID'], $mhs['TcalonMahasiswa']['TPROGRAM_ID'], $mhs['TcalonMahasiswa']['gelombang_id'], $mhs['TcalonMahasiswa']['status']));
            $listMahasiswa[$key]['lap_list'] = $Calon;
        }

        return $listMahasiswa;
    }

	/*function beforeSave(){
		if(empty($this->data['Tmahasiswa']['tanggal_masuk'])){
			$this->data['Tmahasiswa']['tanggal_masuk'] = NULL;
		}
		if(empty($this->data['Tmahasiswa']['tanggal_lulus'])){
			$this->data['Tmahasiswa']['tanggal_lulus'] = NULL;
		}
		return true;
	}*/

    function getAllWithNilai($gelombang_id, $ruang, $noreg){
        $conditions = array('gelombang_id' => $gelombang_id);
        if($ruang){
            $conditions[] = "ruang_test LIKE '%$ruang%' ";
        }
        if($noreg){
            $conditions[] = "NO_REGISTRASI LIKE '%$noreg%' ";
        }

        $this->recursive = -1;
        $listMahasiswa = $this->find('all', array('conditions' => $conditions));

        foreach($listMahasiswa as $key => $mhs) {
            $sql = "
                SELECT JenisNilaiPendaftaran.id, PmbNilai.*
                FROM jenis_nilai_pendaftarans JenisNilaiPendaftaran
                LEFT JOIN (
                    SELECT *
                    FROM pmb_nilai
                    WHERE nomor_registrasi =  ?
                )PmbNilai ON ( JenisNilaiPendaftaran.id = PmbNilai.tes_id )
                WHERE JenisNilaiPendaftaran.gelombang_pendaftaran_id = ?
                ORDER BY JenisNilaiPendaftaran.id
            ";
            $nilai = $this->query($sql, array($mhs['TcalonMahasiswa']['NO_REGISTRASI'], $mhs['TcalonMahasiswa']['gelombang_id']));
            $listMahasiswa[$key]['Nilai'] = $nilai;
        }

        return $listMahasiswa;
    }
    
    

    function getWithNilai($noreg){
        $this->recursive = -1;
        $mahasiswa = $this->read(null, $noreg);

        $sql = "
            SELECT JenisNilaiPendaftaran.id, JenisNilaiPendaftaran.name, PmbNilai.id, PmbNilai.nilai
            FROM jenis_nilai_pendaftarans JenisNilaiPendaftaran
            LEFT JOIN (
                SELECT *
                FROM pmb_nilai
                WHERE nomor_registrasi =  ?
            )PmbNilai ON ( JenisNilaiPendaftaran.id = PmbNilai.tes_id )
            WHERE JenisNilaiPendaftaran.gelombang_pendaftaran_id = ?
            ORDER BY JenisNilaiPendaftaran.id
        ";
        $nilai = $this->query($sql, array($noreg, $mahasiswa['TcalonMahasiswa']['gelombang_id']));
        $mahasiswa['Nilai'] = $nilai;

        return $mahasiswa;
    }

	
    function getAllWithPembayaran($gelombang_id, $tanggal){
        $conditions = array('gelombang_id' => $gelombang_id);
        if($tanggal){
            $conditions[] = "TGL_DAFTAR = '$tanggal' ";
        }
        $this->unbindAll();
        //$this->bindModel(
        //    array('hasAndBelongsToMany' => array(
        //        'Tperlengkapan' => array(
        //            'className' => 'Tperlengkapan',
        //            'joinTable' => 'tperlengkapans_tcalon_mahasiswas',
        //            'foreignKey' => 'tcalon_mahasiswa_id',
        //            'associationForeignKey' => 'tperlengkapan_id',
        //            'conditions' => 'Tperlengkapan.jumlah > 0'
        //            )
        //        )
        //    )
        //);
        $listMahasiswa = $this->find('all', array('conditions' => $conditions));

        foreach($listMahasiswa as $key => $mhs) {
            $sql = "
                SELECT Tperlengkapan.jumlah, TperlengkapanTcalonMahasiswa.tcalon_mahasiswa_id
                FROM tperlengkapans Tperlengkapan
                LEFT JOIN (
                    SELECT *
                    FROM tperlengkapans_tcalon_mahasiswas
                    WHERE tcalon_mahasiswa_id =  ?
                )TperlengkapanTcalonMahasiswa ON ( Tperlengkapan.id = TperlengkapanTcalonMahasiswa.tperlengkapan_id)
                WHERE Tperlengkapan.gelombang_id = ?
                ORDER BY Tperlengkapan.id
            ";
            $nilai = $this->query($sql, array($mhs['TcalonMahasiswa']['NO_REGISTRASI'], $mhs['TcalonMahasiswa']['gelombang_id']));
            $listMahasiswa[$key]['Pembayaran'] = $nilai;
        }
        return $listMahasiswa;
    }


}
?>
