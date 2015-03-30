<section class="profile_main">
          <div class="profile_content">
            <h2>Sign Up</h2>
            <div class="orng_dvdr"></div>
            <div class="signup_sec">
              <p class="come-join">Come Join and be a part of Recruit Young?s Online Community, where we hope to <span class="yellow-txt">inspire, innovate, </span>and <span class="yellow-txt">Empower Youth.</span></p>
              <div class="greyline"></div>
              <div class="already_member">Already a member?
              <?php echo $this->Html->link(__('Login in here'), array('controller' => 'users', 'action' => 'login'),
                                           array('class' => 'blue_btn loginin')); ?>
              <!--<a class="blue_btn loginin" href="">Login in here</a>-->
              </div>
              <div id="pageWrap" class="pageWrap">
                <div class="pageContent">
                  <ul class="accordion">
                    <li> <a href="#a" class="acc_nm">Candidate Details</a>
                    <div class="acc_content">
    <?php echo $this->Form->create('User'); ?>

<div class="inpt_area">
    <?php   echo $this->Form->input( 'first_name', array('label' => 'First Name') ); ?>
</div>
<div class="inpt_area">
    <?php   echo $this->Form->input( 'last_name', array('label' => 'Last Name') ); ?>
</div>
<div class="inpt_area">
                          <label>Date of Birth</label>
                          <div class="list-row">
                            <div class="date">
                              <select class="select" tabindex="1">
                                <option value="">Date</option>
                                <option value="1">01/04/14</option>
                                <option value="1">02/04/14</option>
                                <option value="1">03/04/14</option>
                                <option value="1">04/04/14</option>
                                <option value="1">05/04/14</option>
                                <option value="1">06/04/14</option>
                                <option value="1">07/04/14</option>
                                <option value="1">08/04/14</option>
                                <option value="1">09/04/14</option>
                                <option value="1">10/04/14</option>
                              </select>
                            </div>
                            
                            <div class="date">
                              <select class="select" tabindex="1">
                                <option value="">Month</option>
                                <option value="1">January</option>
                                <option value="1">February</option>
                                <option value="1">March</option>
                                <option value="1">April</option>
                                <option value="1">May</option>
                                <option value="1">June</option>
                                <option value="1">July</option>
                                <option value="1">August</option>
                                <option value="1">September</option>
                                <option value="1">October</option>
                                <option value="1">November</option>
                                <option value="1">December</option>
                              </select>
                            </div>
                            
                            <div class="date">
                              <select class="select" tabindex="1">
                                <option value="">Year</option>
                                <option value="1">1971</option>
                                <option value="1">1972</option>
                                <option value="1">1973</option>
                                <option value="1">1974</option>
                                <option value="1">1975</option>
                                <option value="1">1976</option>
                                <option value="1">1977</option>
                                <option value="1">1979</option>
                                <option value="1">1980</option>
                              </select>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <a href="#" class="block_note">Why do I need to provide my date of birth</a> </div>
                    </li>
                    <li><a href="#a" class="acc_nm">Employer Details</a>
                      <div class="acc_content">
                        <div class="inpt_area">
                          <label for="c_name">Company Name</label>
                          <input id="c_name" type="text" name="" value="" />
                        </div>
                        <div class="inpt_area">
                          <!--<label for="e_add">Email Address</label>-->
                          <?php echo $this->Form->input('email', array('label' => 'Email Address', 'id' => 'e_add') ); ?>
                          <!--<input id="e_add" type="text" name="" value="" />-->
                        </div>
                        <div class="inpt_area">
                          <!--<label>Office Address</label>-->
                          <?php echo $this->Form->textarea('address', array('label' => 'Office Address', 'id' => 'e_add' ,'rows' => '5', 'cols' => '5') ); ?>
                          <!--<textarea></textarea>-->
                        </div>
                        <div class="inpt_area">
                          <label for="l_name">City</label>
                          <div class="list-row full-width">
                            <div class="date">
                              <select class="select" tabindex="1">
                                <option value="">&nbsp;</option>
                                <option value="1">Lorem Ipsum</option>
                                <option value="1">Lorem Ipsum</option>
                              </select>
                            </div>
                          </div>  
                        </div>
                        <div class="inpt_area">
                          <label for="slct_c">Select Country</label>
                          <input id="slct_c" type="text" name="" value="" />
                        </div>
                        <div class="inpt_area">
                          <!--<label for="u_name">User Name</label>-->
                         <?php   echo $this->Form->input( 'name', array('label' => 'User Name' , 'id' => 'u_name') ); ?>
                         <!-- <input id="u_name" type="text" name="" value="" />-->
                        </div>
                        <div class="inpt_area">
                          <!--<label for="choose_pass">Choose a Password</label>-->
                          <?php echo $this->Form->input('password', array('label' => 'Choose a Password' , 'id' => 'choose_pass')); ?>
                         <!-- <input id="choose_pass" type="password" name="" value="" />-->
                        </div>
                        <div class="inpt_area">
                          <label for="confirn_pass">Confirm Password</label>
                          <input id="confirn_pass" type="password" name="" value="" />
                        </div>
                        <div class="block_note">
                            <input type="checkbox" required="required" name="ex2_a" id="ex2_a">
                            <label for="ex2_a">I accept the <a href="#">Terms &amp; Cnditions</a> and <a href="#">Privacy Policies</a> </label>
                            <?php echo $this->Form->input('created_date',array('type'=>'hidden','value'=>date("Y-m-d H:i:s"))); ?>
                        </div>
                      </div>  
                    </li>
        <?php
      
        //echo $this->Form->input('sex', array('type' => 'select', 'options' => array('male' => 'Male', 'female' => 'Female'), 'empty' => 'Please select'));
        //echo $this->Form->input('email');
        //echo $this->Form->input('password');
        //echo $this->Form->input('mobile');
        //echo $this->Form->input('type', array('type' => 'select', 'class' => 'select' ,'options' => array('employer' => 'employer', 'candidate' => 'candidate'), 'empty' => 'Please select'));
        //echo $this->Form->input('address');
        //echo $this->Form->input('created_date',array('type'=>'hidden','value'=>date("Y-m-d H:i:s")));
        ?>

        </ul>
        <?php echo $this->Form->end(__('Submit'));
        ?>
        <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        