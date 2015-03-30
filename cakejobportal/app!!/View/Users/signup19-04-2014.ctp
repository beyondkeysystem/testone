<script type="text/javascript">
        function getusername(q){
        $.ajax({
        type: "POST",
        url: "<?php echo $this->webroot; ?>users/validateUsername?un="+q,
        data: {item:q},
        success:function(data){
       // alert(data);
        $("#err_un").html(data);
        }
        });
        }
        
        function getusername_can(q){
        $.ajax({
        type: "POST",
        url: "<?php echo $this->webroot; ?>users/validateUsername?un="+q,
        data: {item:q},
        success:function(data){
       // alert(data);
        $("#err_un_can").html(data);
        }
        });
        }
        
        function getemail(q)
        {
        $.ajax({
        type: "POST",
        url: "<?php echo $this->webroot ?>users/validateUseremail?email="+q,
        data: {item:q},
        success:function(data){
        //alert(data);
        $("#err_email").html(data);
        }
        });
        
        }
        function getemail_can(q)
        {
        $.ajax({
        type: "POST",
        url: "<?php echo $this->webroot ?>users/validateUseremail?email="+q,
        data: {item:q},
        success:function(data){
        //alert(data);
        $("#err_email_can").html(data);
        }
        });
        
        }
        
        function checksubmit() {
            if(document.getElementById('#err_un').value == 'Done' && document.getElementById('#err_email').value == 'Done')
            {
                return true;
            }
            else
            {
                return false
            }
        }
        </script>





<script type="text/javascript">

/*This function is called when state dropdown value change*/
function selectState(state_id){
  if(state_id!="-1"){
    loadData('city',state_id);
  }else{
    $("#city_dropdown").html("<option value='-1'>Select city</option>");
  }
}

/*This function is called when city dropdown value change*/
function selectCity(country_id){
 if(country_id!="-1"){
   loadData('state',country_id);
   $("#city_dropdown").html("<option value='-1'>Select city</option>");
 }else{
  $("#state_dropdown").html("<option value='-1'>Select state</option>");
   $("#city_dropdown").html("<option value='-1'>Select city</option>");
 }
}

/*This is the main content load function, and it will
     called whenever any valid dropdown value changed.*/
function loadData(loadType,loadId){
  var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
  //alert(dataString);
  $("#"+loadType+"_loader").show();
  $("#"+loadType+"_loader").fadeIn(400).
        html('Please wait... <img src="<?php echo $this->webroot; ?>css/images/loading.gif" />');
  $.ajax({
     type: "POST",
     url: "<?php echo $this->webroot ?>users/loadata",
     data: dataString,
     cache: false,
     success: function(result){
       $("#"+loadType+"_loader").hide();
       $("."+loadType+"_dropdown").
       html("<option value='-1'>Select "+loadType+"</option>");
       $("."+loadType+"_dropdown").append(result);
     }
   });
}
</script>


         
<style>
        .message{
                color: red;
                margin-top: 15px;
                
        }
</style>

<section class="profile_main">
          <div class="profile_content">
            <h2>Sign Up</h2>
            <div class="orng_dvdr"></div>
            <div class="signup_sec">
              <p class="come-join">Come Join and be a part of Recruit Young?s Online Community, where we hope to <span class="yellow-txt">inspire, innovate, </span>and <span class="yellow-txt">Empower Youth.</span></p>
              <div class="greyline"></div>
              <div class="already_member">Already a member?
              <?php echo $this->Html->link(__('Login Here'), array('controller' => 'users', 'action' => 'login'),
                                           array('class' => 'blue_btn loginin')); ?>
              <!--<a class="blue_btn loginin" href="">Login in here</a>-->
              <?php echo $this->Session->Flash();?>
              </div>
              <div id="pageWrap" class="pageWrap">
                <div class="pageContent">
                  <?php /*echo $this->Form->create('User');*/ ?>
                  
                  <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal','enctype' => 'multipart/form-data')); ?>
                  <!--<form id="UserSignupForm" accept-charset="utf-8" onsubmit="return checksubmit();" method="post" action="<?php echo $this->webroot; ?>users/signup">-->
                  <ul class="accordion">
                     
                    <li> <a href="#a" class="acc_nm">Candidate Details</a>
                    <div class="acc_content">
   

