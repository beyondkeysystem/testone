<?php //pr($imagedata);//exit;?>
<div class="weixinInfor  weixinInfor-2">
    <div class="weixinStyle" id="changeimgdyn2">
        <?php echo "<img src = '/temp/".$imagedata->image_name."' width='156' height='168'>";?>
        
    </div>

    <div class="clear"></div>
</div>

<div class="max-rgt">
    <p class="pop-row"><span class="title">Connection Address:</span> 
        <span class="inp-popup">
            <span id="idmaintitle2"><input type="text" value="<?php if($imagedata->is_thumb == '1'){ echo ''; }else { echo $imagedata->message;}?>" <?php if($imagedata->is_thumb == '1'){?> disabled <?php }?> name="fenxiangtitle" id="mainTitle2" maxlength="45" class="form-control"></span>
            <input type="hidden" name="fenxiangtitle" value="<?php echo $imagedata->id;?>" id="thmb_img_id">
        </span> 
    </p>
    <div class="clear"></div>

    <p class="pop-row"> <span class="inp-popup">
            <span class="gender-1">
                <input type="checkbox" onclick="enable_detxt();" <?php if($imagedata->is_thumb == '1'){?> checked <?php }?> class="css-checkbox" id="checkboxG611" name="checkboxG4">
                <label class="css-label" for="checkboxG611">Make Photos:</label>
            </span>
        </span> </p>
    <div class="clear"></div>
    <input type="button" id="confirm_btn" onclick="fnsubmitconnect();" value="Submit" class="btn-1">
</div>