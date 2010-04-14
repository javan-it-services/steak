<?php
	extract($param);
	$paginator->options(array("url"=>Configure::read('Paginator.params')));
	$col = array();
	$showPaginator = (int) $paginator->counter(array('format' => '%count%')) > Configure::read('Paginator.limit');
?>

	<!--<div class="pagination">-->
	<!--	<div class="paging">-->
	<!--		<?php if ( $showPaginator ) :?>-->
	<!--			<?php //echo $paginator->first(__('First', true)); ?>-->
	<!--			<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false, 'class'=>'prev'), null, array('class'=>'disabled_prev'));?>-->
	<!--			<?php echo $paginator->numbers(array('separator'=>''));?>-->
	<!--			<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false, 'class'=>'next'), null, array('class'=>'disabled_next'));?>-->
	<!--			<?php //echo $paginator->last(); ?>-->
	<!--		<?php else: ?>-->
	<!--			<div>&nbsp;</div>-->
	<!--		<?php endif; ?>-->
	<!--	</div>-->
	<!--	<div class="clear"></div>-->
	<!--</div>-->

<form method="post" id="formTable" class="clean plain">
	<div class="section">
		<div class='grid_8'>
			<div class="action">
				<select name="actions" id="actions">
					<option value=""><?php __("-- Pilih Aksi --") ?></option>
					<?php foreach ($actions as $label => $url): ?>
					<option value="<?php echo $html->url($url) ?>"><?php echo $label ?></option>
					<?php endforeach; ?>
				</select>
				<input type="submit" name="submit" id="apply" value="<?php __("Terapkan") ?>" />&nbsp;
			</div>
			<div class="selection">
				<?php __('Select:') ?> <?php echo $html->link(__('All,', true), "#all", array('id'=>'selectAll')) ?> <?php echo $html->link(__('None', true), "#none", array('id'=>'selectNone')) ?>
			</div>
		</div>
		<div class='grid_8 ar info'>
			<?php echo $paginator->first('&laquo; '.__('First', true), array('escape'=>false), null, array('class'=>'disabled_prev')); ?>
			<?php echo $paginator->prev('&lsaquo; '.__('Prev', true), array('escape'=>false, 'class'=>''), null, array('class'=>'disabled_prev'));?>
			<?php echo $paginator->counter(array('format' => '%start%-%end% <span class="aux">'.__('dari', true).'</span> %count%'));?>
			<?php echo $paginator->next(__('Next', true).' &rsaquo;', array('escape'=>false, 'class'=>''), null, array('class'=>'disabled_next'));?>
			<?php echo $paginator->last(__('Last', true).' &raquo;', array('escape'=>false), null, array('class'=>'disabled_next')); ?>
		</div>
		<div class="clear"></div>
	</div>
	<div class='clear'></div>

	<table cellpadding="0" cellspacing="0" class="Design">
	<thead>
	<tr>
		<?php foreach ($columns as $key => $column) : ?>

			<?php extract(array_combine(array('primaryKeyModel', 'primaryKeyField'), explode('.', $primaryKey)));?>

			<?php if ($column == COLUMN_SELECTOR) :?>
				<th style='width:30px'>&nbsp;</th>
			<?php elseif ($column == COLUMN_ACTION) : ?>
				<th class="actions"><?php __("Aksi") ?></th>
			<?php else : ?>
				<th><?php echo $paginator->sort($key, $column);?></th>
				<?php extract(array_combine(array('model', 'field'), explode('.', $column)));?>
				<?php $col[$key]['model'] = $model ?>
				<?php $col[$key]['field'] = $field ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $row):?>
		<tr>
			<?php foreach ($columns as $key => $column) : ?>
				<?php if ($column == COLUMN_SELECTOR) :?>
					<td><input name="data[ids][]" value="<?php echo $row[$primaryKeyModel][$primaryKeyField] ?>" type="checkbox" ></td>
				<?php elseif ($column == COLUMN_ACTION) : ?>
					<td class="actions">
						<?php echo $html->link('edit', array('action'=>'edit', $row[$primaryKeyModel][$primaryKeyField]), array('title'=>'edit', 'class'=>'edit', 'rel'=>'facebox')); ?>
						<?php echo $html->link('hapus', array('action'=>'delete', $row[$primaryKeyModel][$primaryKeyField]), array('title'=>'hapus', 'class'=>'delete', 'rel'=>'facebox')); ?>
					</td>
				<?php else : ?>
					<td><?php echo $row[$col[$key]['model']][$col[$key]['field']]; ?></td>
				<?php endif; ?>
			<?php endforeach; ?>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</form>

<?php if ( (int) $paginator->counter(array('format' => '%count%')) > Configure::read('Paginator.limit') ) :?>
	<div class="pagination">
		<div class="paging">
			<?php //echo $paginator->first(__('First', true)); ?>
			<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false, 'class'=>'prev'), null, array('class'=>'disabled_prev'));?>
			<?php echo $paginator->numbers(array('separator'=>''));?>
			<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false, 'class'=>'next'), null, array('class'=>'disabled_next'));?>
			<?php //echo $paginator->last(); ?>
		</div>
		<div class="clear"></div>
	</div>
<?php endif; ?>

<script type='text/javascript'>
	$('actions').value = null;
	$('apply').disabled = true;

	Event.observe(window, 'load', function() {

		Event.observe('actions', 'change', function (event) {
			$('apply').disabled = ($('actions').value)? false: true;
		});

		Event.observe('selectAll', 'click', function (event) {
			$('formTable').getInputs('checkbox', 'data[ids][]').each(function(element) {
				element.checked = true;
			})
		});

		Event.observe('selectNone', 'click', function (event) {
			$('formTable').getInputs('checkbox', 'data[ids][]').each(function(element) {
				element.checked = false;
			})
		});

        Event.observe('formTable', 'submit', function(event){
			var found = false;
			$('formTable').getInputs('checkbox', 'data[ids][]').each(function(element) {
				if (element.checked) {
					found = true;
					throw $break;
				}
			})
			if (!found) {
				alert('no checked');
			} else {
				var url = $('actions').value;
				if (url) {
					new Ajax.Request(url, {
						method: 'post',
						parameters: $('formTable').serialize(),
						onSuccess: function(transport, json) {
							//@todo: mode-based action (redirect, delete element, etc)
							location.href = json.redirect;
						}
					});
				}
			}
			Event.stop(event);
        });
    });
</script>
