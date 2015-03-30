    <section class="ads-bttm">
    <div class="container">
    <a href="#"><img src="<?php echo $this->webroot; ?>css/images/pic-add-mid.jpg" alt="" /></a>
    </div>
    </section>
   
    <section class="foot-TopMain">
    <section class="container">
    <div class="row">
    <aside class="col-sm-5">
    <h3>Get started! Upload resume in one single step</h3>
    <p>Note: Please provide a valid email id in your CV. </p>
    </aside>
    
    <aside class="col-sm-7">
    <ul class="upload-search">
                        <?php
echo $this->Form->create('Users',array('inputDefaults' => array('label' => false)
                        , 'class' => 'form form-horizontal','action' => $this->webroot.'upload_resume' ,'enctype' => 'multipart/form-data')); ?>
    <li class="Email-Add">
	<input required="required" type="email" class="email" name="email" placeholder="Email Address"/></li>
    <li class="browse">
    <div class="browse-btn">
	<input required="required" type="file" name="resume" class="file">
	<div class="browse-input">Browse</div>
    </div>
    </li>
    <li>
	<!--<a class="btn btn-upload" name="upload" href="#">Upload MY CV</a>-->
	<input type="submit" name="upload" class="btn btn-upload" value="Upload My CV">
    </li>
    </form>
    </ul>
    </aside>
    
    </div>
    </section>
    </section>