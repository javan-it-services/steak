<div id="content" class="grid_12 alpha">

    <form action="<?php echo $html->url("/keuangan/kewajiban") ?>" method="get" class="plain" >
        <table class="filter" style="width:auto">
            <tr>
                <td>
                    <?php echo $form->input('jurusan', array('name' => 'jurusan', 'type' => 'select', 'options' => $jurusans, 'selected'=>$jid, 'div'=>false, 'label'=>'Jurusan ', 'empty' => '--Pilih--')); ?>
                </td>
                <td>
                    <?php echo $form->input('angkatan', array('name' => 'angkatan', 'type' => 'select', 'options' => $angkatans, 'selected'=>$aid, 'div'=>false, 'label'=>'Angkatan ', 'empty' => '--Pilih--')); ?>
                </td>
                <td>
                    <input type="submit" value="Filter" />
                </td>
            </tr>
        </table>
    </form>

<?php if($listKewajiban): ?>
    <div class="box report">
        <div class="spacer">
    <?php echo $form->create('Kewajiban', array('url' => array('controller'=>'keuangan','action' => 'kewajiban'), 'class' => 'plain')) ?>
        <?php echo $form->input("tangkatan_id", array('name'=>'data[tangkatan_id]', 'type' =>'hidden', 'value' => $aid)) ?>
        <?php echo $form->input("tjurusan_id", array('name'=>'data[tjurusan_id]','type' =>'hidden', 'value' => $jid)) ?>
        <table class="report">
            <thead>
                <tr>
                <th>Kewajiban</th>
                <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0;foreach($listKewajiban as $kewajiban): ?>
                <tr>
                    <td><?php echo $kewajiban['KeuanganMaster']['nama'] ?></td>
                    <td>
                        <?php echo $form->input("Kewajiban.$i.jumlah", array('value' => $kewajiban['Kewajiban']['jumlah'], 'label' => false, 'div' => false)) ?>
                        <?php echo $form->input("Kewajiban.$i.id", array('type' =>'hidden', 'value' => $kewajiban['Kewajiban']['id'])) ?>
                        <?php echo $form->input("Kewajiban.$i.nama", array('type' =>'hidden', 'value' => $kewajiban['KeuanganMaster']['nama'])) ?>
                        <?php echo $form->input("Kewajiban.$i.keuangan_master_id", array('type' =>'hidden', 'value' => $kewajiban['KeuanganMaster']['id'])) ?>
                    </td>
                </tr>
                <?php $i++;endforeach; ?>
            </tbody>
        </table>
        <?php echo $form->submit('Simpan') ?>
    <?php echo $form->end() ?>
    </div>
    </div>
<?php endif; ?>
</div>
