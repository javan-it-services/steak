<div id="content" class="grid_16">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Generate File EPSBED');?></span></h2>
		<div class='wb'>
			<div class='grid_4 prefix_1'>
				<div class='btn_epsbed'><?php echo $ajax->link('generate tabel MSYYS', '/epsbed/msyys',array('update'=>'msyys_link','class'=>'tombol positive')) ?></div>
				<div class='btn_epsbed'><?php echo $ajax->link('generate tabel MSPTI', '/epsbed/mspti',array('update'=>'mspti_link','class'=>'tombol positive')) ?></div>
				<div class='btn_epsbed'><?php echo $ajax->link('generate tabel MSDOS', '',array('update'=>'','class'=>'tombol positive')) ?></div>
			</div>

			<div id="epsbed_file_box" class='grid_10 omega'>
				<h4>Generated File</h4>
				<div id="msyys_link">
				</div>
				<div id="mspti_link">
				</div>
			</div>
			<div class='clear'></div>
		</div>
	</div>
</div>
