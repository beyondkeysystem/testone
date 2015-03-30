<h2>Visitors</h2>

<br />

<?php echo $this->Paginator->counter(array('format' => 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')); ?>

<br />

&nbsp;<?php echo $this->Paginator->first('<< first', array(), null, array('class' => 'next disabled')); ?>
&nbsp;<?php echo $this->Paginator->prev('< previous' , array(), null, array('class' => 'prev disabled')); ?>
&nbsp;<?php echo $this->Paginator->numbers(array('separator' => ' ')); ?>
&nbsp;<?php echo $this->Paginator->next('next >', array(), null, array('class' => 'next disabled')); ?>
&nbsp;<?php echo $this->Paginator->last('last >>', array(), null, array('class' => 'next disabled')); ?>

<br />
<br />

<table class="table table-striped table-bordered table-condensed table-hover">
<tr>
<!-- <th><?php echo $this->Paginator->sort('url'); ?></th> -->
<th><?php echo $this->Paginator->sort('created'); ?></th>
<th><?php echo $this->Paginator->sort('keyword'); ?></th>
<th><?php echo $this->Paginator->sort('ip'); ?></th>
<th><?php echo $this->Paginator->sort('country_code'); ?></th>
<th><?php echo $this->Paginator->sort('region'); ?></th>
<th><?php echo $this->Paginator->sort('city'); ?></th>
<th><?php echo $this->Paginator->sort('referrer'); ?></th>
<th class="actions">Actions</th>
</tr>
<?php foreach ($visitors as $visitor): ?>
<tr>
<!-- <td><?php echo h($visitor['Visitor']['url']); ?></td> -->
<td nowrap><?php echo h($visitor['Visitor']['created']); ?></td>
<td><?php echo h($visitor['Visitor']['keyword']); ?></td>
<td><?php echo h($visitor['Visitor']['ip']); ?><br /><?php echo h($visitor['Visitor']['remotehost']); ?></td>
<td><?php echo h($visitor['Visitor']['country_code']); ?></td>
<td><?php echo h($visitor['Visitor']['region']); ?></td>
<td><?php echo h($visitor['Visitor']['city']); ?></td>
<td><?php echo h($visitor['Visitor']['referrer']); ?></td>
<td class="actions">
<?php echo $this->Html->link('View', array('action' => 'view', $visitor['Visitor']['id'])); ?>
<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $visitor['Visitor']['id'])); ?>
<?php //echo $this->Form->postLink('Delete', array('action' => 'delete', $visitor['Visitor']['id']), null, __('Are you sure you want to delete # %s?', $visitor['Visitor']['id'])); ?>
</td>
</tr>
<?php endforeach; ?>
</table>

<br />

<?php echo $this->Paginator->counter(array('format' => 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')); ?>

<br />

&nbsp;<?php echo $this->Paginator->first('<< first', array(), null, array('class' => 'next disabled')); ?>
&nbsp;<?php echo $this->Paginator->prev('< previous' , array(), null, array('class' => 'prev disabled')); ?>
&nbsp;<?php echo $this->Paginator->numbers(array('separator' => ' ')); ?>
&nbsp;<?php echo $this->Paginator->next('next >', array(), null, array('class' => 'next disabled')); ?>
&nbsp;<?php echo $this->Paginator->last('last >>', array(), null, array('class' => 'next disabled')); ?>

<br />

