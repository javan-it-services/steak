<div class="tmahasiswas form grid_16" id="content" >
	<div class="box">

		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Penerimaan Calon Mahasiswa Baru');?></span></h2>
		<?php echo $form->create('TcalonMahasiswa',array('class'=>'plain', "type"=>"file"));?>
					<fieldset> Test Masuk
			<?php
				echo $form->input('ruang_test', array('label'=>'Ruang'));
				echo $form->input('tanggal_test',array('label'=>'Tanggal','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
				echo $form->input('nilai_matematika', array('label'=>'Nilai Matematika'));
				echo $form->input('nilai_kemampuan', array('label'=>'Nilai Kemampuan'));
				echo $form->input('nilai_bahasa', array('label'=>'Nilai Bahasa'));
				//echo $form->input('nilai_rata2', array('label'=>'Nilai Rata - rata'));
				
			?>
			</fieldset>
			<hr class="separator" />
						<script type="text/javascript">
				function tampil($form){
					$form.target = "upload_target";
					$form.action = "<?php echo $html->url("/tmahasiswas/upload");?>";
					$form.submit();
					$form.target ="";
					$form.action = "<?php echo $html->url("/tmahasiswas/add");?>";

				}
			</script>
		<?php echo $form->end('Simpan');?>
	</div>
</div>
<!--<div class="actions">-->
<!--	<ul>-->
<!--		<li><?php echo $html->link(__('Lihat Daftar Mahasiswa', true), array('action'=>'index'));?></li>-->
<!--	</ul>-->
<!--</div>-->
