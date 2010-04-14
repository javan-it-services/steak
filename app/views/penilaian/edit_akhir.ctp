
<div class="tstatus_pembayarans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Nilai Akhir Mahasiswa');?></span></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mata Kuliah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelas['Tmatakuliah']['NAMA_KULIAH']." (".$kelas['Tmatakuliah']['NAMA_KULIAH_ENG'].")","/Tmatakuliahs/view/".$kelas['Tmatakuliah']['KD_KULIAH']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KELAS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelas['Tkelase']['NAMA_KELAS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SKS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelas['Tmatakuliah']['SKS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('PERIODE'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelas['Tsemester']['DESC']; ?> <?php echo $kelas['TtahunAjaran']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DOSEN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelas['Tdosen']['NAMA_DOSEN']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<?php echo $form->create("KartuStudi",array("url"=>"/penilaian/editAkhir/".$kelas['Tkelase']['ID'])); ?>
<table cellpadding="0" cellspacing="0" class="Design" id="tblMahasiswa">
<thead>
<tr>
	<th>No</th>
	<th>NIM</th>
	<th>NAMA</th>
	<?php foreach($kelas['KomponenNilai'] as $komp): ?>
	<th><?php echo $komp['nama'] ?> (<?php echo $komp['persentase'] ?>%)</th>
	<?php endforeach; ?>
	<th>Nilai Angka <div onclick="samakanNilai()" style="cursor:pointer;color:orange;font-size:9px">Sesuaikan</div></th>
	<th>Nilai Akhir <div onclick="samakanHuruf()" style="cursor:pointer;color:orange;font-size:9px">Sesuaikan</div></th>
</tr>
</thead>
<tbody>
<?php
$i = 0;
foreach ($kartuStudi as $ks):
	$class = null;
	if ($i % 2 == 0) {
		$class = ' class="altrow"';
	}
	if(!empty($ks['FormStudi']['Tmahasiswa'])):
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo ++$i; ?>
		</td>
		<td>
			<?php echo $ks['FormStudi']['Tmahasiswa']['NIM']; ?>
		</td>
		<td>
			<?php echo $ks['FormStudi']['Tmahasiswa']['NAMA']; ?>
		</td>
		<?php foreach($kelas['KomponenNilai'] as $komp): ?>
		<td><?php echo (isset($ks['Nilai'][$komp['id']]))?$ks['Nilai'][$komp['id']]:"-"; ?></td>
		<?php endforeach; ?>
		<td>
		<?php echo $form->hidden("KartuStudi.$i.id", array("value"=>$ks['KartuStudi']['id'])) ?>
		<?php echo $form->input("KartuStudi.$i.nilai_angka", array("label"=>false,"div"=>false,"class"=>"nilai_angka","size"=>"4", "value"=>$ks['KartuStudi']['nilai_angka'])) ?>
		(<span><?php echo $ks['NilaiSeharusnya'] ?></span>)
		</td>
		<td>
		<?php echo $form->input("KartuStudi.$i.tmaster_nilai_id", array("label"=>false,"div"=>false,"class"=>"nilai_huruf","type"=>"select","options"=>$opsiNilai,"empty"=>"-","selected"=>$ks['KartuStudi']['tmaster_nilai_id'])); ?>
		<?php echo $form->hidden("MasterNilai.$i.id", array("value"=>$ks['HurufSeharusnya']['id'])); ?>
		(<span><?php echo $ks['HurufSeharusnya']['kode'] ?></span>)
		</td>
	</tr>

<?php 
	endif;
	endforeach; 
?>
</tbody>
</table>

<?php echo $form->end(array("label"=>__("Simpan", true))) ?>
<?php echo $html->link("Batal","/penilaian/"); ?>


<script type="text/javascript">
function samakanNilai(){
$$('.nilai_angka').each(function(e){
		e.value = e.next().innerHTML;
	});
}

function samakanHuruf(){
$$('.nilai_huruf').each(function(e){
		e.value = e.next().value;
	});
}
</script>
</div>
</div>