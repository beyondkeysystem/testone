<h2>Daily Visitors</h2>

<br />

<div class="row">
<div class="span4">

<table class="table table-striped table-bordered table-condensed">
<tr>
<th>Date</th>
<th>Visitors</th>
<th>&nbsp;</th>
</tr>
<?php foreach ($visitors as $visitor): ?>
<tr>
<td><?php echo h($visitor['Visitor']['created_date']); ?></td>
<td><?php echo h($visitor['0']['count']); ?></td>
<td><div style="background: #cc6666; width: <?php echo h($visitor['0']['count']); ?>px;">&nbsp;</div></td>
</tr>
<?php endforeach; ?>
</table>

</div>
</div>

<br />


