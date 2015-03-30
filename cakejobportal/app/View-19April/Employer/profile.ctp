<?php echo $this->element('left_employer_profile_sidebar');  ?>
    <div class="main_ctnr_middle <?php if(isset($page) AND ($page == 'jobadd' OR $page=='signup') ) { echo 'main_left'; }   ?> " >
    	<section class="profile_main">
        	<h3><?php echo $this->Session->Flash();?>   </h3>
	<?php	if(isset($pro_data['company_banner']))	{ ?>
		<div class="profile_name">
				
            	<img src="<?php echo $this->webroot.'uploads/'.$pro_data['company_banner']; ?>" alt="company_banner" />
		<!--<h1 class="lh60">Company Banner</h1>-->
		
            </div>
		<?php } ?>
            <?php	if(isset($pro_data['video_thumb']))	{ ?>
            <div class="profile_media">
            	<a title="Dummy Title Video" href="<?php echo $pro_data['video_url']; ?>" class="youtube cboxElement"><img src="<?php echo $this->webroot.'uploads/'.$pro_data['video_thumb']; ?>" alt="" /></a>
                <a title="Dummy Title Video" href="<?php echo $pro_data['video_url']; ?>" class="youtube cboxElement"><img class="play_btn" src="<?php echo $this->webroot ?>css/images/play_btn.png" alt="" /></a>
            </div>
	    <?php } ?>
            
            <div class="content_tab ct_employer" id="horizontalTab">
                <ul>
                    <li><a href="javascript:void(0);" onclick="javascript:window.location.href='<?=$this->webroot?>employer/video_gallery/<?=$user_data[name]?>'"><i class="fa fa-file-text"></i>Portfolio &amp; Articles</a></li>
                    <li><a href="javascript:void(0);" onclick="javascript:window.location.href='<?=$this->webroot?>employer/chat'"><i class="fa fa-users"></i>Chat Room</a></li>
                    <li><a href="javascript:void(0);" onclick="javascript:window.location.href='<?=$this->webroot?>forum/'"><i class="fa fa-comments"></i>Forum</a></li>
                    <li><a href="javascript:void(0);" onclick="javascript:window.location.href='<?=$this->webroot?>employer/messages'"><i class="fa fa-envelope"></i>Messages</a></li>
                </ul>
                <div class="clearfix"></div>
        
                <!--div id="tab-1">
                    <p><?php if(isset($pro_data['portfolio_summary'])) { echo $pro_data['portfolio_summary']; } else { echo 'not found'; }  ?></p>
                </div>
                <div id="tab-2">
                    <p><?php if(isset($pro_data['chat_summary'])) { echo $pro_data['chat_summary']; } else { echo 'not found'; } ?></p>
                </div>
                <div id="tab-3">
                    <p><?php if(isset($pro_data['fourm_summary'])) { echo $pro_data['fourm_summary']; } else { echo 'not found'; } ?></p>
                </div>
                <div id="tab-4">
                    <p><?php if(isset($pro_data['message_summary'])) { echo $pro_data['message_summary']; } else { echo 'not found'; } ?></p>
                </div-->
        
            </div>
            
            <div class="profile_content">
            	<h2>Job Vaccancies</h2>
                <div class="orng_dvdr"></div>
		<?php if(isset($job_info)) {
				$p = 0;
				
				foreach($job_info as $job_val)
				{
				if($p < 5 )		
//pr($job_info);
				{

				?>
                <div class="profile_c" id="<?=$job_val['job_ad']['ad_id']?>">
                	<h3><?php echo $job_val['job_ad']['position_name'] ?></h3>
                    <div class="pro_inner">
                    	<div class="vaccancies">
                        	<div class="vac_head">
				<?php if(isset($login_user) AND $login_user['type'] == 'employer'){ ?>
                            	<ul>
                                	<li>
                                    	<a href="<?=$this->webroot?>employer/postadd/<?=base64_encode($job_val['job_ad']['ad_id'])?>">
                                        	<i class="fa fa-pencil-square"></i>
                                            Edit
                                        </a>
                                    </li>
					<li>
                                    	<a onclick="deljobad(<?=$job_val['job_ad']['ad_id']?>)" href="javascript:void(0);">
                                        	<i class="fa fa-trash-o"></i>
                                            Delete
                                        </a>
					<script type="text/javascript">
					    function deljobad(ad_id){
						$.ajax({
						    type:'post',
						    url:'<?php echo $this->webroot; ?>employer/deletejobad',
						    data:'ad_id='+ad_id,
						    success:function(){ 
						       $('#'+ad_id).remove();
						    }
						});
					    }
					</script>
                                    </li>
					
                                        <li>
						
                                    	<a href="#" class="postad_icon" >
                                        	<i class="fa fa-tasks"></i>
                                        </a>
						<?php echo $this->Html->link(__('Post Job'), array('controller' => 'employer', 'action' => 'postadd') , array('class' => 'postad') ); ?>
					
                                    </li>				    
                                </ul>
				<?php } ?>
                            </div>
                            <div class="vac_content">
                            	<p><?php echo $job_val['job_ad']['job_desc']; ?></p>
                            </div>
			    <?php if(isset($login_user) AND $login_user['type'] != 'employer'){ ?>
                            <a href="" class="blue_btn pull-right">Click To Apply</a>
                            <?php }
			    elseif(isset($login_user) AND $login_user['type'] == 'employer'){
			    echo '';
			    }
			    else {
			    
			 echo $this->Html->link(__('Click To Apply'), array('controller' => 'users', 'action' => 'login'),
                                           array('class' => 'blue_btn pull-right')); 
			   
			    } ?>
			    <div class="clearfix"></div>
                        </div>
                    </div>
                </div>			
				<?php }
				$p++;
				}
				?>
				<div class="profile_c">
				    <h3>
					<?php echo $this->Html->link(__('See All Jobs'), array('controller' => 'employer', 'action' => 'alljobs/'.$emp_user)); ?>
				    </h3>
				</div>
				<?php				
		}		
		else
		{
				?>
				<div class="profile_c">
						<h3>
						    NO JOB FOUND
						</h3>
				</div>
				<?php				
		}
		?>
            </div>
        </section>
	</div>	
	<?php echo $this->element('right_employer_profile_sidebar'); ?>
