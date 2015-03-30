

<!-- <h4 style="color: #ff0000;"> <?php echo $this->Session->Flash(); ?> </h4>-->
 
    <div class="Sidebar-Left">
    <div class="box">
    <div class="title-well">
	 <h2>Upgrade Candidate</h2>	</div>
    <div class="discretion"> 
    <img src="<?php echo $this->webroot; ?>css/images/pic-upgrade.jpg" alt="" />
    <h4>Profile Picture & Linked</h4>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </p>
    
    </div>
	</div>
    <div class="divider"></div>
    
    <div class="box">
    <div class="title-well">
	 <h2>Upgrade Candidate</h2>	</div>
    <div class="discretion"> 
    <img src="<?php echo $this->webroot; ?>css/images/pic-upgrade.jpg" alt="" />
    <h4>Profile Picture & Linked</h4>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. </p>
    
    </div>
	</div>
    <div class="divider"></div>
    
    <div class="box login-box">
    <div class="title-well">
	 <h2><?php if(empty($user)) { echo 'Login'; } else { echo 'User Detail'; } ?></h2> 
    </div>
    <div class="discretion">
	
	<?php if(empty($user)) {

echo $this->Form->create('User'); ?>

<h5><?php echo $this->Session->Flash();?></h5>
		<div class="form-group">
		<!--<label for="exampleInputEmail1">User Name</label>-->
		<?php echo $this->Form->input('email', array('label' => 'Email','class'=>array('loginFont form-control'), 'require'=>"require"));?>
		
		<!--<input type="email" class="form-control" id="exampleInputEmail1" />-->
		</div>
		<div class="form-group">
		<!--<label for="exampleInputPassword1">Password</label>-->
		<!--<input type="password" class="form-control" id="exampleInputPassword1" />  -->
		<?php echo $this->Form->input('password',array('label'=>'Password ','class'=>array('loginFont form-control') , 'require'=>"require"));?> 
		</div>
		<div class="form-group">
		<button class="btn btn-primary" id="btnSave" name="btnSave" type="submit">Sign In</button>
		<!--<input id="btnSave" name="btnSave"  class="blue" value="Login" type="submit">-->
		</div>
		</form>
<?php
}
else
{
echo '<h4>Name:</h4><p>'.$user['name'].'</p>';
echo '<h4>Email:</h4><p>'.$user['email'].'</p>';
echo '<h4>Phone:</h4><p>'.$user['mobile'].'</p>';
//echo '<h4>Email:</h4><p>'.$user['address'].'</p>';
}	
?>
    </div>
	</div>

    
    </div>
