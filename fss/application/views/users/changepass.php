<div class="container main-cnt">
    <div class="form-title">
        <h3 class="cmn-heading"><span>Change Your Password</span></h3>
        <form action="" method="post">
            <div class="forgot-box">
                <div style="color: green"><?php if(isset($_GET['e']) and $_GET['e'] =='s'){?>Password has been changed successfully<?php }?></div>
                <div class="form-group">
                    <div class="form-control">
                        <p>Old Password</p>
                        <input type="password" name="opassword" class="input-lg" placeholder="Old Password">
                        <span class="error-msg-sign"><?php echo form_error('opassword', '<span>', '</span>'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <p>New Password</p>
                        <input type="password" name="password" class="input-lg" placeholder="New Password">
                        <span class="error-msg-sign"><?php echo form_error('password', '<span>', '</span>'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <p>Confirm Password</p>
                        <input type="password" name="cpassword" class="input-lg" placeholder="Confirm Password">
                        <span class="error-msg-sign"><?php echo form_error('cpassword', '<span>', '</span>'); ?></span>
                    </div>
                </div>
                <div class="send-row">
                    <button class="btn-4">Send Email</button>
                </div>
            </div> 
        </form>
    </div>
</div>