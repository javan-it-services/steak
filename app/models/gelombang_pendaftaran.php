<?php
class GelombangPendaftaran extends AppModel {

	var $name = 'GelombangPendaftaran';
    var $displayField = 'nomor';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'TtahunAjaran' => array(
			'className' => 'TtahunAjaran',
			'foreignKey' => 'ttahun_ajaran_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    function getList() {
        $data = $this->find('all', array('order' => 'TtahunAjaran.kodeAngkatan'));
        $list = array();
        foreach($data as $row) {
            $list[$row['GelombangPendaftaran']['id']] = $row['GelombangPendaftaran']['nomor'] . " - " . $row['TtahunAjaran']['nama'];
        }
        return $list;
    }

}
?>
