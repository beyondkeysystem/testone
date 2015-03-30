<script type="text/javascript">
animatedcollapse.ontoggle=function($, divobj, state){ //fires each time a DIV is expanded/contracted
}
animatedcollapse.addDiv('feedback', 'optional_attribute_string')
animatedcollapse.init()
</script>

<script type="text/javascript">
   // like_count(<?php echo $movie_id?>);
</script>

<script type="text/javascript">
   // get_comment('<?=$f_m_id?>','<?=$movie_id?>');
</script>

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
    $(document).ready(function(){
       /* $('#toggle_button').click(function(){
            toggle_me();    
        });*/
       show_users();
    });
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

	
	<?php
}// end if m_id
else if(isset($_SESSION['m_id']))
{
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
	//alert("Test");
        var video_id = $('#video_id').val();
        $.ajax({
             type:'post',
             url:'<?php echo $this->webroot; ?>im/public_chatting',
             data:'show_users=show_users'+'&video_id='+video_id,
             success:function(rec){
                $('#fm_chat_users2').html(rec);
             }
            });
    }
    $(document).ready(function(){
        if($('#video_id').length>0)
        {
            show_users();
        }
    });
    setInterval(function()
    {
	show_users();
    },3000);
    
</script>
<style>
    #fm_chat_box{position: absolute;top: 20%;right:1%; width:15%; box-shadow: 10px 10px 5px #888888; margin:0;padding:0;background-color:#ffffff; z-index: 1 ;display: none;}
    #toggle_button{position: absolute;top:5px;right:10px;cursor: pointer;height:30px; background: url('http://www.hitflics.com/images/minimize.png') no-repeat; width:23px;}
    #button_section{width:96%;height:25px;background-color: #d87710;padding:5px;position:relative;color: #ffffff;font-size:13;font-weight:bold;line-height: 28px;}
    #chat{width:208px;}
    #fmbox_content{display:block;}
    #fm_chat_users{width:95%;font-size:12px;text-align: left;padding:5px;overflow-y:scroll;height: 320px; max-height: 320px;}
    #fm_chat_users2{overflow-y:auto;height: 320px; max-height: 320px;}
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
            
            <input type="hidden" name="video_id" id="video_id" value="<?php echo $movie_id;?>" />
        </form>
    </div>
</div>
</center>
	
	<?php
}

?>
<div class="Sidebar-Right">
    
    <div class="box right-box search">
    	<div class="search_box">
        	<i class="fa fa-search orng"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!--input type="text" name="" value="" placeholder="Job Search" /-->
	    <a href="<?=$this->webroot?>jobsearch">Job Search</a>
        </div>
        
        <!--select id="my-select" class="select" tabindex="1">
	    <option value="">My Account</option>
            <option value="<?=$this->webroot?>candidate/candidate_edit">Personal Information</option>
	    <option value="<?=$this->webroot?>jobsearch">Search a Job</option>            
        </select-->
    </div>
    <script type="text/javascript">

	$(document).ready(function() {
	    //alert("test");
	    $('#my-select').val(document.location);      
	    $('#my-select').change(function () {
		//alert($(this).val());
		var url = $(this).val(); 
		if (url != '') {
		    window.location.href = url;      
		}
		return false;
	    });
	});
  
    </script>
    <div class="box right-box">
    <div class="title-well">
	 <h2>Forums  </h2>	</div>
    <div class="discretion"> 
    <a href="<?php echo $this->webroot; ?>forum/"><img class="bdr-img" src="<?php echo $this->webroot ?>css/images/pic-forum.jpg" alt="" /></a>
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.  </p>
    
    </div>
	</div>
    
    <div class="box right-box">
    <div class="title-well">
	 <h2>Job Alerts</h2></div>
    <div class="discretion"> 
    	<img class="bdr-img" src="<?php echo $this->webroot ?>css/images/job_alert.jpg" alt="" />
    	<h4>Job Alerts & News Feed</h4>
        <ul class="bullet_list bl1">
        	<li>
            	<i class="fa fa-caret-right"></i>
                <?php echo $this->Html->link(__('Upgrade'), array('controller' => 'upgrade', 'action' => 'index')); ?>
            </li>
            <li>
            	<i class="fa fa-caret-right"></i>
                <a href="#">Advertise</a>
            </li>
             <li>
            	<i class="fa fa-caret-right"></i>
		<?php echo $this->Html->link(__('Post a Job'), array('controller' => 'employer', 'action' => 'postadd')); ?>
            </li>
        </ul>
    </div>
	</div>
    
    <div class="box right-box">
    <img src="<?php echo $this->webroot ?>css/images/pic-ads1.jpg" alt="" />
	</div>
    
    <div class="box right-box">
    <div class="title-well">
	 <h2>Instant Message</h2></div>
    <div class="discretion" id="fm_chat_users2" style="width: 100%;"> 
    	<ul class="instant_msg">
        	<li>
            	<a href="#" class="inst_msg_img"><img src="<?php echo $this->webroot ?>css/images/instant_msg_img.png" alt="" /></a>
                <a href="#" class="inst_msg_txt">Johnhaynes<span class="status"></span></a>
                <div class="clearfix"></div>
            </li>
            <li>
            	<a href="#" class="inst_msg_img"><img src="<?php echo $this->webroot ?>css/images/instant_msg_img.png" alt="" /></a>
                <a href="#" class="inst_msg_txt">Johnhaynes<span class="status"></span></a>
                <div class="clearfix"></div>
            </li>
            <li>
            	<a href="#" class="inst_msg_img"><img src="<?php echo $this->webroot ?>css/images/instant_msg_img.png" alt="" /></a>
                <a href="#" class="inst_msg_txt">Johnhaynes<span class="status"></span></a>
                <div class="clearfix"></div>
            </li>
            <li>
            	<a href="#" class="inst_msg_img"><img src="<?php echo $this->webroot ?>css/images/instant_msg_img.png" alt="" /></a>
                <a href="#" class="inst_msg_txt">Johnhaynes<span class="status"></span></a>
                <div class="clearfix"></div>
            </li>
        </ul>
    
    </div>
	</div>
    
    <div class="box right-box">
    <div class="title-well">
	 <h2>Chat Room</h2>	</div>
    <div class="discretion"> 
    <img class="bdr-img" src="<?php echo $this->webroot ?>css/images/pic-chat.jpg" alt="" />
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.  </p>
    
    </div>
	</div>
    
    
       
    <div class="box right-box">
    <img src="<?php echo $this->webroot ?>css/images/pic-ads2.jpg" alt="" />    
	</div>
    
     </div>