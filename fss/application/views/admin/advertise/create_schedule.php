<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/jquery-ui.js"></script>
<link href="/assets/css/admin/global.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/tablesorter/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/admin/bootstrap.min.css">
<link rel="stylesheet" href="/tablesorter/css/theme.bootstrap.css">
<link rel="stylesheet" href="/assets/css/custom.css">
<link href="/assets/css/jquery-ui.css" rel="stylesheet">

<style>
    .container {
    width: 718px !important;
}
.container.top {
    margin-top: 0!important;
}
</style>
<div class="container top">
    <div class="page-header">
        <h2>
            Add Advertise Schedule
        </h2>
    </div>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validation_form();" id="edit_ads_form">
    <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Customer name</label>
                <div class="controls">
                    <input type="text" name="customer_name" value="" id="customer_name" placeholder="Customer Name" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Start Date</label>
                <div class="controls">
                    <input type="text" name="start_date" value="" class="datepicker" autocomplete="off" readonly id="start_date" placeholder="Start Date" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">End Date</label>
                <div class="controls">
                    <input type="text" name="end_date" value="" class="datepicker" readonly autocomplete="off" id="end_date" placeholder="End Date" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Target Url</label>
                <div class="controls">
                    <input type="text" name="target_url" value="http://" id="target_url" placeholder="Target Url" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Banner(467*128)</label>
                <div class="controls">
                    <input type="file" name="baner_name" id="baner_name" placeholder="Customer Name" onchange="readImageURL(this)"  />
                    <input type="hidden" id="baner_name_val" />
                    <div id="preview">
                        
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Schedule</button>
            </div>
        </fieldset>
</form>
    <div class="row">
        <div class="span12 columns">
            <?php  if(!empty($results)){?>
            <table width="48%" style="float: left; margin-right: 2%;margin-top: 2%;" border="1">
                <tr>
                    <td>Cust Name</td>
                    <td>Start Data</td>
                    <td>End Date</td>
                    <td>Action</td>
                </tr>
                <?php foreach($results as $result){?>
                <tr>
                    <td><?php echo $result->cust_name?></td>
                    <td><?php echo $result->start_date?></td>
                    <td><?php echo $result->end_date?></td>
                    <td><a href="/admin/advertise/schedule_del/<?php echo $result->id;?>" onclick="return fnconfirm();" >Delete Schedule</a></td>
                </tr>
                <?php }?>
            </table>
            <?php }?>
        </div>
    </div>
</div>
<script>
    //$(function(){
    $(document).ready(function(){
        $('.datepicker').datepicker({
                dateFormat: "yy-mm-dd",
                changeYear:true, 
                changeMonth:true,
                minDate: 0,
                yearRange:"2000:<?php echo date('Y')+1?>"});
    });
            

    //})
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
    

   function fnconfirm(){
        var txt;
        var r = confirm("Are you sure you want to delete?");
        if (r == true) {
            return true
        }
        return false;
    }
</script>