<div class="inpt_area">
    <label>First Name</label>
    <?php   /*echo $this->Form->input( 'can_first_name', array('label' => 'First Name') );*/ ?>
    <input type="text" name="can_fname">
</div>
<div class="inpt_area">
    <label>Last Name</label>
    <?php   /*echo $this->Form->input( 'can_last_name', array('label' => 'Last Name') );*/ ?>
    <input type="text" name="can_lname">
</div>
<div class="inpt_area">
                          <label>Date of Birth</label>
                          <div class="list-row">
                            <div class="date">
                              <select name="can_bod_date" class="select" tabindex="1">
                                <option value="">Date</option>
                                <?php for($i=1;$i<=31;$i++) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            
                            <div class="date">
                              <select name="can_bod_month" class="select" tabindex="1">
                                <option value="">Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                              </select>
                            </div>
                            
                            <div class="date">
                              <select name="can_bod_year" class="select" tabindex="1">
                                <option value="">Year</option>
                               <?php for($i=1900;$i<= 2010; $i++) { ?>
                               <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                               <?php } ?>
                              </select>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <a href="#" class="block_note">Why do I need to provide my date of birth</a>
                    
                        <div class="inpt_area">
                          <label for="l_name">Email Address</label>
                          <?php /*echo $this->Form->input('email', array('label' => 'Email Address', 'id' => 'e_add', 'name' => 'can_email') ); */?>
                          <input type="email" onkeyup="javascript:getemail_can(this.value);" name="can_email">
                        <label class="error" id="err_email_can"></label>
                        </div>
                        <!--<div class="inpt_area">
                          <label for="l_name">City</label>
                          <div class="list-row full-width">
                            <div class="date">
                              <select name="can_city" class="select" tabindex="1">
                      <option value="">Please select city</option>
                                <option value="indore">Indore</option>
                                <option value="dewas">Dewas</option>
                              </select>
                            </div>
                          </div>  
                        </div>-->
                        <div class="inpt_area">
                          <label for="slct_c">Select Country</label>
                          <?php echo $country; ?>
                        </div>
                         <div class="inpt_area">
                         <label for="l_name">Select State</label>
                <select name="can_state" class="state_dropdown" onchange="selectState(this.options[this.selectedIndex].value)">
                        <option  value="-1">Select state</option>
                </select>
<span id="state_loader">
    <img src="<?php echo $this->webroot; ?>css/images/loading.gif">
</span>
                         </div>
                         <div class="inpt_area">
                         <label for="l_name">Select City</label>
                         <select name="can_city" class="city_dropdown">
<option value="-1">Select city</option>
</select>
<span id="city_loader">
    <img src="<?php echo $this->webroot; ?>css/images/loading.gif">
