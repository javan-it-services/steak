<div id="berita" class="box">
	<h2>Berita Kampus</h2>
	<p>
		Berisi berbagai macam berita, pengumuman, dan artikel yang terkait dengan kegiatan akademik di
		kampus secara umum.
	</p>
<table class="plain">
	<tr><th>Isi Berita</th><th>Tanggal Diumumkan</th></tr>
	<?php foreach($beritas as $row):?>
	<tr>
		<td>
		<h4><?php echo $html->link($row['Tberita']['JUDUL_BERITA'],array('controller'=>'tberitas','action'=>'view',$row['Tberita']['id'], 'front'))?></h4>
			<?php echo $row['Tberita']['RINGKASAN']?>
		</td>
		<td>
			<?php echo $row['Tberita']['START_VALID_BERITA'] ?>
			<div class="byuser"><span>oleh</span> <?php echo $row['Tberita']['USER_ENTRY_BERITA'] ?></div>
		</td>
	</tr>
	<?php endforeach;?>
</table>
</div>

<br/>

<div id="pengumuman" class="box">
	<h2>Pengumuman</h2>
	<p>
		Berisi pengumuman terkait mata kuliah tertentu.
	</p>

<table class="plain">
		<tr><th>Mata Kuliah</th><th>Tanggal Diumumkan</th></tr>
		<?php foreach($pengumumans as $row):?>
		<tr>
			<td>
				<h4><?php echo $html->link($row['Tkelase']['KD_KULIAH'].'-'.$row['Tkelase']['Tmatakuliah']['NAMA_KULIAH'],array('controller'=>'tpengumumans','action'=>'view',$row['Tpengumuman']['id'], 'front'))?></h4>
				<?php echo $row['Tpengumuman']['PENGUMUMAN'] ?>
			</td>
			<td>
				<?php echo $row['Tpengumuman']['tanggal_mulai'] ?>
				<div class="byuser"><span>oleh</span> <?php echo $row['Tpengumuman']['ANNOUNCER'] ?></div>
			</td>
		</tr>
		<?php endforeach;?>
</table>

</div>
