<style>
			.ontop {
				z-index:1;
			        position: fixed;
				display:none;
				height:100%;
				width:100%;
				background:#000000;
				opacity: 0.9;
				top:0px;
				left:0px;
			}
			.ontop1 {
				z-index:1;
			        position: fixed;
				display:none;
				height:100%;
				width:100%;
				background:#000000;
				opacity: 0.9;
				top:0px;
				left:0px;
			}
			#popup {
				z-index:99999;
				width: 320px;
				height: 190px auto;
				position: absolute;
				background-color: #FFFFFF;
				opacity: 1 !important;
				color: #AA0000;
				/* To align popup window at the center of screen*/
				top: 50%;
				left: 50%;
				margin-top: -100px;
				margin-left: -150px;
				border: 9px solid #ccc;
			}
			#popup a {
			    color: #AA0000;
			}
			#popup table {
				width: 90%;
				height: auto;
				top: 5px;
				left: 5px;
			}
			#popup table th{
			    font-size: 15px;
			    text-align: center;
			}
			#popup table td{
			    font-size: 12px;
			    text-align: center;
			}
			#popup table input[type="submit"]{
			    font-size: 16px;
			    text-align: center;
			    width: 100px;
			    height: 40px;
			    margin-top: 30px;
			}
			#popup1 {
				z-index:99999;
				width: 300px;
				height: 190px;
				position: absolute;
				background-color: #FFFFFF;
				opacity: 1 !important;
				color: #AA0000;
				/* To align popup window at the center of screen*/
				top: 50%;
				left: 50%;
				margin-top: -100px;
				margin-left: -150px;
				border: 9px solid #ccc;
			}
			#popup1 a {
			    color: #AA0000;
			}
			#popup1 table {
				width: 90%;
				height: auto;
				top: 5px;
				left: 5px;
			}
			#popup1 table th{
			    font-size: 15px;
			    text-align: center;
			}
			#popup1 table td{
			    font-size: 12px;
			    text-align: center;
			}
			#popup1 table input[type="submit"]{
			    font-size: 16px;
			    text-align: center;
			    width: 100px;
			    height: 40px;
			    margin-top: 30px;
			}
			
		</style>
<?php if(isset($login_user['id']) AND $login_user['id'] == $user_data['id'] ) { ?>

		<script type="text/javascript">
			function pop(div) {
				document.getElementById(div).style.display = 'block';
document.getElementById('loader').style.display = 'none';
				//document.getElementById('backgroundPopup').style.display = 'block';
				
			}
			function hide(div) {
				document.getElementById(div).style.display = 'none';
			}
			//To detect escape button
			document.onkeydown = function(evt) {
				evt = evt || window.event;
				if (evt.keyCode == 27) {
					hide('popDiv');
				}
			};
		</script>
    <script type="text/javascript">
    function opentextbox() {
	//alert('test');
	$('#prephone').hide();
	$('#phone').show();
	//code
    }
    function changePhone(pho) {
	//alert(pho);
	jQuery.ajax
		({
		    url: '<?php echo $this->webroot; ?>candidate/quick_edit?type=phone&id=<?php echo $login_user['id']; ?>&pval='+pho,
		    type: 'post',
		    success: function(result)
		    {
		    }
		});
    }
    function opentextboxname() {
	//alert('test');
	$('#prename').hide();
	$('#name').show();
	//code
    }
    function changeName(pho) {
	//alert(pho);
	jQuery.ajax
		({
		    url: '<?php echo $this->webroot; ?>candidate/quick_edit?type=name&id=<?php echo $login_user['id']; ?>&pval='+pho,
		    type: 'post',
		    success: function(result)
		    {
		    }
		});
    }
     function opentextarea() {
	//alert('test');
	$('#bsummary').hide();
	$('#bsum').show();
	//code
    }
    
    function changeSummary(summary) {
	jQuery.ajax
		({
		    url: '<?php echo $this->webroot; ?>candidate/quick_edit?type=summary&id=<?php echo $login_user['id']; ?>&sval='+summary,
		    type: 'post',
		    success: function(result)
		    {

		    }
		});
	
    }
    
    
    $(document).ready(function() {

var files;
 
// Add events
$('input[type=file]').on('change', prepareUpload);
 
// Grab the files and set them to our variable
function prepareUpload(event)
{
  files = event.target.files;
//alert(files);
console.log(files);
}


	$('#proimgfrm').submit(function(event) {
document.getElementById('loader').style.display = 'block';
	var data = new FormData();
	$.each(files, function(key, value)
	{
		data.append(key, value);
	});
	//alert(data);
		
        $.ajax({
		type : 'POST',
                url  : '<?php echo $this->webroot; ?>candidate/quick_edit?type=proimage&id=<?php echo $login_user['id']; ?>&files',
                cache: false,
		data :  data,
                datatype: 'json',
		processData: false,
		contentType: false,
		success:function(rec){ 
		    console.log(rec);
		    $("#proimglogo").html(rec);
			document.getElementById('popDiv').style.display = 'none';
		}
        });
	$("#proimgfrm")[0].reset();
	event.preventDefault();
        });
    });
	
    
    
    
</script>
    <style>
	#phone input[type="text"] {
	border: 0;
	outline: 0;
	width: 77px;
	color:#7B7B7B;
	opacity: 1;
    }
    </style>
