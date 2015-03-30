<div class="section">
            <div class="container">

                <div class="empty-card">
                    <div class="empty-card-main clearfix">
                        <div class="empty-card-main-left">
                            <?php echo $this->Html->image('../css/images/success-pic.png');?>
                        </div> 
                        <div class="empty-card-main-right"> <h2>You're all set We've <?php if(isset($this->params->pass['0']) and $this->params->pass['0'] !=''){ echo $this->params->pass['0'];}else{ echo 'received';}?> payment for your order</h2>
                            <a href="/store" class="back-store">Back to store</a> </div>
                    </div>	
                </div>






            </div>



        </div>