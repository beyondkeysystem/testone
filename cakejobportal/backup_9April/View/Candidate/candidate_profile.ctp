<?php echo $this->element('left_profile_sidebar'); ?>
<div class="main_ctnr_middle <?php if(isset($page) AND ($page == 'jobadd' OR $page=='signup') ) { echo 'main_left'; }   ?> " >
<section class="profile_main">
        	<div class="profile_name">
            	<h1><?php echo $user_data['name'] ?><span><?php if(isset($pro_data['seeker_work_history_title'])) { echo $pro_data['seeker_work_history_title']; } ?></span></h1>
            </div>
  	<h3><?php echo $this->Session->Flash();?>   </h3>

<?php	if(isset($pro_data['can_video_thumb']))	{ ?>
            <div class="profile_media">
            	<a title="Dummy Title Video" href="<?php if(isset($pro_data['can_video_url'])) { echo $pro_data['can_video_url']; } ?>" class="youtube cboxElement"><img src="<?php echo $this->webroot.'uploads/'.$pro_data['can_video_thumb']; ?>" alt="" /></a>
                <a title="Dummy Title Video" href="<?php if(isset($pro_data['can_video_url'])) { echo $pro_data['can_video_url']; } ?>" class="youtube cboxElement"><img class="play_btn" src="<?php echo $this->webroot ?>css/images/play_btn.png" alt="" /></a>
            </div>
            <?php } ?>
            <div class="content_tab" id="horizontalTab">
                <ul>
                    <li><a href="#tab-1"><i class="fa fa-film"></i>Videos Gallery</a></li>
                    <li><a href="#tab-2"><i class="fa fa-picture-o"></i>Photos Gallery</a></li>
                    <li><a href="#tab-3"><i class="fa fa-file-text"></i>Links / Articles</a></li>
                    <li><a href="#tab-4"><i class="fa fa-comments"></i>Forum</a></li>
                    <li><a href="#tab-5"><i class="fa fa-envelope"></i>Messages</a></li>
                </ul>
                <div class="clearfix"></div>
        
                <div id="tab-1">
                    <p><?php if(isset($pro_data['video_summary'])) { echo $pro_data['video_summary']; } else { echo $this->Html->link(__('To add videos gallery summary click here'), array('controller' => 'Candidate', 'action' => 'candidate_edit')); }  ?></p>
                </div>
                <div id="tab-2">
                    <p><?php if(isset($pro_data['photo_summary'])) { echo $pro_data['photo_summary']; } else { echo $this->Html->link(__('To add photos gallery summary click here'), array('controller' => 'Candidate', 'action' => 'candidate_edit')); }  ?></p>
                </div>
                <div id="tab-3">
                    <p><?php if(isset($pro_data['link_summary'])) { echo $pro_data['link_summary']; } else { echo $this->Html->link(__('To add Links / Articles summary click here'), array('controller' => 'Candidate', 'action' => 'candidate_edit')); }  ?></p>
                </div>
                <div id="tab-4">
                    <p><?php if(isset($pro_data['forum_summary'])) { echo $pro_data['forum_summary']; } else { echo $this->Html->link(__('TO add forum summary click here'), array('controller' => 'Candidate', 'action' => 'candidate_edit')); }  ?></p>
                </div>
                <div id="tab-5">
                    <p><?php if(isset($pro_data['message_summary'])) { echo $pro_data['message_summary']; } else { echo $this->Html->link(__('TO add message summary click here'), array('controller' => 'Candidate', 'action' => 'candidate_edit')); }  ?></p>
                </div>
        
            </div>
	    <div class="profile_content">
            <?php
	    if(isset($seeker_data_set))
	    {
	    foreach($seeker_data_set as $key=>$seeker_data_value) { ?>
            
            	<h2>Time Line of Jobs &amp; Skills</h2>
                <div class="orng_dvdr"></div>
                <div class="profile_c">
                	<h3>Background</h3>
                    <div class="pro_inner">
                    	<h4><i class="fa fa-briefcase"></i>Experience</h4>
                        <div class="clearfix greyline"></div>
                        <div class="post_nm"><?php if(isset($seeker_data_set)) { echo $seeker_data_value['job_jobseeker']['seeker_category']; }?></div>
                        <div class="comp_nm"><?php if(isset($seeker_data_set)) { echo $seeker_data_value['job_jobseeker']['seeker_company_name']; }?></div>
                        <div class="exp"><?php if(isset($seeker_data_set)) { echo $seeker_data_value['job_jobseeker']['seeker_experience']; }?></div>
                        <p><?php if(isset($seeker_data_set)) { echo $seeker_data_value['job_jobseeker']['seeker_summary'] ; }?></p>
                    </div>
                </div>
                <div class="profile_c">
                	<h3>Education</h3>
                    <div class="pro_inner">
                    	<h4><i class="fa fa-book"></i>Tertiary Qualifications</h4>
                        <div class="clearfix greyline"></div>
                        <ul class="bullet_list profile_list">
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#"><?php if(isset($seeker_data_set)) { echo $seeker_data_value['job_jobseeker']['seeker_tertiary_higherinstitution'] .'  ';?>
				<span>(<?php
				  $higher_from=explode('-',$seeker_data_value['job_jobseeker']['seeker_tertiary_higherfromdate']) ;
				  $higher_to=explode('-',$seeker_data_value['job_jobseeker']['seeker_tertiary_highertodate']) ; 
				  echo $higher_from[0] . '- ' . $higher_to[0]; }?> )
				</span></a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#"><?php if(isset($seeker_data_set)) { echo $seeker_data_value['job_jobseeker']['seeker_tertiary_secoundinstitution'] .'  ';?>
				<span>(<?php
				  $sec_from=explode('-',$seeker_data_value['job_jobseeker']['seeker_tertiary_secoundfromdate']) ;
				  $sec_to=explode('-',$seeker_data_value['job_jobseeker']['seeker_tertiary_secoundtodate']) ; 
				  echo $sec_from[0] . '- ' . $sec_to[0]; }?> )
				</span></a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#"><?php if(isset($seeker_data_set)) { echo $seeker_data_value['job_jobseeker']['seeker_tertiary_thirdinstitution'] .'  ';?>
				<span>(<?php
				  $third_from=explode('-',$seeker_data_value['job_jobseeker']['seeker_tertiary_thirdfromdate']) ;
				  $third_to=explode('-',$seeker_data_value['job_jobseeker']['seeker_tertiary_thirdtodate']) ; 
				  echo $third_from[0] . '- ' . $third_to[0]; }?> )
				</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="profile_c">
                	<h3>Skills, talent &amp; Languages</h3>
                    <div class="pro_inner">
                    	<h4><i class="fa fa-tasks"></i>Skills, talent &amp; Languages</h4>
                        <div class="clearfix greyline"></div>
                        <ul class="bullet_list profile_list list_multiple">
		          <?php if(!empty($seeker_data_value['job_jobseeker']['seeker_experience'])) { ?>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#"><?php echo $seeker_data_value['job_jobseeker']['seeker_experience'] ; ?></a>
                            </li>
		         <?php }?>
                           <!-- <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">User Experience</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">User Experience</a>
                            </li>-->
			     <?php if(!empty($seeker_data_value['job_jobseeker']['seeker_skills'])) { ?>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#"><?php  echo $seeker_data_value['job_jobseeker']['seeker_skills'] ; ?></a>
                            </li>
			    <?php } ?>
                           <!-- <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">Interaction Design</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">Interaction Design</a>
                            </li>-->
			    <?php if(!empty($seeker_data_value['job_jobseeker']['seeker_language_home'])) { ?>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#"><?php echo $seeker_data_value['job_jobseeker']['seeker_language_home'] ; ?></a>
                            </li>
			    <?php }?>
                          <!--  <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">Designs</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">Designs</a>
                            </li>-->
                        </ul>
                        
                        <div class="upload">
                        	<a href="#"><i class="fa fa-film"></i>Upload Video</a>
                            <span>|</span>
                            <a href="#"><i class="fa fa-picture-o"></i>Upload Photo</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="profile_c">
                	<h3>Hobbies, Interests,  Clubs &amp; Volunteer Work </h3>
                    <div class="pro_inner">
                    	<h4><i class="fa fa-puzzle-piece"></i>Hobbies, Interests,  Clubs &amp; Volunteer Work </h4>
                        <div class="clearfix greyline"></div>
                        <ul class="bullet_list profile_list list_multiple">
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">User Experience</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">User Experience</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">User Experience</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">Interaction Design</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">Interaction Design</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">Interaction Design</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">Designs</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">Designs</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="#">Designs</a>
                            </li>
                        </ul>
                        
                        <div class="upload">
                        	<a href="#"><i class="fa fa-film"></i>Upload Video</a>
                            <span>|</span>
                            <a href="#"><i class="fa fa-picture-o"></i>Upload Photo</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
		<?php } }?>
            </div>
        </section>
</div>
<?php echo $this->element('right_profile_sidebar'); ?>
