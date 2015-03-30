<div class="display-show" id='addressid_<?php echo $this->request->data['Address']['id']?>'>
    <?php echo $this->Form->create('Address', array('url'=>'/users/address_manager/'.$this->request->data['Address']['id'])); ?>
    <div class="modal-content">
        <div class="modal-body">
            <div class="row field-bott-padd">
                <div class="col-md-12">
                    <?php echo $this->Form->text('lastname', array('placeholder' => 'Surname', 'class' => "txt-field-popup", 'required' => false)); ?>
                    <?php echo $this->Form->error('lastname'); ?>
                    <?php echo $this->Form->hidden('id'); ?>
                    <?php //echo $this->Form->hidden('id'); ?>
                </div>
            </div>

            <div class="row field-bott-padd">
                <div class="col-md-12">
                    <?php echo $this->Form->text('firstname', array('placeholder' => 'Given name', 'class' => "txt-field-popup", 'required' => false)); ?>
                    <?php echo $this->Form->error('firstname'); ?>
                </div>
            </div>

            <div class="row field-bott-padd">
                <div class="col-md-6"> 
                    <?php echo $this->Form->text('state', array('placeholder' => 'State', 'class' => "txt-field-popup", 'required' => false)); ?>
                    <?php echo $this->Form->error('state'); ?>
                </div>

                <div class="col-md-6"> 
                    <?php echo $this->Form->text('city', array('placeholder' => 'Town', 'class' => "txt-field-popup", 'required' => false)); ?>
                    <?php echo $this->Form->error('city'); ?>
                </div>	
            </div>

            <div class="row field-bott-padd">
                <div class="col-md-12"> 
                    <?php echo $this->Form->text('postcode', array('placeholder' => 'Postal code', 'class' => "txt-field-popup", 'required' => false)); ?>
                    <?php echo $this->Form->error('postcode'); ?>
                </div>
            </div>

            <div class="row field-bott-padd">
                <div class="col-md-12"> 
                    Please make sure your address is accurate. It can not be changed once order is placed.
                </div>
            </div>

            <div class="row field-bott-padd">
                <div class="col-md-12">
                    <?php echo $this->Form->text('address_1', array('placeholder' => 'Address Line 1', 'class' => "txt-field-popup", 'required' => false)); ?>
                    <?php echo $this->Form->error('address_1'); ?>
                </div>
            </div>
            <div class="row field-bott-padd">
                <div class="col-md-12">
                    <?php echo $this->Form->text('address_2', array('placeholder' => 'Address Line 2', 'class' => "txt-field-popup", 'required' => false)); ?>
                    <?php echo $this->Form->error('address_2'); ?>
                </div>
            </div>

            <div class="row field-bott-padd">
                <div class="col-md-12">
                    <?php echo $this->Form->text('phone', array('placeholder' => 'Phone', 'class' => "txt-field-popup", 'required' => false)); ?>
                    <?php echo $this->Form->error('phone'); ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-close btn btn-default" onclick="fnclosepopup()" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-red" onclick='fnsubmitform("<?php echo $this->request->data['Address']['id']?>")'>Confirm</button>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<script>
        function fnclosepopup(){
            //$(".display-show-top").removeClass("display-show-top");
            $('.display-show').hide()
            $(".trans-fifty").hide();
        }
</script>