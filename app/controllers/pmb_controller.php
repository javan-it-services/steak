<?php
class PmbController extends AppController {

	var $name = 'Pmb';
	var $helpers = array('Html', 'Form', 'Number');
    var $uses = array();

    function index($format=null) {

        $gid =  0;
        $tanggal = false;

        if(isset($this->params['url']['gelombang']) && $this->params['url']['gelombang'] != null){
            $gid = $this->params['url']['gelombang'];
        } else {
            $gid = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
        }
        if(isset($this->params['url']['tanggal'])){
            $tanggal = $this->params['url']['tanggal'];
        }

        $param = $this->_extractGet();
        $gelombangs = ClassRegistry::init('GelombangPendaftaran')->getList();
        $gelombang = ClassRegistry::init('GelombangPendaftaran')->read(null, $gid);
        $this->loadModel('TcalonMahasiswa');
        $listMahasiswa = $this->TcalonMahasiswa->getAllWithPembayaran($gid, $tanggal);
        $listPembayaran = $this->TcalonMahasiswa->Tperlengkapan->getAllPembayaran($gid);
        $this->set(compact('param', 'gelombang', 'gelombangs', 'gid', 'listMahasiswa', 'listPembayaran', 'tanggal'));

        if($format == 'pdf') {
            $this->render(null,"pdf","pembayaran_pdf");
        }
    }

    function nilai($format=null) {
        $gelombang_id = $ruang = $noreg = 0;
        if(isset($this->params['url']['gelombang']) && $this->params['url']['gelombang'] != null){
            $gelombang_id = $this->params['url']['gelombang'];
        } else {
            $gelombang_id = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
        }
        if(isset($this->params['url']['ruang'])){
            $ruang = $this->params['url']['ruang'];
        }

        if(isset($this->params['url']['noreg'])){
            $noreg = $this->params['url']['noreg'];
        }

        $param = $this->_extractGet();
        $this->loadModel('TcalonMahasiswa');
        $this->loadModel('JenisNilaiPendaftaran');
        $listMahasiswa = $this->TcalonMahasiswa->getAllWithNilai($gelombang_id, $ruang, $noreg);
        $jenisNilai = $this->JenisNilaiPendaftaran->find('all', array('conditions' => array('gelombang_pendaftaran_id' => $gelombang_id), 'order' => 'JenisNilaiPendaftaran.id'));
        $gelombangs = ClassRegistry::init('GelombangPendaftaran')->getList();
        $gelombang = ClassRegistry::init('GelombangPendaftaran')->read(null, $gelombang_id);
        $this->set(compact('listMahasiswa', 'jenisNilai','gelombangs','ruang','noreg', 'gelombang', 'param'));
        $this->set('gid', $gelombang_id);

        if($format == 'pdf') {
            $this->render(null,"pdf","nilai_pdf");
        } else if($format == 'excel') {
            $this->layout = 'excel';
            $this->set('filename', 'daftar_nilai.xls');
        }
    }

    function excel(){
        $this->layout = 'excel';
           $gelombang_id = $ruang = $noreg = 0;
        if(isset($this->params['url']['gelombang']) && $this->params['url']['gelombang'] != null){
            $gelombang_id = $this->params['url']['gelombang'];
        } else {
            $gelombang_id = ClassRegistry::init('Configuration')->getValue('gelombangPendaftaranId');
        }
        if(isset($this->params['url']['ruang'])){
            $ruang = $this->params['url']['ruang'];
        }

        if(isset($this->params['url']['noreg'])){
            $noreg = $this->params['url']['noreg'];
        }

        $param = $this->_extractGet();
        $this->loadModel('TcalonMahasiswa');
        $this->loadModel('JenisNilaiPendaftaran');
        $listMahasiswa = $this->TcalonMahasiswa->getAllWithNilai($gelombang_id, $ruang, $noreg);
        $jenisNilai = $this->JenisNilaiPendaftaran->find('all', array('conditions' => array('gelombang_pendaftaran_id' => $gelombang_id), 'order' => 'JenisNilaiPendaftaran.id'));
        $gelombangs = ClassRegistry::init('GelombangPendaftaran')->getList();
        $gelombang = ClassRegistry::init('GelombangPendaftaran')->read(null, $gelombang_id);
        $this->set(compact('listMahasiswa', 'jenisNilai','gelombangs','ruang','noreg', 'gelombang', 'param'));
        $this->set('gid', $gelombang_id);

        $this->set('filename', 'daftar_nilai.xls');


    }

    function editNilai($noreg) {
        if (!empty($this->data)) {
            if($this->RequestHandler->isAjax()) {
                $this->autoRender = false;
                $this->layout = 'json';
                $responseNilai = array();
                foreach ($this->data['PmbNilai'] as $key => $nilai) {

                    //method 1: jika nilai empty, tidak disimpan
                    //if ($this->data['PmbNilai'][$key]['nilai']) {
                    //    $this->data['PmbNilai'][$key]['nomor_registrasi'] = $noreg;
                    //    $nilai = array();
                    //    $responseNilai[$this->data['PmbNilai'][$key]['tes_id']] = $this->data['PmbNilai'][$key]['nilai'];
                    //} else {
                    //    unset($this->data['PmbNilai'][$key]);
                    //}

                    //method 2: jika nilai empty, isi dengan 0, lalu simpan
                    if (!$this->data['PmbNilai'][$key]['nilai']) {
                        $this->data['PmbNilai'][$key]['nilai'] = 0;
                    }
                    $this->data['PmbNilai'][$key]['nomor_registrasi'] = $noreg;
                    $nilai = array();
                    $responseNilai[$this->data['PmbNilai'][$key]['tes_id']] = $this->data['PmbNilai'][$key]['nilai'];

                }

                $this->loadModel('PmbNilai');
                if (empty($this->data['PmbNilai']) || $this->PmbNilai->saveAll($this->data['PmbNilai'])) {
                    $out = json_encode(
                            array('status' => 'success',
                                  'response' => array(
                                    'noreg' => $noreg,
                                    'nilai' => $responseNilai
                                  )
                            )
                        );

                } else {
                    $out = json_encode(
                            array('status' => 'failed',
                                  'response' => array(
                                    'noreg' => $noreg
                                  )
                            )
                        );
                }
                header("Pragma: no-cache");
                header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
                header("Content-Type: text/x-json");
                header("X-JSON: ".$out);
                echo $out;
            }
        }

        $this->loadModel('TcalonMahasiswa');
        $mahasiswa = $this->TcalonMahasiswa->getWithNilai($noreg);
        $this->set(compact('mahasiswa'));
    }


    function tes() {
        $this->set('tperlengkapans', ClassRegistry::init('Tperlengkapan')->find('list'));
        $this->data = ClassRegistry::init('TcalonMahasiswa')->read(null, '0501001');
        pr($this->data);
    }
}
?>
