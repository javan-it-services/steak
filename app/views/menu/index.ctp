<div class="tberitas index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Daftar Modul');?></span></h2>

		<table cellpadding="0" cellspacing="0" class = "Design">
		<?php foreach($links as $link): ?>
		<tr><th style='cursor:pointer' onclick="$('child<?php echo $link['Link']['id'] ?>').toggle()"><?php echo $link['Link']['name'] ?></th><th width="30px"><?php echo $html->link($html->image('edit.png'),'/menu/edit/'.$link['Link']['id'],array(),false,false) ?></th></tr>
		<tbody id="child<?php echo $link['Link']['id'] ?>" style='display:none'>
			<?php foreach($link['Childlink'] as $child): ?>
				<tr id="child<?php echo $child['id'] ?>"><td colspan=2><?php echo $child['name'] ?> (<?php echo $html->link('edit','/menu/edit/'.$child['id']) ?> | <?php echo $html->link('hapus','/menu/delete/'.$child['id']) ?>)</td></tr>
			<?php endforeach; ?>
		</tbody>
		<?php endforeach ?>
	</div>
</div>
