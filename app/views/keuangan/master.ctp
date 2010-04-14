<div class="grid_12 alpha " id="content">
	<div class="box">
        <h2 class="section_name"><span class="section_name_span">Master Kewajiban</span></h2>
        <?php echo $form->create('KeuanganMaster', array('url' => array('controller'=>'keuangan','action' => 'master'))) ?>
        <table>
            <tr>
                <th>Nama</th>
                <th>Aktif</th>
                <th>&nbsp;</th>
            </tr>
        <?php $i=0;foreach($masters as $master): ?>
            <tr>
                <td>
                    <?php echo $form->input("KeuanganMaster.$i.id", array('type' => 'hidden', 'value' =>  $master['KeuanganMaster']['id'])) ?>
                    <?php echo $form->input("KeuanganMaster.$i.nama", array('type' => 'text', 'value' => $master['KeuanganMaster']['nama'], 'label' => false, 'div' =>false)) ?>
                </td>
                <td>
                    <?php echo $form->input("KeuanganMaster.$i.is_aktif", array('type' => 'checkbox', 'checked' => ($master['KeuanganMaster']['is_aktif'] == 1), 'label' => false, 'div' =>false)) ?>
                </td>
                <td>
                    <?php echo $html->link('Hapus', array('action' => 'masterDelete', $master['KeuanganMaster']['id'])) ?>
                </td>
            </tr>
        <?php $i++;endforeach; ?>
        </table>
        <?php echo $form->end(__('Simpan', true)) ?>
    </div>
</div>

<div class="grid_4 omega" id="sidebar">
	<div class="sidebox">
		<ul>
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Master Kewajiban', true), array('action'=>'masterAdd'), array('class'=>'tombol', 'rel'=>'facebox'), null, false); ?></li>
		</ul>
	</div>
</div>
