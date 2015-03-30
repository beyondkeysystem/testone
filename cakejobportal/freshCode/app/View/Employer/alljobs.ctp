        <?php echo $this->element('left_employer_profile_sidebar');  ?>
    <div class="main_ctnr_middle <?php if(isset($page) AND ($page == 'jobadd' OR $page=='signup') ) { echo 'main_left'; }   ?> " >
    	<section class="profile_main">
        <div class="profile_content">
            	<h2>All Job Vaccancies</h2>
                <div class="orng_dvdr"></div>
		<?php if(isset($job_info)) {
				$p = 0;
				
				foreach($job_info as $job_val)
				{
			
//pr($job_val);
				?>
                <div class="profile_c">
                	<h3><?php echo $job_val['JobAd']['position_name'] ?></h3>
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
                            	<p><?php echo $job_val['JobAd']['job_desc']; ?></p>
                            </div>
			    <?php if(isset($login_user) AND $login_user['type'] == 'candidate'){ 
				echo $this->Html->link(__('Click To Apply'), array('controller' => 'users', 'action' => 'login'),
                                           array('class' => 'blue_btn pull-right'));
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
			<div class="white-box">
				<div class="pagination">
					<ul>
					<?php
						echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
						echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
						echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					?>
					</ul>
				</div><!-- .pagination -->
	  		 </div> 
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
	<script>
	    function getpopup(chat_with, id){
		//chat_with=NDYx&id=702
		$.ajax({
		    type: "POST",
		    url: "<?php echo $this->webroot; ?>im/my_chat_room",
		    data: {id:id,chat_with:chat_with},
		    success:function(data){
				    console.log(data);
				    $("#pops").append(data);
		    }
		});
	    }		
	</script>
	
	<div id="pops"></div>
	<?php echo $this->element('right_employer_profile_sidebar'); ?>
