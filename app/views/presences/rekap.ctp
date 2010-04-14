hgfhgfhgfhgf    hggf gfh fg hgf ghgf fgfdgfd fdg fd fgfd fgfg fgfd fg fdg
<?
    if(!empty($rekaps)){
        //pr($rekaps);
        ?>
        <h3>Rekapitulasi Absensi</h3>
        <table class='Design'>
        <thead>
        <tr>
        <td>Mahasiswa</td>
        <td>Masuk</td>
        <td>Ijin</td>
        <td>Alpha</td>
        </tr>
        </thead>
        </thead>
        <?
        foreach($rekaps as $rekap){
            ?>
            <tr>
                <td><?= $rekap['NIM']?></td>
                <td><?= $rekap['m']?></td>
                <td><?= $rekap['i']?></td>
                <td><?= $rekap['a']?></td>

            </tr>
            <?
        }
        ?>
        </table>
        <?
    }
?>