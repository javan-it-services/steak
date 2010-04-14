<?php
$subtotal = array();
$total = 0;
?>

<div id="content" class="grid_12 alpha">

        <form action="<?php echo $html->url("/pmb/index") ?>" method="get" class="plain" >
			<table class="filter" style="width:auto">
				<tr>
					<td>
                        <?php echo $form->input('gelombang', array('name' => 'gelombang', 'type' => 'select', 'options' => $gelombangs, 'selected'=>$gid, 'div'=>false, 'label'=>'Gelombang ')); ?>
					</td>
					<td>
                        <label for="">Tanggal</label>
                        <input type="text" name="tanggal" value="<?php echo $tanggal ?>" style="width:100px" maxlength="10" class='w8em format-y-m-d divider-dash' />
					</td>
                    <td>
                        <input type="submit" value="Filter" />
                    </td>
				</tr>
			</table>
        </form>

    <div class="box report">
        <div class="spacer">
            <h2>Rekap Penerimaan Uang</h2>
            <h4>
                Tahun: <?php echo $gelombang['TtahunAjaran']['nama'] ?> &bull; Gelombang: <?php echo $gelombang['GelombangPendaftaran']['nomor'] ?>
                <?php if($tanggal): ?>
                &bull; Tanggal: <?php echo $tanggal ?>
                <?php endif; ?>
            </h4>
            <strong>Jumlah pendaftar <?php echo count($listMahasiswa) ?></strong>
        <table class="report">
            <thead>
                <tr>
                <th>No</th>
                <th>Nomor Registrasi</th>
                <th>Nama Mahasiswa</th>
                <?php foreach($listPembayaran as $key => $pembayaran): ?>
                <?php $subtotal[$key] = 0 ?>
                <th><?php echo $pembayaran['Tperlengkapan']['jenis'] ?></th>
                <?php endforeach; ?>
                <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                <?php foreach($listMahasiswa as $mhs): ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $mhs['TcalonMahasiswa']['NO_REGISTRASI'] ?></td>
                    <td><?php echo $mhs['TcalonMahasiswa']['NAMA'] ?></td>
                    <?php foreach($mhs['Pembayaran'] as $key=>$pembayaran): ?>
                    <td class='money'>
                        <?php
                            if ($pembayaran['TperlengkapanTcalonMahasiswa']['tcalon_mahasiswa_id']) {
                                echo $number->currency($pembayaran['Tperlengkapan']['jumlah'],'Rp ', rupiah());
                                $subtotal[$key] += $pembayaran['Tperlengkapan']['jumlah'];
                            }
                        ?>
                    </td>
                    <?php endforeach; ?>
                    <td>&nbsp;</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan='3' class="ac"><strong>Jumlah</strong></th>
                    <?php foreach($listPembayaran as $key => $pembayaran): ?>
                        <?php $total += $subtotal[$key] ; ?>
                        <th><?php echo $number->currency($subtotal[$key], 'Rp ', rupiah()) ?></th>
                    <?php endforeach; ?>
                    <th>Total uang<div class="total"><?php echo $number->currency($total, "Rp ", rupiah()) ?></div></th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
</div>

<div class="grid_4 omega" id="sidebar">
	<div class="special">
		<?php echo $html->link($html->image('pdf.png'). __('Cetak ke PDF', true), array('pdf', "?$param"), array('class'=>'tombol'), null, false); ?>
	</div>
</div>
