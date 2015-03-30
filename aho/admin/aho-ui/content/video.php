<style type="text/css">
.sTable th {
   
    border-left: 1px solid #CBCBCB;
    color: #878787;
    font-size: 11px;
    font-weight: normal;
    padding: 3px 8px 2px;
}


.sTable  td {
    border-left: 1px solid #CBCBCB;
    padding: 8px 12px;
    vertical-align: middle;
}
table, th, td
{
border: 1px solid #CBCBCB;
}
.hide{
    display:none;
}
.show{
    display: block;
}
td{text-align: center; vertical-align:middle;}
label{padding:5px;font-weight: bold;}
</style>
<header>
	<center> <h3><br>Home Videos</h3></center>
</header>

<?php
if(isset($_POST['upload_video'])){
	
//        if(isset($_FILES['video_file'])){
//	   
//	    $video_file = '';
//	    $thumbnail_image='';
//	    $file_type = $_FILES['video_file']['type'];
//	    if(strchr($file_type,'video')){
//		$video_file = $_FILES['video_file']['name'];
//		$path = 'aho-ui/files/videos/';
//		$f = move_uploaded_file($_FILES['video_file']['tmp_name'],$path.$video_file);
//		
//		if(isset($_FILES['thumbnail_image'])){
//		    $thumbnail_image = $_FILES['thumbnail_image']['name'];
//		    $file_type = $_FILES['thumbnail_image']['type'];
//		    if(strchr($file_type,'image')){
//			$path = 'aho-ui/files/videos/thumbnails/';
//			$f = move_uploaded_file($_FILES['thumbnail_image']['tmp_name'],$path.$thumbnail_image);
//			mysql_query("INSERT INTO AHO_Video (video_file,thumbnail_image) VALUES ('$video_file','$thumbnail_image')");
//			header("location:index.php?Page=Video");
//			print "<h4><font color='green'>Video Uploaded Successfully.</font></h4>";
//		    }
//		    else{
//			header("location:index.php?Page=Video");
//			print "<h4><font color='red'>Invalid File for Video Image.</font></h4>";
//		    }
//		}
//		else{
//		    header("location:index.php?Page=Video");
//		    print "<h4><font color='red'>Select a Video Image to upload.</font></h4>";
//		}
//		
//	    }
//	    else{
//		header("location:index.php?Page=Video");
//		print "<h4><font color='red'>Invalid File for a Video.</font></h4>";
//	    }
//	    
//	}
//	else{
//	    header("location:index.php?Page=Video");
//	    print "<h4><font color='red'>Select a Video File to upload.</font></h4>";
//	}
	
	
}
if(isset($_POST['upload_video'])){
	print "<h4><font color='green'>Home Videos Updated</font></h4>";
        mysql_query("UPDATE AHO_Video SET 
	    consumer_video_file ='".$_REQUEST['consumer_video_file']."',
	    agent_video_file ='".$_REQUEST['agent_video_file']."' 
	WHERE ID = '".$_REQUEST["ID"]."'");
}
if(isset($_REQUEST['Remove']) && !empty($_REQUEST["ID"])){
//    $sql = "select * from AHO_Video where ID = '".$_REQUEST["ID"]."'"; 
//    $sql_result = mysql_query($sql) or die(mysql_error());
//    if($sql_result && mysql_num_rows($sql_result))
//    {
//	$row = mysql_fetch_object($sql_result);
//	$path = 'aho-ui/files/videos/';
//	$video_file = $path.$row->video_file;
//	if(strlen($row->video_file)>0 && file_exists($video_file)){
//	    unlink($video_file);
//	}
//	$path = 'aho-ui/files/videos/thumbnails/';
//	$thumbnail_image = $path.$row->thumbnail_image;
//	if(strlen($row->thumbnail_image)>0 && file_exists($thumbnail_image)){
//	    unlink($thumbnail_image);
//	}
//    }
    $sql = "DELETE from AHO_Video WHERE ID = '".$_REQUEST["ID"]."'"; 
    $sql_result = mysql_query($sql); 
    header('location:index.php?Page=Video');
}
$sql = "SELECT * FROM AHO_Video ";
$sql_result = mysql_query($sql) or die(mysql_error());

if($sql_result && mysql_num_rows($sql_result))
{
    $row = mysql_fetch_object($sql_result);
    $consumer_video_file  = $row->consumer_video_file;
    $agent_video_file  = $row->agent_video_file;
    $ID = $row->ID;
}



/*  ?><br><br>
//	    <table>
//		<tr>
//		    <th>S.No.</th><th>Video File</th><th>Video Image</th><th>Status</th><th>Action</th>
//		</tr>
//		<?php
//		    $i=0;
//		    while($row = mysql_fetch_object($sql_result))
//		    {
//			$path = 'aho-ui/files/videos/thumbnails/';
//			$thumbnail_image = $row->thumbnail_image;
//			if(strlen($row->thumbnail_image)<=0 || !file_exists($path.$thumbnail_image)){
//			    $thumbnail_image = $path.'no_image.png';
//			}
//			else{
//			   $thumbnail_image = $path.$row->thumbnail_image;
//			}
//			?>
//			    <tr>
//				<td><?php echo ++$i;?></td><td><?php echo $row->video_file;?></td><td><img src="<?php echo $thumbnail_image;?>" width="100" height="100"/></td><td><a class="button" href="index.php?Page=Video&update_status=<?php if($row->status==1){echo 0;}else{echo 1;}?>&ID=<?php echo $row->ID;?>"><?php if($row->status==1){echo 'Active';}else{echo 'Inactive';}?></a></td><td><a class="button" onclick="return confirm('Do you really want to delete this record?');" href="index.php?Page=Video&Remove=1&ID=<?php echo $row->ID;?>">Delete</a></td>
//			    </tr>
//			<?php
//		    }
//		?>
//	    </table>
//    <?php
//}
//else
//{
//    echo "<h4><font color='red'>No Record Found</font></h4>";
//}
*/
?>

<div style="clear:both"></div>
<br>
<form action="index.php?Page=Video" method="post" enctype="multipart/form-data">
   <div >
    <label>Agent Video <span><b>(https://www.youtube.com/embed/KIdWWjWnS7A)</b></span></label> 
	<input type="text" name="agent_video_file" id="agent_video_file" value="<?php echo $agent_video_file;?>" />
   </div>
   <br>
   <div>
    <label>Consumer Video <span><b>(https://www.youtube.com/embed/KIdWWjWnS7A)</b></span></label>
	<input type="text" name="consumer_video_file" id="consumer_video_file" value="<?php echo $consumer_video_file;?>" />
   </div>
   <br>
    <input type="hidden" id="ID" name="ID" value="<?php echo $ID;?>"/>
    <center><input type="submit" id="upload_video" class="button" name="upload_video" Value="Update" onclick="return validate_form()" /></center>
    
</form>
<script>
    function validate_form() {
	var agent_video_file = $('#agent_video_file').val();
	var consumer_video_file = $('#consumer_video_file').val();
	if (agent_video_file.length<=0 || !isUrl(agent_video_file)) {
	   alert('Enter valid Agent Video Link.');
	   $('#agent_video_file').focus();
	   return false;
	}
	else if (consumer_video_file.length<=0 || !isUrl(consumer_video_file)) {
	   alert('Enter valid Consumer Video Link.');
	   $('#consumer_video_file').focus();
	   return false;
	}
	else{
	    return true;
	}
    }
    function isUrl(s)
    {
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(s);
    }
</script>
