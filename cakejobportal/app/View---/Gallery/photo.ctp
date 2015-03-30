<section class="profile_main">
        <div class="profile_content">
            <h2>Add/Edit Photo Gallery</h2>
            <div class="orng_dvdr"></div>
            <div class="signup_sec">
                <p class="come-join" ><?php echo $this->Session->Flash();?> </p>
                <div id="pageWrap" class="pageWrap">
                    <div class="pageContent">
                        <?php
echo $this->Form->create('PhotoGallery', array('inputDefaults' => array('label' => false)
                        , 'class' => 'form form-horizontal','enctype' => 'multipart/form-data')); ?>
<div class="inpt_area">
    <label>Upload Gallery photo thumb Image (size 705*450)</label>
    <input type="file" name="parent_video_image">
        <?php if(isset($gallery_val['photo_gallery']['parent_video_image'])) { echo $gallery_val['photo_gallery']['parent_video_image']; }?>
</div>
<div class="inpt_area">
    <label>Gallery Photo Overlay Image (size 705*450)</label>
    <input type="text" name="parent_video_url" value="<?php if(isset($gallery_val['photo_gallery']['parent_video_url'])) { echo $gallery_val['photo_gallery']['parent_video_url']; }?>">
</div>

<div class="inpt_area">
    <label>Upload Presentation Class Photo Image (size 166*174)</label>
    <input type="file" name="child_video_image1">
        <?php if(isset($gallery_val['photo_gallery']['child_video_image1'])) { echo $gallery_val['photo_gallery']['child_video_image1']; }?>
</div>
<div class="inpt_area">
    <label>Presentation Class Photo Overlay Image (size 705*450)</label>
    <input type="text" name="child_video_url1" value="<?php if(isset($gallery_val['photo_gallery']['child_video_url1'])) { echo $gallery_val['photo_gallery']['child_video_url1']; }?>">
</div>


<div class="inpt_area">
    <label>Upload Find Job Photo Image (size 166*174)</label>
    <input type="file" name="child_video_image2">
        <?php if(isset($gallery_val['photo_gallery']['child_video_image2'])) { echo $gallery_val['photo_gallery']['child_video_image2']; }?>
</div>
<div class="inpt_area">
    <label>Find Job Photo Overlay Image (size 705*450)</label>
    <input type="text" name="child_video_url2" value="<?php if(isset($gallery_val['photo_gallery']['child_video_url2'])) { echo $gallery_val['photo_gallery']['child_video_url2']; }?>">
</div>

<div class="inpt_area">
    <label>Upload Interview Tips Photo Image (size 166*174)</label>
    <input type="file" name="child_video_image3">
        <?php if(isset($gallery_val['photo_gallery']['child_video_image3'])) { echo $gallery_val['photo_gallery']['child_video_image3']; }?>
</div>
<div class="inpt_area">
    <label>Interview Tips Photo Overlay Image (size 705*450)</label>
    <input type="text" name="child_video_url3" value="<?php if(isset($gallery_val['photo_gallery']['child_video_url3'])) { echo $gallery_val['photo_gallery']['child_video_url3']; }?>">
</div>


<div class="inpt_area">
    <label>Upload Networking video Image (size 166*174)</label>
    <input type="file" name="child_video_image4">
        <?php if(isset($gallery_val['photo_gallery']['child_video_image4'])) { echo $gallery_val['photo_gallery']['child_video_image4']; }?>
</div>
<div class="inpt_area">
    <label>Networking Photo Overlay Image (size 705*450)</label>
    <input type="text" name="child_video_url4" value="<?php if(isset($gallery_val['photo_gallery']['child_video_url4'])) { echo $gallery_val['photo_gallery']['child_video_url4']; }?>">
<input type="hidden" name="id" value="<?php if(isset($gallery_val['photo_gallery']['id'])) { echo $gallery_val['photo_gallery']['id']; }?>">
</div>

 <input class="blue_btn pull-right" type="submit" name="submit" value="Submit" />
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
</section>