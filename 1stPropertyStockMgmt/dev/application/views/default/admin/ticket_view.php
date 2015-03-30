<div class="container top">
	<div class="span12">
	<div class="well-white">
		<div class="page-header">
			<h1>Viewing Ticket #<?php echo $ticketid; ?>
			-[<?php echo $ticket['subject']; ?>]
			</h1>
		</div>

		<div class="body">

<?php
if (validation_errors() == TRUE)
{
	echo validation_errors('<div class="alert alert-danger">', '</div>');
}

if (isset($success))
{
	echo '<div class="alert alert-success">' . $success . '</div>';
}
?>


<div class="row">
	
	<div class="span5">
		<div class="badge badge-important ">
				Ticket Info
			</div>
			<p></p>
			
			<table class="table table-bordered table-condensed table-striped">
			<tbody>
		<tr>
			<td>Customer Email</td>
			<td><?php echo $ticket['email']; ?></td>
		</tr>
		<tr>
			<td>Ticket Status</td>
			<td><?php echo ucwords($ticket['status']); ?></td>
		</tr>
		<tr>
			<td>Created On</td>
			<td><?php echo $ticket['created']; ?></td>
		</tr>
		<tr>
			<td>Department Assigned</td>
			<td><?php echo $ticket['deptname']; ?></td>
		</tr>
		</tbody>
		</table>
	
		
	</div>
	
	<div class="span5">
		
				
<?php
if(is_array($additional)) : ?>

<div class="badge badge-important ">
				Additional Fields
			</div>
<p></p>

<table class="table table-bordered table-condensed table-striped">
			<tbody>


<?php foreach($additional as $add) : ?>				
				
		<tr>
			<td><?php echo $add['name']; ?></td>
			<td><?php echo $add['value']; ?></td>
		</tr>
<?php endforeach; ?>

		
		</tbody>
		</table>



<?php endif; ?>		

	</div>
	
	
</div>



<?php
if(isset($ticket['attachment']) && !empty($ticket['attachment']) ) : ?>
<div class="row">	
	<div class="span5">	
		<div class="badge badge-important">Attachment</div> <p></p>
			<table class="table table-bordered table-condensed table-striped">
				<tr>
					<td><?php echo $ticket['attachment'];?></td>
					<td><a class="btn" href="<?php echo site_url();?>/admin/tickets/viewattachment/<?php echo $ticket['attachment'];?>">Download</a></td>
				</tr>
			</table>
		<p></p>
		</div>	
</div>	
<?php endif; ?>	
	
	
<!-- original ticket response -->	

<div class="well">
	<div class="label label-inverse">Client - <?php echo $ticket['email']; ?></div>
	<div class="label"><?php echo $ticket['created']; ?></div>
	 <br><br>
	<?php echo nl2br($ticket['body']); ?>
	
</div>	

	
	
<!-- Replies -->

<?php
foreach($replies as $reply) : ?>

<?php
if ($reply['replier'] == 'client')
{
	echo '<div class="well">';
}
else
{
	echo '<div class="well-white adminreply">';
}
?>

<?php
if($reply['replier'] == 'client') : ?>
<div class="label label-inverse">Client - <?php echo $reply['email']; ?></div>

<?php else: ?>
	<div class="label label-success"><?php echo $reply['firstname'] . ' ' . $reply['lastname']; ?></div>

<?php endif ; ?>


<div class="label"><?php echo $reply['time']; ?></div>
 <br><br>
	<?php echo nl2br($reply['body']); ?>
	
</div>
<?php
endforeach
 ?>




<div class="badge badge-important">Post a reply</div>
<p></p>

	<?php echo form_open('admin/tickets/reply'); ?>
	<input type="hidden" name="ticketid" value="<?php echo $ticketid; ?> " >
	<fieldset>
		<textarea rows="10" class="span8" name="reply"></textarea>
	</fieldset>
	
	<select class="select2" name="status">
		<?php
		foreach($statuses as $status) : ?>
		
		<option value="<?php echo $status['status']; ?>">Set to <?php echo ucwords($status['status']); ?> </option> 
		
		<?php endforeach; ?>
	</select>
	
	<br>
	<input type="submit" class="btn btn-primary" value="Submit" />
	
	</form>

	</div>

	</div>
</div>

</div>
