<script type="text/javascript">
animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
}
animatedcollapse.addDiv('feedback', 'optional_attribute_string')
animatedcollapse.init()
</script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<!-- new files added for new video player -->
 <!-- Chang URLs to wherever Video.js files will be hosted -->

  <!-- video.js must be in the <head> for older IEs to work. -->

<!-- new files added for new video player end -->  

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->

<script type="text/javascript">
    like_count(<?php echo $movie_id?>);
</script>

<script type="text/javascript">
    get_comment('<?=$f_m_id?>','<?=$movie_id?>');
</script>

<section style="min-height:620px">
  
	<article class="player">
		<div class="content" style="margin-top:0px;">
			<aside class="film_maker_profile">
			<?php
				if($_SESSION['user_type']=='M')
				{
			?>
					<div class="links">
						<?php

							/*$q="select tm.id, tm.unique_id,tmv.member_id from trans_member_video tmv
							inner join
							trans_member tm
							on
							tmv.member_id=tm.unique_id
							where
							tmv.id='".$movie_id."'";*/
							//$rs=mysql_query($q);
							//$rs_q=mysql_fetch_object($rs);
					
						?>
													<?php
							if($_SESSION['m_id']==$f_m_id)
							{
						?>
								<a href="javascript:" onclick="$('#fm_chat_box').toggle('slow');"><img src="<?php echo $this->webroot; ?>css/images/chat_img.png" height="19px">&nbsp;&nbsp;&nbsp;Viewers Chat</a><br>
						<?php
							}
						?>
					</div>
			<?php
				}
			?>
			</aside><!-- film maker aside ends -->
			<aside class="maker_films">
			<?php
				if($_SESSION['user_type']=='V' OR $_SESSION['user_type']=="" )
				{
				   //$fml='SELECT id,title,video_thumbnail_file,like_count FROM trans_member_video where member_id="'.$maker_id.'" order by like_count DESC limit 0, 6';
				   //$frs=mysql_query($fml);
				   pr($frs);
				   die;
				   ?>
						<h1 style="text-align: center;background-color:rgb(2, 124, 173);color:#ffffff;" >Films of <?=substr($f_name." ".$l_name,0,10)?></h1>
							<div  class="films_list">
								<ul>
								<?php
									 while($fres=mysql_fetch_array($frs))
			     						{
										$img = 'uploads/video_thumbnail/'.$fres['video_thumbnail_file'];
										if(!file_exists($img) || empty($fres['video_thumbnail_file']) )
										{
											$img = 'images/Image.jpg';
										}
								?>		<li >
										    <a href="theater.php?id=<?=base64_encode($fres['id'])?>">
											<img width="80" height="80" src="<?php echo $img;?>">
										    </a>
											<h1 style="text-align:center;padding:5px !important"><?=substr($fres['title'],0,7)?></h1>
										</li>
								<?php
									}
								?>
								</ul>
								<div class="clear"></div>
							</div>
			<?php
				}
			?>
			</aside> <!-- maker_films ends -->
			<!-- movie_description ends -->
	<!-- article ends here -->
    
