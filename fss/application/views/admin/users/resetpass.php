<div class="container top">
    <ul class="breadcrumb">
        <li>
            <a href="<?php echo site_url("admin"); ?>">
                <?php echo ucfirst($this->uri->segment(1)); ?>
            </a> 
            
        </li>
        <li>
            <a href="<?php echo site_url("admin") . '/' . $this->uri->segment(2); ?>">
                <?php echo ucfirst($this->uri->segment(2)); ?>
            </a> 
           
        </li>
        <li class="active">
            <a href="#">New</a>
        </li>
    </ul>      
    <div class="page-header">
        <h2>
            Reset Password
        </h2>
    </div>
    <form accept-charset="utf-8" method="post" id="" class="form-horizontal" action="">
        <fieldset>
            <div class="control-group">
                <div class="controls">
                <?php echo $this->session->flashdata('msg');?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Password</label>
                <div class="controls">
                    <input type="password" id="UserPassword" name="users[password]" value="<?php if(isset($users['password'])) echo $users['password'];?>">
                    <?php echo form_error('users[password]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <a href="/admin/users/manage" class="btn" >Cancel</a>
            </div>
        </fieldset>

    </form>

</div>
