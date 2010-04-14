<div class="tfakultases index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('View Kelas');?></span></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tkelase['Tkelase']['ID']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Matakuliah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tkelase['Tmatakuliah']['NAMA_KULIAH']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Kelas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tkelase['Tkelase']['NAMA_KELAS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Semester'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tkelase['Tsemester']['NAME']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tahun Ajaran'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tkelase['TtahunAjaran']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dosen'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tkelase['Tdosen']['NAMA_DOSEN']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<br/>
<div>
	<h2 class="section_name"><span class="section_name_span"><?php __('Peserta Kuliah');?></span></h2>
	<table class="Design">
		<thead>
			<tr>
				<th>NIM</th>
				<th>Status</th>
				<th>Nilai Angka</th>	
				<th>Nilai</th>	
			</tr>
		</thead>
		<?php
			
		 if(!empty($matkuls)):?>
		<?php foreach($matkuls as $row):?>
			<tr>
				<td><?php echo $row['FormStudi']['NIM']?></td>				
				<td><?php echo $row['KartuStudi']['status_lulus']?></td>
				<td><?php echo $row['KartuStudi']['nilai_angka']?></td>	
				<td><?php echo $row['TmasterNilai']['nilai']?></td>		
			</tr>
		<?php endforeach;?>
		<?php endif;?>
	</table>	
</div>
</div>
</div>