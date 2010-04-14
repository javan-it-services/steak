<h2>Form Rencana Studi</h2>
<?php
    if(!empty($matkuls)):
?>
<table class="Design">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php foreach($matkuls as $matkul):?>
    <tr>
        <td><?php echo $matkul['Tmatakuliah']['KD_KULIAH']?></td>
        <td><?php echo $matkul['Tmatakuliah']['NAMA_KULIAH']?></td>
        <td><?php echo $matkul['Tmatakuliah']['DESKRIPSI']?></td>
        <td><?php echo $matkul['Tmatakuliah']['KD_KULIAH']?></td>
        <td>Aksi</td>
    </tr>
    <?php endforeach;?>
</table>
<?php endif?>