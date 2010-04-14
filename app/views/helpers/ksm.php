<?php
App::import('fpdf/fpdf');

if (!defined('PARAGRAPH_STRING')) define('PARAGRAPH_STRING', '~~~');

class ksmHelper extends FPDF {
    var $title="";
    var $helpers = array();
    var $widths = null;
	var $aligns;
	var $padding = 5;
    function fpdfHelper ($orientation='P',$unit='mm',$format='A4') {
        $this->FPDF($orientation, $unit, $format);
    }

    function setup ($orientation='P',$unit='mm',$format='A4') {
        $this->FPDF($orientation, $unit, $format);
    }

    function fpdfOutput ($name = 'page.pdf', $destination = 's') {
        return $this->Output($name, $destination);
    }

	var	$header = array(
	"KSMs",
	"Jln. Bojong Kaler No. 37B RT 02/12, Kelurahan Cigadung",
	"BANDUNG 40133",
	"Telp: 022-703 84 797/ Fax: 022-2503404 (d/a Tobucil)"
	);


	function Header()
	{
		$this->SetFont('helvetica','B',8);
		//$this->Cell($this->GetStringWidth($this->header[0]),3,$this->header[0],0,2,"L","","");
		$this->SetFont('Arial','',8);
		/*$this->Cell($this->GetStringWidth($this->header[1]),3,$this->header[1],0,2,"L","","");
		$this->SetFont('Helvetica','',6);
		$this->Cell($this->GetStringWidth($this->header[2]),3,$this->header[2],0,2,"L","","");
		$this->Cell($this->GetStringWidth($this->header[3]),3,$this->header[3],0,2,"L","","");
		*/
		$this->Ln(4);
		$str = "Kartu Studi Mahasiswa";
		$this->Cell($this->w,3,$str,0,2,"C","","");
	}

	//Page footer
	function Footer()
	{
		//Position at 1.5 cm from bottom
		$this->SetY(-40);
		//	Page number
		$this->Cell(0,10,'Halaman '.$this->PageNo(),0,0,'C');
	}


	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}
	function setSalam($salam){
		if (is_array($salam)){
			foreach ($salam as $label=>$isi){
				$this->salam[$label] = $isi;
			}
		}
	}
	function setWidths($th,$mode='s'){
		if(is_array($th)){
			if((strtolower($mode) == 's')){
				for($i=0;$i<count($th);$i++){
					if(! isset($this->widths[$i]))
					$this->widths[$i] = $this->GetStringWidth($th[$i]) +  $this->padding;
				}
			}elseif(strtolower($mode) == 'i'){
				foreach ($th as $id=>$w){
					$this->widths[$id] = $w;
				}
			}
		}
	}
	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++){
    		$nb=max($nb,$this->NbLines($this->widths[$i],current($data)));
            next($data);
        }
		$h=5*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
        reset($data);
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,5,current($data),0,$a);
            next($data);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
			$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
					$i++;
				}
				else
				$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
			$i++;
		}
		return $nl;
	}


	function printTitle($s=null){
		$this->SetFont('helvetica','B',9);
		$this->Cell($this->GetStringWidth($this->title),8,($s)?$s:$this->title,0,2,'C');
	}
	function printTH($header){
		if(!$this->widths)
			$this->setWidths($header);
		for($i=0;$i<count($header);$i++){
			$this->Cell($this->widths[$i],6,$header[$i],1,0,'C',1);
		}
	}
	//Better table
	function ImprovedTable($header,$data,$option=array("banner"=>false,"salam"=>false))
	{
		//judul halaman
		//$this->printTitle();

		//Header tabel
		$this->SetFillColor(240,250,250);
		$this->SetDrawColor(230,230,230);
		$this->printTH($header);
		$this->Ln();

		//Tampilkan data utama disini
		$this->SetFont('helvetica','',8);
		foreach($data as $model)
		{
            foreach($model as $row){
    			$this->Row($row);
            }
		}
		$this->Ln(8);

	}

	//Colored table
	function FancyTable($header,$data)
	{
		//Colors, line width and bold font
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');
		//Header
		$w=array(40,35,40,45,10,100);
		for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',1);
		$this->Ln();
		//Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		//Data
		$fill=0;
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
			$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
			$this->Cell($w[2],6,($row[2]),'LR',0,'R',$fill);
			$this->Cell($w[3],6,($row[3]),'LR',0,'R',$fill);
			$this->Cell($w[2],6,($row[4]),'LR',0,'R',$fill);
			$this->Cell($w[3],6,($row[5]),'LR',0,'R',$fill);
			$this->Ln();
			$fill=!$fill;
		}
		$this->Cell(array_sum($w),0,'','T');
	}

}
?>
