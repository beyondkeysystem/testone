<?php
/* /app/View/Helper/EmployerMembershipHelper.php (using other helpers) */
App::uses('AppHelper', 'View/Helper');

class EmployerMembershipHelper extends AppHelper {
    public $helpers = array('Html');

    public function makeMembershipForm() {
    $http = 'http';

        return ' <h2>Employer Upgrade</h2>
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
    
    var str = "";
    $( "#plan option:selected" ).each(function() {
    str += $( this ).val() + " ";
    });
    
    $( ".amount" ).val( str );
    })
</script>
                   
                </li>
                <li>

            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="sudhanshu.s_biz@cisinlabs.com">
            <input type="hidden" name="rm" value="2">
            <input type="hidden" name="src" value="1">
            <input type="hidden" name="sra" value="1">

     
            
            <!--<input type="hidden" id="item_name" name="item_name" value="">-->
            <input type="hidden" class="amount" name="amount" value="">
            <input type="hidden" name="currency_code" value="GBP">
            

            </form>
                </li>
                </ul>
                </div>

            </div>';
    }
}
?>