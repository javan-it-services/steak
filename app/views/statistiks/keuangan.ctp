<div class="tcicilans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Statistik Keuangan');?></span></h2>
		<?php echo $form->create('Filter', array('url'=>'/statistiks/get_uang','id'=>'IdFilter', 'class'=>'filter'))?>
		<table class="filter">
			<tr>
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
					<?php //echo $form->submit('Filter') ?>
					<? echo $ajax->submit('Filter',array('url'=>'/statistiks/get_uang','update'=>'daftar_pembayaran'))?>
				</td>
			</tr>
		</table>
		</form>

	<div id="daftar_pembayaran"></div>

	</div>
</div>
