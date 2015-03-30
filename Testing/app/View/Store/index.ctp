<div class="section">
    <div class="container">
        <?php
        /* Calling sortbar */
        echo $this->element('fe/sortbar');

        // pr($products);die;	 
        ?>
        <div class="store">
            <div class="row clearfix">

                <?php
                if(!empty($products)){
                foreach ($products as $product) {

                    $product['Product']['id'];
                    if (isset($product['Product']['image']) && $product['Product']['image'] != '') {
                        $image_path = $product['Product']['image'];
                    } else {
                        $image_path = 'no_product_image2.png';
                    }

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
                                $discount_percentage = number_format((($product['Product']['price'] - $product_discount['price']) * 100) / $product['Product']['price']);
                                break;
                            } else {
                                $discount_price = false;
                            }
                        }
                    } else {
                        $discount_price = false;
                    }

                    // $product_discount['price'];
                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="store-box">
                             <div class="store-pic">
<!--                                     <a href="detail-page.html"> 
                                        <?php //$this->Html->image('../uploads/thumbs/' . $image_path, array('alt' => $product['Product']['name'])); ?> <img src="images/pro1.png" alt=""> 
                                     </a> -->
                                     <?php echo $this->Html->link($this->Html->image('../uploads/'.$image_path,array('alt' => $product['Product']['name'],'style'=>'width:394px;height:150px;')),'/store/details/'.$product['Product']['id'],array('escape'=>false));?>
                             </div>
                            <?php
                            if (isset($discount_price) && $discount_price != false) {
                                ?>
                                <div class="store-off"> <br/><span><?= $discount_percentage ?>% <?= __('off') ?></span> </div>
                                <?php
                            } else {
                                echo '<div class="store-off"> <br/><br/> </div>';
                            }
                            ?>
                            <p><?= $product['Product']['name']; ?></p>
                            <?php
                            if (isset($discount_price) && $discount_price != false) {
                                echo '<p>RM ' . $discount_price . ' <del style="text-decoration: line-through;">RM ' . $product['Product']['price'] . '</del></p>';
                            } else {
                                echo '<p>RM ' . $product['Product']['price'] . '</p>';
                            }
                            ?>
                            <div class="add-txt"> <a href="javascript:void(0)" onclick="fnaddtocart('<?php echo $product['Product']['id'];?>');" class="add-link">+ <?= __('Add') ?></a> </div>
                        </div>
                    </div>
                    <?php
                }}else{
                ?>
                <div><?php echo __('No record found'); ?></div>
                <?php }?>

            </div>
        </div>
        <?php
        echo $this->element('fe/paging');
        ?>
    </div>

</div>