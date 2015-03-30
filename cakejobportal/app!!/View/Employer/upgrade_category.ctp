<?php $http = 'http'; ?>

<table class="plan_table">
       
       <tr>
        <th>Time Duration:</th>
        <td>
            <select name="plan_name" id="plan" onchange="" require="require">
            <option value="">Select Time Duration</option>
                <?php foreach($plan_data as $val) {
            
            ?>
<option value="<?php echo $val['plantable']['amount']; ?>"><?php echo  'One ' .ucfirst($val['plantable']['time_duration']) . ' &pound; ' . $val['plantable']['amount'] ; ?></option>
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
         
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="sudhanshu.s_biz@cisinlabs.com">
                <input type="hidden" name="rm" value="2">
                <input type="hidden" name="src" value="1">
                <input type="hidden" name="sra" value="1">
                    
                <input type="hidden" name="notify_url" value="<?=$http?>://<?=$_SERVER["SERVER_NAME"]?>/employer/eRecurs">
                <input type="hidden" name="return" value="<?=$http?>://<?=$_SERVER["SERVER_NAME"]?>/employer/thankyou_upgrade">
                <input type="hidden" name="cancel_return" value="<?=$http?>://<?=$_SERVER["SERVER_NAME"]?>/employer/cancelPaypal">
                
                <input type="hidden" id="item_name" name="item_name" value="">
                <input type="hidden" class="amount" name="amount" value="">
                <input type="hidden" name="currency_code" value="GBP">
               
                
                <input type="image" name="submit" border="0"
        src="<?php echo $this->webroot; ?>images/paynow.jpeg" alt="PayPal - The safer, easier way to pay online">
        </form>
         
        </div></td>
       </tr>
          
</table>


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
