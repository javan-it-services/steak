<div class="rencana_studi index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Rencana Kuliah Mingguan');?></span></h2>

<?php echo $form->create('TsilabusMingguan', array("url"=>"/rencana_studi/add", "type"=>"file"));?>
	<fieldset>
 		
	<?php
		echo $form->hidden('KD_KULIAH',array('value'=>$k));
		echo $form->input('MINGGU_KE',array('label'=>'Minggu Ke-','options' => array('1'=>'1','2'=>'2','3'=>'3','4'=>'4')));
		echo $form->input('KEGIATAN', array('type'=>'textarea', 'label'=>'Kegiatan'));
		echo $form->input('TOPIK', array('type'=>'textarea', 'label'=>'Topik'));
		echo $form->input('SUBTOPIK_KASUS', array('type'=>'textarea', 'label'=>'Subtopik Kasus'));
		echo $form->input('TUGAS', array('type'=>'textarea', 'label'=>'Tugas'));
	?>
	</fieldset>
	<h2 class="section_name"><span class="section_name_span"><?php __('Lampirkan File');?></span></h2>
	<p>
	<fieldset>
	
	<?php
    $javascript->link('prototype', false);
    $javascript->link('scriptaculous.js?load=effects', false);
?>
<div id="users2">

		
		
	



<table id="tblSearch">
    
    
	<tr>
		<td><?php echo $form->input('TsilabusMingguan.file_nama.0',array('label'=>false,'div'=>false)); ?></td>
        <td><?php echo $form->file('TsilabusMingguan.file_tugas.0',array('label'=>false,'div'=>false)); ?></td>
        <td><button onclick="add();return false;">Tambah</button></td>
    </tr>
</table>


<div style="clear:both"></div>
</form>
</div>
<script type="text/javascript">
    counter=0;
    function add(){
    counter++;
    
    
    added = "<tr>";
    added += "<td>";
    added += "<input name='data[TsilabusMingguan][file_nama]["+counter+"]'  type='text'>";
    added += "</td>";
    added += "<td>";
    added += "<input name='data[TsilabusMingguan][file_tugas]["+counter+"]'  type='file'>";
    added += "</td>";
    added += "<td>";
    added += "<button onclick='del(this);return false;'>Hapus</button>";
    added += "</td>";

    added += "</tr>";

    new Insertion.Bottom('tblSearch', added);
    }

    function del(elm){
        tbody = elm.up().up().up();
        elm.up().up().remove();
        if(tbody.innerHTML == "")tbody.remove();

    }
</script>
	
	</fieldset>
<?php echo $form->end('Simpan');?>
</div>
</div>
