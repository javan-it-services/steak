<?php
/*
 * Created on Jul 16, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 class StatistikController extends AppController {

	var $name = 'Statistik';
	var $uses = array('Tmahasiswa','Statistik');
	var $helpers = array('FlashChart');
	function index(){

	}

	function keuangan(){

		if(!empty($this->data)){
			$url = array("action"=>"index");
			foreach($this->data['Filter'] as $key => $value){
				$url[$key] = $value;
			}
			$this->redirect($url);
		}
		$this->Statistik->recursive = 0;


		if(empty($this->params['named'])) {
            $conditions = array();
            foreach($this->params['named'] as $key => $value) {
                if($key!="page"&&$key!="sort"&&$key!="direction" && !empty($value)) {
                    $conditions["TstatusPembayaran.$key LIKE"] = "%".trim($value)."%" ;
                }
            }
            $this->paginate = array_merge($this->paginate, array(
				'conditions' => $conditions,
			));
			$this->data['Filter'] = $this->params['named'];
        }


		//$this->set('Statistiks', $this->paginate('Statistik'));
		$tahunajarans = $this->Statistik->TtahunAjaran->find('list');
		$tsemesters = $this->Statistik->Tsemester->find('list');
		$this->set(compact('tahunajarans','tsemesters'));
	}

	function test() {
		if($this->data['Filter']['kriteria'] == 'AGAMA'){
			$x = $Islam = $Kristen = $Hindu = $Buddha =$Katolik = $Kepercayaan = array();
			$max = 0;
			$statAgama = $this->Statistik->getAgama();

			$x[] = $statAgama[0]['ta']['nama']; // tahun awal
			$x[] = $statAgama[count($statAgama) - 1]['ta']['nama']; // tahun akhir
			$x[] = 1; // step
			//pr($statAgama);
			foreach($statAgama as $sa){
				$max = max($max,$sa[0]['Islam'],$sa[0]['Kristen'],$sa[0]['Hindu'],$sa[0]['Buddha'],$sa[0]['Katolik'],$sa[0]['Kepercayaan']);
				$Islam[] = $sa[0]['Islam'];
				$Kristen[] = $sa[0]['Kristen'];
				$Hindu[] = $sa[0]['Hindu'];
				$Buddha[] = $sa[0]['Buddha'];
				$Katolik[] = $sa[0]['Katolik'];
				$Kepercayaan[] = $sa[0]['Kepercayaan'];


			}

			$y = $this->prepareAxisY($max);
			$this->set(compact('x','Islam','Kristen','Hindu','Buddha','Katolik','y'));
			$this->set('statAgama',$statAgama);
			$this->set('Islam',$Islam);
			$this->set('Kristen',$Kristen);
			$this->set('Hindu',$Hindu);
			$this->set('Buddha',$Buddha);
			$this->set('Katolik',$Katolik);
			$this->set('Kepercayaan',$Kepercayaan);
		}else{
			$x = $laki=$perempuan=array();
			$max = 0;
			$this->loadModel('Statistik');
			$statJenkel = $this->Statistik->getJenkel();
			//pr($statJenkel);
			$x[] = $statJenkel[0]['ta']['nama']; // tahun awal
			$x[] = $statJenkel[count($statJenkel) - 1]['ta']['nama']; // tahun akhir
			$x[] = 1; // step

			foreach($statJenkel as $sj){
				$max = max($max,$sj[0]['laki'],$sj[0]['perempuan']);
				$laki[] = $sj[0]['laki'];
				$perempuan[] = $sj[0]['perempuan'];
			}
			$y = $this->prepareAxisY($max);
			$this->set(compact('x','laki','perempuan', 'y'));

		}
	}

	function prepareAxisY($max){
		$min_entry = 0;
		$max_entry = 10;
		$step = 1;
		if(!empty($max)){
			$min = 0;
			$strMax = strval(intval($max));
			$digitCount = strlen($strMax);
			$max_entry = ceil(($max/pow(10,$digitCount-1))) * pow(10,($digitCount-1));
			$step = pow(10,$digitCount-1)/2;
		}
		return array($min_entry,$max_entry,$step);
	}

}

?>
