<h2>Jadwal Kuliah</h2>

<?php echo $form->create('Jadwal');?>
	
<div id="jadwals<?=$tkelases['Tkelase']['ID']?>">
<?php echo $this->element("jadwal/list") ?>
</div>