<script type="text/javascript">
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
		 data:'insert_chat='+message.trim()+'&to='+to+'&from='+from+'&video_id='+video_id+'&chat_type=all',
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
	function show_fm_chat(to,from,video_id)
	{
		 $.ajax({
		 type:'post',
		 url:'<?php echo $this->webroot; ?>im/public_chatting',
		 data:'show_chat=all&to='+to+'&from='+from+'&video_id='+video_id,
		 success:function(rec){ 
		    $('#fm_chat_content').html(rec);
		 }
		});
	}
	$(document).ready(function(){
		
		var to = $('#fm_id').val();
		var from = $('#user_id').val();
		var video_id = $('#video_id').val();
		
		if(to && from && video_id)
		{
			show_fm_chat(to,from,video_id);
		}
		
	});
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
	#chatting_user{font-size:16px;padding:10px;}
	.username{color:#0000ff;font-weight:bold;}
	#chat{width:50%;font-size:14px;}
	#fm_chat_content{width:95%;font-size:13px;text-align: left;padding:10px;overflow-y:a;height: 500px; min-height: 500px;}
	.chat_table{width:100%;border-bottom: 1px solid #777777;}
	#fm_chat_box{width:90%; margin:0;padding:10px;background-color:#ffffff; z-index: 1;border: 2px solid #000; }
	.first_td{width:10%;}
</style>


<header>
	<hgroup>

		<?php //if($_SESSION['viewer_logged_in']==TRUE) {?>
		<!--div class="top_links"><span>Welcome <strong><?php echo $_SESSION['username']; ?></strong></span-->
		<?php //} ?>
	</hgroup>
</header>

<section>
  <article style="min-height:665px">
    <div class="content">
	<center>
		<!--div class="connection">
			<h1>Chatting Room</h1>
		</div-->
	
		<div id="chatting_window">
			<div id="chatting_user">
				You are chatting with <span class="username"><a href="javascript:void(0);"><?php echo $u_fname.' '.$u_lname;?></a></span>
			</div>
			
			<div id="fm_chat_box">
				
				<form method="post" action="" name="chat_form" id="chat_form">
					<div id="fm_chat_content">
					 
					</div> 
					<input type="hidden" name="video_id" id="video_id" value="<?php echo $_REQUEST['id'];?>" />
					<input type="hidden" name="fm_id" id="fm_id" value="<?php echo $_SESSION['m_id'];?>" />
					<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
					 <div style="padding-top:20px;">
					     <textarea name="chat" id="chat" onkeypress="return insert_chat(<?php echo $user_id;?>,<?php echo $_SESSION['m_id'];?>,event)"></textarea>
					 </div>
				</form>
				
			</div>
		</div>
	</center>
    </div>
  </article>
</section>
