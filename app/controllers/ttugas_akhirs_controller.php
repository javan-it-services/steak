<?php
class TtugasAkhirsController extends AppController {


	var $name = 'TtugasAkhirs';
	var $helpers = array('Html', 'Form');
	
	function index() {
		
		if(!empty($this->data)){						
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}		
		$this->TtugasAkhir->recursive = 0;
		if(!empty($this->params['named'])) {			
            $conditions = array();
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {                	
                    $conditions["TtugasAkhir.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));			
			$this->data['Filter'] = $this->params['named'];			
        }
		$this->set('ttugasAkhirs', $this->paginate('TtugasAkhir'));
		
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid TtugasAkhir', true), array('action'=>'index'));
		}
		$this->set('ttugasAkhir', $this->TtugasAkhir->read(null, $id));
	}

	function add() {
			
			
		if (!empty($this->data)) {
			$this->TtugasAkhir->create();
				
				$file_name = $this->data['TtugasAkhir']['file_download']['name'];
    			$tmp_name  = $this->data['TtugasAkhir']['file_download']['tmp_name'];
    			$file_size = $this->data['TtugasAkhir']['file_download']['size'];
    			$file_type = $this->data['TtugasAkhir']['file_download']['type'];
    			$fp = fopen($tmp_name, 'r');
    			$file_content = fread($fp, filesize($tmp_name));
    			fclose($fp);
			/*	$this->TtugasAkhir->saveField("file",$file_content);
				$this->TtugasAkhir->saveField("content_type",$file_type);
				$this->TtugasAkhir->saveField("file_name",$file_name);*/
			$this->data['TtugasAkhir']['content_type'] = $file_type;
                        $this->data['TtugasAkhir']['file'] = $file_content;
                        $this->data['TtugasAkhir']['file_name'] = $file_name;
                        if ($this->TtugasAkhir->save($this->data)) {

				$this->Session->setFlash(__('The TugasAkhir has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TtugasAkhir Error', true));
				$this->redirect(array('action'=>'index'));
				
			}
		}
		$tdosens1 = $this->TtugasAkhir->Tdosen1->find('list');
		$tdosens2 = $this->TtugasAkhir->Tdosen2->find('list');
		$tmahasiswas1 = $this->TtugasAkhir->Tmahasiswa->find('list');
		$tmahasiswas2 = $this->TtugasAkhir->Tmahasiswa->find('list');
		$tmahasiswas3 = $this->TtugasAkhir->Tmahasiswa->find('list');
		$this->set(compact('tmahasiswas1','tmahasiswas2','tmahasiswas3','tdosens1','tdosens2'));
	}

	function edit($id = null) {
		
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid TtugasAkhir', true), array('action'=>'index'));
		}
		if (!empty($this->data)) {
			//if ($this->TtugasAkhir->save($this->data)) {
				if(!empty($this->data['TtugasAkhir']['file_download']['name'])){
				$this->TtugasAkhir->save($this->data);
					
				$file_name = $this->data['TtugasAkhir']['file_download']['name'];
    			$tmp_name  = $this->data['TtugasAkhir']['file_download']['tmp_name'];
    			$file_size = $this->data['TtugasAkhir']['file_download']['size'];
    			$file_type = $this->data['TtugasAkhir']['file_download']['type'];
    			$fp = fopen($tmp_name, 'r');
    			$file_content = fread($fp, $file_size);
    			fclose($fp);
    			
    				
				$this->TtugasAkhir->saveField("file",$file_content);
				$this->TtugasAkhir->saveField("content_type",$file_type);
				$this->TtugasAkhir->saveField("file_name",$file_name);
				$this->Session->setFlash(__('The TtugasAkhir has been saved', true));
				$this->redirect(array('action'=>'index'));
				
    			}else{
    				$this->TtugasAkhir->save($this->data);
    				$this->Session->setFlash(__('The TtugasAkhir has been saved', true));
				$this->redirect(array('action'=>'index'));
					
    			}
				
		
		}
		if (empty($this->data)) {
			$this->data = $this->TtugasAkhir->read(null, $id);
		}
		
		$tdosens1 = $this->TtugasAkhir->Tdosen1->find('list');
		$tdosens2 = $this->TtugasAkhir->Tdosen2->find('list');
		$tmahasiswas1 = $this->TtugasAkhir->Tmahasiswa->find('list');
		$tmahasiswas2 = $this->TtugasAkhir->Tmahasiswa->find('list');
		$tmahasiswas3 = $this->TtugasAkhir->Tmahasiswa->find('list');
		
		$this->set(compact('tmahasiswas1','tmahasiswas2','tmahasiswas3','tdosens1','tdosens2'));
	}

	function delete($id = null) {
		if (!$id){
			$this->Session->setFlash(__('TtugasAkhir deleted', true));
			$this->redirect(array('action'=>'index'));
			
		}
		if ($this->TtugasAkhir->del($id)) {
			$this->Session->setFlash(__('TtugasAkhir deleted', true));
			$this->redirect(array('action'=>'index'));
			
		}
	}
	
	function downloadfile($id){
		$this->autoRender = false;
		$this->layout = 'ajax';
		$file = $this->TtugasAkhir->find('first', array('conditions'=> array('TtugasAkhir.NIM'=>$id)));
		//$this->set('file', $file);
		//pr($file);
		header('Content-type:'.$file['TtugasAkhir']['content_type']);
		header('Content-Disposition: attachment; filename="download"');	
		echo $file['TtugasAkhir']['file'];	
		
	}
	
	function cariNIM($id=null){
		//pr($this->data);
		if(!empty($this->data)){
			$url = array (
				"action" => "cariNIM",
				$this->data['Filter']["NIM"]
			);
			$this->redirect($url);
		}
		if($id){
			$mahasiswa = $this->TtugasAkhir->Tmahasiswa->findByNim($id);
			if($mahasiswa){
				$ttugasAkhirs = $this->TtugasAkhir->find("all",array("conditions"=>array("TtugasAkhir.NIM"=>$id)));	
				if(empty($ttugasAkhirs)){
					$this->set("error1","Tidak ada history Tugas Akhir");
				}
				$this->set("ttugasAkhirs",$ttugasAkhirs);
				//pr($ttugasAkhirs);
			}
			else{
				$this->set("error2","Mahasiswa dengan NIM : $id tidak ditemukan.");
			}
			$this->data["Mahasiswa"]["NIM"] = $id;
			$this->set("nim",$id);
		}
		
		if (empty($this->data)) {
			$this->data = $this->TtugasAkhir->read(null, $id);
		}
		$tdosens1 = $this->TtugasAkhir->Tdosen1->find('list');
		$tdosens2 = $this->TtugasAkhir->Tdosen2->find('list');
		$tmahasiswas1 = $this->TtugasAkhir->Tmahasiswa->find('list');
		$this->set(compact('tmahasiswas1','tdosens1','tdosens2'));
	}
	

}
?>