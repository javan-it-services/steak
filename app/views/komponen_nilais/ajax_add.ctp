<?php if(isset($komp)):?>
	<tr id="<?php echo $komp['id'] ?>">
		<td>
			<?php echo $komp['nama']; ?>
		</td>
		<td>
			<?php echo $komp['persentase']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $komp['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $komp['id'])); ?>
		</td>
	</tr>
<?php endif; ?>