</section>
<?php
if(isset($_SESSION['m_id']) && $_SESSION['m_id']!=$f_m_id)
{
	?>
	
	<script type="text/javascript">
    function toggle_me()
    {
       // $("#outerWrapper").css("background-image", "url(images/background-"+name+".jpg)");
        var bg_img = $('#toggle_button').css('background-image').replace(/^url\(['"](.+)['"]\)/, '$1');
        var to = $('#fm_id').val();
        
        var from = $('#user_id').val();
        var video_id = $('#video_id').val();
        if(bg_img=='http://www.hitflics.com/images/maximize.png' || bg_img=='url(http://www.hitflics.com/images/maximize.png)')
        {
            var imageUrl='http://www.hitflics.com/images/minimize.png'
            $('#toggle_button').css('background-image', 'url(' + imageUrl + ')');
           // $('#fm_chat_box').css('bottom','0%');
            $('#fm_chat_box').css('height','auto');
            $('#fmbox_content').show();
            show_fm_chat(to,from,video_id);
        }
        else
        {
            var imageUrl='http://www.hitflics.com/images/maximize.png'
            $('#toggle_button').css('background-image', 'url(' + imageUrl + ')');
           // $('#fm_chat_box').css('bottom','0');
            $('#fm_chat_box').css('height','35px');
            $('#fmbox_content').hide();
        }
    }
    /*$(document).ready(function(){
        $('#toggle_button').click(function(){
            toggle_me();    
        });
    });*/
    function show_fm_chat(to,from,video_id)
    {
            $.ajax({
             type:'post',
             url:'<?php echo $this->webroot; ?>im/public_chatting',
             data:'show_chat=current&to='+to+'&from='+from+'&video_id='+video_id,
             success:function(rec){ 
                $('#fm_chat_content').html(rec);
             }
            });
    }
    function insert_chat(to,from,e)
    {
        var key;
        var video_id = $('#video_id').val();
        var str='';
        if(window.event)
        {
          key = window.event.keyCode; //IE
        }
        else
        {
          key = e.which; //firefox      
        }
        if(key==13)
        {
         var message = $('#chat').val();
         var flag=0;
          if(message.length>0 && to>0 && from>0 && video_id!='')
          {
            
            $.ajax({
             type:'post',
             url:'<?php echo $this->webroot; ?>im/public_chatting',
             data:'insert_chat='+message+'&to='+to+'&from='+from+'&video_id='+video_id+'&chat_type=current',
             success:function(result){
                $('#fm_chat_content').html(result);
                //$('#fm_chat_content').scrollTop = $('#fm_chat_content').scrollHeight;
                
             }
            });
          }
          $('#chat').val('');
          
          return false;
        }
    }
    setInterval(function()
    {
        if($('#fm_id') && $('#user_id') && $('#video_id'))
        {
         var to = $('#fm_id').val();
         var from = $('#user_id').val();
         var video_id = $('#video_id').val();
         show_fm_chat(to,from,video_id);
        } 
    },3000);
    
</script>
<style>
    #fm_chat_box{position: fixed; bottom: 0px;left:45%; width:19%; box-shadow: 10px 10px 5px #888888; margin:0;padding:0;background-color:#ffffff; z-index: 3 }
    #toggle_button{position: absolute;top:5px;right:10px;cursor: pointer;height:30px; background: url('http://www.hitflics.com/images/maximize.png') no-repeat; width:23px;}
    #button_section{width:96%;height:30px;background-color: #d87710;padding:5px;position:relative;color: #ffffff;font-size:13;font-weight:bold;line-height: 28px;}
    #chat{width:208px;}
    #fmbox_content{display:none;}
    #fm_chat_content{width:95%;font-size:13px;text-align: left;padding:5px;overflow-y:scroll;height: 320px; max-height: 320px;}
    #fm_image{position: absolute;left:10px;}
    .chat_table{width:100%;border-bottom: 1px solid #777777;}
    .first_td{width:10%;}
    #fm_image{font-weight:bold;font-size:13px;}
    #fm_name{font-size:11px;}	
</style>
<center>
<div id="fm_chat_box">
    <div id="button_section">
        <span id="fm_image">
            <img src="<?php echo $fm_image;?>" alt="pic" width="25" height="25" border="0">
        </span>
        <span id="fm_name">
            <?php echo substr($fm_fname,0,13);?> 
        </span>
        <a href="javascript:void(0)" onClick=" toggle_me();">
            <div id="toggle_button" >
            </div>
        </a>
    </div>
    <div id="fmbox_content">
         <form method="post" action="" name="chat_form" id="chat_form">
           <div id="fm_chat_content">
            
           </div> 
           <input type="hidden" name="video_id" id="video_id" value="<?php echo $_REQUEST['id'];?>" />
           <input type="hidden" name="fm_id" id="fm_id" value="<?php echo $fm_id;?>" />
           <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
            <div>
                <input type="text" name="chat" id="chat" onkeypress=" return insert_chat(<?php echo $fm_id;?>,<?php echo $user_id;?>,event)"/>
            </div>
        </form>
    </div>
</div>
</center>
	
	
	<?php
	
}
else if(isset($_SESSION['m_id']))
{
	//include('my_chatting_users.php');
	


if(isset($r))
{
    //$r = mysql_fetch_object($query);
    $fm_id = $r->id;
    $user_id = $_SESSION['m_id'];
    //$fm_record = get_user_info($fm_id);
    //$user_record = get_user_info($user_id);
    if($fm_record)
    {
        $fmimage  = $fm_record->profile_image_file;
        $fm_fname = $fm_record->first_name;
        $fm_lname = $fm_record->last_name;
        $fm_image  = 'uploads/main/'.$fmimage;
        if(!strlen($fmimage)|| !file_exists($fm_image))
        {
            $fm_image  = 'uploads/main/nopicture.png';
        }
       
    }
    else
    {
        $fm_image  = 'uploads/main/nopicture.png';
        $fm_fname = '';
        $fm_lname = '';
    }
    if($user_record)
    {
        $uimage  = $user_record->profile_image_file;
        $u_fname = $user_record->first_name;
        $u_lname = $user_record->last_name;
        $u_image  = 'uploads/main/'.$uimage;
        if(!strlen($uimage)|| !file_exists($u_image))
        {
            $u_image  = 'uploads/main/nopicture.png';
        }
       
    }
    else
    {
        $u_image  = 'uploads/main/nopicture.png';
        $u_fname = '';
        $u_lname = '';
    }
    
}


?>
<script type="text/javascript">
    function toggle_me()
    {
        
        var bg_img = $('#toggle_button').css('background-image').replace(/^url\(['"](.+)['"]\)/, '$1');
        if(bg_img=='http://www.hitflics.com/images/maximize.png')
        {
            var imageUrl='http://www.hitflics.com/images/minimize.png'
            $('#toggle_button').css('background-image', 'url(' + imageUrl + ')');
            $('#fm_chat_box').css('height','auto');
            $('#fmbox_content').show();
            show_users();
        }
        else
        {
            var imageUrl='http://www.hitflics.com/images/maximize.png'
            $('#toggle_button').css('background-image', 'url(' + imageUrl + ')');
            $('#fm_chat_box').css('height','35px');
            $('#fmbox_content').hide();
        }
    }
    $(document).ready(function(){
        $('#toggle_button').click(function(){
            toggle_me();    
        });
    });
    function show_users()
    {
        var video_id = $('#video_id').val();
        $.ajax({
             type:'post',
             url:'<?php echo $this->webroot; ?>im/public_chatting',
             data:'show_users=show_users'+'&video_id='+video_id,
             success:function(rec){
                $('#fm_chat_users').html(rec);
             }
            });
    }
    $(document).ready(function(){
        if($('#video_id').length>0)
        {
            show_users();
        }
    });   
    
</script>
<style>
    #fm_chat_box{position: absolute;top: 20%;right:1%; width:15%; box-shadow: 10px 10px 5px #888888; margin:0;padding:0;background-color:#ffffff; z-index: 1 ;display: none;}
    #toggle_button{position: absolute;top:5px;right:10px;cursor: pointer;height:30px; background: url('http://www.hitflics.com/images/minimize.png') no-repeat; width:23px;}
    #button_section{width:96%;height:25px;background-color: #d87710;padding:5px;position:relative;color: #ffffff;font-size:13;font-weight:bold;line-height: 28px;}
    #chat{width:208px;}
    #fmbox_content{display:block;}
    #fm_chat_users{width:95%;font-size:12px;text-align: left;padding:5px;overflow-y:scroll;height: 320px; max-height: 320px;}
    #fm_image{position: absolute;left:10px;}
    .user_span{color:#000000; margin-left:10px;font-size:14px}
    /*#toggle_user{bottom: 283px;cursor: pointer;font-size: 13px;font-weight: bold;height: 20px;left: 19%;position: absolute;ext-align: center;width: 120px;}*/
    #toggle_user{ bottom: 189px;cursor: pointer;font-size: 13px;
        font-weight: bold;
        height: 20px;
        left: -33.6%;
        position: relative;
        width: 120px;
    }
</style>
<center>
<!--
<div class="button" id="toggle_user" onclick="$('#fm_chat_box').toggle('slow');">
    <div id="chat_title">Chat with Viewers</div>
</div>
-->

<div id="fm_chat_box">
    <div id="button_section">
        <span id="fm_image">
            <img src="<?php echo $fm_image;?>" alt="pic" width="20" height="20" border="0">
        </span>
        <span id="fm_name">
            Chatting Users
        </span>
        <div id="toggle_button">
        
        </div>
    </div>
    <div id="fmbox_content">
        <form method="post" action="" name="user_list" id="user_list">
            <div id="fm_chat_users">
            </div> 
            <input type="hidden" name="video_id" id="video_id" value="<?php echo $_REQUEST['id'];?>" />
        </form>
    </div>
</div>
</center>
	
	<?php
}

?>

<?php //include('mail_box.php');?>
<!--<input type="hidden" id="scr_date_time" value="<?php echo $inp_date;?>"/>-->

</body>
</html>
