<?php
$db = mysql_connect("localhost", 'ahomain', ',O8bOcL6JUXK') or die(); // original
mysql_select_db('ahomain_las_rc',$db); // original
$sql = "SELECT * FROM AHO_Video ";
$sql_result = mysql_query($sql) or die(mysql_error());

if($sql_result && mysql_num_rows($sql_result))
{
    $row = mysql_fetch_object($sql_result);
    $consumer_video_file  = $row->consumer_video_file;
    $agent_video_file  = $row->agent_video_file;
    $ID = $row->ID;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>How it works</title>
</head>

<body>

<div class="how-works">
<div class="how-it-works">
<div class="how1">
  <span class="subch1">
                    <b>Agent Video</b>
            </span>
  
  
   <iframe width="100%" height="300" src="<?php echo $agent_video_file;?>" frameborder="0" allowfullscreen></iframe>
 </div>
<div class="how2">
  <span class="subch1">
                    <b>Consumer Video</b>
            </span>
   <iframe width="100%" height="300" src="<?php echo $consumer_video_file;?>" frameborder="0" allowfullscreen></iframe>
  
     
    
</div></div>
</div>

</body>
</html>
