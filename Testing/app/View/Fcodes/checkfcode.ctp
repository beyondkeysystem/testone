<div class="section">
    <div class="container">
        <div class="heading clearfix">
            F-Code
        </div>
        <div class="f-code">
            <h2>What's an F-code?</h2>
            <p>An F-code lets you buy a product from us any time! Generally, we share F-codes with fans, contributers, and active members on our forums. The price of the item is still the same, but there's no waiting in line.</p>
            
            <h2 class="top-padd-two">Use F-code</h2>
            <?php echo $this->Form->create('Fcode',array());?>
            <ul class="f-code-form clearfix">
                <li>
                    <?php echo $this->Session->flash();?>
                    <label>Enter Your F-Code</label>
                    <?php 
                        echo $this->Form->text('Fcode.promotionalcode',array('class'=>"field-area-field", 'placeholder'=>"Enter Your F-Code",'required'=>false));
                        echo $this->Form->error('Fcode.promotionalcode');
                    ?>
                </li>
                <li>
                    <label>Enter CAPTCHA Code</label>
                    <div class="captcha-one">
                        <?php 
                            echo $this->Form->text('Fcode.captcha',array('placeholder'=>"Enter CAPTCHA Code ",'autocomplete'=>'off','label'=>false,'class'=>'field-area-field','required'=>false));
                            echo $this->Form->error('Fcode.captcha');
                         ?>
                    </div> 
                    <div class="captcha-pic">  
                        <?php echo $this->Html->image($this->Html->url(array('controller'=>'fcodes', 'action'=>'captcha'), true),array('vspace'=>2,'id'=>'img-captcha123'));?>
                    </div> <div class="captcha-code">
                        <a href="javascript:void(0)" id="a-reload123">View another CAPTCHA code</a>
                    </div>
                </li>
                <li>
                    <label>&nbsp;</label>
                    <input type="submit" value="Use F-Code" class="use-f-code">
                </li>
            </ul>
            <?php echo $this->Form->end();?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
    $('#a-reload123').click(function() {
	var $captcha = $("#img-captcha123");
        $captcha.attr('src', $captcha.attr('src')+'?'+Math.random());
	return false;
    });
    
});
</script>