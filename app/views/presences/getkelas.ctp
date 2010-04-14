<div>
<?php
echo $form->input('kelas', array("name"=>"data[Presence][kelas_id]","label"=>"Kelas","type"=>"select","id"=>"kelas_id","options"=>$tkelases,'empty'=>'-pilih-'));
echo $ajax -> observeField('kelas_id', array ("url"=>'/presences/getstudents','update'=>'students'));
?>

</div>