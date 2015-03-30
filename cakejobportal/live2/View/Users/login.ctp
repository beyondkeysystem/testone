<?php 
echo $this->Html->css('login_style');
echo $this->fetch('css');?>
<style>.contact-form{
background: none repeat scroll 0 0 #FCFCFC;
    margin-top: 28px;
    overflow: hidden;
    padding: 8%;
    width: 230%;
}</style>
<div style="padding:0;font-size: 11px;" class="main_ctnr_middle">
  <section class="profile_main">
    <?php echo $this->Form->create('User'); ?>
    <div style="font-family:none;padding:0;">
      <div id="box_middle">
        <div class="contact-form">
          <?php echo $this->Session->Flash();?>  
          <ul class="contact-form-field">
                  <li>
                          <span class="field-txt">Email</span>
                          <input class="field-area" name="data[User][email]" type="text">
                  </li>
                  
                  <li>
                          <span class="field-txt">Password</span>
                          <input class="field-area" name="data[User][password]" required="required" type="password">
                  </li>
                  <li>
                    <input id="btnSave" name="btnSave"  class="blue" value="Login" type="submit">
                      <br>
                    <a class="forgot" href="reset">forgot password ?</a>&nbsp;&nbsp;&nbsp<a class="forgot" href="signup">signup...</a> 
                  </li>
          </ul>
        </div>
      </div>
    </div>
    <?php echo $this->Form->end(); ?>
  </section>
</div>