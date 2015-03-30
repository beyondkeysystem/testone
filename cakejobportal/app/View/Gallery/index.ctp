<section class="profile_main">
        <div class="profile_content">
            <h2>Add/Edit Video Gallery</h2>
            <div class="orng_dvdr"></div>
            <div class="signup_sec">
                <p class="come-join" ><?php echo $this->Session->Flash();?> </p>
                <div id="pageWrap" class="pageWrap">
                    <div class="pageContent">
                        <?php
echo $this->Form->create('VideoGallery', array('inputDefaults' => array('label' => false)
                        , 'class' => 'form form-horizontal','enctype' => 'multipart/form-data')); ?>
<div class="inpt_area">
    <label>Upload Gallery video thumb Image (size 705*450)</label>
    <input type="file" name="parent_video_image">
        <?php if(isset($gallery_val['video_gallery']['parent_video_image'])) { echo $gallery_val['video_gallery']['parent_video_image']; }?>
</div>
<div class="inpt_area">
    <label>Gallery Title</label>
    <input type="text" name="parent_title" value="<?php if(isset($gallery_val['video_gallery']['parent_title'])) { echo $gallery_val['video_gallery']['parent_title']; }?>" >
</div>
<div class="inpt_area">
    <label>Gallery Youtube Video url</label>
    <input type="text" name="parent_video_url" value="<?php if(isset($gallery_val['video_gallery']['parent_video_url'])) { echo $gallery_val['video_gallery']['parent_video_url']; }?>">
</div>

<div class="inpt_area">
    <label>Upload Presentation Class video Image (size 166*174)</label>
    <input type="file" name="child_video_image1">
        <?php if(isset($gallery_val['video_gallery']['child_video_image1'])) { echo $gallery_val['video_gallery']['child_video_image1']; }?>
</div>
<div class="inpt_area">
    <label>Gallery Child Title One</label>
    <input type="text" name="child_title_one" value="<?php if(isset($gallery_val['video_gallery']['child_title_one'])) { echo $gallery_val['video_gallery']['child_title_one']; }?>" >     
</div>
<div class="inpt_area">
    <label>Presentation Class Youtube Video url </label>
    <input type="text" name="child_video_url1" value="<?php if(isset($gallery_val['video_gallery']['child_video_url1'])) { echo $gallery_val['video_gallery']['child_video_url1']; }?>">
</div>


<div class="inpt_area">
    <label>Upload Find Job video Image (size 166*174)</label>
    <input type="file" name="child_video_image2">
        <?php if(isset($gallery_val['video_gallery']['child_video_image2'])) { echo $gallery_val['video_gallery']['child_video_image2']; }?>
</div>
<div class="inpt_area">
    <label>Gallery Child Title Two </label>
    <input type="text" name="child_title_two" value="<?php if(isset($gallery_val['video_gallery']['child_title_two'])) { echo $gallery_val['video_gallery']['child_title_two']; }?>" >     
</div>
<div class="inpt_area">
    <label>Find Job Youtube Video url </label>
    <input type="text" name="child_video_url2" value="<?php if(isset($gallery_val['video_gallery']['child_video_url2'])) { echo $gallery_val['video_gallery']['child_video_url2']; }?>">
</div>

<div class="inpt_area">
    <label>Upload Interview Tips video Image (size 166*174)</label>
    <input type="file" name="child_video_image3">
        <?php if(isset($gallery_val['video_gallery']['child_video_image3'])) { echo $gallery_val['video_gallery']['child_video_image3']; }?>
</div>
<div class="inpt_area">
    <label>Gallery Child Title Three </label>
    <input type="text" name="child_title_three" value="<?php if(isset($gallery_val['video_gallery']['child_title_three'])) { echo $gallery_val['video_gallery']['child_title_three']; }?>" >     
</div>
<div class="inpt_area">
    <label>Interview Tips Youtube Video url </label>
    <input type="text" name="child_video_url3" value="<?php if(isset($gallery_val['video_gallery']['child_video_url3'])) { echo $gallery_val['video_gallery']['child_video_url3']; }?>">
</div>


<div class="inpt_area">
    <label>Upload Networking video Image (size 166*174)</label>
    <input type="file" name="child_video_image4">
        <?php if(isset($gallery_val['video_gallery']['child_video_image4'])) { echo $gallery_val['video_gallery']['child_video_image4']; }?>
</div>
<div class="inpt_area">
    <label>Gallery Child Title Four </label>
    <input type="text" name="child_title_four" value="<?php if(isset($gallery_val['video_gallery']['child_title_four'])) { echo $gallery_val['video_gallery']['child_title_four']; }?>" >     
</div>
<div class="inpt_area">
    <label>Networking Youtube Video url </label>
    <input type="text" name="child_video_url4" value="<?php if(isset($gallery_val['video_gallery']['child_video_url4'])) { echo $gallery_val['video_gallery']['child_video_url4']; }?>">
<input type="hidden" name="id" value="<?php if(isset($gallery_val['video_gallery']['id'])) { echo $gallery_val['video_gallery']['id']; }?>">
</div>

 <input class="blue_btn pull-right" type="submit" name="submit" value="Submit" />
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
</section>
