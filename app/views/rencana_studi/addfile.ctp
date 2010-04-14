<div class="rencana_studi index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah File Silabus');?></span></h2>
		<p>
<?php echo $form->create('Tfile', array("url"=>"/rencana_studi/addfile", "type"=>"file"));?>
	<fieldset>
	<?php
    $javascript->link('prototype', false);
    $javascript->link('scriptaculous.js?load=effects', false);
?>

<div id="users2">
<table id="tblSearch">
    
    
	<tr>
		<td>
			<?php echo $form->hidden('Tfile.file_expl.0',array('value'=>$k,'div'=>false)); ?>
			<?php echo $form->input('Tfile.file_nama.0',array('label'=>false,'div'=>false)); ?></td>
        <td><?php echo $form->file('Tfile.file_tugas.0',array('label'=>false,'div'=>false)); ?></td>
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
    added += "<input name='data[Tfile][file_expl]["+counter+"]'  type='hidden' value='<?php echo $k ?>'> <input name='data[Tfile][file_nama]["+counter+"]'  type='text'>";
    added += "</td>";
    added += "<td>";
    added += "<input name='data[Tfile][file_tugas]["+counter+"]'  type='file'>";
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