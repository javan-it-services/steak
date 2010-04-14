<?php $del_options = array("complete"=>"$('row'+request.responseText).remove()"); ?>
<?php if(isset($komp)):?>
	<tr id="row<?php echo $komp['id'] ?>">
		<td>
			<?php echo $komp['nama']; ?>
		</td>
		<td>
			<?php echo $komp['persentase']; ?>
		</td>
		<td class="actions">
			<?php echo $ajax->link(__('Delete', true), array('action'=>'komponen_delete', $komp['id']), $del_options, sprintf(__('Are you sure you want to delete # %s?', true), $komp['id'])); ?>
		</td>
	</tr>
<?php endif; ?>
