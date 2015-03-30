
<h2>Account verification <a class="close-arrow" href="javascript:void(0)" > <i class="fa fa-close"></i> </a> </h2> 
<div class="number-phone">
    Enter verification code
</div>
    <div class="field-area clearfix">
        <div class="main-row clearfix">
            <?php echo $this->Form->text('Emailmodel.2steplogin', array('class' => "field-area-left", 'placeholder' => "Code", 'required' => false)) ?>
        </div>
        <div id="Error_EmailmodelEmailVal"></div>
    </div>
    <div class="submit-row">
        <input type="button" onclick="return fnadd2steplogin();" value="Submit" name="phone" class="subnit-btn">
    </div>