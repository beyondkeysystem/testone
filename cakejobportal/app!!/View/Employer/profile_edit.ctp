<?php
foreach($emp_data as $emp_val)
{
        
}
//pr($emp_val);
?>
<section class="profile_main">
        <div class="profile_content">
            <h2>Employer Edit Profile</h2>
            <div class="orng_dvdr"></div>
            <div class="signup_sec">
                <p class="come-join" ><?php echo $this->Session->Flash();?> </p>
                <div id="pageWrap" class="pageWrap">
                    <div class="pageContent">
                        <?php echo $this->Form->create('EmployerProfile', array('inputDefaults' => array('label' => false)
                                                                                             , 'class' => 'form form-horizontal','enctype' => 'multipart/form-data')); ?>
<p class="come-join" >Company Detail</p>
 <div class="greyline"></div>
<div class="inpt_area">
    <label>Employer's Company Name</label>
    <input type="text" name="emp_company_name" value="<?php if(isset($emp_val['employer_profile']['emp_company_name'])) { echo $emp_val['employer_profile']['emp_company_name']; }?>" >
</div>
<div class="inpt_area">
    <label>Company Conatct</label>
    <input type="text" name="company_contact" value="<?php if(isset($emp_val['employer_profile']['company_contact'])) { echo $emp_val['employer_profile']['company_contact']; }?>" >
</div>
<div class="inpt_area">
    <label>Company Logo (size 189*202)</label>
    <input type="file" name="company_logo">
<?php if(isset($emp_val['employer_profile']['company_logo'])) { echo $emp_val['employer_profile']['company_logo']; }?>

</div>

<p class="come-join" >Company Banner Detail</p>
 <div class="greyline"></div>
<div class="inpt_area">
    <label>Upload Profile Banner Image (size 705*80)</label>
    <input type="file" name="company_banner">
        <?php if(isset($emp_val['employer_profile']['company_banner'])) { echo $emp_val['employer_profile']['company_banner']; }?>
</div>
<div class="inpt_area">
    <label>Upload video thumb Image (size 705*370)</label>
    <input type="file" name="video_thumb_one">
        <?php if(isset($emp_val['employer_profile']['video_thumb'])) { echo $emp_val['employer_profile']['video_thumb']; }?>
</div>
<div class="inpt_area">
    <label>Youtube Video url </label>
    <input type="text" name="video_url" value="<?php if(isset($emp_val['employer_profile']['video_url'])) { echo $emp_val['employer_profile']['video_url']; }?>">
</div>

<p class="come-join" >Summary</p>
 <div class="greyline"></div>
<div class="inpt_area">
    <label>Business Summary</label>
    <textarea rows="3" cols="4" name="business_summary">
        <?php if(isset($emp_val['employer_profile']['business_summary'])) { echo trim($emp_val['employer_profile']['business_summary']); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Portfolio Summary</label>
    <textarea rows="3" cols="4" name="portfolio_summary">
        <?php if(isset($emp_val['employer_profile']['portfolio_summary'])) { echo trim($emp_val['employer_profile']['portfolio_summary']); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Forum Summary</label>
    <textarea rows="3" cols="4" name="forum_summary">
        <?php if(isset($emp_val['employer_profile']['fourm_summary'])) { echo trim($emp_val['employer_profile']['fourm_summary']); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Chat Summary</label>
    <textarea rows="3" cols="4" name="chat_summary">
        <?php if(isset($emp_val['employer_profile']['chat_summary'])) { echo trim($emp_val['employer_profile']['chat_summary']); }?>
    </textarea>

</div>
<div class="inpt_area">
    <label>Message Summary</label>
    <textarea rows="3" cols="4" name="message_summary">
        <?php if(isset($emp_val['employer_profile']['message_summary'])) { echo trim($emp_val['employer_profile']['message_summary']); }?>
    </textarea>
<input type="hidden" name="id" value="<?php if(isset($emp_val['employer_profile']['id'])) { echo $emp_val['employer_profile']['id']; }?>">
    
</div>

 <input class="blue_btn pull-right" type="submit" name="submit" value="Submit" />
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
</section>