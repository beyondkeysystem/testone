<!--Main Body-->
<div class="wrapper">
	<div class="investment content">
    	<div class="title">
			<h3><?php echo ($this->lang->line('investment_tips_title')); ?></h3>
		</div>
        <div class="tips">
        	<div class="tip_left">
            	<?php echo ($this->lang->line('investment_tips_paragraph1')); ?>
            </div>
            <div class="tip_right">
            	<img src="<?php echo base_url(); ?>assets/front/images/tip1.png" alt="Image">
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="tips2">
         	<div class="tip_right2">
            	<img src="<?php echo base_url(); ?>assets/front/images/tip2.png" alt="Image">
            </div>
        	<div class="tip_left">
            	<?php echo ($this->lang->line('investment_tips_paragraph2')); ?>
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="tips">
        	<div class="tip_left">
            	<?php echo ($this->lang->line('investment_tips_paragraph3')); ?>
            </div>
            <div class="tip_right">
            	<img src="<?php echo base_url(); ?>assets/front/images/tip3.png" alt="Image">
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="title">
			<h3><?php echo ($this->lang->line('top_sales_top_listing_title')); ?></h3>
		</div>
        
        <div class="tbl_hlf">
		<?php //echo ($this->lang->line('top_sales_top_listing_table1')); ?>
        <h4 style="color:#333"><?=$this->lang->line('top_buying_property')?></h4>
                    <?php
                        // echo "<pre> and ";print_r($property_topsales); echo "</pre>" ;
                    ?>

            <table width="100%" cellpadding="0" cellspacing="0" align="center" border="0">
                <tr>
                    <th align="left"><?=$this->lang->line('search_property_name')?></th>
                    <th align="left"><?=$this->lang->line('search_price')?></th>
                </tr>
                <?php
                // echo "<pre>";print_r($property_topsales);echo "</pre>";
                    foreach($property_topsales as $row){
                        echo "<tr>";
                        echo "<td>".$row['property_name']."</td>";
                        echo "<td> MYR ".$row['property_current_price'];
                            if($row['property_current_price'] - $row['property_initial_price'] > 0 ){
                                echo '<span class="fa fa-arrow-up col-g" style="float:right"></span>';
                            }else if($row['property_current_price'] - $row['property_initial_price'] < 0 ){
                                echo '<span class="fa fa-arrow-down col-r" style="float:right"></span>';
                            }
                        echo "</td>";
                        echo "</tr>";                        
                    }
                ?>       
            </table>
        	
        </div>
        
        <div class="tbl_hlf fright">
		    <h4 style="color:#333"><?=$this->lang->line('top_earning_property')?></h4>
            <table width="100%" cellpadding="0" cellspacing="0" align="center" border="0">
                <tr>
                    <th align="left"><?=$this->lang->line('search_property_name')?></th>
                    <th align="left"><?=$this->lang->line('search_price')?></th>
                </tr>
                <?php
                    foreach($property_toplist as $row1){
                        echo "<tr>";
                        echo "<td>".$row1['property_name']."</td>";
                        echo "<td> MYR ".$row1['property_current_price'];
                            if($row1['top_sale'] > 0 ){
                                echo '<span class="fa fa-arrow-up col-g" style="float:right"></span>';
                            }else if($row1['top_sale'] < 0 ){
                                echo '<span class="fa fa-arrow-down col-r" style="float:right"></span>';
                            }
                        echo "</td>";
                        echo "</tr>";                        
                    }
                ?>       
            </table>
        	
        </div>
        
        <div class="property_graph">
        	<img src="<?php echo base_url(); ?>assets/front/images/property_graph.jpg" alt="" />
        </div>
        
    </div>
</div>
<!--/.Main Body--> 