<?php $this->load->view('home/breadcrumb'); ?>
<div class="wrapper">
	<div class="register">
    	<div class="reg-left">
        	<h3>Forget Password </h3>
            <div class="reg-form">
		<?php if( isset($info)): ?>
					<div class="alert alert-success">
						<?php echo($info) ?>
					</div>
				<?php elseif( isset($error)): ?>
					<div class="alert alert-error">
						<?php echo($error) ?>
					</div>
				<?php endif; ?>
            	<?php
		    //form data
		$attributes = array('class' => 'form-horizontal', 'id' => '');
		echo validation_errors();
                 echo form_open('doforget', $attributes);
                 ?>
                <div class="reg-form-row">
                	<div class="row-col1">
                    	<label for="email"> Email</label>
			<input class="box" type="text" id="email" name="email" />
			</div>
                </div>
              
                <div class="search_btn"><input type="submit" value="Reset" name="register"></div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--/.Main Body-->
<?php $this->load->view('home/blue_bar'); ?>