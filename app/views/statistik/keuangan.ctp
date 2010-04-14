<div class="tcicilans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Cicilan');?></span></h2>
<?php echo $form->create('Filter', array('url'=>'/tcicilans/index', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('NIM', array('label'=>'NIM', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		<td>
			<?php
				echo "<div class='filter'>";
				echo $form->label("Tahun Ajaran");
				echo $form->input('tahun_ajaran_id',array('options'=>$tahunajarans,'empty'=>'--Pilih Tahun--','label'=>FALSE,'div'=>FALSE));
				echo "</div>";
			?>
		</td>
		<td>
			<?php
				echo "<div class='filter'>";
				echo $form->label("Semester");
				echo $form->input('semester',array('options'=>$tsemesters,'empty'=>'--Pilih Semester--','label'=>FALSE,'div'=>FALSE));
				echo "</div>";
			?>

		</td>
	</tr>
	<tr>
<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>
	
<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
		<ul>
			
		</ul>
	</div>
</div>