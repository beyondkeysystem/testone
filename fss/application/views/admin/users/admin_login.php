<div class="container login">
    <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <?php echo $this->session->flashdata('msg');?>
        <input name="users[username]" maxlength="255" type="text" id="" />
        <?php echo form_error('username', '<div class="form_error">', '</div>'); ?>
        <input name="users[password]" type="password" id="UserPassword" />
        <?php echo form_error('password', '<div class="form_error">', '</div>'); ?>
        <br />
        <div class="submit"><input class="btn btn-large btn-primary" type="submit" value="Submit"/></div>
    </form>
</div><!--container-->