<?php  } ?>
<script type="text/javascript" src="/js/design/script.js"></script>
<div class="Sidebar-Left">

    <div class="sb_box">
    	<h2 class="pro_user"><?php echo $user_datadb['first_name']." ".$user_datadb['last_name']; ?></h2>
        <div class="orng_dvdr"></div>
        <div class="sb_profile">
	    <?php if(isset($seeker_data_set[0]['job_jobseeker']['seeker_photo']) AND $seeker_data_set[0]['job_jobseeker']['seeker_photo'] != '' ) { ?>
	    <a class="pro_img" id="proimglogo" href="javascript:void(0);" onClick="pop('popDiv')" ><img src="<?php echo $this->webroot ?>uploads/photos/<?php echo $seeker_data_set[0]['job_jobseeker']['seeker_photo']; ?>" alt="<?php echo $seeker_data_set[0]['job_jobseeker']['seeker_photo']; ?>" /></a>
	    	    <?php /*echo $pro_data['seeker_photo'];*/ } else { ?>
        	<a class="pro_img" onClick="pop('popDiv')"  href="javascript:void(0);"><img src="<?php echo $this->webroot ?>css/images/no_photo.jpg" alt="" /></a>
		<?php } ?>
		
		 <div id="popDiv" class="ontop">
		<div id="popup">
		    <div style="text-align: right;" ><a href="javascript:void(0);"  onClick="hide('popDiv')">Close</a></div>
		    <form action="" method="post" id="proimgfrm" name="proimgfrm" enctype="multipart/form-data">
			<div>
			    <h3>Update Profile Image</h3>
			    <div>
			    <h4>Please select image</h4>
			    <input type="file" name="proimg" id="proimg">
<div id="loader" style="display:none;">
Please wait... <img src="<?php echo $this->webroot; ?>css/images/loading.gif" />
</div>
			    </div>
			    <div style="clear: both"></div>

			    <div>
				<input class="blue_btn pull-right" type="submit" name="submit_proimg" value="Update">
			    </div>
			</div>
		    </form>
		
	        </div>
	    </div>
		
		
            <div class="pro_dtl">
                <div class="pro_name">
                    <i class="fa fa-user orng"></i>
