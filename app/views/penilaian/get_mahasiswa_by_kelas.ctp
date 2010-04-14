<?php
$saveOptions = array("url"=>"/penilaian/save"
					 ,"before"=>""
					 ,"complete"=>""
					 ,"update"=>"tes"
					 );
?>

<?php echo $form->create("KartuStudiKomponenNilai",array("url"=>"/penilaian/save")) ?>
<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th><?php __("No") ?></th>
	<th><?php __("NIM") ?></th>
	<th><?php __("Nama") ?></th>
	<th><?php __("Nilai") ?></th>
</tr>
</thead>
<?php
$i = 1;
foreach ($listKartuStudi as $ks):
	$class = null;
	if ($i % 2 == 0) {
		$class = ' class="altrow"';
	}
	if(!empty($ks["Mahasiswa"]['NIM'])):
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $i++; ?>
		</td>
		<td>
            <?php echo $ks["Mahasiswa"]['NIM'] ?>
		</td>
		<td>
            <?php echo $ks["Mahasiswa"]['NAMA'] ?>
		</td>
		<td>
			<?php if ($ks['KartuStudiKomponenNilai']['id']) echo $form->hidden("KartuStudiKomponenNilai.$i.id", array("value"=>$ks['KartuStudiKomponenNilai']['id'])); ?>
			<?php echo $form->hidden("KartuStudiKomponenNilai.$i.komponen_nilai_id", array("value"=>$komponenNilaiId)); ?>
			<?php echo $form->hidden("KartuStudiKomponenNilai.$i.kartu_studi_id", array("value"=>$ks['KartuStudi']['id'])); ?>
			<?php echo $form->input("KartuStudiKomponenNilai.$i.nilai", array("label"=>false,"div"=>false,"type"=>"text","value"=>$ks['KartuStudiKomponenNilai']['nilai'])); ?>
		</td>
	</tr>
<?php 
	endif;
	endforeach; 
	
?>
</table>
<?php echo $ajax->submit("Simpan",$saveOptions); ?>
<div id="tes"></div>
