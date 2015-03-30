<script type="text/javascript">
	function insert_chat(to,from,e,uname)
	{
	    var key;
	    var video_id = $('#video_id_'+uname).val();
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
	     var message = $('#'+uname).val();
	     var flag=0;
	      if(message.length>0 && to>0 && from>0 && video_id!='')
	      {
		
		$.ajax({
		 type:'post',
		 url:'<?php echo $this->webroot; ?>im/public_chatting',
		 data:'insert_chat='+message.trim()+'&to='+to+'&from='+from+'&video_id='+video_id+'&chat_type=all',
		 success:function(result){
		   
		    $('#fm_chat_content_'+uname).html(result);
		    $('#fm_chat_content_'+uname).scrollTop = $('#fm_chat_content').scrollHeight;
		    
		 }
		});
	      }
	      $('#'+uname).val('');
	      
	      return false;
	    }
	}
	function show_fm_chat(to,from,video_id,uname)
	{
		$.ajax({
		 type:'post',
		 url:'<?php echo $this->webroot; ?>im/public_chatting',
		 data:'show_chat=all&to='+to+'&from='+from+'&video_id='+video_id,
		 success:function(rec){
			
		    $('#fm_chat_content_'+uname).html(rec);
		    //$('#fm_chat_content_'+uname).lasttable.focus();
		 }
		});
	}
	$(document).ready(function(){		
		var uname = $('#uname').val();
		var to = $('#fm_id_'+uname).val();
		var from = $('#user_id').val();
		var video_id = $('#video_id_'+uname).val();		
		
		if(to && from && video_id)
		{
			show_fm_chat(to,from,video_id,uname);
		}		
	});
	setInterval(function()
	{
	    var uname = $('#uname').val();
	    if($('#fm_id_'+uname) && $('#user_id') && $('#video_id_'+uname))
	    {
	     var to = $('#fm_id_'+uname).val();
	     var from = $('#user_id').val();
	     var video_id = $('#video_id_'+uname).val();
	     show_fm_chat(to,from,video_id,uname);
	    } 
	},3000);
	var uname = $('#uname').val();
	$( "#title-well_"+uname ).click(function() {
		$( "#fm_chat_box2_"+uname ).toggle( "fast", function() {
		// Animation complete.
		});
	});
</script>
<style>
.fm_chat_box2 {
    background-color: #FFFFFF;
    border: 2px solid #F1F1F1;
    margin: 0;
    padding: 4px;
    float: right;
   /* width: 90%;*/
   /* z-index: 2147483638;*/
}
</style>
<div id="container_<?=$u_fname?>" style="text-align:left!important;bottom:0px;position:fixed;z-index:2147483638;margin: 0px 10px 0px 10px;left: auto;right: <?=$valpopuppx?>px;">
	<div class="title-well" id="title-well_<?=$u_fname?>">
		<h2 style="background: none;"><?php echo $u_fname.'&nbsp;&nbsp;'.$u_lname.'&nbsp;&nbsp;';?></h2>
		
	</div>
	<div id="fm_chat_box2_<?=$u_fname?>" class="fm_chat_box2">
		
		<form method="post" action="/im/public_chatting" name="chat_form" id="chat_form">
			<div id="fm_chat_content_<?=$u_fname?>" style="font-size:13px;text-align: left;padding:10px;overflow-y:auto;height: 200px; min-height: 200px;">
			 
			</div> 
			<input type="hidden" name="video_id" id="video_id_<?=$u_fname?>" value="<?php echo $_REQUEST['id'];?>" />
			<input type="hidden" name="uname" id="uname" value="<?=$u_fname?>" />
			<input type="hidden" name="fm_id" id="fm_id_<?=$u_fname?>" value="<?php echo $_SESSION['m_id'];?>" />
			<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
			 <div style="padding-top:20px;">
			     <textarea name="chat" id="<?=$u_fname?>" onkeypress="return insert_chat(<?php echo $user_id;?>,<?php echo $_SESSION['m_id'];?>,event,'<?=$u_fname?>')"></textarea>
			 </div>
		</form>
		
	</div>
</div>