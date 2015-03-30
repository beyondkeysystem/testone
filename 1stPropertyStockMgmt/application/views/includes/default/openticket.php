<?php   if(!$this->session->userdata('is_logged_in')){
   ?>
   <div class="span121">
   <div class="contact-form">

        <div class="body">
            <div class="row">
	<div class="span5">
		<div class="openticketform">
		  <div class="alert alert-danger"> Please login to see this page</div>
		  </div>
	</div>
	    </div>
		</div>
	</div>
	    </div>
           
      <?php  } else{?>
<div class="span121">
   <div class="contact-form">

        <div class="body">

<?php
if (validation_errors() == TRUE)
{
	echo validation_errors('<div class="alert alert-danger">', '</div>');
}
if (isset($error))
{
	echo '<div class="alert alert-danger">' . $error . '</div>';
}
?>

<div class="row">
	<div class="span5">
		<div class="openticketform">
		  <?php $user=$this->session->userdata('user_id'); ?>
<?php echo form_open_multipart("index/create/".$user); ?>
<div class="form-row">
<fieldset>
<label>Email Address</label>
<input type="text" name="email" placeholder="Enter a valid email address" required value="<?php echo set_value('email'); ?>"  />
</fieldset>

<input type="hidden" name="department" value="<?php echo $departmentid; ?>">

          
<fieldset>
    <label>Subject</label>
    <input type="text" name="subject" placeholder="Subject of your request" required="required" value="<?php echo set_value('subject'); ?>"  />
</fieldset>

<fieldset>
    <label>Your Query</label>
    <textarea class="span5" rows="15" name="body"><?php echo set_value('body'); ?></textarea>
</fieldset>

<fieldset>
    <label>Priority</label>
    <select class="select2 " name="priority">
        <?php foreach($priorities as $priority): ?>
            <option value="<?php echo $priority['priority']; ?>"><?php echo $priority['priority']; ?></option>
        <?php endforeach; ?>
    </select>
</fieldset>


	</div>
	
	
	<div class="span6 ">
		
		
<?php
if (is_array($additional) && !empty($additional))
{
	echo '
	<div class="well">
	<p></p><div class="badge badge-important">Additional Fields</div>';
	echo '<a class="btn btn-link" href="#" rel="tooltip" title="Additional Fields" data-content="Additional fields are useful if you want to send us additional data such as username or password. These values are encrypted before saving to the database and deleted once the ticket is closed"> ?</a>  ';

	foreach ($additional as $item)
	{
		echo '<fieldset>';
		echo '<label>' . $item['name'] . '</label>';
		if ($item['type'] == 'text')
		{
			echo '<input type="text" name="' . $item['uniqid'] . '">  ';
		}
		echo '</fieldset>' . "\n";
	}
	
	echo '</div>';
}
?>


</div>
	
	
</div>



</div>

</div>
<?php
	$array = array(
		'class' => 'btn btn-primary',
		'name' => 'submit'
	);
	echo form_submit($array, 'Create Ticket');
?>

   <?php echo form_close(); ?>

    </div>

    </div>
     <div class="add_detail_ticket">
		
<div class="alert alert-info">
	

		<p> <?php if($this->lang->line('tickets_info')){echo ($this->lang->line('tickets_info'));} else{ echo 'Welcome to our Support Desk. Our Support Desk will help you to contact us for all your questions and get instant answers to it.';} ?></p> 
		
            </div>
	</div>
</div>
<?php } ?>