<div class="kelasUjians view grid_12 alpha" id="content">
<div class="box">

<h2 class="section_name"><span class="section_name_span"><?php  __('Kelas Ujian');?></span></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelasUjian['KelasUjian']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ruang Kuliah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelasUjian['TruangKuliah']['RUANG_NAME'], array('controller' => 'truang_kuliahs', 'action' => 'view', $kelasUjian['TruangKuliah']['RUANG_ID'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Matakuliah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelasUjian['Tmatakuliah']['NAMA_KULIAH'], array('controller' => 'tmatakuliahs', 'action' => 'view', $kelasUjian['Tmatakuliah']['KD_KULIAH'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Semester'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelasUjian['Tsemester']['NAME'], array('controller' => 'tsemesters', 'action' => 'view', $kelasUjian['Tsemester']['ID'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tahun Ajaran'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelasUjian['TtahunAjaran']['nama'], array('controller' => 'ttahun_ajarans', 'action' => 'view', $kelasUjian['TtahunAjaran']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Jenjang'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelasUjian['Jenjang']['id'], array('controller' => 'refdetils', 'action' => 'view', $kelasUjian['Jenjang']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fakultas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelasUjian['Tfakultas']['nama'], array('controller' => 'tfakultases', 'action' => 'view', $kelasUjian['Tfakultas']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Jurusan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelasUjian['Tjurusan']['namaJurusan'], array('controller' => 'tjurusans', 'action' => 'view', $kelasUjian['Tjurusan']['kodejurusan'])); ?>
			&nbsp;
		</dd>
	</dl>

<br/><br/>
<div class="related">
	<h2 class="section_name"><span class="section_name_span"><?php __('Daftar Peserta');?></span></h2>
	<?php if (!empty($kelasUjian['Tmahasiswa'])):?>
	<?php 
		echo $form->create('ActionAll', array('url'=>'/kelas_ujians/action_all'));
		echo $form->hidden('kelas_ujian_id',array('value'=>$kelasUjian['KelasUjian']['id']));
	?>
	<table cellpadding = "0" cellspacing = "0" class="Design">
	<tr>
		<th><input type="checkbox" id="checkbox_all"/></th>
		<script type="text/javascript">
			$('checkbox_all').observe('click',function(event){
				var el = Event.element(event);
				if(el.checked){
					$$('input[type="checkbox"]').each(function(e){
						e.checked = true;
						
					});
				} else {
					$$('input[type="checkbox"]').each(function(e){
						e.checked = false;
						
					});
				}
			});
		</script>
		<th>No</th>
		<th><?php __('NIM'); ?></th>
		<th><?php __('NAMA'); ?></th>
		<th><?php __('Present'); ?></th>
		<th><?php __('Action'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($kelasUjian['Absen'] as $tmahasiswa):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr <?php echo $class;?>>
			<td><input name="data[ActionAll][ids][<?php echo $tmahasiswa['id']?>]" value="<?php echo $tmahasiswa['id']?>" type="checkbox"/></td>
			<td><?php echo $i?></td>
			<td><?php echo $tmahasiswa['Tmahasiswa']['NIM'];?></td>
			<td><?php echo $tmahasiswa['Tmahasiswa']['NAMA'];?></td>
			<td><?php echo $tmahasiswa['present']?></td>
			<td>
				<?php echo $html->link($html->image('del_16.png'), array('action' => 'delete_peserta', $tmahasiswa['id']),array('title'=>'Hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tmahasiswa['Tmahasiswa']['NAMA']),false); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	<tr>
		<th colspan="6">
			Tandai Semua : 
			<?php echo $form->select('present',array(
				'Belum Ujian'=>'Belum Ujian',
				'Hadir'=>'Hadir',
				'Tidak Hadir'=>'Tidak Hadir'
			),'Hadir',null,false)?>
			<input type="submit" value="Go"/>
		</th>
	</tr>
	</table>
</form>
<?php endif; ?>

</div>
</div>
</div>

<div class="actions grid_4 omega" id="sidebar">
	<div class="special">
		<?php echo $html->link($html->image('pdf.png'). __('Ekspor ke PDF', true), array('action'=>'cetak', $kelasUjian['KelasUjian']['id']), array('class'=>'tombol'), null, false); ?>
	</div>
</div>
