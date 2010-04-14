<?php $currency_format['indonesia'] = array('places'=>2, 'before'=>'Rp ', 'thousands'=>'.', 'decimals'=>',') ?>

<div class="tmahasiswas index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Cari NIM untuk Transaksi Pembayaran');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/keuangan/transaksi', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('NIM', array('label'=>'CARI NIM', 'div'=>'filter', 'fieldset'=>false))?>
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
	if(isset($error2)){
		echo "<p>$error2</p>";
		$payments = "";
	}
	if(isset($payments)){		
		if(!empty($payments)){?>
		<?php foreach($payments as $row):?>
		
		<?php 
	//	if(empty($cek)){
			echo $form->create('KeuanganTransaksi',array('url'=>'/keuangan/add','class'=>'plain', "type"=>"file"));
	//	}else{
	//			echo $form->create('KeuanganTransaksi',array('url'=>'/keuangan/edit/'.$cek['0']['KeuanganTransaksi']['id'],'class'=>'plain'));
	//	}
		?>
			<fieldset> 
			<?php
				echo $form->input('NAMA', array('label'=>'Nama','value'=>$row['Tmahasiswa']['NAMA'],'readonly'=>TRUE));
				echo $form->hidden('mahasiswa_id', array('value'=>$row['Tmahasiswa']['NIM']));
				if(!empty($cek)){
				echo $form->input('no_kwitansi', array('label'=>'No Kwitansi','value'=>$cek['0']['KeuanganTransaksi']['no_kwitansi']));
				}else{
				echo $form->input('no_kwitansi', array('label'=>'No Kwitansi'));
				}
				if(!empty($cek)){
					echo $form->input('bank', array('label'=>'Bank','options'=>$bank,'value'=>$cek['0']['KeuanganTransaksi']['bank']));
					echo $form->input('tanggal',array('label'=>'Tanggal','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash','value'=>$cek['0']['KeuanganTransaksi']['tanggal']));
					if($sisa=="0"){
						echo $form->input('jumlah', array('label'=>'Jumlah','value'=>'',"readOnly"=>TRUE));
					}else{
						echo $form->input('jumlah', array('label'=>'Jumlah'));
					}
				}else{
					echo $form->input('bank', array('label'=>'Bank','options'=>$bank));
					echo $form->input('tanggal',array('label'=>'Tanggal','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash','value'=>date('Y-m-d')));
					echo $form->input('jumlah', array('label'=>'Jumlah'));
				}
				
			?>
			</fieldset>
			
		<?php
			endforeach;
		?>
			Status Pembayaran
			<hr class="separator" />
			<br>
			
		<?php
		if(!empty($jumlah_kewajiban)){
		foreach($jumlah_kewajiban as $wajib){
			echo "<div class='input text'>";
			echo $form->label("Harus Dibayar");
			echo $number->format($wajib['0']['kewajiban'], $currency_format['indonesia']);
			
			echo "</div>";
		
		}
		}else{
			echo "<div class='input text'>";
			echo $form->label("Harus Dibayar");
			echo "0"." [Kewajiban masih kosong]";
			
			echo "</div>";
		}
		
		
		
		if(!empty($jumlah_transaksi)){
		foreach($jumlah_transaksi as $jum){
			echo "<div class='input text'>";
			echo $form->label("Sudah Dibayar");
			
				echo $number->format($jum['0']['jumlah_transaksi'], $currency_format['indonesia']);
			
			echo "</div>";
		
		}
		}else{
		echo "<div class='input text'>";
			echo $form->label("Sudah Dibayar");
			
				echo "0";
			
			echo "</div>";
				
			}
		
		
		echo "<div class='input text'>";
		echo $form->label("Sisa");
		/*if(!$empty($sisa)){
			echo $number->format($sisa, $currency_format['indonesia']);
		}else{
			echo "-----";
		}*/	
		echo $number->format($sisa, $currency_format['indonesia']);
		echo "<br>";
		if(isset($pesan)){
		echo "<p align='center'><b>$pesan</b></p>";
	}
		echo "</div>";
		
		if($sisa!=0){
			echo $form->end('Simpan');
		}else{
			echo " ";
		}
		
		}
	}
	
	
	?>

</div>
</div>
<div class="grid_4 omega" id="sidebar">

</div>