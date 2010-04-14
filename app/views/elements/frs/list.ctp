<?php if(!empty($kartuStudis)):?>
<table class="Design" id="tblSearch">
    <thead>
        <tr>
        	<th>Pilih</th>
            <th colspan='2'>Mata Kuliah yang diambil</th>
            <th>SKS</th>
            <th>Kelas</th>        
            <th>Jadwal</th>
        </tr>
    </thead>
    <?php
    
$hari=array("1"=>"Senin",
"Selasa","Rabu","Kamis","Jum'at","Sabtu","Minggu");
    $rows = 0;
    //pr($kartuStudis);   
    echo "<input type=hidden name=data[formid] value=".$kartuStudis[0]['KartuStudi']['form_studi_id'].">";
    foreach($kartuStudis as $kartustudi){
    		//pr($kartustudi);	
		echo "<tr>" .
				"<td><input type=checkbox name=data[krs][$rows][check]></td>".
				"<td>".$kartustudi["Tkelase"]["Tmatakuliah"]["KD_KULIAH"] . "</td><td>".$kartustudi["Tkelase"]["Tmatakuliah"]["NAMA_KULIAH"]."</td>" .
				"<td>".$kartustudi["Tkelase"]["Tmatakuliah"]["SKS"]."</td>" .
				"<td>".$kartustudi["Tkelase"]["NAMA_KELAS"]."</td>";
		
		echo "<td>" ;
		//pr($kartustudi['Tkelase']["Jadwal"]);
				foreach($kartustudi['Tkelase']["Jadwal"] as $jadwal){
					//echo "jadwal ".$jadwal['hari'];
					echo $hari[$jadwal['hari']]."--".$jadwal['Twaktus']['WAKTU_BEGIN']."<br>";
				}
				echo "</td>";
		echo	"<input type='hidden' name=data[krs][$rows][kelas] value=".$kartustudi["KartuStudi"]["id"].">".
				
				"</tr>";
				$rows ++;
	}
    ?>
  </table>
 <?php 
 	if($kartuStudis[0]['FormStudi']['status_ksm']!='0'){
  echo $ajax->submit(__('Hapus Terpilih', true),array("url"=>"/frs/hapus","update"=>"list_frs", "complete"=>"$$('tr:nth-child(even)').each(function(e){e.addClassName('even'); });"));
}
 else{
   echo $form->submit(__('Download PDF', true));
 }
 
 if(empty($kartuStudis)){
 	echo "<p>Belum memiliki rencana studi.</p>";
 }
 endif;?>
  