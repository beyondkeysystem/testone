<style type="text/css">
#overlay {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: #000;
filter:alpha(opacity=70);
-moz-opacity:0.7;
-khtml-opacity: 0.7;
opacity: 0.7;
z-index: 103 !important;
display: none;
}
.mail_popup{
width: 50%;
margin: 0 auto;
display: none;
position: fixed;
z-index: 2147483647;
top:10%;
left:23%;
right:34%;
border: 1px solid #000;
box-shadow: 0 2px 5px #000;
}

.input_width{
    width: 70% !important;
}
/*.content{
min-width: 600px;
width: 600px;
min-height: 150px;
margin: 100px auto;
background: #f3f3f3;
position: relative;
z-index: 103;
padding: 10px;
border-radius: 5px;
box-shadow: 0 2px 5px #000;
}*/
.content p{
clear: both;
color: #555555;
text-align: justify;
}
.content p a{
color: #d91900;
font-weight: bold;
}
.content .x{
float: right;
height: 35px;
left: 22px;
position: relative;
top: -25px;
width: 34px;
}
.content .x:hover{
cursor: pointer;
}
.contact_us{background-color:#fff;}
.close_btn{position: absolute;right: -20px;top:-17px;}
.close_btn a{color:#ff0000 !important;}
.close_btn img{height:40px;width:40px;}
</style>

<script>
        $('#send_mail').click(function() {
            var arr = [];
            var val_arr = [];        
            $('.sendmail_checkbox:checked').each(function(i){
                arr[i]= $(this).val();
            });
            $.each(unique(arr), function(i, value){
                val_arr[i] = value;
            });
            //alert(val_arr);
            var overlay = $('<div id="overlay"></div>');
            var body = document.body,html = document.documentElement;
            var body_height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
            overlay.show();
            overlay.appendTo(document.body);
            var popup_height = parseFloat(20*body_height/100);
            $('.mail_popup').show();
            $('#email_id').val(val_arr);
            return false;
    });
  
   function close_send_mail(){
        $('.mail_popup').hide();
        $('#overlay').remove();
      return false;
    }
    
    function unique(array){
        return array.filter(function(el,index,arr){
            return index == arr.indexOf(el);
        });
    }
</script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/contact_us.css" />

<div class='mail_popup contact_us'>
  <div class="container-contact clearfix ">
    <span class="close_btn"><a href='javascript:' class='close' onclick="close_send_mail();"><img src="http://www.americanhomesonline.com/images/close.png" alt="X"/></a></span>
    <div class="contact-form clearfix">
        <div class="contact-us clearfix"><h1>Send Mail</h1></div>
        <div class="main-form clearfix">
                <form method="post">
                  <span style="color:red">*</span>Send To:<input type="text" id="email_id" name="email_id" class=" input_width" placeholder="E-mail Id" required/>
                  <span style="color:red">*</span>Subject:<input type="text" value="" id="subject" name="subject"  class="input_width" placeholder="Subject" required/>
                  <span style="color:red">*</span>Message:
                  <textarea name="message" id="message" placeholder="Message" required></textarea>
                  <div class="cont-button clearfix">
                  <input type="submit" name="send_mail" id="send_mail" value="Send" class="blue-button" />
                  </div>
                </form>
        </div>
    </div>
  </div>
</div>