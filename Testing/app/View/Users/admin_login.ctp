<div id="content">
  <div class="container-fluid"><br>
    <br>
    <div class="row">
      <div class="col-sm-offset-4 col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h1 class="panel-title"><i class="fa fa-lock"></i> Please enter your login details.</h1>
          </div>
         

            <?php echo $this->Session->flash(); ?>
         
          
          <div class="panel-body">
              <?php echo $this->Form->create('User'); ?>

              <div class="form-group">
              
                <label for="input-username">Username</label>
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <?php echo $this->Form->input('username',array("label"=>false,"class"=>"form-control","placeholder"=>"Username","id"=>'input-username'));  ?>
                </div>
              </div>
              <div class="form-group">

                <label for="input-password">Password</label>
                <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>                
                  <?php echo $this->Form->input('password',array("class"=>"form-control","placeholder"=>"Password","id"=>'input-password',"label"=>false)); ?>
                </div>
                              </div>
              <div class="text-right">
                <button class="btn btn-primary" type="submit"><i class="fa fa-key"></i> Login</button>
              </div>             
             <?php echo $this->Form->end();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>