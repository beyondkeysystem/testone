
<div class="span121">
<div class="wrapper">
	<div class="contact-form">

		<div class="body">
		
		<?php
		if (isset($error))
			echo '<div class="alert alert-danger">' . $error . '</div>';
		if (isset($success))
			echo '<div class="alert alert-success">' . $success . '</div>';
	?>


		
		<!--<div class="badge badge-info">Select Department</div><p></p>
		<select class="select2" id="dept">
					
		<?php
			foreach($departments as $dept): ?>
			<option value="<?php echo $dept['deptid'];?>"><?php echo $dept['deptname'];?> </option>  
		<?php endforeach; ?>
    	</select>
    	<a href="#" id="select" class="btn btn-primary">Select</a>-->
		</div>

	</div>
	<div class="add_detail_ticket">
		
<div class="welcome_message">
	
            
		<p><i class="fa fa-quote-left"></i> <?php if($this->lang->line('tickets_info')){echo ($this->lang->line('tickets_info'));} else{ echo 'Welcome to our Support Desk. Our Support Desk will help you to contact us for all your questions and get instant answers to it.';} ?> <i class="fa fa-quote-right"></i></p> 	
		
		
            </div>
	</div>

</div>
</div>
<style>
.body{
	margin: 20px;
}
</style>
<!--<script>
	$(function(){
		$("#select").click(function(){
			deptid = $("#dept").val();
			if(deptid)
			{
				window.location = '<?php echo site_url();?>index/openticket/' + deptid ;
			}
			else
			{
				$.bootalert('Error', 'Please select a department');
			}
		})
	})
</script>-->


