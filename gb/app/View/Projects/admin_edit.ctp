<script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker({ changeYear: true });
		// getter
		var changeYear = $( ".selector" ).datepicker( "option", "changeYear" );
		// setter
		$( "#datepicker" ).datepicker( "option", "changeYear", true );
		$( "#datepicker" ).datepicker({ gotoCurrent: true });
		// getter
		var gotoCurrent = $( ".selector" ).datepicker( "option", "gotoCurrent" );
		// setter
		$( "#datepicker" ).datepicker( "option", "gotoCurrent", true );
	});
  </script>


<h2>Vendor Tracking Edit </h2>

<div class="row">

	
	<div class="span4">
		
		
		<?php echo $this->Form->create('Project');?>
        <?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
		<br />
        <br />
		<?php echo $this->Form->input('id');?>
		<?php echo $this->Form->input('persons', array('label' => 'GB Point Person')); ?>
		<?php echo $this->Form->input('projectcategory_id', array('label' => 'Vendor Status'));?>
		<?php echo $this->Form->input('source', array('label' => 'Vendor Source'));?>
		
		<hr />
        
		<h3>BUSINESS INFO</h3>
		<?php echo $this->Form->input('business_name');?>
		<?php echo $this->Form->input('address'); ?>
		<?php echo $this->Form->input('city'); ?>
		<?php echo $this->Form->input('state'); ?>
		<?php echo $this->Form->input('zip'); ?>
		<?php echo $this->Form->input('phone', array('label' => 'Phone - General')); ?>
		<?php echo $this->Form->input('fax', array('label' => 'Fax - General')); ?>
        <?php echo $this->Form->input('website'); ?>

		<br />
        
		<?php echo $this->Form->input('active', array('type' => 'checkbox', 'label' => 'Active')); ?>
		
	</div>
	
	<div class="span3">
    
		<h3>MAIN CONTACT</h3>
		<?php echo $this->Form->input('contact_1', array('label' => 'Main Contact')); ?>
		<?php echo $this->Form->input('title_1', array('label' => 'Main Contact Title')); ?>
		<?php echo $this->Form->input('email_1', array('label' => 'Main Contact eMail')); ?>
		<?php echo $this->Form->input('phone_1', array('label' => 'Main Contact Phone')); ?>
		<?php echo $this->Form->input('cell_1', array('label' => 'Main Contact Cell')); ?>
        <br />
        <?php echo $this->Form->input('date_contact', array('id' => 'datepicker', 'label' => 'Date of first contact','class' => 'mceNoEditor')); ?>
        
        <div class ="row">
    
       <div class="span6">
       	
           <h3>BODY</h3>

			<?php echo $this->Form->input('body', array('rows' => 10, 'class' => 'field span6')); ?>
       </div>

	</div>
		
	</div>
	
	<div class="span5">	
		<h3>SECOND CONTACT</h3>
		<?php echo $this->Form->input('contact_2', array('label' => 'Second Contact Name')); ; ?> 
		<?php echo $this->Form->input('title_2', array('label' => 'Second Contact Title')); ?>
		<?php echo $this->Form->input('phone_2', array('label' => 'Second Contact Phone'));?>
		<?php echo $this->Form->input('cell_2', array('label' => 'Second Contact Cell'));?>
		
		<br />
        
		
	</div>
    
    
        
</div>


	
		<br />	
		
		<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
		
		<br />	
		<?php echo $this->Form->end(); ?>
		
		<h3>Actions</h3>
				
		<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Project.id')), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $this->Form->value('Project.id'))); ?>