<? if(!empty($rekaps)){ ?>
        <p><h3 align="center"><u>Rekapitulasi Absensi</u></h3></p><br>
        <table class='Design'>
        <thead>
        <tr>
        <th>Mahasiswa</th>
        <th>Masuk</th>
        <th>Ijin</th>
        <th>Alpha</th>
        </tr>
        </thead>
        </thead>
        <? foreach($rekaps as $rekap){ ?>
            <tr>
                <td><?= $rekap['NIM']?></td>
                
                <td><?php
                	if($rekap['m'] == 0){
                		echo $rekap['m'];
                	}else{
                	 	echo $ajax -> link($rekap['m'],"" ,array ("url"=>'viewmasuk/'.$rekap['NIM'],'update'=> "waktu".$rekap['NIM'], 'title'=>'Lihat Pertemuan'));
                	}
                	?>
                </td>
                <td>
                	<?php 
                	if($rekap['i'] == 0){
                		echo $rekap['i'];
                	}else{
                		echo $ajax -> link($rekap['i'],"" ,array ("url"=>'viewijin/'.$rekap['NIM'],'update'=> "waktu".$rekap['NIM'], 'title'=>'Lihat Pertemuan'));
                	}
                	?>
                </td>
                <td>
                	<?php 
                	if($rekap['a'] == 0){
                		echo $rekap['a'];
                	}else{
                		echo $ajax -> link($rekap['a'],"" ,array ("url"=>'viewalpa/'.$rekap['NIM'],'update'=> "waktu".$rekap['NIM'], 'title'=>'Lihat Pertemuan'));
                	}
                	?>
                	</td>
            </tr>
            <tr>
            	<td colspan="4">
            	<div id=<?php echo "waktu".$rekap['NIM'] ?>></div>
            	</td>
            </tr>
            <?
        }
        ?>
        </table>
        <?
  }else{
    	echo "<p align=\"center\"><font color=\"red\"><b>Data Tidak Ditemukan!</b></font></p>";
  }
?>