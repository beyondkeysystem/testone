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
				z-index:99999;
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
				width: 300px;
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
				z-index:99999;
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
		<?php
		    if(isset($login_user['id']) AND $login_user['id'] == $user_data['id'] ) { ?>
		    
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
function opentextboxname() {
	//alert('test');
	$('#prename').hide();
	$('#name').show();
	//code
    }
    function changePhone(pho) {
	//alert(pho);
	jQuery.ajax
		({
		    url: '<?php echo $this->webroot; ?>employer/quick_edit?type=phone&id=<?php echo $login_user['id']; ?>&pval='+pho,
		    type: 'post',
		    success: function(result)
		    {

		    }
		});

    }
function changeName(pho) {
	//alert(pho);
	jQuery.ajax
		({
		    url: '<?php echo $this->webroot; ?>employer/quick_edit?type=name&id=<?php echo $login_user['id']; ?>&pval='+pho,
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
		    url: '<?php echo $this->webroot; ?>employer/quick_edit?type=summary&id=<?php echo $login_user['id']; ?>&sval='+summary,
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


	$('#logo').submit(function(event) {
document.getElementById('loader').style.display = 'block';
	var data = new FormData();
	$.each(files, function(key, value)
	{
		data.append(key, value);
	});
	//alert(data);
		
        $.ajax({
		type : 'POST',
                url  : '<?php echo $this->webroot; ?>employer/quick_edit?type=proimage&id=<?php echo $login_user['id']; ?>&files',
                cache: false,
		data :  data,
                datatype: 'json',
		processData: false,
		contentType: false,
		success:function(rec){ 
		    console.log(rec);
		    $("#imglogo").html(rec);
document.getElementById('popDiv').style.display = 'none';
		}
        });
	$("#logo")[0].reset();
	event.preventDefault();
        });
	
	$('#bannerfrm').submit(function(event) {
document.getElementById('loader1').style.display = 'block';
	var data = new FormData();
	$.each(files, function(key, value)
	{
		data.append(key, value);
	});
	//alert(data);
		
        $.ajax({
		type : 'POST',
                url  : '<?php echo $this->webroot; ?>employer/quick_edit?type=banner&id=<?php echo $login_user['id']; ?>&files',
                cache: false,
		data :  data,
                datatype: 'json',
		processData: false,
		contentType: false,
		success:function(rec){ 
		    console.log(rec);
		    $("#banner").html(rec);
document.getElementById('popDiv1').style.display = 'none';

		}
        });
	$("#bannerfrm")[0].reset();
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
<div class="Sidebar-Left">
    
    <div class="sb_box">
    	<h2 class="pro_user"><?php if(isset($emp_data['company_name'])) { echo $emp_data['company_name']; } else { echo 'Company Name'; } ?></h2>
        <div class="orng_dvdr"></div>
        <div class="sb_profile">
	    <?php if(isset($pro_data['company_logo'])) { ?>
        	<a id="imglogo" class="pro_img"  onClick="pop('popDiv')" href="javascript:void(0);">
		    <img src="<?php echo $this->webroot.'uploads/'.$pro_data['company_logo']; ?>" alt="" />
		</a>
            <?php }else{ ?>
<a id="imglogo" class="pro_img"  onClick="pop('popDiv')" href="javascript:void(0);">
		   Add logo
		</a>
<?php }?>
	    
	    <div id="popDiv" class="ontop">
		<div id="popup">
		    <div style="text-align: right;" ><a href="javascript:void(0);"  onClick="hide('popDiv')">Close</a></div>
		    <form action="" method="post" id="logo" name="logo" enctype="multipart/form-data">
			<div>
			    <h3>Update Profile Image</h3>
			    <div>
			    <h4>Please select image</h4>
			    <input type="file" name="logoimg" id="logoimg">
				<div id="loader" style="display:none;">
				Please wait... <img src="<?php echo $this->webroot; ?>css/images/loading.gif" />
				</div>
			    </div>
			    <div style="clear: both"></div>
			    <div>
				<input class="blue_btn pull-right" type="submit" name="submit_logo" value="Update">
			    </div>
			</div>
		    </form>
	        </div>
	    </div>
	    <div class="pro_dtl">
		 <?php if(isset($pro_data['emp_company_name']) && $pro_data['emp_company_name']!='') { ?>
                <div class="pro_name">
                    
		<i class="fa fa-user orng"></i>
                    <span<i id="prename" onclick="opentextboxname()"><?php echo $pro_data['emp_company_name']; ?></i>
		    <i id="name" style="display: none;" >
		    <input type="text" onkeyup="changeName(this.value)" name="name" value="<?php echo $pro_data['emp_company_name']; ?>">
		    </i>
                </div>
		<?php } ?>
		 <?php if(isset($pro_data['company_contact'])) {
		    
		    ?>
		   
                <div class="pro_more">
                	<i class="fa  fa-phone"></i>
                    <span>Contact No: <i  id="prephone" onclick="opentextbox()"><?php echo $pro_data['company_contact']; ?></i>
		    <i id="phone" style="display: none;" >
		    <input type="text" onkeyup="changePhone(this.value)" name="phone" value="<?php echo $pro_data['company_contact']; ?>">
		    </i>
		    </span>
                </div>
		<?php }else{ ?>
<div class="pro_more">
                	<i class="fa  fa-phone"></i>
                    <span>Contact No: <i  id="prephone" onclick="opentextbox()"><?php echo 'Add phone Number'; ?></i>
		    <i id="phone" style="display: none;" >
		    <input type="text" onkeyup="changePhone(this.value)" name="phone" placeholder="<?php echo $pro_data['company_contact']; ?>">
		    </i>
		    </span>
                </div>
<?php }?>
            </div>
            
        </div>
    </div>
    <?php
    if(isset($checklogin) AND $checklogin =='')
    {
    if($login_user['type'] == 'candidate' || $login_user['type'] == 'employer')
    {
    ?>
    <div class="sb_box">
	<div class="sb_profile">
	<div class="pro_dtl">
	    <div class="pro_more">
	        <span id="LoadingImage" style="display: none;"><img src="<?php echo $this->webroot; ?>css/images/loading.gif"></span>	 
		<span>
		    <?php if(isset($follow) AND $follow == 'follow') { ?>
		    <input type="button"  id="followed" class="blue_btn" value="Added in Business">
		    <?php } else { ?>
		<a href="javascript:void(0)" id="follow" onclick="follow_action(<?php echo $user_data['id']; ?>)" class="blue_btn">Follow</a>
		<input type="button" style="display: none;" id="followed" class="blue_btn" value="Added in Business">
		    <?php }?>
		</span>
	    </div>
	</div>
	</div>
    </div>
      <script type="text/javascript">
            //$('#addFriend').click(function(){
            function follow_action(emp_id) {
		  $('#follow').hide();
		    $('#LoadingImage').show();
		
		$.ajax
		({
		    url: '<?php echo $this->webroot; ?>candidate/follow_action?sender_id=<?php echo $login_user['id']; ?>&emp_id='+emp_id,
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
		 $('#followed').show();
	}
//});
        </script>
    <?php
    }
    }
    ?>
    <div class="sb_box">
    	<h2>Business Summary</h2>
        <div class="orng_dvdr"></div>
        <p>
	<?php
	if(isset($pro_data['business_summary']) && $pro_data['business_summary']!='')
	{
	if(strlen($pro_data['business_summary']) >= 100)
	{
	   ?><span id="bsummary" onclick="opentextarea()" > <?php echo substr($pro_data['business_summary'], 0 , 95).'...</span>';
	}
	else
	{
	    ?><span id="bsummary" onclick="opentextarea()" > <?php echo trim($pro_data['business_summary']).'</span>';   
	}
	}
	else { echo '<span id="bsummary" onclick="opentextarea()" >Add business Summary</span>'; }
//	pr($_SERVER);
//echo	$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//	die;
	?>
	<span id="bsum" style="display: none;" >
	    <textarea style="outline: 0px;border: 0px;"  rows="5" cols="25" onkeyup="changeSummary(this.value)" name="bsum"><?php echo $pro_data['business_summary']; ?></textarea>
	</span>
	</p>
	
    <div id="toPopup">

        <div class="close"></div>
       	<span class="ecs_tooltip">Press Esc to close <span class="arrow"></span></span>
		<div id="popup_content"> <!--your content start-->
            <p><?php if(isset($pro_data['business_summary']))
	{ echo $pro_data['business_summary']; } ?></p>
          <!--  <p align="center"><a href="#" class="livebox">Click Here Trigger</a></p>-->
        </div> <!--your content end-->

    </div> <!--toPopup end-->

	<div class="loader"></div>
   	<div id="backgroundPopup"></div>

	<?php
	if(isset($pro_data['business_summary']))
	{
	if(strlen($pro_data['business_summary']) >= 100)
	{
	    echo '<a href="#" class="read_more topopup"><i class="fa fa-caret-right"></i>Read More</a>';
	}
	else
	{
	 
	   // echo '<a href="#" class="read_more"><i class="fa fa-caret-right"></i>Read More</a>';    
	}
	}
	?> 
        
    </div>
    
    <div class="sb_box">
    	<h2>Company Network</h2>
        <div class="orng_dvdr"></div>
        <h4>Favourite Candidates</h4>
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
	    ?>
        	<li>
            	<a href="#"><img style="width: 54px;" src="<?php echo $this->webroot ?>uploads/photos/<?php echo $fav_val['b']['seeker_photo']; ?>" alt="<?php echo $fav_val['b']['seeker_photo']; ?>" /></a>
            </li>
		<?php
		    }
		}
	    }  ?>
           <!-- <li>
            	<a href="#"><img src="<?php echo $this->webroot ?>css/images/social_img_2.jpg" alt="" /></a>
            </li>
            <li>
            	<a href="#"><img src="<?php echo $this->webroot ?>css/images/social_img_3.jpg" alt="" /></a>
            </li>-->
        </ul>
        <div class="clearfix greyline"></div>
        <h4>Business Network</h4>
        <ul class="img_list">
        	 <?php
	    if(isset($business_network))
	    {
		$i = 1;
		foreach($business_network as $business_val)
		{
		    if($i < 3)
		    {
			if($current_page_id != $business_val['b']['emp_id'])
			{
	     ?>
	    
	    <li>
            	<a href="#"><img style="width: 54px;"  src="<?php echo $this->webroot ?>uploads/<?php echo $business_val['b']['company_logo']; ?>" alt="" /></a>
            </li>
	    <?php
			}
		    }
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
    	<a href="#"><img src="<?php echo $this->webroot ?>css/images/playway_offers_big.jpg" alt="" /></a>
    </div>
    
    </div>