<span><i id="prename" onclick="opentextboxname()"><?php if(isset($pro_data['seeker_work_history_title']) AND $pro_data['seeker_work_history_title'] != '' ) { echo $pro_data['seeker_work_history_title']; }else{ echo "Add Here Title";} ?></i>
		    <i id="name" style="display: none;" >
		    <input type="text" onkeyup="changeName(this.value)" name="name" value="<?php if(isset($pro_data['seeker_work_history_title']) AND $pro_data['seeker_work_history_title'] != '' ) { echo $pro_data['seeker_work_history_title']; } ?>">
		    </i>
		    </span>
                </div>
                <div class="pro_more">
                	<i class="fa  fa-phone"></i>
                   <!-- <span>Contact No:  <?php if(isset($seeker_data_set[0]['job_jobseeker']['seeker_mobile']) AND $seeker_data_set[0]['job_jobseeker']['seeker_mobile'] != '' )  { echo $seeker_data_set[0]['job_jobseeker']['seeker_mobile']; } ?></span>-->

		    <span>Contact No: <i  id="prephone" onclick="opentextbox()"><?php if(isset($seeker_data_set[0]['job_jobseeker']['seeker_mobile']) AND $seeker_data_set[0]['job_jobseeker']['seeker_mobile'] != '' ) { echo $seeker_data_set[0]['job_jobseeker']['seeker_mobile']; }else{ echo "Add Here Contact";} ?></i>
		    <i id="phone" style="display: none;" >
		    <input type="text" onkeyup="changePhone(this.value)" name="phone" value="<?php if(isset($seeker_data_set[0]['job_jobseeker']['seeker_mobile']) AND $seeker_data_set[0]['job_jobseeker']['seeker_mobile'] != '' )  { echo $seeker_data_set[0]['job_jobseeker']['seeker_mobile']; } ?>">
		    </i>
		    </span>
                </div>
            </div>
            <div class="pro_dtl">
                <div class="pro_name">
                    <i class="fa fa-search orng"></i><span>Job Search Details</span>
                </div>
                <div class="pro_more">
                	<ul>
                        <li>
                            <i class="fa fa-cog"></i>
                            <span>Temporary / Permanent</span>
                        </li>
                        <li>
                            <i class="fa fa-briefcase"></i>
                            <span>Type of Work:  <b>Admin</b></span>
                        </li>
                        <li>
                            <i class="fa  fa-map-marker"></i>
                            <span>Location:  <b>London</b></span>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($checklogin) AND $checklogin =='')
    {
    if($login_user['type'] == 'employer' || $login_user['type'] == 'candidate')
    {
	
    ?>
    <div class="sb_box">
	<div class="sb_profile">
	<div class="pro_dtl">
	    <div class="pro_more">
		
	    <span id="LoadingImage" style="display: none;"><img src="<?php echo $this->webroot; ?>css/images/loading.gif"></span>	        
		<span>
        	   <?php if(isset($favorite) AND $favorite == 'favorite') { ?>
		    <input type="button" id="favoriteAdded" class="blue_btn" value="Added as favorite">		    
		    <?php } else { ?>

		    <a href="javascript:void(0)" id="favorite" onclick="favorite_action(<?php echo $user_data['id']; ?>)" class="blue_btn">Favorite</a>
		    <input type="button" style="display: none;" id="favoriteAdded" class="blue_btn" value="Added as favorite">
		    <?php } ?>
		</span>
	    </div>
	</div>
	</div>
    </div>
        <script type="text/javascript">
            //$('#addFriend').click(function(){
            function favorite_action(can_id) {
		$('#favorite').hide();
		$('#LoadingImage').show();
		$.ajax
		({
		    url: '<?php echo $this->webroot; ?>employer/favorite_action?sender_id=<?php echo $login_user['id'] ?>&fav_id='+can_id,
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
		$('#LoadingImage').hide();
		$('#favoriteAdded').show();
	}
//});
        </script>
    <?php }
    } ?>
    <div class="sb_box">
    	<h2>Career Summary</h2>
        <div class="orng_dvdr"></div>
        <p><?php
		if(!empty($pro_data['career_summary'])) {
	    $subvalue=substr($pro_data['career_summary'],0,100);
	    // echo '<li>'.$pro_data['career_summary'];
	
	     ?>
	     
	     <span id="bsummary" onclick="opentextarea()" > <?php echo $subvalue.'</span>';
	     ?>
	     <span id="bsum" style="display: none;" >
	    <textarea style="outline: 0px;border: 0px;"  rows="5" cols="25" onkeyup="changeSummary(this.value)" name="bsum"><?php echo $pro_data['career_summary']; ?></textarea>
	</span>
	    
	    	</p>
	    <div id="toPopup">
	       <div class="close"></div>
	       <span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		       <div id="popup_content"> <!--your content start-->
		  <p><?php if(!empty($candidate_summary[0]['candidate_profile']['career_summary']))
		       { echo $candidate_summary[0]['candidate_profile']['career_summary']; } ?>
		   </p>
	       </div> <!--your content end-->
	   </div> <!--toPopup end-->
	   <div class="loader"></div>
	    <div id="backgroundPopup"></div>
	    
	   <?php   if(strlen($candidate_summary[0]['candidate_profile']['career_summary']) >= 100)
	        {
	           echo '<a href="#" class="read_more topopup"><i class="fa fa-caret-right"></i>Read More</a>';
	        }
	      else
	       {
	        //  echo '<a href="#" class="read_more"><i class="fa fa-caret-right"></i>Read More</a>';    
	       }
	    } ?>

	
	
        <ul class="bullet_list">
        	<li>
            	<i class="fa fa-caret-right"></i>
                <a href="#">Download &amp; View CV Online</a>
            </li>
            <li>
            	<i class="fa fa-caret-right"></i>
                <a href="#">Download &amp; View CV Online</a>
            </li>
        </ul>
    </div>
    
    <div class="sb_box">
    	<h2>My Network</h2>
        <div class="orng_dvdr"></div>
        <h4>social</h4>
        <ul class="img_list">
        <?php
	    if(isset($fav_data)) {
		$i = 1;
		foreach($fav_data as $fav_val)
		{
		    //echo '<pre>';
		    //print_r($fav_val);
		    
		    if($i < 3)
		    {
			if($current_page_id != $fav_val['b']['seeker_id'])
			{
	    ?>
        	<li>
            	<a href="#">
		   <?php if(isset($fav_val['b']['seeker_photo']) AND $fav_val['b']['seeker_photo'] !='') { ?>
		    <img style="width: 54px;" src="<?php echo $this->webroot ?>uploads/photos/<?php echo $fav_val['b']['seeker_photo']; ?>" alt="<?php echo $fav_val['b']['seeker_name']; ?>" />
		<?php } else {  ?>
		<img style="width: 54px; height: 54px;" src="<?php echo $this->webroot ?>css/images/no_photo.jpg" alt="<?php echo $fav_val['b']['seeker_name']; ?>" />
		<?php } ?>
		</a>
            </li>
		<?php
			}
		    }
		}
	    }  ?>
        </ul>
        <div class="clearfix greyline"></div>
        <h4>business</h4>
        <ul class="img_list">
            <?php
	    if(isset($business_network))
	    {
		$i = 1;
		foreach($business_network as $business_val)
		{
		    if($i < 3)
		    {
	     ?>
	    
	    <li>
            	<a href="#"><img style="width: 54px;"  src="<?php echo $this->webroot ?>uploads/<?php echo $business_val['b']['company_logo']; ?>" alt="" /></a>
            </li>
	    <?php }
	    $i++;
		}
	    }
	    //die;
	    ?>
        </ul>
	
    </div>
    
    <div class="sb_box">
    	<a href="#"><img src="<?php echo $this->webroot ?>css/images/lgs_innovations.jpg" alt="" /></a>
    </div>
    
    <div class="sb_box">
    	<a href="#"><img src="<?php echo $this->webroot ?>css/images/playaway_offers.jpg" alt="" /></a>
    </div>
    
    </div>
