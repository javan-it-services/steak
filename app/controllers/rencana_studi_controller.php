<?php

class RencanaStudiController extends AppController
{
	var $uses = array();
    var $helpers = array("Fpdf", "Ajax");
    var $components = array("RequestHandler");

    function index(){
    	$this->loadModel('User');
    	$user = $this->Session->read("Auth");
    	$nip= $user['User']['USERNAME'];
        $this->loadModel('Tkelase');
        $this->loadModel('Tdosen');
		$dosen = $this->Tdosen->findByNipDosen($nip);
		$conditions = array("Tkelase.TDOSEN_ID"=>$nip, "Tmatakuliah.IS_BUKA"=>1);
		$this->loadModel('Option');
		$option= $this->Option->find('all');
		$this->loadModel('Tkelase');
		$this->Tkelase->recursive = 0;
        $conditions = array("Tkelase.TDOSEN_ID"=>$nip, "Tmatakuliah.IS_BUKA"=>1, "Tkelase.TTAHUN_AJARAN_ID" => $option['0']['Option']['ttahun_ajaran_id'], "Tkelase.TSEMESTER_ID"=>$option['0']['Option']['tsemester_id']);
		$kelas = $this->Tkelase->find("all", array("conditions"=>$conditions));
        

		
        if(!empty($this->data)){			
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}elseif(!empty($this->params['named'])) {
            $conditions = array();
            $conditions = array("Tkelase.TDOSEN_ID"=>$nip, "Tmatakuliah.IS_BUKA"=>1);
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["Tkelase.$key LIKE"] = "%".trim($value)."%";
                }
            }
            
