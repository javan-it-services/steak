<table class="Design" id="tblSearch">
    <thead>
        <tr>
        	<th>NIM</th>
            <th>Nama</th>
            
            <th>Status KSM</th>
            <th>Aksi</th>  
        </tr>
    </thead>
<?php
foreach($formStudis as $form){
	if($form['Tmahasiswa']['NIM'] =="") continue;
	echo "<tr><td>".$form['Tmahasiswa']['NIM']."</td>";
	echo "<td>".$form['Tmahasiswa']['NAMA']."</td>";
	$status = ($form['FormStudi']['status_ksm']=='1')?'sudah cetak':'belum cetak';
	echo "<td><div id=cetak".$form["FormStudi"]["id"].">".$status."</div></td>";
	echo "<td>";
		echo $ajax->link("cetak","",array("url"=>"/form_studis/cetak/".$form["FormStudi"]["id"],"update"=>"cetak".$form["FormStudi"]["id"]));
		echo "&nbsp;&nbsp;&nbsp;".$html->link($html->image('pdficon.png'), array('action'=>'cetak_pdf',$form['Tmahasiswa']['NIM']), array('title'=>'CetakPdf Ksm'),false,false); 
	echo "</td></tr>";
}
?>

</table>