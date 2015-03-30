<style type="text/css">
   #fb{
	   width:100px;
	   margin:0 auto;
	   height:100px;
	   background-color:#06F;
	   font-size:20px;
	   color:#FFF;
	   border-radius:15px;
	   padding:6px;
	   }
   
   </style>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
FB.init({
//appId: '516152375160332',
appId: '180315052029654',
//appId:'646095488779852',
cookie:true,
status:true,
xfbml:true
});

function FacebookInviteFriends()
{
FB.ui({
method: 'apprequests',
message: 'Welcome to Jobportal',
});
}

if (top.location != self.location)
{
top.location = self.location;
}
</script>

   <div id="fb-root"></div>
<a href="#invite" id="fb" onclick="FacebookInviteFriends();"> 
Click hree Bring Your friends Here
</a>