</span>
                         </div>
                        
                        <div class="inpt_area">
                          <label for="u_name">User Name</label>
                         <?php   /*echo $this->Form->input( 'name', array('label' => 'User Name' , 'id' => 'u_name', 'name' => 'can_uname') );*/ ?>
                          <input id="u_name" type="text" onkeyup="javascript:getusername_can(this.value)" name="can_uname" value="" />
                          <label class="error" id="err_un_can">   </label>
                        </div>
                        <div class="inpt_area">
                          <label for="choose_pass">Choose a Password</label>
                          <?php /*echo $this->Form->input('password', array('label' => 'Choose a Password' , 'id' => 'choose_pass', 'can_name' => 'can_password'));*/ ?>
                          <input id="choose_pass" type="password" name="can_password" value="" />
                        </div>
                        <div class="inpt_area">
                          <label for="confirn_pass">Confirm Password</label>
                          <input id="confirn_pass" type="password" name="" value="" />
                        </div>
                        <div class="block_note">
                            <input type="checkbox" name="ex2_a" id="ex2_a">
                            <label for="ex2_a">I accept the <a href="#">Terms &amp; Cnditions</a> and <a href="#">Privacy Policies</a> </label>
                            <?php /*echo $this->Form->input('created_date',array('type'=>'hidden','value'=>date("Y-m-d H:i:s")));*/ ?>
                             <input type="hidden" name="created_date" value= "<?php echo date("Y-m-d H:i:s"); ?>">
                        </div>
                    </div>
                    </li>
                    <li><a href="#a" class="acc_nm">Employer Details</a>
                      <div class="acc_content">
                        <div class="inpt_area">
                          <label for="c_name">Company Name</label>
                          <input id="c_name" type="text" name="emp_company_name" value="" />
                        </div>
                        <div class="inpt_area">
                          <label for="c_name">Email Address</label>
                          <?php /*echo $this->Form->input('email', array('label' => 'Email Address', 'id' => 'e_add') );*/ ?>
                          <input type="email" onkeyup="javascript:getemail(this.value);" name="emp_email" id="e_add">
                          <label class="error" id="err_email"></label>
                        </div>
                        <div class="inpt_area">
                            <label for="c_address">Office Address</label>
                            
                          <?php /*echo $this->Form->textarea('address', array('label' => 'Office Address', 'id' => 'e_add' ,'rows' => '5', 'cols' => '5') );*/ ?>
                            <textarea cols="5" rows="5" id="e_add" name="emp_address"></textarea>   
                        </div>
                                                <div class="inpt_area">
                          <label for="slct_c">Select Country</label>
                          <?php echo $emp_country; ?>
                        </div>
                         <div class="inpt_area">
                         <label for="l_name">Select State</label>
                <select name="emp_state" class="state_dropdown" onchange="selectState(this.options[this.selectedIndex].value)">
                        <option  value="-1">Select state</option>
                </select>
<span id="state_loader">
    <img src="<?php echo $this->webroot; ?>css/images/loading.gif">
</span>
                         </div>
                         <div class="inpt_area">
                         <label for="l_name">Select City</label>
                         <select name="emp_city" class="city_dropdown">
<option value="-1">Select city</option>
</select>
<span id="city_loader">
    <img src="<?php echo $this->webroot; ?>css/images/loading.gif">
</span>
                         </div>
                        <div class="inpt_area">
                          <label for="u_name">User Name</label>
                         <?php   /*echo $this->Form->input( 'name', array('label' => 'User Name' , 'id' => 'u_name') );*/ ?>
                          <input id="u_name" type="text" onkeyup="javascript:getusername(this.value)" name="emp_name" value="" />
                          <label class="error" id="err_un">   </label>
                        </div>
                        <div class="inpt_area">
                          <label for="choose_pass">Choose a Password</label>
                          <?php /* echo $this->Form->input('password', array('label' => 'Choose a Password' , 'id' => 'choose_pass'));*/ ?>
                         <input id="choose_pass" type="password" name="emp_password" value="" />
                        </div>
                        <div class="inpt_area">
                          <label for="confirn_pass">Confirm Password</label>
                          <input id="confirn_pass" type="password" name="emp_confirm" value="" />
                        </div>
                        <div class="block_note">
                            <input type="checkbox"  name="ex2_a" id="ex2_a">
                            <label for="ex2_a">I accept the <a href="#">Terms &amp; Cnditions</a> and <a href="#">Privacy Policies</a> </label>
                            <?php /*echo $this->Form->input('created_date',array('type'=>'hidden','value'=>date("Y-m-d H:i:s")));*/ ?>
                        </div>
                        <input type="hidden" name="created_date" value= "<?php echo date("Y-m-d H:i:s"); ?>">
                      </div>  
                    </li>
        </ul>
                  <input class="blue_btn pull-right" type="submit" name="submit" value="Sign Up" />
                  </form>
        <?php /*echo $this->Form->end(__('Submit'));*/
        ?>
        <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
           
        