<?php
include("../aho-ui/connect.php");
include("../aho-ui/functions.php");
if(isset($_REQUEST['RemoveID']) && !empty($_REQUEST['RemoveID']))
{
	echo $_REQUEST['RemoveID']; die;
        mysql_query("DELETE FROM AHO_User WHERE id = '".$_REQUEST['RemoveID']."' AND Type = '3'") or die(mysql_error());
	unset($_REQUEST['RemoveID']);
	header("location:index.php?Page=Accounts");
	
}
?>