<?php
$header = array("No","Mata Kuliah", "SKS");
$colWidth = array(15,110,65);

$ksm->setup();
$fpdf->title = "KARTU STUDI MAHASISWA";

$ksm->AddPage();
$ksm->MultiCell(0,5,"");
$ksm->MultiCell(0,5,"");
$ksm->MultiCell(0,5,"NIM	:	"	.$mahasiswa['Tmahasiswa']['NIM']);
$ksm->MultiCell(0,5,"Nama	:	"	.$mahasiswa['Tmahasiswa']['NAMA']);
$ksm->MultiCell(0,5,"Dosen Wali	:	".$mahasiswa['Tdosen']['NAMA_DOSEN']);
$ksm->MultiCell(0,5,"Semester	:	".$kartuStudis[0]['FormStudi']['Tsemester']['NAME']."/".$kartuStudis[0]['FormStudi']['TtahunAjaran']['nama']);
$ksm->MultiCell(0,5,"");
$ksm->Ln();
//$ksm->fancyTable($header, $colWidth, $data);
$ksm->setWidths($colWidth, 'i');
$ksm->SetFillColor(240,250,250);
$ksm->SetDrawColor(230,230,230);

		$ksm->printTH($header);
		$ksm->Ln();

		//Tampilkan data utama disini
		//$ksm->SetFont('helvetica','',8);
		$i=0;
		
		//
		foreach($kartuStudis as $row)
		{
            //foreach($model as $row){
            	$data = array();
            	$data[] = ++$i;
            	$data[] = $row['Tkelase']['Tmatakuliah']['KD_KULIAH']." - ".$row['Tkelase']['Tmatakuliah']['NAMA_KULIAH'];
            	$data[] = $row['Tkelase']['Tmatakuliah']['SKS'];
            	//pr($data);
    			$ksm->Row($data);
            //}
		}
		//exit();
		$ksm->Ln(8);
echo $ksm->fpdfOutput();
?>
