        <?php //echo $this->element('left_employer_profile_sidebar');  ?>
    <div class="main_ctnr_middle <?php if(isset($page) AND ($page == 'jobadd' OR $page=='signup') ) { echo 'main_left'; }   ?> " >
    	<section class="profile_main">
        <div class="profile_content">
            	<h2>Candidates Listing</h2>
                <div class="orng_dvdr"></div>
		<?php if(isset($resultSeeker) && $resultSeeker!='') {
				$p = 0;
				
				foreach($resultSeeker as $job_val)
				{
			
//pr($job_val); $resultSeeker
				?>
                <div class="profile_c">
                	<h3><?php echo $job_val['seeker']['seeker_category'] ?></h3>
                    <div class="pro_inner">
                    	<div class="vaccancies">                        	
                            <div class="vac_content">
                            	<p><?php echo $job_val['seeker']['seeker_summary']; ?></p>
                            </div>
			    <?php
				echo $this->Html->link(__('Profile'), array('controller' => 'candidate', 'action' => 'candidate_profile', $job_val['user']['name']),
                                           array('class' => 'blue_btn pull-right'));
                             
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