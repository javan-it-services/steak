<div class="tmahasiswas grid_12 alpha " id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Tampilkan Laporan dalam pilihan Berikut :');?></span></h2>
<?php
    $javascript->link('prototype', false);
    $javascript->link('scriptaculous.js?load=effects', false);
?>
<fieldset>
<legend><?php echo $form->label="Pencarian"?></legend>
<?php echo $form->create('Filter', array("url"=>"/keuangan/laporan","type"=>"get"))?>
<?php  
		echo $form->input('tanggal',array('label'=>"Berdasarkan Tanggal",'type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
?>
<?php echo $form->input('tjurusan_id',array('label'=>"Jurusan",'type'=>'select','options'=>$jurusan,'selected'=>$tjurusan_id,'empty'=>'-Pilih Jurusan-'));?>
</fieldset>
<hr>
<?php echo $form->submit('Filter') ?>
</form>

        <?php //echo $this->element("keuangan/list") ?>
         <table cellpadding="0" cellspacing="0" class='report'>
   <thead>
<tr>
	<th>NIM</th>
	<th>Nama Lengkap</th>
	<th>Jurusan</th>
	<th>No Kwitansi</th>
	<th>Tanggal Transaksi</th>
	<th>Bank</th>
	<th>Jumlah</th>
	
	
</tr>
</thead>
   <tbody>
   <?php
   if(isset($error)){
   	//echo $error;
   	$keuangans = "";
   }
   ?>
<?php
$i = 0;
if(empty($keuangans)){
	echo "Tidak ada data untuk ditampilkan";
}else{
foreach ($keuangans as $keuangan):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	//pr($keuangan);
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $keuangan['KeuanganTransaksi']['mahasiswa_id']; ?>
		</td>
		<td>
			<?php echo $keuangan['Tmahasiswa']['NAMA']; ?>
		</td>
		<td>
			<?php echo $keuangan['Tjurusan']['Refdetil']['value'] ."-".$keuangan['Tjurusan']['namaJurusan']; ?>
		</td>
		<td>
			<?php echo $keuangan['KeuanganTransaksi']['no_kwitansi']; ?>
		</td>
		<td>
			<?php echo date('d-m-y',strtotime($keuangan['KeuanganTransaksi']['tanggal'])); ?>
		</td>
		<td>
			<?php echo $keuangan['Tbank']['nama']; ?>
		</td>
		<td>
			<?php echo $keuangan['KeuanganTransaksi']['jumlah']; ?>
		</td>
	</tr>
	
<?php endforeach; ?>
<? } ?>
</tbody>
    </table>
<div class="pagination">
<div class="paging">
<?php

?>

	<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false), null, array('class'=>'disabled'));?>
 	<?php echo $paginator->numbers(array('separator'=>''));?>
	<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false), null, array('class'=>'disabled'));?>
</div>
	<div class="clear"></div>
</div>

<p class="paging_info">

<?php
echo $paginator->counter(array(
'format' => __('Halaman %page% dari %pages%', true)
));
?>&nbsp; &nbsp;
<?php
echo $paginator->counter(array(
'format' => __('Jumlah data ditemukan', true).': <strong>%count%</strong>'
));
?>
</p>
</div>
</div>

<div class="grid_4 omega" id="sidebar">
	<div class="special">
     
    <?php echo $html->link($html->image('pdf_icon.png'). __('Cetak ke PDF', true), array('action'=>'pembayaran_pdf','pdf', "?$param"), array('class'=>'tombol'), null, false); ?>
   
   </div>
   
   <div class="special">
     
    <?php echo $html->link($html->image('excel.gif'). __('Ekspor ke Excel', true), array('action'=>'excel', "?$param"), array('title'=>'Cetak excel'),false,false); ?>
   
   </div>
</div> 
 


