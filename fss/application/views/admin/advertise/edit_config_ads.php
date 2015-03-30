<?php 
//pr($ads_data);
echo $this->load->view('elements/admin_css_js');?>
<style>
    .container {
    width: 718px !important;
}
.container.top {
    margin-top: 0!important;
}
</style>
<div class="container top">
    <div class="page-header" style="height: 35px;">
        <h2 style="float: left;">
            Add Advertise
        </h2>
        <div style="float: right; font-size: 23px; background: none repeat scroll 0% 0% gainsboro; padding: 7px;">
            <a onclick="return fnemptyslot();" href="/admin/advertise/empty_slot/<?php echo $ads_data->slot_id?>_<?php echo $ads_data->id?>">Empty This slot</a>
        </div>
    </div>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validation_form();" id="edit_ads_form">
    <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Customer name</label>
                <div class="controls">
                    <input type="text" name="customer_name" value="<?php echo $ads_data->cust_name?>" id="customer_name" placeholder="Customer Name" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Start Date</label>
                <div class="controls">
                    <input type="text" name="start_date" value="<?php echo $ads_data->start_date?>" class="datepicker" autocomplete="off" readonly id="start_date" placeholder="Start Date" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">End Date</label>
                <div class="controls">
                    <input type="text" name="end_date" value="<?php echo $ads_data->end_date?>" class="datepicker" readonly autocomplete="off" id="end_date" placeholder="End Date" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Target Url</label>
                <div class="controls">
                    <input type="text" name="target_url" value="<?php if(isset($ads_data->target_url) and $ads_data->target_url !=''){echo $ads_data->target_url;}else{?>http://<?php }?>" id="target_url" placeholder="Target Url" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Banner(467*128)</label>
                <div class="controls">
                    <input type="file" name="baner_name" id="baner_name" placeholder="Customer Name" onchange="readImageURL(this)"  />
                    <input type="hidden" id="baner_name_val" />
                    <div id="preview">
                        <?php if(isset($ads_data->advrtise_file) and $ads_data->advrtise_file !=''){?>
                            <img src="/uploads/ads_files/<?php echo $ads_data->advrtise_file?>"
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </fieldset>
</form>
</div>
<script>
    jQuery(function(){
            jQuery('.datepicker').datepicker({
                dateFormat: "yy-mm-dd",
                changeYear:true, 
                changeMonth:true,
                minDate: 0,
                yearRange:"2000:<?php echo date('Y')+1?>"});

    })
    function validation_form(){
        var url = document.getElementById('target_url').value;
        var start_date = document.getElementById('start_date').value;
        var end_date = document.getElementById('end_date').value;
         if(document.getElementById('customer_name').value == ''){
            alert('Please select customer name');
            document.getElementById('customer_name').focus();
            return false;
        }else if(document.getElementById('start_date').value == ''){
            alert('Please select start date');
            document.getElementById('start_date').focus();
            return false;
        }else if(document.getElementById('end_date').value == ''){
            alert('Please select end date');
            document.getElementById('end_date').focus();
            return false;
        }else if(document.getElementById('target_url').value == ''){
            alert('Please enter target url');
            document.getElementById('target_url').focus();
            return false;
        }else if(check_url(url) == false){
            alert('In valid url');
            document.getElementById('target_url').focus();
            return false;
        }else if(document.getElementById('baner_name_val').value == '1'){
            alert('Your image dimensions are incorrect: 467x128');
            document.getElementById('baner_name').focus();
            return false;
        }
        
        //return false;
    }
    var _URL = window.URL || window.webkitURL;
    function readImageURL(input) {
        if (input.files && input.files[0]) {
            var img = new Image();
            img.onload = function () {
             if(this.width != "467" && this.height != "128"){
                  alert('Your image dimensions are incorrect: 467x128');
                  document.getElementById('baner_name_val').value = '1';                  
             }else{
                 document.getElementById('baner_name_val').value = ''; 
                $('#preview').html('');
                 var img = $('<img id="dynamic">'); //Equivalent: $(document.createElement('img'))
                    img.attr('src', this.src);
                    img.appendTo('#preview');
             }
              
            };   
            img.src = _URL.createObjectURL(input.files[0]);
        }
    }
    
    function check_url(url){
        var message;
        var myRegExp =/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i;
        var urlToValidate = url;
        if (!myRegExp.test(urlToValidate)){
            return false;
        }else{
            return true;
        }
        //alert(message);
   }
    

   function fnemptyslot(){
    var r = confirm("Are you sure you want to empty this slot");
        if (r == true) {
            
        } else {
            return false;
        }
}
</script>