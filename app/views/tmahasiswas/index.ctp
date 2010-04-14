<?php $jenkel = array('L'=>'Laki-laki', 'P'=>'Perempuan');?>
<?php $paginator->options(array("url"=>$params));?>
 
<div class="tmahasiswas grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Mahasiswa');?></span></h2>
		<?php echo $form->create('Filter', array('url'=>'/tmahasiswas/index',"id"=>"IdFilter", 'class'=>'filter'))?>
			<table class="filter">
				<tr>
					<td>
						<?php echo $form->input('NIM', array('label'=>'NIM', 'div'=>'filter', 'fieldset'=>false))?>
					</td>
					<td>
						<?php echo $form->input('NAMA', array('label'=>'Nama', 'div'=>'filter', 'fieldset'=>false))?>
					</td>
					<td>
						<?php echo $form->input('TJURUSAN_ID', array('label'=>'Jurusan', 'div'=>'filter', 'fieldset'=>false,'options'=>$tjurusans,'empty'=>'-pilih-', 'class'=>'select'))?>
					</td>
					<td>
						<?php echo $form->input('TPROGRAM_ID', array("type"=>"select"/*,"id"=>"Jenjang Studi"*/,"options"=>$jenjang_studi,'empty'=>'-pilih-',"label"=>"Jenjang Studi", 'div'=>'filter', 'fieldset'=>false, 'class'=>'select'));?>
					</td>
				</tr>
			</table>
			<?php echo $form->submit('Filter') ?>
		</form>

		<table cellpadding="0" cellspacing="0" class="Design">
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th><?php echo $paginator->sort('NIM');?></th>
					<th><?php echo $paginator->sort('Nama','NAMA');?></th>
					<th><?php echo $paginator->sort('Tanggal Lahir','TGL_LAHIR');?></th>
					<th><?php echo $paginator->sort('Jurusan ','JURUSAN');?></th>
					<th class="actions"><?php __('Aksi');?></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				
				foreach ($tmahasiswas as $tmahasiswa): ?>
				<tr>
					<td>
						<?php echo $html->image($tmahasiswa['Tmahasiswa']['JENIS_KELAMIN'].'.png', array()); ?>
					</td>
					<td>
						<?php echo $tmahasiswa['Tmahasiswa']['NIM']; ?>
					</td>

					<td>
						<?php echo $tmahasiswa['Tmahasiswa']['NAMA']; ?>
					</td>
					<td>
						<?php echo $tmahasiswa['Tmahasiswa']['TGL_LAHIR']; ?>
					</td>

					<td>
						<?php 
						//pr($jenjang_studi);
						if($jenjang_studi[21]==$tmahasiswa['Tprogram']['value']){
							//echo $jenjang_studi[21];
						}
						echo $tmahasiswa['Tprogram']['value'] ."-".$tmahasiswa['Tjurusan']['namaJurusan'];
						echo "<br>";	
					//	echo $form->radio('jurusan',array('value'=>$tmahasiswa['Tprogram2']['value'] ."-".$tmahasiswa['Tjurusan2']['namaJurusan']));
						//echo $tmahasiswa['Tprogram']['value'] ."-".$tmahasiswa['Tjurusan']['namaJurusan']; 
							//	echo "<br>";
							//	echo $tmahasiswa['Tprogram2']['value'] ."-".$tmahasiswa['Tjurusan2']['namaJurusan']; 
						?>
					</td>
				
					<td class="actions">
						<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $tmahasiswa['Tmahasiswa']['NIM']), array('title'=>'Lihat data lengkap'),false,false); ?>
						<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $tmahasiswa['Tmahasiswa']['NIM']), array('title'=>'edit'),false,false); ?>
						<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tmahasiswa['Tmahasiswa']['NIM']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tmahasiswa['Tmahasiswa']['NIM']),false); ?>
						
						<?php 
					
						  ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>

		</table>

		<div class="pagination">
			<div class="paging">
				<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false, 'class'=>'prev'), null, array('class'=>'disabled_prev'));?>
				<?php echo $paginator->numbers(array('separator'=>''));?>
				<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false, 'class'=>'next'), null, array('class'=>'disabled_next'));?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<div class="grid_4 omega" id="sidebar">
	<ul class="special sidebox">
		<li><?php //echo $html->link($html->image('add_16.png'). __('Tambah Mahasiswa ', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
	</ul>
</div>


