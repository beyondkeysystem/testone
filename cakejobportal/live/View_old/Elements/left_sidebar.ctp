<div class="col-sm-2">
    <div class="Sidebar-Left">
    <div class="box">
    <div class="title-well">
	 <h2>Upgrade Candidate</h2>	</div>
    <div class="discretion"> 
    <img src="<?php echo $path = $this->webroot; ?>css/images/pic-upgrade.jpg" alt="" />
    <h4>Profile Picture & Linked</h4>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </p>
    
    </div>
	</div>
    <div class="divider"></div>
    
    <div class="box">
    <div class="title-well">
	 <h2>Upgrade Candidate</h2>	</div>
    <div class="discretion"> 
    <img src="/css/images/pic-upgrade.jpg" alt="" />
    <h4>Profile Picture & Linked</h4>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </p>
    
    </div>
	</div>
    <div class="divider"></div>
    
    <div class="box login-box">
    <div class="title-well">
	 <h2>Login</h2>	</div>
    <div class="discretion">
    <?php ?>
		<?php echo $this->Form->create('User'); ?>
		<div class="form-group">
		<!--<label for="exampleInputEmail1">User Name</label>-->
		<?php echo $this->Form->input('email', array('label' => 'User Name ','class'=>array('loginFont form-control')));?>
		
		<!--<input type="email" class="form-control" id="exampleInputEmail1" />-->
		</div>
		<div class="form-group">
		<!--<label for="exampleInputPassword1">Password</label>-->
		<!--<input type="password" class="form-control" id="exampleInputPassword1" />  -->
		<?php echo $this->Form->input('password',array('label'=>'Password ','class'=>array('loginFont form-control')));?> 
		</div>
		<div class="form-group">
		<button class="btn btn-primary" id="btnSave" name="btnSave" type="submit">Sign Up</button>
		<!--<input id="btnSave" name="btnSave"  class="blue" value="Login" type="submit">-->
		</div>
		</form>
<?php  ?>

    </div>
	</div>

    
    </div>
    </div>
