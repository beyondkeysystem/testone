<style>
 div.view{border-left:none !important;margin-top:-18% !important;}
</style>
<div style="padding:0%;float:none !important;margin-left:3%;"class=" view users index">
    <?php echo $this->Form->create('icodes', array('action' => 'add_report')); ?>
    <fieldset>
        <legend><?php echo __('Enter 16 digits iCode string'); ?></legend>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->Form->input('icode', array('type' => 'text', 'id' => 'icode', 'placeholder' => '16 digits iCode string...', 'div' => false, 'label' => false, 'maxlength' => 16, 'minlength' => 16)) . "<br />"; ?>
        <?php echo $this->Form->input('patient_id', array('type' => 'hidden', 'id' => 'pid', 'value' => $user['id'])); ?>
        <span id="msg"><br /><br /></span>
        <legend><?php echo __('Enter 8 digits serial number'); ?></legend>
        <?php echo $this->Form->input('serial_no', array('type' => 'text', 'id' => 'serial_no', 'placeholder' => '8 digits serial number...', 'div' => false, 'label' => false, 'maxlength' => 8, 'minlength' => 8)) . "<br />"; ?>
        <span id="msg8"><br /></span>
        <div class="submit" style="display:inline;">
            <div>   

                <?php echo $this->Form->button('Add Report', array('onClick' => 'return emp();', 'id' => 'add_report', 'type' => 'button')); ?>
            </div>

        </div>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function(){
  
        $("#icode").keyup(function(){
     
            $("#icode").css("background-color","pink");
            if($("#icode").val().length == 16)
            {
                var icode = $("#icode").val();
                $.ajax({       
                    type: 'POST',
                    url: '/patients/icodeValidate',
                    data: '&icode='+icode,
                    success: function(msg){
                        obj = JSON.parse(msg);
                        //console.log(obj.serial_no);
                        $('#serial_no').val(obj.serial_no);
                    },
                    error: function(){
                        alert('Invalid string,please insert currect string');
                    }
                });
            }
            else{
                $('#serial_no').val('');
            }
        });
    });
    function emp()
    {
        if($("#icode").val().length!=16)
        {
            $.colorbox({html:'Please enter 16 digits iCode string', height:'250',width:'400',overlayClose:false,escKey:true,fixed:true}); 
            //alert("Please enter 16 digits iCode string");
            $("#icode").focus();
            return false;
        }
        else if($("#serial_no").val().length!=8)
        {
            $.colorbox({html:'Please enter 8 digits serial number', height:'250',width:'400',overlayClose:false,escKey:true,fixed:true});
            //alert("Please enter 8 digits serial number");
            $("#serial_no").focus();
            return false;
        }
      
        else
        {
            send_data(); 
        }
    }


   
            
</script>