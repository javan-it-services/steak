<?php
class KeuanganMaster extends AppModel {

	var $name = 'KeuanganMaster';
	var $useTable = 'keuangan_master';
    var $primaryKey = 'id';

    function getAllKewajiban($tahun_ajaran_id, $semester_id, $angkatan_id, $jurusan_id) {
        $sql = "
            SELECT *
            FROM keuangan_master KeuanganMaster
            LEFT JOIN (
                SELECT *
                FROM  `keuangan_kewajiban`
                WHERE ttahun_ajaran_id = ?
                AND tsemester_id = ?
                AND tangkatan_id = ?
                AND tjurusan_id = ?
            ) Kewajiban
            ON ( KeuanganMaster.id = Kewajiban.keuangan_master_id )
            WHERE KeuanganMaster.is_aktif = 1
        ";
        $result = $this->query($sql, array($tahun_ajaran_id, $semester_id, $angkatan_id, $jurusan_id));
        
        return $result;
    }
}
?>
