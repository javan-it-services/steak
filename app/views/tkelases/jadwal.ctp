<h4>Jadwal Kuliah</h4>


<div id="jadwals<?=$tkelases['Tkelase']['ID']?>">
<?php echo $this->element("jadwal/list") ?>
</div>

<a href="#" onclick="$('formtambahjadwal<?=$tkelases['Tkelase']['ID']?>').toggle();return false;">Tambah Jadwal</a>
	<fieldset id="formtambahjadwal<?=$tkelases['Tkelase']['ID']?>" style="display:none"> 		
	<?php
		echo $form->create('Jadwal');
		echo $form->hidden('kelas_id',array("value"=>$tkelases['Tkelase']['ID']));
		echo $form->input('waktu_id',array("type"=>"select","options"=>$twaktuses));
		echo $form->input('hari',array("type"=>"select","options"=>array("1"=>"Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu","Minggu")));
		echo $form->input('ruang_id',array("type"=>"select","options"=>$truangKuliahs));
	?>
	<?php echo $ajax->submit('Tambahkan',array("url"=>"tambahjadwal","update"=>"jadwals".$tkelases['Tkelase']['ID']));?>
</fieldset>