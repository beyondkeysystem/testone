<section class="profile_main">
        <div class="profile_content">
            <h2>Candidate Edit Profile</h2>
            <div class="orng_dvdr"></div>
            <div class="signup_sec">
                <p class="come-join" ><?php echo $this->Session->Flash();?> </p>
                <div id="pageWrap" class="pageWrap">
                    <div class="pageContent">
                        <?php echo $this->Form->create('CandidateProfile', array('inputDefaults' => array('label' => false)
                                   , 'class' => 'form form-horizontal','enctype' => 'multipart/form-data')); ?>
<p class="come-join" >Candidate Detail</p>
 <div class="greyline"></div>
<!--<div class="inpt_area">
    <label>Candidate's Company Name</label>
    <input type="text" name="can_company_name" value="<?php //if(isset($can_val['candidate_profile']['can_company_name'])) { echo $can_val['candidate_profile']['can_company_name']; }?>" >
</div>-->
<!--<div class="inpt_area">
    <label>Company Conatct</label>
    <input type="text" name="can_contact" value="<?php //if(isset($can_val['candidate_profile']['can_contact'])) { echo $can_val['candidate_profile']['can_contact']; }?>" >
</div>-->

<!--<div class="inpt_area">
    <label>Position</label>
    <input type="text" name="can_position" value="<?php //if(isset($can_val['candidate_profile']['can_position'])) { echo $can_val['candidate_profile']['can_position']; }?>" >
</div>-->

<!--<div class="inpt_area">
    <label>Candidate Logo (size 189*202)</label>
    <input type="file" name="can_logo">
<?php // if(isset($can_val['candidate_profile']['can_logo'])) { echo $can_val['candidate_profile']['can_logo']; }?>

</div>-->

<p class="come-join" >Company Banner Detail</p>
 <div class="greyline"></div>
<!--<div class="inpt_area">
    <label>Upload Profile Banner Image (size 705*80)</label>
    <input type="file" name="can_banner">
        <?php //if(isset($can_val['candidate_profile']['can_banner'])) { echo $can_val['candidate_profile']['can_banner']; }?>
</div>-->
<!--<div class="inpt_area">
    <label>Upload video thumb Image (size 705*370)</label>
    <input type="file" name="can_video_thumb">
        <?php if(isset($can_val['candidate_profile']['can_video_thumb'])) { echo $can_val['candidate_profile']['can_video_thumb']; }?>
</div>
<div class="inpt_area">
    <label>Youtube Video url </label>
    <input type="text" name="can_video_url" value="<?php if(isset($can_val['candidate_profile']['can_video_url'])) { echo $can_val['candidate_profile']['can_video_url']; }?>">
</div>-->

<!--<p class="come-join" >Summary</p>
 <div class="greyline"></div>
<div class="inpt_area">
    <label>Career Summary</label>
    <textarea rows="3" cols="4" name="career_summary">
        <?php if(isset($can_val['candidate_profile']['career_summary'])) { echo trim($can_val['candidate_profile']['career_summary']); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Video Summary</label>
    <textarea rows="3" cols="4" name="video_summary">
        <?php if(isset($can_val['candidate_profile']['video_summary'])) { echo trim($can_val['candidate_profile']['video_summary']); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Photo Summary</label>
    <textarea rows="3" cols="4" name="photo_summary">
        <?php if(isset($can_val['candidate_profile']['photo_summary'])) { echo trim($can_val['candidate_profile']['photo_summary']); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Forum Summary</label>
    <textarea rows="3" cols="4" name="forum_summary">
        <?php if(isset($can_val['candidate_profile']['forum_summary'])) { echo trim($can_val['candidate_profile']['forum_summary']); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Link/Articles Summary</label>
    <textarea rows="3" cols="4" name="link_summary">
        <?php if(isset($can_val['candidate_profile']['link_summary'])) { echo trim($can_val['candidate_profile']['link_summary']); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Message Summary</label>
    <textarea rows="3" cols="4" name="message_summary">
        <?php if(isset($can_val['candidate_profile']['message_summary'])) { echo trim($can_val['candidate_profile']['message_summary']); }?>
    </textarea>-->
<input type="hidden" name="id" value="<?php if(isset($can_val['candidate_profile']['id'])) { echo $can_val['candidate_profile']['id']; }?>">
    
</div>

 <input class="blue_btn pull-right" type="submit" name="submit" value="Submit" />
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
</section>