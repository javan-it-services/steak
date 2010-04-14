<?php
$options_save = array(
                    'id'=>'btnSubmit',
                    'div'=>false,
                    'url'=>array('action'=>'editNilai', $mahasiswa['TcalonMahasiswa']['NO_REGISTRASI']),
                    'before'=>'$("btnSubmit").disable()',
                    'complete'=>'$("btnSubmit").enable();updateNilai(json); new Effect.Highlight("row"+json.response.noreg, {duration: 8}); facebox.close();',
                );
?>

<h2 class="section_name"><span class="section_name_span"><?php echo $mahasiswa['TcalonMahasiswa']['NAMA'] ?> (<?php echo $mahasiswa['TcalonMahasiswa']['NO_REGISTRASI'] ?>)</span></h2>
<?php echo $form->create('PmbNilai', array('id'=>'frm'));?>
    <?php $i=1; ?>
    <?php foreach($mahasiswa['Nilai'] as $nilai): ?>
    <?php echo $form->input("PmbNilai." . $i . ".nilai", array('label' => $nilai['JenisNilaiPendaftaran']['name'], 'value' => $nilai['PmbNilai']['nilai'], 'style' => 'width:60px;')) ?>
    <?php echo $form->input("PmbNilai." . $i . ".tes_id", array('type' => 'hidden', 'value' => $nilai['JenisNilaiPendaftaran']['id'])) ?>
    <?php echo $form->input("PmbNilai." . $i++ . ".id", array('type' => 'hidden', 'value' => $nilai['PmbNilai']['id'])) ?>
    <?php endforeach; ?>

	<div class='submit'>
	    <?php echo $ajax->submit(__('Simpan', true), $options_save); ?>
		<?php echo $html->link(__('Batal', true), '#cancel', array('class'=>'cancel fb_cancel')); ?>
	</div>
<?php echo $form->end();?>


<script type='text/javascript'>
Event.observe($$('.fb_cancel').first(), 'click', function(e){
	Event.stop(e);
	facebox.close()
});
</script>
