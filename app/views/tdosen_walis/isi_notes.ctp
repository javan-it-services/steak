<div id="notes">
<fieldset>
<legend>Isi Notes</legend>
<?php
  echo $form->create('FormStudi');
  echo $form->input('frs_notes', array ('label'=>'Notes'));
  //echo $form->end('Simpan Notes');
  echo $ajax -> submit('Isi Notes',array ("url"=>'add_notes/'.$NIM,'update'=> "daftar_nilai".$NIM));
?>
</fieldset>

</div>