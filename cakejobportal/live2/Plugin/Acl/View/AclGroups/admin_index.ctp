<?php echo $this->Html->charset('ISO-8859-1');?>
<div id="menycontainer" class="menuWhite">
<p class="blViewCaption"><?php  echo $blViewCaption; ?></p>
<ul id="meny">
    <li id="active"><?php echo $this->Html->link(html_entity_decode(mb_convert_encoding('Användargrupper', "HTML-ENTITIES", "UTF-8")), '/systems/main', array('id'=>'current'), false, false, true); ?></li>
    <li><?php echo $this->html->link('Systemfunktioner', '/admin/acl/acl_permissions', null, false, false, true); ?></li>
    <li><?php echo $this->html->link('Verksamhetstyper', '/UnitTypes/index', Null, false, false, true); ?></li>
</ul>
</div>

<div id="submenu">
<ul>
    <li><?php echo $this->html->link('Ny grupp','/admin/acl/acl_groups/add'); ?></li>
</ul>
</div>
<table class="data-grid" cellspacing="0">
	<tr>
	    <th>Gruppnamn</th>
	    <th>&nbsp;</th>
	</tr>
	<?php $i = '0'; ?>
      <?php foreach ($usergroups as $row):  ?>
	     <?php $class = (is_int($i/2)) ? 'data-grid-row-1' : 'data-grid-row-2';?>	
	     <?php $rowLink = $this->html->url('/admin/acl/acl_groups/add/'.$row['Role']['alias'],true )?>
           <tr class="<?php echo $class?>" 
               onmouseover="this.className='data-grid-mouseover'"
               onmouseout="this.className='<?php echo $class?>'">
            <td >
                  <?php echo $row['Role']['alias'];?>
            </td>
            <td>
            <?php 
                  $confMsg = 'Vill du verkligen radera '.$row['Role']['alias'].'?';
                  echo $this->html->link('Ta bort','/admin/acl/acl_groups/delete/'.$row['Role']['id'],null,$confMsg);
            ?>
            </td>
	</tr>
		<?php $i++;?>
	<?php  endforeach; ?>
</table>

