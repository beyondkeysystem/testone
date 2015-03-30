<div class="container main-cnt">
    <div class="form-title">
        <h3 class="cmn-heading"><span>Forgot Your Password</span></h3>
        <form action="" method="post">
        <div class="forgot-box">
            <p>Don't Worry! Just fill in your email and we'll help 
                you reset your password.</p>
            <div class="form-group">
                <div class="form-control">
                    <?php if(isset($_GET['e']) and $_GET['e']=='s'){?>
                    <p style="color: green">Your new password has been sent in your email id</p>
                        <?php }?>
                    <p>Please enter your email</p>
                    <input type="text" value="<?php if(isset($_GET['email']) and $_GET['email'] !=''){ echo $_GET['email'];?><?php }?>" name="email" class="input-lg" placeholder="enter your email:">
                    <span class="error-msg-sign"><?php echo form_error('email', '<div>', '</div>'); ?>
                        <?php if(isset($_GET['e']) and $_GET['e']=='m'){?>
                            This email does not exist.
                        <?php }?>
                    </span>
                </div>
            </div>
            <div class="send-row">
                <button class="btn-4">Send Email</button>
            </div>
            <div class="links-forgot">
                <span><a href="/users/signin">Back To Login</a></span>
                <span class="forgot-snp"><a href="/users/register">Don't have an account? Sign up</a></span>
            </div>
        </div> 
    </form>
    </div>
</div>