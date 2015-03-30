

<div class="main_ctnr_middle main_left">
        <section class="profile_main">
            <div class="profile_content">
            <?php if(isset($user_name) AND $user_name == 'Employer') { ?>
            <h2><?php echo $user_name."'s Upgrade"  ?></h2>
            <div class="orng_dvdr"></div>
            <div class="contact-main">
                
                <div class="contact-form">
                <ul class="contact-form-field">
                    <li>
                        <span class="field-txt">1. Video chat messaging access to all members </span>
                    </li>
                    <li>
                        <span class="field-txt">2. Video Conference</span>
                    </li>
                    <li>
                        <span class="field-txt">3. One week job advertise free one in a month</span>
                    </li>
                    <li>
                        <span class="field-txt">4. Free/discount in networking events </span>
                    </li>
                    <li>
                        <span class="field-txt">5. Discount for recruitment and placement for temporary and permanent staff </span>
                    </li>
                     <li>
                            <div class="inpt_area">
                             <select name="plan_name" id="plan">
                                <option value="">Select Time Duration</option>
                                <option value="100">3 Month &pound; 100 </option>
                                <option value="180">6 Month &pound; 180 </option>
                                <option value="270">12 Month &pound; 270 </option>
                            </select>
                             <br><br>
                            </div>
<script type="text/javascript" >
    $( "#plan" ).change(function () {
    //alert('test');
    var str = "";
    $( "#plan option:selected" ).each(function() {
    str += $( this ).val() + " ";
    });
    
    $( ".amount" ).val( str );
    })
</script>
                   
                </li>
                <li>
<?php
$http = 'http';
?>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="sudhanshu.s_biz@cisinlabs.com">
            <input type="hidden" name="rm" value="2">
            <input type="hidden" name="src" value="1">
            <input type="hidden" name="sra" value="1">

            <input type="hidden" name="notify_url" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/eRecurs">
            <input type="hidden" name="return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/thankyou_plan">
            <input type="hidden" name="cancel_return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/cancelPaypal">
            
            <!--<input type="hidden" id="item_name" name="item_name" value="">-->
            <input type="hidden" class="amount" name="amount" value="">
            <input type="hidden" name="currency_code" value="GBP">
            
            
            <input type="image" name="submit" border="0"
            src="<?php echo $this->webroot; ?>images/paynow.jpeg" alt="PayPal - The safer, easier way to pay online">
            </form>
                </li>
                </ul>
                </div>

            </div>
            <?php } else { ?>
            
            
            <h2><?php echo $user_name."'s Upgrade"  ?></h2>
            <div class="orng_dvdr"></div>
            <div class="contact-main">
                
                <div class="contact-form">
                <ul class="contact-form-field">
                    <li>
                        <span>1. Career Coaching </span>
                    </li>
                    <li>
                        <span>2. Free/Discount on networking events  </span>
                    </li>
                    <li>
                        <span>3. Personal CV help & Career specific profile</span>
                    </li>
                    <li>
                        <span>4. Video chat messaging access to non upgrade members Too for video chatting  </span>
                    </li>
                    <li>
                        <span>5. Video Confrence access</span>
                    </li>
                <li>
                <table>
                    <tr>
                        <th>
<?php
$http = 'http://';
?>
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="sudhanshu.s_biz@cisinlabs.com">
                <input type="hidden" name="rm" value="2">
                <input type="hidden" name="src" value="1">
                <input type="hidden" name="sra" value="1">
                    
                <input type="hidden" name="notify_url" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>candidate/eRecurs">
                <input type="hidden" name="return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>candidate/thankyou">
                <input type="hidden" name="cancel_return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>candidate/cancelPaypal">
                
                <input type="hidden" id="item_name" name="item_name" value="">
                <input type="hidden" class="amount" name="amount" value="">
                <input type="hidden" name="currency_code" value="GBP">
               
                
                <input type="image" name="submit" border="0"
        src="<?php echo $this->webroot; ?>images/paynow.jpeg" alt="PayPal - The safer, easier way to pay online">
        </form>
                        </th>
                        <th colspan="3">
                            <select name="plan_name" id="plan"  require="require">
                                <option value="">Select Time Duration</option>
                                <option value="100">3 Month &pound; 30 </option>
                                <option value="180">6 Month &pound; 50 </option>
                                <option value="270">12 Month &pound; 80 </option>
                            </select>
                            <>
                        </th>
                    </tr>
                </table>
                </li>
                </ul>
                </div>

            </div>
            
            <?php } ?>
            </div>
            
                
        </section>
</div>
