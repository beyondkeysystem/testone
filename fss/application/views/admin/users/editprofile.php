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
            <a href="#">Edit Profile</a>
        </li>
    </ul>      
    <div class="page-header">
        <h2>
            Edit Profile
        </h2>
    </div>
    <form accept-charset="utf-8" method="post" id="" class="form-horizontal" action="">
        <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">First Name</label>
                <div class="controls">
                    <input type="text" id="UserFirstname" name="users[firstname]" value="<?php if (isset($users['firstname'])) echo $users['firstname']; ?>">
                    <?php echo form_error('users[firstname]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Last Name</label>
                <div class="controls">
                    <input type="text" id="UserLastname" name="users[lastname]" value="<?php if (isset($users['lastname'])) echo $users['lastname']; ?>">
                    <?php echo form_error('users[lastname]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>          
            <div class="control-group">
                <label for="inputError" class="control-label">Username</label>
                <div class="controls">
                    <input type="text" id="UserUsername" name="users[username]" value="<?php if (isset($users['username'])) echo $users['username']; ?>">
                    <?php echo form_error('users[username]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Email</label>
                <div class="controls">
                    <input type="text" id="UserEmail" name="users[email]" value="<?php if (isset($users['email'])) echo $users['email']; ?>">
                    <?php echo form_error('users[email]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Gender</label>
                <div class="controls">
                    <select id="UserGender" class="span2" name="users[gender]">
                        <option value="">Please select gender</option>
                        <option <?php if (isset($users['gender']) and $users['gender'] == 'Male') { ?> selected="selected" <?php } ?> value="Male">Male</option>
                        <option <?php if (isset($users['gender']) and $users['gender'] == 'Female') { ?> selected="selected" <?php } ?> value="Female">Female</option>
                    </select>
                    <?php echo form_error('users[gender]', '<div class="form_error">', '</div>'); ?>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Save changes</button>
                <button class="btn" type="reset">Cancel</button>
            </div>
        </fieldset>

    </form>

</div>
