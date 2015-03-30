        <?php //echo $this->element('left_employer_profile_sidebar');  ?>
    <div class="main_ctnr_middle <?php if(isset($page) AND ($page == 'jobadd' OR $page=='signup') ) { echo 'main_left'; }   ?> " >
    	<section class="profile_main">
        <div class="profile_content">
            	<h2>Job Vacancies</h2>
                <div class="orng_dvdr"></div>
		<?php if(isset($job_info)) {
				$p = 0;
				
				foreach($job_info as $job_val)
				{
			
//pr($job_val); $resultSeeker
				?>
                <div class="profile_c">
                	<h3><?php echo $job_val['job_ad']['position_name'] ?></h3>
                    <div class="pro_inner">
                    	<div class="vaccancies">
                        	<div class="vac_head">
                            	<?php if(isset($login_user) AND $login_user['type'] == 'employer'){ ?>
                                <ul>
                                	<li>
                                    	<a href="#">
                                        	<i class="fa fa-pencil-square"></i>
                                            Edit
                                        </a>
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
			    <?php  if(isset($login_user) and $login_user['type'] == 'candidate'){ //echo $login_user['type']; exit;
				if($arr[0]!=0){
					if(in_array($job_val['job_ad']['ad_id'],$arr))
						echo '<span id="applied"><a href="javascript:void(0);" class="blue_btn pull-right">Applied</a></span>';
					else{
						echo '<span id="apply-'.$job_val['job_ad']['ad_id'].'"><a href="javascript:void(0);" onclick="apply('.$login_user['id'].','.$job_val['job_ad']['ad_id'].')" class="blue_btn pull-right">Click To Apply</a></span>';
						echo '<span id="applied-'.$job_val['job_ad']['ad_id'].'" style="display:none"><a href="javascript:void(0);" class="blue_btn pull-right">Applied</a></span>';
					}
				}
				else{
					echo '<span id="apply-'.$job_val['job_ad']['ad_id'].'"><a href="javascript:void(0);" onclick="apply('.$login_user['id'].','.$job_val['job_ad']['rec_id'].','.$job_val['job_ad']['ad_id'].')" class="blue_btn pull-right">Click To Apply</a></span>';
					echo '<span id="applied-'.$job_val['job_ad']['ad_id'].'" style="display:none"><a href="javascript:void(0);" class="blue_btn pull-right">Applied</a></span>';
				}
				
				
				
				//echo $this->Html->link(__('Click To Apply'), array('class' => 'blue_btn pull-right', 'onclick' => "apply($login_user[id])"));
                             }
			      elseif(!isset($login_user)){ 
				echo $this->Html->link(__('Click To Apply'), array('controller' => 'users', 'action' => 'login'),
                                           array('class' => 'blue_btn pull-right'));
                             }
			     ?>
			    <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
			
				<?php }
		
				?>
				<?php	if(!empty($job_info)){	?>
			<!--div class="white-box">
				<div class="pagination">
					<ul>
					<?php
						echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
						echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
						echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					?>
					</ul>
				</div>
	  		 </div--> 
			<?php } ?>
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
	<script type="text/javascript">
	function apply(id, rec_id, ad_id) {
		console.log(ad_id + " Test");
		$.ajax({
		     type:'post',
		     url:'<?php echo $this->webroot; ?>jobsearch/apply',
		     data:'rec_id='+rec_id+'&ad_id='+ad_id+'&id='+id,
		     success:function(result){
			console.log(result);
			$('#apply-'+ad_id).hide();
			$('#applied-'+ad_id).show();
			//$('#fm_chat_content').html(result);
			//$('#fm_chat_content').scrollTop = $('#fm_chat_content').scrollHeight;			
		     }
		});
	}
	</script>
	
	