    <div class="main_ctnr_middle <?php if(isset($page) AND ($page == 'jobadd' OR $page=='signup') ) { echo 'main_left'; }   ?> " >
    	<section class="profile_main">
        <div class="profile_content">
            	<h2>All Members</h2>
                <div class="orng_dvdr"></div>
		<?php if(isset($user_info)) {
				$p = 0;
				
				foreach($user_info as $user_val)
				{
			
//pr($user_val);
				?>
                <div class="profile_c">
                    <div class="pro_inner">
                    	<div class="vaccancies">
                            <h2><?php echo ucfirst($user_val['User']['name']); ?></h2>
                            <!--<div class="vac_content">
                            	
                            </div>-->
                            <span id="LoadingImage-<?php echo $user_val['User']['id']; ?>" style="display: none;"><img src="<?php echo $this->webroot; ?>css/images/loading.gif"></span>
                                <a href="javascript:void(0)" id="addFriend-<?php echo $user_val['User']['id']; ?>" onclick="invite_action(<?php echo $user_val['User']['id']; ?>)" class="blue_btn pull-right">Add As Friend</a>
                                <input type="button" style="display: none;" id="Friend-<?php echo $user_val['User']['id']; ?>" class="blue_btn pull-right" value="Request Sent">
                                <input type="hidden" name="receiver_id" id="receiver" value="<?php echo $user_val['User']['id']; ?>">
			    <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
			
				<?php }
		
				?>
				<?php	if(!empty($user_info)){	?>
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
        <script type="text/javascript">
            //$('#addFriend').click(function(){
            function invite_action(rec_id) {
                
//alert('test'+rec_id);
$('#addFriend-'+rec_id).hide();
$('#LoadingImage-'+rec_id).show();

    $.ajax
    ({ 
        url: '<?php echo $this->webroot; ?>invite/invite_action?sender_id=<?php echo $login_user['id'] ?>&rec_id='+rec_id,
        type: 'post',
        success: function(result)
        {
            $('.modal-box').text(result).fadeIn(700, function() 
            {
                setTimeout(function() 
                {
                    $('.modal-box').fadeOut();
                }, 2000);
            });
        }
    });
    $('#Friend-'+rec_id).show();
    $('#LoadingImage-'+rec_id).hide();
    
            }
//});
        </script>
	
	<?php //echo $this->element('right_employer_profile_sidebar'); ?>