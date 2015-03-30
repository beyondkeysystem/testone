<?php echo $this->element('left_profile_sidebar'); ?>
<div class="main_ctnr_middle <?php if(isset($page) AND ($page == 'jobadd' OR $page=='signup') ) { echo 'main_left'; }   ?> " >
<section class="profile_main">
        	<div class="profile_name">
            	<h1><?php echo $user_data['name'] ?><span><?php if(isset($pro_data['seeker_work_history_title'])) { echo $pro_data['seeker_work_history_title']; } ?></span></h1>
            </div>
  	<h3><?php echo $this->Session->Flash();?>   </h3>

 <ul class="gallery-top-menu">
   <li><a class="gallery-active" href="#"><i class="fa fa-film"></i>Videos Gallery</a></li>
   <li><a href="javascript:void(0)"><i class="fa fa-picture-o"></i>Photos Gallery</a></li>
   <li><a href="javascript:void(0)"><i class="fa fa-file-text"></i>Links / Articles</a></li>
   <li><a onclick="javascript:window.location.href='<?=$this->webroot?>forum/'" href="javascript:void(0)"><i class="fa fa-comments"></i>Forum</a></li>
   <li><a href="javascript:void(0)"><i class="fa fa-envelope"></i>Messages</a></li>
</ul>
   <div class="clearfix"></div>
            <div class="profile_content">
            	<h2>Time Line of Jobs &amp; Skills</h2>
                <div class="orng_dvdr"></div>
                <div class="profile_c">
               
   <div class="gallery-video">
    <?php if(isset($video_gallery['VideoGallery']['parent_video_image'])) {  ?>
        <a title="Dummy Title Video" href="<?php echo $video_gallery['VideoGallery']['parent_video_url']; ?>" class="youtube cboxElement gallery-pic"><img src="<?php echo $this->webroot; ?>uploads/gallery/<?php  echo $video_gallery['VideoGallery']['parent_video_image']; ?>" alt="" /></a>
        <a title="Dummy Title Video" href="<?php echo $video_gallery['VideoGallery']['parent_video_url']; ?>" class="youtube cboxElement"><img class="play_btn" src="<?php echo $this->webroot; ?>css/images/play_btn.png" alt="" /></a>
    <?php } ?>
   </div>
   
   <ul class="gallery-thumb">
      <li><a class="youtube cboxElement play-small" href="<?php echo $video_gallery['VideoGallery']['child_video_url1']; ?>"><img src="<?php echo $this->webroot; ?>css/images/play_btn_small.png" alt=""/></a><img src="<?php echo $this->webroot; ?>uploads/gallery/<?php echo $video_gallery['VideoGallery']['child_video_image1']; ?>" alt=""/><span>Presentation Class</span></li>
      <li><a class="youtube cboxElement play-small" href="<?php echo $video_gallery['VideoGallery']['child_video_url2']; ?>"><img src="<?php echo $this->webroot; ?>css/images/play_btn_small.png" alt=""/></a><img src="<?php echo $this->webroot; ?>uploads/gallery/<?php echo $video_gallery['VideoGallery']['child_video_image2']; ?>" alt=""/><span> Find a Job</span> </li>
      <li><a class="youtube cboxElement play-small"  href="<?php echo $video_gallery['VideoGallery']['child_video_url3']; ?>"><img src="<?php echo $this->webroot; ?>css/images/play_btn_small.png" alt=""/></a><img src="<?php echo $this->webroot; ?>uploads/gallery/<?php echo $video_gallery['VideoGallery']['child_video_image3']; ?>" alt=""/><span> Interview Tips</span></li>
      <li><a class="youtube cboxElement play-small"  href="<?php echo $video_gallery['VideoGallery']['child_video_url4']; ?>"><img src="<?php echo $this->webroot; ?>css/images/play_btn_small.png" alt=""/></a><img src="<?php echo $this->webroot; ?>uploads/gallery/<?php echo $video_gallery['VideoGallery']['child_video_image4']; ?>" alt=""/><span> Networking </span></li>
   </ul>
   
   
   <div class="view-comment">
      <h5>View Comments</h5>
      
       <?php if(isset($comment_record)) {
		//pr($comment_record);
		//die;
		
	foreach($comment_record as $cam_val)
	{
		//pr($cam_val);
	?>
      <div class="view-commant-main">
	      <div class="col-md-2"><img src="<?php echo $this->webroot; ?>css/images/no_photo.jpg" alt=""/></div>
	      <div class="col-md-10 pull-right view-dec">
		      <h2><?php echo $cam_val['JobComment']['comment_author']; ?></h2>
		      <div class="hours"> <?php echo date('d-m-Y',strtotime($cam_val['JobComment']['comment_date']));  ?></div>
		      <p><?php echo $cam_val['JobComment']['comment_content']; ?></p>
	      </div>
      </div>
      <?php }
      }
      ?>
      
      
      <div class="gallery-more-post">
	      <a class="like-btn" href="javascript:void(0)"><img src="<?php echo $this->webroot; ?>css/images/like.png" alt=""/></a>
	      <a class="more-post" href="javascript:void(0)">More Post <i class="fa fa-caret-right"></i></a>
      </div>
      
      <div class="view-commant-main">
	<?php echo $this->element('comment'); ?>
	</div>
      
   </div>
															
                    
                </div>
                
                
               <div class="clearfix"></div> 
            </div>
        </section>
    
    </div>
    <?php echo $this->element('right_sidebar'); ?>
