<div class="section">
    <div class="container">
        <div class="my-order clearfix">
            <div class="row clearfix">
                <?php echo $this->element('fe/account_left');?>
                <div class="col-md-9">
                    <h2>My address manager</h2>
                    <?php echo $this->Session->flash(); ?>
                    <div class="my-promotional">
                        <div class="my-ddress clearfix">
                            <div class="row">
                                <?php if(!empty($addresses)){?>
                                <?php foreach($addresses as $address){?>
                                <div class="col-md-5 check_uncheck" id="<?php echo $address['Address']['id']?>">
                                    <a href="javascript:void(0)" class="removecls" id="check-uncheck<?php echo $address['Address']['id']?>">
                                        <div class="my-ddress-main">
                                            <h3><?php echo $address['Address']['firstname'];?> <?php echo $address['Address']['lastname'];?> </h3>
                                            <p><?php echo $address['Address']['phone'];?></p>
                                            <p><?php echo $address['Address']['state'];?> <?php echo $address['Address']['city'];?> <?php echo $address['Address']['postcode'];?></p>
                                            <p><?php echo $address['Address']['address_1'];?></p>
                                            <p><?php echo $address['Address']['address_2'];?></p>
                                            <div class="delete-btn clearfix"> 
                                                <span href="javascript:void(0)" class="edit-delete" onclick="fnfilledit('<?php echo $address['Address']['id']?>')" >Edit</span>  
                                                <span href="/users/delete/<?php echo $address['Address']['id']?>" class="edit-delete" onclick="return fnconfirm('<?php echo $address['Address']['id']?>')" >Delete</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div id="appendtest_<?php echo $address['Address']['id']?>"></div>
                                </div>
                                <?php }?>
                                <?php }?>
                                <div class="col-md-5">
                                    <div class="display-main">
                                        <a href="javascript:void(0)" id="check-uncheck2">
                                            <div class="my-ddress-main-two">
                                                <span href="javascript:void(0)"  data-toggle="modal" data-target="#myModal"><span>
                                                        <?php echo $this->Html->image('../css/images/plus-icon.png');?>
                                                    </span>
                                                    Add New Address </span>
                                            </div>
                                        </a>
                                        <div class="display-show" id="blockdiv">
                                            <?php echo $this->Form->create('Address',array(''));?>
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12">
                                                            <?php echo $this->Form->text('lastname',array('placeholder'=>'Surname','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('lastname');?>
                                                        </div>
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12">
                                                            <?php echo $this->Form->text('firstname',array('placeholder'=>'Given name','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('firstname');?>
                                                        </div>
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-6"> 
                                                            <?php echo $this->Form->text('state',array('placeholder'=>'State','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('state');?>
                                                        </div>

                                                        <div class="col-md-6"> 
                                                            <?php echo $this->Form->text('city',array('placeholder'=>'Town','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('city');?>
                                                        </div>	
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12"> 
                                                            <?php echo $this->Form->text('postcode',array('placeholder'=>'Postal code','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('postcode');?>
                                                        </div>
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12"> 
                                                            Please make sure your address is accurate. It can not be changed once order is placed.
                                                        </div>
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12">
                                                            <?php echo $this->Form->text('address_1',array('placeholder'=>'Address Line 1','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('address_1');?>
                                                        </div>
                                                    </div>
                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12">
                                                            <?php echo $this->Form->text('address_2',array('placeholder'=>'Address Line 2','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('address_2');?>
                                                        </div>
                                                    </div>

                                                    <div class="row field-bott-padd">
                                                        <div class="col-md-12">
                                                            <?php echo $this->Form->text('phone',array('placeholder'=>'Phone','class'=>"txt-field-popup",'required'=>false));?>
                                                            <?php echo $this->Form->error('phone');?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn-close btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-red">Confirm</button>
                                                </div>
                                            </div>
                                            <?php echo $this->Form->end();?>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(!empty($this->request->data) and $this->params->pass[0] ==''){
    ?>
<script>
    $(document).ready(function(){
        $(".display-main").addClass("display-show-top");
        $(".section").addClass("show-over");
        $(".trans-fifty").show();
        
    });     
</script>
<?php }?>
<script>
    $(document).ready(function(){
         $('.check_uncheck').on('click', function () { 
             var id = $(this).attr("id");
             $(".removecls").removeClass("check-bg");
             $("#check-uncheck"+id).addClass("check-bg");
         });
    });   
    function fnfilledit(id){
        //alert(id);
         $.ajax({
            type: "POST",
            url: "/users/edit",
            data: {code:id}
        })
        .done(function( msg ) {
            $('#appendtest_'+id).html(msg);
            document.getElementById('addressid_'+id).style.display = 'block';
            $(".section").addClass("show-over");
            $(".trans-fifty").show();
        });
        
    }
    
    function fnsubmitform(id){
        
        $.ajax({
            type: "POST",
            url: "/users/edit",
            data: $('#AddressEditForm').serialize()
        })
        .done(function( msg ) {
            if(msg=='1'){
                window.location.href = '/users/address_manager';
            }
            $('#appendtest_'+id).html(msg);
            document.getElementById('addressid_'+id).style.display = 'block';
            $(".section").addClass("show-over");
            $(".trans-fifty").show();
        });
    }
    
    function fnconfirm(id){
        var r = confirm("Are you sure you want to delete?");
        if (r == true) {
            //return true
            window.location.href = '/users/delete/'+id;
        }
        return false;
    }
</script>
<?php /*
//pr($this->params->pass[0]);
if(isset($this->params->pass[0]) and $this->params->pass[0] !=''){?>
<script>
      fnfilledit('<?php echo $this->params->pass[0]?>');
</script>
<?php } */?>