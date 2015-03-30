<?php //echo 'sdfgsd';exit;?>
<div class="section">
            <div class="container">
                <div class="detail-page clearfix">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-page-left">
                                <div class="detail-page-pic" id="fill_image">
                                    <?php if(isset($product['Product']['image']) and $product['Product']['image'] !=''){?>
                                        <?php echo $this->Html->image('../uploads/'.$product['Product']['image'],array('style'=>'width:350px;height:350px;'));?>
                                    <?php }else{?>
                                        <?php echo $this->Html->image('../uploads/no_product_image2.png');?>
                                    <?php }?>
                                </div>
                                <ul class="detail-pic-change">
                                    <?php if(isset($product['Product']['image']) and $product['Product']['image'] !=''){?>
                                        <li><?php echo $this->Html->link($this->Html->image('../uploads/'.$product['Product']['image'],array('style'=>'width:60px;height:60px;')),'javascript:;',array('escape'=>false,'onclick'=>"fnfillimage('".$product['Product']['id']."','p')"));?></li>
                                    <?php }?>
                                    <?php if(!empty($product)){?>
                                        <?php foreach($product['ProductImage'] as $image){?>
                                            <li><?php echo $this->Html->link($this->Html->image('../uploads/'.$image['image'],array('style'=>'width:60px;height:60px;')),'javascript:;',array('escape'=>false,'onclick'=>"fnfillimage('".$image['id']."','i')"));?></li>
                                        <?php }?>
                                    <?php }?>
                                </ul>
                            </div>	
                        </div>

                        <div class="col-md-6">
                            <div class="detail-page-right">
                                <h2><?php echo $product['Product']['name']?></h2>
                                <p><?php echo $product['Product']['model']?></p>
                                <div class="detail-page-dec clearfix">
                                    <div class="detail-page-dec-left">Price:</div>
                                    <?php 
                                        $current_date = strtotime(date('Y-M-d'));

                                            $discount_price = false;

                                            if (isset($product['ProductDiscount'][0])) {

                                                foreach ($product['ProductDiscount'] as $product_discount) {
                                                    // $product_discount['date_start'];
                                                    // $product_discount['date_end'];

                                                    $start_date = strtotime($product_discount['date_start']);
                                                    $end_date = strtotime($product_discount['date_end']);
                                                    if ($current_date >= $start_date && $current_date <= $end_date) {
                                                        $discount_price = $product_discount['price'];
                                                        break;
                                                    } else {
                                                        $discount_price = false;
                                                    }
                                                }
                                            } else {
                                                $discount_price = false;
                                            }
                                            if($discount_price){
                                    ?>
                                    <div class="detail-page-dec-right">
                                        <del class="cost-price"><?=__('Original price')?><span style="text-decoration: line-through;">RM: <?php echo $product['Product']['price'];?></span></del>
                                        <div class="hari-txt">RM <?php echo $discount_price;?></div>
                                    </div>
                                    <?php
                                        }else{
                                    ?>
                                   <div class="detail-page-dec-right">
                                        <!-- <del class="cost-price">Original price：<span style="text-decoration: line-through;">RM: <?php echo $product['Product']['price'];?></span></del> -->
                                        <span class="cost-price"><?=__('Original price')?>：
                                        <div class="hari-txt">RM <?php echo $product['Product']['price'];?></div></span>
                                    </div> 
                                    <?php
                                        }
                                    ?>										
                                </div>
                                <?php if(isset($product['Product']['tag']) and $product['Product']['tag'] !=''){?>
                                <div class="detail-page-dec1 clearfix">
                                    <div class="detail-page-dec-left">Relevance:</div>
                                    <div class="detail-page-dec-right"> 
                                        <?php
                                            $exps = explode(',',$product['Product']['tag']);
                                            foreach($exps as $exp){
                                        ?>
                                            <span class="note"><?php echo $exp;?></span>
                                            <?php }?>
                                    </div>										
                                </div>
                                <?php }?>
                                <?php 
                                 $comments = $this->requestAction('/store/getcolor/'.urlencode($product['Product']['model'])); 
                                 if(count($comments)>1){       
                                 ?>
                                <div class="detail-page-dec2 clearfix">
                                    <div class="detail-page-dec-left">Color:</div>
                                    <div class="detail-page-dec-right">
                                        <ul class="pro-pic">
                                            <?php foreach($comments as $comment){?>
                                                <?php if($comment['Product']['id'] == $product['Product']['id']){?>
                                                <li class="current"><?php echo $this->Html->link($this->Html->image('../uploads/'.$comment['Product']['image'],array('style'=>'width:40px;height:40px;')),'/store/details/'.$comment['Product']['id'],array('escape'=>false));?></li>
                                                <?php }else{?>
                                                <li><?php echo $this->Html->link($this->Html->image('../uploads/'.$comment['Product']['image'],array('style'=>'width:40px;height:40px;')),'/store/details/'.$comment['Product']['id'],array('escape'=>false));?></li>
                                                <?php }?>
                                            <?php }?>
                                            
                                        </ul>
                                    </div>										
                                </div>
                                 <?php }?>
                                <div class="add-cart clearfix"> <input type="button" value="Add to cart" class="add-to-cart" onclick="fnaddtocart('<?php echo $product['Product']['id'];?>');"></div>
                            </div>	
                        </div>			
                    </div>
                </div>


                <div class="detail-page-bottom clearfix">
                    <div class="row clearfix">
                        <?php if(!empty($populars)){?>
                        <div class="col-md-3">
                            <h2>Popular Picks</h2>
                            <ul class="pro-box clearfix">
                                <?php foreach($populars as $popular){?>
                                <li>
                                    <div class="pro-pic-left">
                                        <?php if(isset($popular['Product']['image']) and $popular['Product']['image'] !=''){?>
                                            <?php 
                                            echo $this->Html->link($this->Html->image('../uploads/thumbs/'.$popular['Product']['image'],array('style'=>'width:60px;height:60px;')),'/store/details/'.$popular['Product']['id'],array('escape'=>false));
                                             }else{
                                                echo $this->Html->link($this->Html->image('../uploads/thumbs/no_product_image2.png',array('style'=>'width:60px;height:60px;')),'/store/details/'.$popular['Product']['id'],array('escape'=>false));

                                            }
                                            ?>
                                    </div>
                                    <h3><?php echo $popular['Product']['name'];?></h3>
                                    <p>	RM <?php echo $popular['Product']['price'];?></p>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                        <?php }?>
                        <div class="col-md-9 top-padd-more">

                            <div class="tab-detail">
                                <div role="tabpanel">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Product Info</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Specs</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
<!--                                            <div class="color-code clearfix">
                                                <div class="color-code-left">Colour</div>
                                                <div class="color-code-right">( Sky Blue )</div>
                                            </div>-->
                                            <?php echo $product['Product']['product_info'];?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="profile">
                                            <?php if(!empty($product['ProductAttribute'])){?>
                                            <?php foreach($product['ProductAttribute'] as $attribute){?>
                                            <div class="color-code clearfix" style="margin-bottom: 5px;">
                                                <div class="color-code-left"><?php echo $attribute['attribute_name'];?></div>
                                                <div class="color-code-right">
                                                    <?php echo $attribute['text'];?>
                                                    <?php /*if(isset($product['Product']['color']) and $product['Product']['color'] !=''){?>
                                                        (<?php echo $product['Product']['color'];?>)
                                                    <?php }*/?>
                                                </div>
                                            </div>
                                            <?php }?>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="tab-detail">
                                <div role="tabpanel">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home1" aria-controls="home" role="tab" data-toggle="tab">How to use</a></li>
                                        <li role="presentation"><a href="#profile1" aria-controls="profile" role="tab" data-toggle="tab">Service</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home1">
<!--                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                Q: What are your delivery hours?
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            A: Package will be delivered between 09:00- 18:00 on business days. There may be no deliveries available on weekend or public holidays.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingTwo">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                Q: How long before I receive my Xiaomi order?
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="panel-body">
                                                            A: Package will be delivered between 09:00- 18:00 on business days. There may be no deliveries available on weekend or public holidays.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingThree">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                Q: Do you offer free shipping?
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="panel-body">
                                                            A: Package will be delivered between 09:00- 18:00 on business days. There may be no deliveries available on weekend or public holidays.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingFour">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#headingFour" aria-expanded="false" aria-controls="headingFour">
                                                                Q: Is it necessary for me to provide Identification details when I receive the package?
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                                        <div class="panel-body">
                                                            A: Package will be delivered between 09:00- 18:00 on business days. There may be no deliveries available on weekend or public holidays.
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingFive">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#headingFive" aria-expanded="false" aria-controls="headingFive">
                                                                Q: What should I do when I receive the package?
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                                        <div class="panel-body">
                                                            A: Package will be delivered between 09:00- 18:00 on business days. There may be no deliveries available on weekend or public holidays.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>-->
                                            <?php echo $product['Product']['how_to_buy'];?>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="profile1">
                                            <?php echo $product['Product']['service'];?>
<!--                                            <div class="color-code clearfix">
                                                <div class="color-code-left">Service</div>
                                                    
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>
       function fnfillimage(id,type){
           $.ajax({
            type: "POST",
            url: "/store/fillimage",
            data: { image_id:id,type:type }
            })
            .done(function( msg ) {
                //alert( "Data Saved: " + msg );
                $('#fill_image').html(msg);
                    //alert(msg);
            });
       }
       
       
</script>