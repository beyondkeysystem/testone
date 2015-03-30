<span class="last-ad">
    <span class="last-ad-in"> <span class="volume-icon"><a href="#"><img src="images/volume-icon.png" alt="icon"></a></span> 
        <span class="heading-ad-1">Recommended promotions</span>
        <?php  $i=1; foreach($get_ad_data as $get_ad){?>
        <span class="add-img">
            <?php if(isset($get_ad->advrtise_file) and $get_ad->advrtise_file !=''){?>
                <a href="<?php echo $get_ad->target_url?>" target="_blank"><img src="/uploads/ads_files/<?php echo $get_ad->advrtise_file;?>"></a>
            <?php }else{?>
                <a href="" target="_blank"><img src="/assets/front/images/contactwithus.jpeg"></a>
            <?php }?>
            
            
            <span class="slot-item"><?php echo $i;?>-<?php echo $get_ad->add_slot_no;?></span>
        </span>
        <?php $i++; }?>
<!--                                        <span class="add-img"><a href=""><img src="/assets/front/images/add-n2.jpg"></a><span class="slot-item">2-1</span></span>
        <span class="add-img"><a href=""><img src="/assets/front/images/add-n3.jpg"></a><span class="slot-item">3-1</span></span>
        <span class="add-img"><a href=""><img src="/assets/front/images/add-n4.jpg"></a><span class="slot-item">4-1</span></span>-->

        <span class="heading-ad-2">advertisements <strong>by students</strong></span>
    </span>
</span>