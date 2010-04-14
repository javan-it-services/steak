<?php
$header = array("No", "NIM", "Nama", "Nilai", "Indeks");
$colWidth = array(20,40,23,24,24,24,24);

$fpdf->setup();
$fpdf->AddPage();

$fpdf->printTitle("Daftar Nilai Mahasiswa");
$subtitle = array(
	"Mata Kuliah".$kelas['Tmatakuliah']['NAMA_KULIAH']."(".$kelas['Tmatakuliah']['KD_KULIAH'].")",
	"Kelas ".$kelas['Tkelase']['NAMA_KELAS'],
	"Dosen ".$kelas['Tdosen']['NAMA_DOSEN']
				  );

$fpdf->SetFont('helvetica','B',8);
$fpdf->Cell($fpdf->GetStringWidth($subtitle[0]),3,$subtitle[0],0,2,"L","","");
$fpdf->SetFont('Arial','',8);
$fpdf->Cell($fpdf->GetStringWidth($subtitle[1]),3,$subtitle[1],0,2,"L","","");
$fpdf->SetFont('Helvetica','',6);
$fpdf->Cell($fpdf->GetStringWidth($subtitle[2]),3,$subtitle[2],0,2,"L","","");

//$fpdf->fancyTable($header, $colWidth, $data);
$fpdf->setWidths($colWidth, 'i');
$fpdf->ImprovedTable($header,$data);
echo $fpdf->fpdfOutput();
?>
