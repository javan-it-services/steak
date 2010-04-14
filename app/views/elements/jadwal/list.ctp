<table class="Design" id="tblSearch">
    <thead>
        <tr>
        	<th>Hari</th>
            <th >Jam Mulai</th>
            <th>Ruang</th>
                    
            
        </tr>
    </thead>
<?
//pr($jadwals);

$hari=array("1"=>"Senin",
"Selasa","Rabu","Kamis","Jum'at","Sabtu","Minggu");
	foreach($jadwals as $jadwal){
		echo "<tr>";
		echo "<td>".$hari[$jadwal['Jadwal']['hari']]."</td>" .
				"<td>".$jadwal['Twaktus']['WAKTU_BEGIN']."</td>" .
						"<td>".$jadwal['TruangKuliah']['RUANG_NAME']."</td>";
		echo "</tr>";
		
		if($jadwal==""){
			echo "<tr>";
				echo "<td colspan='2'> Jadwal Masih Kosong </td>";
			echo "</tr>";
				
		}
	}
?>
</table>