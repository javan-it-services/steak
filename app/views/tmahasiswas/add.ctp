<div class="tmahasiswas form grid_16" id="content" >
	<div class="box">

		<h2 class="section_name"><span class="section_name_span"><?php __(' Daftar Ulang Mahasiswa dengan NIM : ');echo $nim;?></span></h2>
		<?php echo $form->create('Tmahasiswa',array('url'=>'/tmahasiswas/simpan_ksm','class'=>'plain', "type"=>"file"));?>
			<fieldset> 
			<?php
			foreach($jurusan as $data){
				//pr($data);
			
		
				echo "<br>";
                                echo $form->hidden('NIM', array('label'=>'Nama','value'=>$nim,'readOnly'=>TRUE));
                                echo $form->input('NO_REGISTRASI', array('label'=>'No Registrasi','value'=>$data['Tmahasiswa']['NO_REGISTRASI'],'readOnly'=>TRUE));
				echo $form->input('NAMA', array('label'=>'Nama','value'=>$data['Tmahasiswa']['NAMA'],'readOnly'=>TRUE));
				echo $form->input('ALAMAT', array('label'=>'Alamat','value'=>$data['Tmahasiswa']['ALAMAT'],'readOnly'=>TRUE));
				echo $form->input('JENIS_KELAMIN',array('readOnly'=>TRUE,'value'=>$data['Tmahasiswa']['JENIS_KELAMIN'],'label'=>'Jenis Kelamin'));
				echo $form->input('AGAMA',array('label'=>'Agama','value'=>$data['Tagama']['AGAMA_NAME'],'readOnly'=>TRUE));
				echo $form->input('TEMPAT_LAHIR', array('label'=>'Tempat Lahir','value'=>$data['Tmahasiswa']['TEMPAT_LAHIR'],'readOnly'=>TRUE));
				echo $form->input('TGL_LAHIR',array('label'=>'Tanggal Lahir','value'=>$data['Tmahasiswa']['TGL_LAHIR'],'readOnly'=>TRUE));
				echo $form->input('TELEPON', array('label'=>'No Telepon','value'=>$data['Tmahasiswa']['TELEPON'],'readOnly'=>TRUE));
				echo $form->input('KOTA', array('label'=>'Kota','value'=>$data['Tmahasiswa']['KOTA'],'readOnly'=>TRUE));
				echo $form->input('KODEPOS', array('label'=>'Kode Pos','value'=>$data['Tmahasiswa']['KODEPOS'],'readOnly'=>TRUE));
				//echo $form->input('Program',array('value'=>$data['Tprogram']['value'],'readOnly'=>TRUE));
				echo $form->input('Prog/Jurusan',array('value'=>$jur['Refdetil']['value']." - ".$data['Tjurusan']['namaJurusan'],'readOnly'=>TRUE));
				echo $form->input('Kelas',array('value'=>$data['Refkela']['nama'],'readOnly'=>TRUE));
				}
			?>
			</fieldset>
			<hr class="separator" />
		<fieldset>
		
		
				<?php //pr($paket);?>
				Mata Kuliah Wajib Semester Satu
				<form action="" method="get" class="plain" >
				<table class="report">
				<thead>
					<tr>
						<th>Kode</th>
						<th>Matakuliah</th>
						<th>SKS</th>
					<tr>
					</thead>
					<tbody>
		<?php foreach($MataKuliah as $paket):?>
		<? if(empty($MataKuliah)){?>
		
		<tr>
			<td colspan='3'>Mata Kuliah Di semester ini belum ada.</td>
		<tr>
		<?}?>
					<tr>
						<td><?php echo $paket['Tmatakuliah']['KD_KULIAH'];?></td>
						<td><?php echo $paket['Tmatakuliah']['NAMA_KULIAH'];?></td>
						<td><?php echo $paket['Tmatakuliah']['SKS'];?></td>
					<tr>
					</tbody>
		<?php endforeach;?>
				
				</table>
				</form>
       <?php echo $form->input('ambil',array('type'=>'checkbox', 'value'=>'ambil', 'label'=>'Ambil paket Mata kuliah ini'))?>
	
		</fieldset>
                      <?php  echo $form->end('Simpan'); ?>
<div class="clear"></div>		
	</div>
</div>

		
<div class="grid_4 omega" id="sidebar">
	<ul class="special sidebox">
	
				
		<li>
		<?php 
			$jur = $jurusan['0']['Tmahasiswa']['TPROGRAM_ID']."-".$jurusan['0']['Tmahasiswa']['TJURUSAN_ID'];
			echo $html->link($html->image('pdf.png'). __('Cetak KSM Paket', true), array('action'=>'cetak_ksm', 'pdf', $jur ,"?$param"), array('class'=>'tombol'), null, false); 
		?>
		</li>
	</ul>
</div>