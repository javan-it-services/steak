<?php $currency_format['indonesia'] = array('places'=>2, 'before'=>'Rp ', 'thousands'=>'.', 'decimals'=>',') ?>
<div class="tstatus_pembayarans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Cari Status Pembayaran');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/keuangan/cariNIM', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('NIM', array('label'=>'NIM', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>
<?php
	
	if(isset($error)){
		echo "<p>$error</p>";
	}
	if(isset($payments)){		
		if(!empty($payments)):?>

<table class="report">
                            <tr>
                                <td>
                                    NIM 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php
                                        echo $data['Tmahasiswa']['NIM'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    NAMA 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php
                                        echo $data['Tmahasiswa']['NAMA'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ALAMAT 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php
                                        echo $data['Tmahasiswa']['ALAMAT'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    TEMPAT LAHIR 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php
                                        echo $data['Tmahasiswa']['TEMPAT_LAHIR'];
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    TANGGAL LAHIR 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php
                                        echo $data['Tmahasiswa']['TGL_LAHIR'];
                                    ?>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    KELAS KULIAH 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php
                                        echo $data['Refkela']['nama'];
                                    ?>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    PROG. / JURUSAN 
                                </td>
                                <td>:</td>
                                <td>
                                    <?php
                                        echo $jurusan['Refdetil']['value']." - ".$jurusan['Tjurusan']['namaJurusan'];
                                    ?>
                                </td>
                            </tr>
</table>

<table class="report">
     Kewajiban Pembayaran
     <thead>
				<tr>
					<th>Kewajiban</th>
					<th>Jumlah</th>
				</tr>
			</thead>
				<?php
					foreach($listKewajiban as $list):
				?>
			<tbody>
				<tr>
					<td>
						<?php echo $list['KeuanganMaster']['nama']; ?>
					</td>
					<td>
						<?php echo $list['Kewajiban']['jumlah']; ?>
					</td>
				</tr>
			</tbody>
				<?php endforeach;?>
				
			</table>

			<table class="Design">
                           
				<thead>
					<tr>
						<th>Tahun Ajaran</th>
						<th>Semester</th>
						<th>No Kwitansi</th>
						<th>Tanggal</th>
						<th>Bank</th>
						<th>Harus dibayar</th>
						<th>Sudah dibayar</th>
						<th>Sisa</th>
					</tr>
				</thead>
				<?php foreach($payments as $row):
					//pr($row);
				?>
				<tr>
					<td><?php echo $row['TtahunAjaran']['nama']?></td>
					<td><?php echo $row['Tsemester']['NAME']?></td>
					<td><?php echo $row['KeuanganTransaksi']['no_kwitansi']?></td>
					<td><?php echo $row['KeuanganTransaksi']['tanggal']?></td>
					<td><?php echo $row['Tbank']['nama']?></td>
					<td align="right">
					<?php
						if(!empty($jumlah_kewajiban)){
		foreach($jumlah_kewajiban as $wajib){
			echo "<div class='input text'>";
			echo $number->format($wajib['0']['kewajiban'], $currency_format['indonesia']);
			echo "</div>";
		}
		}else{
			echo "<div class='input text'>";
			echo "0";
			echo "</div>";
		}
		?>
					</td>

			<td align="right">
			<?php
		$j = 0;
                
				if(!empty($jumlah_transaksi)){
		//foreach($jumlah_transaksi as $jum){
		//pr($jumlah_transaksi);
			echo "<div class='input text'>";
			if($j != $row['KeuanganTransaksi']['jumlah']){
				echo $row['KeuanganTransaksi']['jumlah'];
				//echo $number->format($row['KeuanganTransaksi']['jumlah'], $currency_format['indonesia']);
			}		
			echo "</div>";
		//}
		}else{
		echo "<div class='input text'>";
				echo "0";
			echo "</div>";
			}
			?>
			</td>
			
		<td align="right">
			<?php
		echo "<div class='input text'>";
               $sisa2 =  $jumlah_kewajiban['0']['0']['kewajiban'] - $row['KeuanganTransaksi']['jumlah'];
		echo $number->format($sisa2, $currency_format['indonesia']);
		echo "<br>";
		?>
			</td>
					
					
				</tr>
				<?php endforeach;?>
			</table>
		<?php
		endif;
	}
	
	
?>
</div>
</div>
<div class="grid_4 omega" id="sidebar">

</div>