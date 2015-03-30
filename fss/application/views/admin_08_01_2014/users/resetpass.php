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
            <a href="#">New</a>
        </li>
    </ul>      
    <div class="page-header">
        <h2>
            Adding <?php echo ucfirst($this->uri->segment(2)); ?>
        </h2>
    </div>
    <form accept-charset="utf-8" method="post" id="" class="form-horizontal" action="">
        <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Password</label>
                <div class="controls">
                    <input type="password" id="UserPassword" name="users[password]" value="<?php if(isset($users['password'])) echo $users['password'];?>">
                    <?php echo form_error('users[password]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn" type="reset">Cancel</button>
            </div>
        </fieldset>

    </form>

</div>
