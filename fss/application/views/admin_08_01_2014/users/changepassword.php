<div class="container top">
    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("admin"); ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li>
            <a href="<?php echo site_url("admin") . '/' . $this->uri->segment(2); ?>">
                <?php echo ucfirst($this->uri->segment(2)); ?>
            </a> 
            <span class="divider">/</span>
        </li>
        <li class="active">
            <a href="#">Change Password</a>
        </li>
    </ul>      
    <div class="page-header">
        <h2>
            Change Password
        </h2>
    </div>
    <form accept-charset="utf-8" method="post" id="" class="form-horizontal" action="">
        <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Old Password</label>
                <div class="controls">
                    <input type="password" id="UserPassword" name="opassword" value="<?php if(isset($opassword)) echo $opassword;?>">
                    <?php echo form_error('opassword', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">New Password</label>
                <div class="controls">
                    <input type="password" id="password" name="password" value="<?php if(isset($password)) echo $password;?>">
                    <?php echo form_error('password', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Confirm Password</label>
                <div class="controls">
                    <input type="password" id="UserPassword" name="cpassword" value="<?php if(isset($cpassword)) echo $cpassword;?>">
                    <?php echo form_error('cpassword', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn" type="reset">Cancel</button>
            </div>
        </fieldset>

    </form>

</div>