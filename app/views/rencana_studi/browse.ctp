<?php 

?>
<fieldset>
<legend>Lampirkan File</legend>
<?php
  echo $form->create('Tfile' ,array('type'=>'file',"url"=>'editfile/'.$id));
  echo $form->input('id', array ('value'=> $id));
  echo "<div class='input text'>";
  echo $form->label("Nama File");
  echo $form->input('file_nama', array ('label'=>false, 'value'=> $files['Tfile']['nama_file']));
  echo "</div>";
  echo "<div class='input text'>";
  echo $form->label("File");
  echo $form->file('file_tugas', array('type'=>'file'));
  echo "</div>";
  echo $form->hidden('download', array ('label'=>false, 'value'=> $f));
  //echo $ajax -> submit('Edit',array ("url"=>'editfile/'.$id,'update'=> "browse"));
  //echo $form->end();
?>

<?php echo $form->end('Simpan');?>
</fieldset>