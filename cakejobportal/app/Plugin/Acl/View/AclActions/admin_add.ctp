<div id="menycontainer" class="menuWhite">
<p class="blViewCaption"><?php  echo html_entity_decode(mb_convert_encoding("Ange namn på ny systemfunktion!", "HTML-ENTITIES", "UTF-8")); ?></p>
<ul id="meny">
</ul>
</div>



<div class="blForm">

	<?php echo $this->Form->create('Aco', array('url' => array('controller' => 'acl_actions', 'action' => 'add'))); ?>

 		<table border="0" cellspacing="1" cellpadding="1" class="csc-mailform">
			<tr>
				<td class="csc-form-labelcell">
					<p class="csc-form-label-req">Controller</p>
				</td>
				<td class="csc-form-fieldcell">
		<?php
			echo $this->Form->input('parent_id', array(
				'options' => $acos,
				'empty' => true,
				'rel' => __('Choose none if the Aco is a controller.'),
				'label'=>''
			));?>
				</td>
			</tr>
			<tr>
				<td class="csc-form-labelcell">
					<p class="csc-form-label-req">Alias</p>
				</td>
				</td>
				<td class="csc-form-fieldcell">
		
		<?php	echo $this->Form->input('alias', array('label'=>''));
		?>
			</td>
			</tr>
      		<tr>
	<tr>
      			<td class="csc-form-labelcell">
      				<p class="csc-form-label"></p>
      			</td>
      			<td class="csc-form-fieldcell">

	<?php echo $this->Form->end('Submit'); ?>
</td>
      		</tr>
		</table>

</div>

