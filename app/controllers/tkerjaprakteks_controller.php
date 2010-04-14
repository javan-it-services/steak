<?php
class TkerjaprakteksController extends AppController {

	var $name = 'Tkerjaprakteks';
	var $helpers = array('Html', 'Form');

	function index() {
		
		if(!empty($this->data)){						
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}		
		$this->Tkerjapraktek->recursive = 0;
		if(!empty($this->params['named'])) {			
            $conditions = array();
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {                	
                    $conditions["Tkerjapraktek.$key LIKE"] = "%".trim($value)."%";
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));
						
			$this->data['Filter'] = $this->params['named'];			
        }
		$this->set('tkerjaprakteks', $this->paginate('Tkerjapraktek'));
		
	}

	function view($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Tkerjapraktek', true), array('action'=>'index'));
		}
		$this->set('tkerjapraktek', $this->Tkerjapraktek->read(null, $id));
	}

	function add($nim=null) {
		if (!empty($this->data)) {
			//pr($this->data);
			$this->Tkerjapraktek->create();
			if ($this->Tkerjapraktek->save($this->data)) {
				$file_name = $this->data['Tkerjapraktek']['file_kp']['name'];
    			$tmp_name  = $this->data['Tkerjapraktek']['file_kp']['tmp_name'];
    			$file_size = $this->data['Tkerjapraktek']['file_kp']['size'];
    			$file_type = $this->data['Tkerjapraktek']['file_kp']['type'];
    			$fp = fopen($tmp_name, 'r');
    			$file_content = fread($fp, filesize($tmp_name));
    			fclose($fp);
				$this->Tkerjapraktek->saveField("file",$file_content);
				$this->Tkerjapraktek->saveField("content_type",$file_type);
				$this->Tkerjapraktek->saveField("filename",$file_name);
				$this->flash(__('Tkerjapraktek saved.', true), array('action'=>'index'));
				$this->redirect(array('action'=>'index'));
			} else {
			}
		}
		
		if($nim){
			$this->set("nim",$nim);
			$mahasiswa = $this->Tkerjapraktek->Tmahasiswa->findByNim($nim);
			$this->set("mahasiswa",$mahasiswa);
		}
		
		$tmahasiswas1 = $this->Tkerjapraktek->Tmahasiswa->find('list');
		$tmahasiswas2 = $this->Tkerjapraktek->Tmahasiswa->find('list');
		$tmahasiswas3 = $this->Tkerjapraktek->Tmahasiswa->find('list');
		$tdosens1 = $this->Tkerjapraktek->Tdosen1->find('list');
		$tdosens2 = $this->Tkerjapraktek->Tdosen2->find('list');
		$this->set(compact('tmahasiswas1','tmahasiswas2','tmahasiswas3','tdosens1','tdosens2'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->flash(__('Invalid Tkerjapraktek', true), array('action'=>'index'));
		}		
		if (!empty($this->data)) {
			if (!empty($this->data['Tkerjapraktek']['file_kp']['name'])) {
				$this->Tkerjapraktek->save($this->data);
				
				$file_name = $this->data['Tkerjapraktek']['file_kp']['name'];
    			$tmp_name  = $this->data['Tkerjapraktek']['file_kp']['tmp_name'];
    			$file_size = $this->data['Tkerjapraktek']['file_kp']['size'];
    			$file_type = $this->data['Tkerjapraktek']['file_kp']['type'];
    			$fp = fopen($tmp_name, 'r');
    			$file_content = fread($fp, filesize($tmp_name));
    			fclose($fp);
				$this->Tkerjapraktek->saveField("file",$file_content);
				$this->Tkerjapraktek->saveField("content_type",$file_type);
				$this->Tkerjapraktek->saveField("filename",$file_name);
				$this->flash(__('Tkerjapraktek saved.', true), array('action'=>'index'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Tkerjapraktek->save($this->data);
    			$this->Session->setFlash(__('The Tkerjapraktek has been saved', true));
				$this->redirect(array('action'=>'index'));
					
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tkerjapraktek->read(null, $id);
		}
		$tmahasiswas1 = $this->Tkerjapraktek->Tmahasiswa->find('list');
		$tmahasiswas2 = $this->Tkerjapraktek->Tmahasiswa->find('list');
		$tmahasiswas3 = $this->Tkerjapraktek->Tmahasiswa->find('list');
	
		$tdosens1 = $this->Tkerjapraktek->Tdosen1->find('list');
		$tdosens2 = $this->Tkerjapraktek->Tdosen2->find('list');
		$this->set(compact('tmahasiswas1','tmahasiswas2','tmahasiswas3','tdosens1','tdosens2'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Tkerjapraktek', true), array('action'=>'index'));
		}
		if ($this->Tkerjapraktek->del($id)) {
			$this->flash(__('Tkerjapraktek deleted', true), array('action'=>'index'));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function downloadfile($id){
		$this->autoRender = false;
		$this->layout = 'ajax';
		$file = $this->Tkerjapraktek->find('first', array('conditions'=> array('Tkerjapraktek.NIM'=>$id)));
		
		header('Content-type:'.$file['Tkerjapraktek']['content_type']);		
		header('Content-Disposition: attachment; filename="'.$file['Tkerjapraktek']['filename'].'"');	
		echo $file['Tkerjapraktek']['file'];	
		exit;		
	}
	
	function cariNIM($nim=null){
		$kp = $this->Tkerjapraktek->find('all', array('conditions'=> array('Tkerjapraktek.NIM'=>$nim)));
		if(!empty($this->data)){
			$url = array (
				"action" => "cariNIM",
				$this->data['Filter']["NIM"]
			);
			$this->redirect($url);
		}
		if($nim){
			$mahasiswa = $this->Tkerjapraktek->Tmahasiswa->findByNim($nim);
			if($mahasiswa){
				$tkerjaprakteks = $this->Tkerjapraktek->find("all",array("conditions"=>array("Tkerjapraktek.NIM"=>$nim)));	
				if(empty($tkerjaprakteks)){
					$this->set("error1","Mahasiswa dengan NIM : <b>".$nim."</b> Belum melakukan kerja praktek");
					
				}
				$this->set("tkerjaprakteks",$tkerjaprakteks);
			}
			else{
				$this->set("error2","Mahasiswa dengan NIM :<b> $nim </b>tidak ditemukan.");
			}
			$this->data["Mahasiswa"]["NIM"] = $nim;
			$this->set("nim",$nim);
		}
		
		$tdosens1 = $this->Tkerjapraktek->Tdosen1->find('list');
		$tdosens2 = $this->Tkerjapraktek->Tdosen2->find('list');
		$this->set(compact('tdosens1','tdosens2'));
	}

}
?>