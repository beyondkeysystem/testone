<?php

$this->Html->css('permission.css');

$this->Html->scriptBlock("$(document).ready(function(){ AclPermissions.documentReady(); });", array('inline' => false));
?>
<link rel="stylesheet" type="text/css" href="/jakob_new/css/permission.css" />
<script type="text/javascript" src="/jakob_new/js/acl_permissions.js"></script>



<div id="menycontainer" class="menuWhite">
<p class="blViewCaption">System</p>
<ul id="meny">
  
   
 <li id="active"><?php echo $this->html->link(html_entity_decode(mb_convert_encoding('Användargrupper', "HTML-ENTITIES", "UTF-8")), '/admin/acl/acl_groups', array('id'=>'current'), false, false, true); ?></li>

    <li id="active"><?php echo $this->html->link('Systemfunktioner', '/admin/acl/acl_permissions', array('id'=>'current'), false, false, true); ?></li>
</ul>
</div>
<div id="submenu">
<ul>
	<li><?php echo html_entity_decode(mb_convert_encoding($this->Html->link(__('Lägg till funktion'), array('action'=>'add')), "HTML-ENTITIES", "UTF-8")); ?></li>
</ul>
</div>

<?php $this->start('tabs'); ?>
<li><?php echo $this->Html->link(__('New Action'), array('action'=>'add')); ?></li>
<li><?php echo $this->Html->link(__('Generate Actions'), array('action'=>'generate')); ?></li>
<?php $this->end(); ?>

<table cellpadding="0" cellspacing="0" id="permission">
<?php
	$tableHeaders =  $this->Html->tableHeaders(array(
		__('Id'),
		__('Alias'),
		__('Actions'),
	));
	echo $tableHeaders;

	$currentController = '';
	foreach ($acos AS $id => $alias) {
		$class = '';
		if(substr($alias, 0, 1) == '_') {
			$level = 1;
			$class .= 'level-'.$level;
			$oddOptions = array('class' => 'hidden controller-'.$currentController);
			$evenOptions = array('class' => 'hidden controller-'.$currentController);
			$alias = substr_replace($alias, '', 0, 1);
		} else {
			$level = 0;
			$class .= ' controller expand';
			$oddOptions = array();
			$evenOptions = array();
			$currentController = $alias;
		}

		$actions  = $this->Html->link(__('Edit'), array('action' => 'edit', $id));
		$actions .= ' ' . $this->Form->postLink(__('Delete'), array(
			'action' => 'delete',
			$id,
		), null, __('Are you sure?'));
		/*$actions .= ' ' . $this->Html->link(__('Move up'), array('action' => 'move', $id, 'up'));
		$actions .= ' ' . $this->Html->link(__('Move down'), array('action' => 'move', $id, 'down'));*/

		$row = array(
			$id,
			$this->Html->div($class, $alias),
			$actions,
		);

		echo $this->Html->tableCells(array($row), $oddOptions, $evenOptions);
	}
	echo $tableHeaders;
?>
</table>
