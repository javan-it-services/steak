<?php $jenkel = array('L'=>'Laki-laki', 'P'=>'Perempuan');?>
<?php $paginator->options(array("url"=>$params));?>

<div class="tmahasiswas grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Mahasiswa');?></span></h2>
		<?php echo $form->create('Filter', array('url'=>'/tcalon_mahasiswas/index',"id"=>"IdFilter", 'class'=>'filter', 'type'=>'get'))?>
			<table class="filter">
				<tr>
					<td>
						<?php echo $form->input('NO_REGISTRASI', array('label'=>'No REGISTRASI', 'div'=>'filter', 'fieldset'=>false,'value'=>$noreg))?>
					</td>
					<td>
						<?php echo $form->input('NAMA', array('label'=>'Nama', 'div'=>'filter', 'fieldset'=>false,'value'=>$nama))?>
					</td>
					<td> 
						<?php echo $form->input('TJURUSAN_ID', array('type'=>'select','label'=>'Jurusan', 'div'=>'filter', 'fieldset'=>false,'options'=>$tjurusans,'selected'=>$jurusan,'empty'=>'-pilih-', 'class'=>'select'))?>
					</td>
					<td>
						<?php echo $form->input('TPROGRAM_ID', array("type"=>"select","options"=>$jenjang_studi,'empty'=>'-pilih-',"label"=>"Jenjang Studi", 'div'=>false, 'fieldset'=>false, 'class'=>'select'));?>
					</td>
					<td>
						<?php
						echo $form->input('gelombang_id', array('name' => 'gelombang_id', 'type' => 'select', 'options' => $gelombangs, 'selected'=>$gid, 'div'=>false, 'label'=>'Gelombang '));
						?>
					</td>
					<td>
						<?php echo $form->input('status', array("type"=>"select"/*,"id"=>"status"*/,"options"=>array('0'=>'tidak diterima','1'=>'diterima'),'empty'=>'-pilih-',"label"=>"Status", 'div'=>false, 'fieldset'=>false, 'class'=>'select'));?>
					</td>
				</tr>
			</table>
			<?php echo $form->submit('Filter') ?>
		</form>
<?php echo $form->create('TcalonMahasiswa', array("action"=>"save_jurusan"));?>
		<table cellpadding="0" cellspacing="0" class="Design">
			<thead>
				<tr>
					<th>&nbsp;</th>
					<th><?php echo $paginator->sort('NO REG','NO_REGISTRASI');?></th>
					<th><?php echo $paginator->sort('Nama','NAMA');?></th>
					<th><?php echo $paginator->sort('Tanggal Lahir','TGL_LAHIR');?></th>
					<th><?php echo $paginator->sort('Jurusan yang dipilih','JURUSAN');?></th>
                                        <th>Status PMB</th>
					<th>Status</th>
                    <th class="actions"><?php __('Aksi');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($tmahasiswas as $m => $tmahasiswa): ?>
				<tr>
					<td>
						<?php echo $html->image($tmahasiswa['TcalonMahasiswa']['JENIS_KELAMIN'].'.png', array()); ?>
					</td>
					<td>
						<?php echo $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']; ?>
					</td>

					<td>
						<?php echo $tmahasiswa['TcalonMahasiswa']['NAMA']; ?>
					</td>
					<td>
						<?php echo $tmahasiswa['TcalonMahasiswa']['TGL_LAHIR']; ?>
					</td>
					<td>
						<?php
                                                //pr($jurusan1);
                                                if($tmahasiswa['Tambil']['NO_REGISTRASI']==$tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']){
							echo $form->input('jurusan][]',array('type'=>'select','label'=>FALSE,'options'=>array($tmahasiswa['TcalonMahasiswa']['TJURUSAN_ID']=>$jurusan1['Refdetil']['value'] ."-".$tmahasiswa['Tjurusan']['namaJurusan'],$tmahasiswa['TcalonMahasiswa']['TJURUSAN_ID2']=>$jurusan2['Refdetil']['value'] ."-".$tmahasiswa['Tjurusan2']['namaJurusan']),'selected'=>$tmahasiswa['Tambil']['TJURUSAN_ID']));
							echo $form->hidden('NO_REGISTRASI][]',array('value'=>$tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']));
						}else{
							echo $form->input('jurusan][]',array('type'=>'select','label'=>FALSE,'options'=>array($tmahasiswa['TcalonMahasiswa']['TJURUSAN_ID']=>$jurusan1['Refdetil']['value'] ."-".$tmahasiswa['Tjurusan']['namaJurusan'],$tmahasiswa['TcalonMahasiswa']['TJURUSAN_ID2']=>$jurusan2['Refdetil']['value'] ."-".$tmahasiswa['Tjurusan2']['namaJurusan'])));
							echo $form->hidden('NO_REGISTRASI][]',array('value'=>$tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']));
						}
						?>
					</td>
                                        		<td>
                    <?php
                    if($tmahasiswa['TcalonMahasiswa']['status_masuk']=="P"){
                        echo "pindahan";
                    } else {
                        echo "Non Pindahan";
                    }
                    ?>
					</td>
					<td>
                    <?php
                    if($tmahasiswa['TcalonMahasiswa']['status']=="1"){
                        echo "Diterima";
                    } else {
                        echo "Tidak diterima";
                    }
                    ?>
					</td>
					<td class="actions">
					<?php
					//pr($Mahasiswa_Masuk);
						if($tmahasiswa['TcalonMahasiswa']['daftar_ulang']=="1"){
							echo "Calon Mahasiswa ini sudah melakukan daftar ulang";
						}else{
					?>
						<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']), array('title'=>'Lihat data lengkap'),false,false); ?>
						<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit', $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']), array('title'=>'edit'),false,false); ?>
						<?php echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']),false); ?>
						<?php echo $html->link($html->image('ubahxxx.gif'), array('action'=>'edit_nilai', $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']), array('title'=>'Ubah Nilai Test'),false,false); ?>
						<?php echo $html->link($html->image('table_48.png'), array('action'=>'kelengkapan', $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']), array('title'=>'kelengkapan Pendaftaran'),false,false); ?>
                                            <?php
                                                if($tmahasiswa['TcalonMahasiswa']['status_masuk']=="P"){
                                                    echo $html->link($html->image('Save.GIF'), array('action'=>'pindahan_edit', $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']), array('title'=>'Edit Konversi Nilai'),false,false);
                                                }else{
                                                    
                                                }
                                            ?>

						<?php
			  if($tmahasiswa['TcalonMahasiswa']['status']=="0"){
				echo $html->link(__('Terima', true), array('action'=>'tidak_diterima', $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']));
			} else {
				echo $html->link(__('Tolak', true), array('action'=>'diterima', $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']));
			}
				 	?>
				 <?php } ?>
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
		<?php echo $form->end('Submit');?>
	</div>
</div>

<div class="grid_4 omega" id="sidebar">
	<div class="special">
		<?php
				echo $html->link($html->image('pdf.png'). __('Ekspor ke PDF', true), array('action'=>'lap_list', 'pdf', "?$param"), array('class'=>'tombol'), null, false);
				
		?>
	</div>
	<div class="special">
		
		<?php 
		echo $html->link($html->image('excesl.gif'). __('Ekspor ke Spreedsheet', true), array('action'=>'excel', "?$param"), array('class'=>'tombol'), null, false);
		?>
	</div>
	<ul class="special sidebox">
		<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Calon Mahasiswa ', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
	</ul>
</div>
