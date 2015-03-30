<?php $http = 'http'; ?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<table class="plan_table">
       
    <tr>
        <th>Select Plan:</th>
        <td>
            <select name="plan_name" id="planname" require="require" >
                <option value="">Select Plan</option>
                <?php foreach($plan_data as $val) {
            
            ?>
<option value="<?php echo $val['cat']['name']; ?>"><?php echo ucfirst($val['cat']['name']); ?></option>
    <?php } ?>
    </select>
        </td>
    </tr>
       <tr>
        <th>Time Duration:</th>
        <td>
            <select name="plan_name" id="plan" onchange="" require="require">
            <option value="">Select Time Duration</option>
                <?php foreach($plan_data as $val) {
            
            ?>
<option value="<?php echo $val['plan']['amount']; ?>"><?php echo ucfirst($val['plan']['time_duration']); ?></option>
    <?php } ?>
    </select>
        </td>
    </tr>
       <tr>
        <th>Amount:</th>
        <td>
            <input type="text" disabled="disabled" value="" class="amount" require="require">
        </td>
       </tr>
       <tr>
        <td colspan="2"><div class="form-group">
         
                
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="sudhanshu.s_biz@cisinlabs.com">
                <input type="hidden" name="rm" value="2">
                <input type="hidden" name="src" value="1">
                <input type="hidden" name="sra" value="1">
                    
                <input type="hidden" name="notify_url" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/eRecurs">
                <input type="hidden" name="return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/thankyou">
                <input type="hidden" name="cancel_return" value="<?=$http?>://<?php echo $_SERVER["HTTP_HOST"].$this->webroot; ?>employer/cancelPaypal">
                
                <input type="hidden" id="item_name" name="item_name" value="">
                <input type="hidden" class="amount" name="amount" value="">
                <input type="hidden" name="currency_code" value="GBP">
               
                
                <input type="submit" class="btn-paypal" name="submit" >
         
        </div></td>
       </tr>
          
</table>
</form>

<script>
$( "#plan" ).change(function () {
    //alert('test');
var str = "";
$( "#plan option:selected" ).each(function() {
str += $( this ).val() + " ";
});

$( ".amount" ).val( str );
})

$( "#planname" ).change(function () {
    //alert('test');
var str = "";
$( "#planname option:selected" ).each(function() {
str += $( this ).val() + " ";
});

$( "#item_name" ).val( str );
})


</script>
<!--<table class="plan_table">
    <tr>
        <th>Plan Name</th>
        <th>Plan Description</th>
        <th>Time Duration</th>
        <th>Amount</th>
        <th>Pay Now</th>
    </tr>
    <?php foreach($plan_data as $val) {
            
            ?>
    <tr>
        
        <td><?php echo ucfirst($val['cat']['name']); ?></td>
        <td><?php echo ucfirst($val['cat']['description']); ?></td>
        <td><?php echo $val['plan']['time_duration']; ?></td>
        <td><?php echo '&pound;'.$val['plan']['amount']; ?></td>
        <td>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="marcha_1350383256_biz@cisinlabs.com">
                <input type="hidden" name="amount" value="<?php echo $val['plan']['amount'] ?>">
                <input type="hidden" name="currency_code" value="GBP">
                <input type="hidden" name="return" value="<?php echo $this->webroot; ?>thankyou" />
                <input type="image" name="submit" border="0"
                src="<?php echo $this->webroot; ?>images/paynow.jpeg" alt="PayPal - The safer, easier way to pay online">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>-->