            $this->paginate = array_merge($this->paginate, array('conditions' => $conditions));
			
        }else{
        	$this->loadModel('Option');
			$option = $this->Option->find("first");
			$this->data['Filter']['TTAHUN_AJARAN_ID'] = $option['Option']['ttahun_ajaran_id'];
			$this->data['Filter']['TSEMESTER_ID'] =	$option['Option']['tsemester_id'];
			$conditions['TTAHUN_AJARAN_ID'] = 	$option['Option']['ttahun_ajaran_id'];
			$conditions['TSEMESTER_ID'] = 	$option['Option']['tsemester_id'];
			$this->paginate = array_merge($this->paginate, array('conditions' => $conditions));
		}
        
        $this->loadModel('Tkelase');
		$ttahunajarans = $this->Tkelase->TtahunAjaran->find('list');
		$tsemesters = $this->Tkelase->Tsemester->find('list');
		$this->set(compact('ttahunajarans','tsemesters','option','dosen'));
		$this->set('kelas', $this->paginate('Tkelase'));    




    }

    function add($k=null){
    	if (!empty($this->data)) {
    		$this->loadModel('TsilabusMingguan');
			$this->TsilabusMingguan->create();
			if ($this->TsilabusMingguan->save($this->data)) {
				$counters=$this->data['TsilabusMingguan']['file_tugas'];
				$this->set('counters', $counters);
				$index= -1;
				$nama= 0 ;
				$this->set('index', $index);
				$this->set('nama', $nama);
				foreach ($counters as $counter ) :
				$index = $index + 1;
				$nama = $nama + 1;
				$this->loadModel('Tfile');
				$this->Tfile->create();
				$start = strrpos($this->data['TsilabusMingguan']['file_tugas'][$index]['name'],".");
				$ext = substr($this->data['TsilabusMingguan']['file_tugas'][$index]['name'],$start);
				move_uploaded_file($this->data['TsilabusMingguan']['file_tugas'][$index]['tmp_name'],WWW_ROOT."files/".$this->TsilabusMingguan->getInsertID()."-".$nama.$ext);
				$this->Tfile->save(array(
					'nama_file' => $this->data['TsilabusMingguan']['file_nama'][$index],
					'tsilabus_mingguan_id' => $this->TsilabusMingguan->getInsertID(),
					'download_file' => $this->TsilabusMingguan->getInsertID()."-".$nama.$ext
				));
				endforeach;

				$this->flash(__('TsilabusMingguan saved.', true), array('action'=>'index'));
				$this->redirect(array('controller'=>'rencana_studi','action'=>'index'));
			} else {

			}
    	}
		else {
				$this->set('k', $k  );

		}


    }

    function view($k = null){
    	$this->loadModel('TsilabusMingguan');
    	$this->TsilabusMingguan->recursive = 2;
    	$rencanastudis = $this->TsilabusMingguan->find('all',array ('conditions' => array('TsilabusMingguan.KD_KULIAH' => $k)));
    	$this->set(compact('rencanastudis', 'k'));

    }

    function edit($id = null) {
    	$this->loadModel('TsilabusMingguan');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid TsilabusMingguan', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
				$this->loadModel('TsilabusMingguan');
			if ($this->TsilabusMingguan->save($this->data)) {
				$this->Session->setFlash(__('The TsilabusMingguan has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TsilabusMingguan could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->loadModel('Tsilabusmingguan');
			$this->data = $this->TsilabusMingguan->read(null, $id);
		}
		$this->loadModel('Tfile');
		$files=$this->Tfile->find('all', array('conditions' => array('Tfile.tsilabus_mingguan_id'=>$id)));
		$this->set('files', $files);

	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TsilabusMingguan', true));
			$this->redirect(array('action'=>'index'));
		}
			$this->loadModel('TsilabusMingguan');
		if ($this->TsilabusMingguan->del($id)) {
			$this->Session->setFlash(__('TsilabusMingguan deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function delfile($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for File', true));
			$this->redirect(array('action'=>'index'));
		}
			$this->loadModel('Tfile');
		if ($this->Tfile->del($id)) {
			$this->Session->setFlash(__('File deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function browse($id) {
		$this->layout="ajax";
		$this->set('id',$id);
		$this->loadModel('Tfile');
		$files=$this->Tfile->find('first', array('conditions' => array('Tfile.id'=>$id)));
		$this->set('files',$files);
		$download_file = $files['Tfile']['download_file'];
		$file = explode (".",$download_file);
		$f = $file['0'];
		$this->set('f',$f);
		//pr($f);
	}

	function editfile($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Tfile', true), array('action'=>'index'));
		}
			$this->loadModel('Tfile');
			$files=$this->Tfile->find('first', array('conditions' => array('Tfile.id'=>$id)));
			$this->set('files',$files);
			$download_file = $files['Tfile']['download_file'];
			$file = explode (".",$download_file);
			$f = $file['0'];
			$this->set('f',$f);
			//pr($f);
		if (!empty($this->data)) {
			$this->loadModel('Tfile');
			$this->Tfile->create();
			$start = strrpos($this->data['Tfile']['file_tugas']['name'],".");
			$ext = substr($this->data['Tfile']['file_tugas']['name'],$start);
			move_uploaded_file($this->data['Tfile']['file_tugas']['tmp_name'],WWW_ROOT."files/".$this->data['Tfile']['download_file'].$ext);
			if($this->Tfile->save($this->data)) {
					$this->loadModel('Tfile');
					$this->Tfile->saveField('nama_file', $this->data['Tfile']['nama_file']);
					$this->Tfile->saveField('download_file', $this->data['Tfile']['download_file'].$ext);

			$this->redirect(array('action'=>'index'));

			} else {
			}
		}

		if (empty($this->data)) {
			$this->loadModel('Tfile');
			$this->data = $this->Tfile->read(null, $id);
		}

	}



	function addfile($k=null){

    	if (!empty($this->data)) {
    	$this->loadModel('Tfile');
    	$file = $this->Tfile->find('first', array('conditions'=> array('tsilabus_mingguan_id'=>$this->data['Tfile']['file_expl'] ), 'order'=>'Tfile.id DESC'));
		$namafile = $file['Tfile']['download_file'];
		$namexp = explode (".",$namafile);
		$explode = $namexp['0'];
		$expl = explode ("-",$explode);
		$exp = $expl[1];
		$this->set('exp', $exp);

			if ($this->Tfile->save($this->data)) {
				$counters=$this->data['Tfile']['file_expl'];
				$this->set('counters', $counters);
				$index= -1;
				$nama= $exp ;
				$this->set('index', $index);
				$this->set('nama', $nama);
				foreach ($counters as $counter ) :
				$index = $index + 1;
				$nama = $nama + 1;
				$this->loadModel('Tfile');
				$this->Tfile->create();
				$start = strrpos($this->data['Tfile']['file_tugas'][$index]['name'],".");
				$ext = substr($this->data['Tfile']['file_tugas'][$index]['name'],$start);
				move_uploaded_file($this->data['Tfile']['file_tugas'][$index]['tmp_name'],WWW_ROOT."files/".$this->data['Tfile']['file_expl'][$index]."-".$nama.$ext);
				$this->Tfile->save(array(
					'nama_file' => $this->data['Tfile']['file_nama'][$index],
					'tsilabus_mingguan_id' => $this->data['Tfile']['file_expl'][$index],
					'download_file' => $this->data['Tfile']['file_expl'][$index]."-".$nama.$ext
				));
				endforeach;


				$this->flash(__('Tfile saved.', true), array('action'=>'index'));
				$this->redirect(array('controller'=>'rencana_studi','action'=>'index'));
			} else {}


    	}
    	$this->set('k', $k  );
    }


}
