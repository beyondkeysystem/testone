<div class="row">
    <div class="col-sm-5 user-img">
        <div class="col-xs-4 img-wtr">
            <?php
                $profile_pic = $this->session->userdata('profile_pic');
            ?>
            <?php if(isset($profile_pic) and $profile_pic !=''){?>
                <img width="156" height="168" src="/uploads/profile/<?php echo $profile_pic?>" alt="img" class="img-box">
            <?php }else{?>
                <img width="156" height="168" src="/assets/front/images/water-img1.jpg" alt="img" class="img-box">
            <?php }?>
        </div>
        <div class="col-xs-8 txt-wtr">Users <span><?php echo $this->session->userdata('username')?></span></div>
    </div>
    <div class="col-sm-5 user-54txt">
        <div class="dropdown-sel">
        <select name="one" class="dropdown-select">
          <option value="">USER <?php echo $this->session->userdata('username')?></option>
            <option value="1">my magazine</option>
            <option value="2">my drafts</option>
            <option value="3">my favorites</option>
            <option value="4">my promotions</option>
        </select>
      </div>
<!--        <select name="" class="selectpicker pull-right select-in" tabindex="1">
            <option value="">USER <?php echo $this->session->userdata('username')?></option>
            <option value="1">my magazine</option>
            <option value="2">my drafts</option>
            <option value="3">my favorites</option>
            <option value="4">my promotions</option>

        </select>-->
    </div>
</div>
<div class="water-link">
    <ul class="water-list">
        <li><a href="/magazines/mymaganize">my magazine</a></li>
        <li><a href="/magazines/mydraft">my drafts</a></li>
        <li><a href="/magazines/favorites">my favorites</a></li>
        <li><a href="javascript:;">my promotions</a></li>
    </ul>
</div>