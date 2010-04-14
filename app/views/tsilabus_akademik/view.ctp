<div class="tsilabusMatakuliahs index grid_12 alpha " id="content">

<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Silabus Matakuliah');?></span></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KODE MK'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['KD_KULIAH']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Kuliah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['NAMA_KULIAH']; ?>
			&nbsp;
		</dd>
		
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SKS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['SKS']; ?> sks
			&nbsp;
		</dd>
		
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Konsentrasi'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['KONSENTRASI']; ?> 
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deskripsi'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['DESKRIPSI']; ?> sks
			&nbsp;
		</dd>
                
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tujuan Umum'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['tujuan_umum']; ?>
			&nbsp;
		</dd>
                
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tujuan Khusus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['tujuan_khusus']; ?>
			&nbsp;
		</dd>
                
                
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lingkup bahasan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['lingkup_bahasan']; ?>
			&nbsp;
		</dd>
                
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Literatur'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['lingkup_bahasan']; ?>
			&nbsp;
		</dd>
                
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Aturan kuliah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['aturan_kuliah']; ?>
			&nbsp;
		</dd>
                
                <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Penilaian'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tsilabusMatakuliah['Tmatakuliah']['penilaian']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div>
    <table cellpadding="0" cellspacing="0" class="Design">
        <thead>
        <tr>
                <th>Minggu Ke-</th>
                <th>Topik</th>
                <th>Deskripsi</th>
                <th>File</th>
        </tr>
        </thead>
            <tbody>
                <?php foreach($tjadwalmgg as $data_):
               
                ?>
                
                <tr>
                    <td><?php 
                    		echo $data_['TsilabusMingguan']['MINGGU_KE'];
                    		/*echo $html->link($data_['TsilabusMingguan']['MINGGU_KE'],array('action'=>'view_minggu',$data_['TsilabusMingguan']['MINGGU_KE']))*/ ?>
                    </td>
                    <td><?php echo $data_['TsilabusMingguan']['TOPIK'] ?></td>
                    <td><?php echo $data_['TsilabusMingguan']['SUBTOPIK_KASUS'] ?></td>
                    <td>
                    <?php            
                    echo $html->link($data_['Tfile']['0']['nama_file'],array('action'=>'download',$data_['Tfile']['0']['download_file']));
                    ?>
                    </td>
                <?php endforeach;?>
            </tbody>
    </table>
</div>