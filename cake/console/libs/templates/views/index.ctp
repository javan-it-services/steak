<?php
/* SVN FILE: $Id$ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
?>
<div class="<?php echo $pluralVar;?> index grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php echo "<?php __('{$pluralHumanName}');?>";?></span></h2>

<table cellpadding="0" cellspacing="0" class="Design">
<tr>
<?php  foreach ($fields as $field):?>
	<th><?php echo "<?php echo \$paginator->sort('{$field}');?>";?></th>
<?php endforeach;?>
	<th class="actions"><?php echo "<?php __('Actions');?>";?></th>
</tr>
<?php
echo "<?php
\$i = 0;
foreach (\${$pluralVar} as \${$singularVar}):
	\$class = null;
	if (\$i++ % 2 == 0) {
		\$class = ' class=\"altrow\"';
	}
?>\n";
	echo "\t<tr<?php echo \$class;?>>\n";
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				echo "\t\t<td>\n\t\t\t<?php echo \${$singularVar}['{$modelClass}']['{$field}']; ?>\n\t\t</td>\n";
			}
		}

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<?php echo \$html->link(\$html->image('page_16.png'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('title'=>'View Detail'),false,false); ?>\n";
	 	echo "\t\t\t<?php echo \$html->link(\$html->image('pencil_16.png'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('title'=>'Edit'),false,false); ?>\n";
	 	echo "\t\t\t<?php echo \$html->link(\$html->image('del_16.png'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('title'=>'Hapus'), sprintf(__('Are you sure you want to delete # %s?', true), \${$singularVar}['{$modelClass}']['{$primaryKey}']),false); ?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

echo "<?php endforeach; ?>\n";
?>
</table>


<div class="pagination">
	<div class="paging">
		<?php echo "\t<?php echo \$paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false, 'class'=>'prev'), null, array('class'=>'disabled_prev'));?>"?>
		<?php echo "\t<?php echo \$paginator->numbers(array('separator'=>''));?>"?>
		<?php echo "\t<?php echo \$paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false, 'class'=>'next'), null, array('class'=>'disabled_next'));?>"?>
	</div>
	<div class="clear"></div>
</div>



</div>
</div> <!--end class box-->

<div class="actions grid_4 omega" id="sidebar">
	<div class="sidebox special">
		<ul>
			<li><?php echo "<?php echo \$html->link(\$html->image('add_16.png').__('New {$singularHumanName}', true), array('action' => 'add'),array('class'=>'tombol'), null, false); ?>";?></li>
		<?php
		/*
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "\t\t<li><?php echo \$html->link(__('List " . Inflector::humanize($details['controller']) . "', true), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
					echo "\t\t<li><?php echo \$html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "', true), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
					$done[] = $details['controller'];
				}
			}
		}
		*/
		?>
		</ul>
	</div>
</div>
</div>
