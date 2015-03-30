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
<p class="come-join" >Parent main video Detail</p>
<div class="inpt_area">
    <label>Upload video thumb Image (size 705*450)</label>
    <input type="file" name="parent_video_image">
        <?php if(isset($gallery_val['video_gallery']['parent_video_image'])) { echo $gallery_val['video_gallery']['parent_video_image']; }?>
</div>
<div class="inpt_area">
    <label>Youtube Video url</label>
    <input type="text" name="parent_video_url" value="<?php if(isset($gallery_val['video_gallery']['parent_video_url'])) { echo $gallery_val['video_gallery']['parent_video_url']; }?>">
</div>
<p class="come-join" >Child video Detail</p>

<div class="inpt_area">
    <label>Upload first child video Image (size 166*174)</label>
    <input type="file" name="child_video_image1">
        <?php if(isset($gallery_val['video_gallery']['child_video_image1'])) { echo $gallery_val['video_gallery']['child_video_image1']; }?>
</div>
<div class="inpt_area">
    <label>First Youtube Video url </label>
    <input type="text" name="child_video_url1" value="<?php if(isset($gallery_val['video_gallery']['child_video_url1'])) { echo $gallery_val['video_gallery']['child_video_url1']; }?>">
</div>


<div class="inpt_area">
    <label>Upload second child video Image (size 166*174)</label>
    <input type="file" name="child_video_image2">
        <?php if(isset($gallery_val['video_gallery']['child_video_image2'])) { echo $gallery_val['video_gallery']['child_video_image2']; }?>
</div>
<div class="inpt_area">
    <label>Second Youtube Video url </label>
    <input type="text" name="child_video_url2" value="<?php if(isset($gallery_val['video_gallery']['child_video_url2'])) { echo $gallery_val['video_gallery']['child_video_url2']; }?>">
</div>

<div class="inpt_area">
    <label>Upload third child video Image (size 166*174)</label>
    <input type="file" name="child_video_image3">
        <?php if(isset($gallery_val['video_gallery']['child_video_image3'])) { echo $gallery_val['video_gallery']['child_video_image3']; }?>
</div>
<div class="inpt_area">
    <label>Third Youtube Video url </label>
    <input type="text" name="child_video_url3" value="<?php if(isset($gallery_val['video_gallery']['child_video_url3'])) { echo $gallery_val['video_gallery']['child_video_url3']; }?>">
</div>


<div class="inpt_area">
    <label>Upload fourth child video Image (size 166*174)</label>
    <input type="file" name="child_video_image4">
        <?php if(isset($gallery_val['video_gallery']['child_video_image4'])) { echo $gallery_val['video_gallery']['child_video_image4']; }?>
</div>
<div class="inpt_area">
    <label>Fourth Youtube Video url </label>
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