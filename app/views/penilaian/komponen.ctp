<div class="tmahasiswas grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Komponen Nilai');?></span></h2>
<?php $add_options = array(
                            "url"=>"/penilaian/komponen_add"
                            ,"complete"=>"new Insertion.Bottom('tbodyKomponenNilai', request.responseText);$('frmSubmit').reset()"
                            ,"id"=>"frmSubmit"
                            ) ?>

<?php echo $ajax->form("KomponenNilai",'post',$add_options); ?>
<?php echo $form->hidden("KomponenNilai.tkelas_id", array("value"=>$kelas['Tkelase']['ID'])); ?>
<table>
    <tr>
        <td><?php echo $form->input("KomponenNilai.nama") ?></td>
        <td><?php echo $form->input("KomponenNilai.persentase") ?></td>
        <td><?php echo $form->submit(__("Tambah", true)) ?></td>
    </tr>
</table>
</form>


<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th>KOMPONEN</th>
	<th>PERSENTASE</th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<tbody id="tbodyKomponenNilai">

<?php
$i = 0;
foreach($kelas['KomponenNilai'] as $komp):

    $del_options = array("complete"=>"$('row'+request.responseText).remove()");

	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?> id="row<?php echo $komp['id'] ?>">
		<td>
			<?php echo $komp['nama']; ?>
		</td>
		<td>
			<?php echo $komp['persentase']; ?>
		</td>
		<td class="actions">
			<?php //echo $ajax->link(__('Delete', true), array('action'=>'komponen_delete', $komp['id']), $del_options, sprintf(__('Are you sure you want to delete # %s?', true), $komp['id'])); ?>
			<?php echo $ajax->link($html->image('del_16.png'), array('action'=>'komponen_delete', $komp['id']),$del_options, sprintf(__('Are you sure you want to delete # %s?', true), $komp['id']),false); ?>
		</td>
	</tr>

<?php endforeach; ?>
</tbody>
</table>
</div>
</div>