<div id="content" class="grid_12 alpha">

        <form action="" method="get" class="plain" >
			<table class="filter" style="width:auto">
				<tr>
					<td>
                        <?php echo $form->input('gelombang', array('name' => 'gelombang', 'type' => 'select', 'options' => $gelombangs, 'selected'=>$gid, 'div'=>false, 'label'=>'Gelombang ')); ?>
					</td>
					<td>
                        <label for="">Ruang</label>
                        <input type="text" name="ruang" value="<?php echo $ruang ?>" style="width:100px"  />
					</td>
					<td>
                        <label for="">Nomor Registrasi</label>
                        <input type="text" name="noreg"  value="<?php echo $noreg ?>" style="width:100px"  />
					</td>
                    <td>
                        <input  type="submit" value="Apply" />
                    </td>
				</tr>
			</table>
        </form>
    <div class="box report">
        <div class="spacer">
            <h2>Nilai USM</h2>
            <h4>Gelombang <?php echo $gelombang['GelombangPendaftaran']['nomor'] ?> &bull; Tahun <?php echo $gelombang['TtahunAjaran']['nama'] ?></h4>
        <table class="report">
            <thead>
                <tr>
                <th>No</th>
                <th>Nomor Registrasi</th>
                <th>Nama Mahasiswa</th>
                <th>Ruangan</th>
                <?php foreach($jenisNilai as $nilai): ?>
                <th><?php echo $nilai['JenisNilaiPendaftaran']['name'] ?></th>
                <?php endforeach; ?>
                <th>Nilai Rata-rata</th>
                <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach($listMahasiswa as $mhs): ?>
                <?php $sum=0; ?>
                <tr id="row<?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'] ?>">
                    <td><?php echo $no++  ?></td>
                    <td><?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'] ?></td>
                    <td><?php echo $mhs['TcalonMahasiswa']['NAMA'] ?></td>
                    <td><?php echo $mhs['TcalonMahasiswa']['ruang_test'] ?></td>
                    <?php foreach($mhs['Nilai'] as $nilai): ?>
                    <td id="nilai<?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'].$nilai['JenisNilaiPendaftaran']['id'] ?>"><?php echo $nilai['PmbNilai']['nilai']; $sum+=$nilai['PmbNilai']['nilai']; ?></td>
                    <?php endforeach; ?>
                    <td id="mean<?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'] ?>"><?php echo (count($mhs['Nilai']) > 0)? $sum/count($mhs['Nilai']):"" ?></td>
                    <td><?php echo $html->link('edit nilai', array('action'=>'editNilai', $mhs['TcalonMahasiswa']['NO_REGISTRASI']), array('rel' => 'facebox')) ?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<div class="grid_4 omega" id="sidebar">
	<div class="special">
		<?php echo $html->link($html->image('pdf.png'). __('Ekspor ke PDF', true), array('action'=>'nilai', 'pdf', "?$param"), array('class'=>'tombol'), null, false); ?>
	</div>
	<div class="special">
		<?php echo $html->link($html->image('pdf.png'). __('Ekspor ke Spreadsheet', true), array('action'=>'excel', "?$param"), array('class'=>'tombol'), null, false); ?>
	</div>
</div>

<script type="text/javascript">
function updateNilai(json) {
    var noreg = json.response.noreg;
    var count = 0;
    var sum = 0;
    var mean = 0;
    for (var _nilai_id in json.response.nilai) {
        if (json.response.nilai.hasOwnProperty(_nilai_id)) {
            var _nilai = json.response.nilai[_nilai_id];
            $('nilai'+noreg+_nilai_id).update(_nilai);
            count++;
            sum = parseInt(sum) + parseInt(_nilai);
        }
    }
    if(count>0){
        mean = parseInt(sum)/count;
    }
    $('mean'+noreg).update(mean);
}
</script>
