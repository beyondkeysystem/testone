<?php echo $this->load->view('elements/admin_css_js');?>
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
            Add Advertise
        </h2>
    </div>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validation_form();" id="add_ads_form">
    <fieldset>
            <div class="control-group">
                <label for="inputError" class="control-label">Customer name</label>
                <div class="controls">
                    <input type="text" name="customer_name" id="customer_name" placeholder="Customer Name" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Start Date</label>
                <div class="controls">
                    <input type="text" name="start_date" class="datepicker" autocomplete="off" readonly id="start_date" placeholder="Start Date" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">End Date</label>
                <div class="controls">
                    <input type="text" name="end_date" class="datepicker" autocomplete="off" readonly id="end_date" placeholder="Start Date" />
                </div>
            </div>
            <div class="control-group">
                <label for="inputError" class="control-label">Banner(467*128)</label>
                <div class="controls">
                    <input type="file" name="baner_name" id="baner_name" placeholder="Customer Name" onchange="readImageURL(this)"  />
                    <input type="hidden" id="baner_name_val" />
                    <div id="preview"></div>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Add/Schedule</button>
            </div>
        </fieldset>
    </form>
    <?php if(!empty($schedules)){?>
    <div class="page-header">
        <h2>
            Upcoming Schedule
        </h2>
    </div>
    <table width="100%" border="1">
        <tr>
            <td>Cust Name</td>
            <td>Start Date</td>
            <td>End Date</td>
            <td>Action</td>
        </tr>
        <?php foreach($schedules as $schedule){?>
          <tr>
            <td><?php echo $schedule->cust_name;?></td>
            <td><?php echo $schedule->start_date;?></td>
            <td><?php echo $schedule->end_date;?></td>
            <td><a href="/admin/advertise/schedule_del/<?php echo $schedule->id;?>/<?php echo $schedule->slot_id;?>" >Delete</a></td>
         </tr>  
        <?php }?>
    </table>
    <?php }?>
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
        }else if(document.getElementById('baner_name').value == ''){
            alert('Please select advertise banner');
            document.getElementById('baner_name').focus();
            return false;
        }else if(document.getElementById('baner_name_val').value == '1'){
            alert('Your image dimensions are incorrect: 467x128');
            document.getElementById('baner_name').focus();
            return false;
        }else{
            $.ajax({
                type: "POST",
                url: "/admin/advertise/check_ad_place",
                data: { start_date: start_date, end_date: end_date,slotval:'<?php echo $slotval;?>'}
                })
                .done(function( msg ) {
                //alert( "Data Saved: " + msg );
                if(msg=='1'){
                    alert('This slot has been booked for advertise select different dates');
                }else{
                    document.getElementById('add_ads_form').submit();
                }
            });
         return false;
        }
        return false;
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
</script>