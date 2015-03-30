<table cellpadding="4" cellspacing="0" border="0" width="100%" >
	<tr>
	  <td width="2%"></td>
		<td width="98%" height="10"></td>
	</tr>
<?
	require_once("../../includes/functions.php");
	$curPage = curPageName();
	$active = "";

	$chkUrl = $curPage ;
	
	$links = array(
	"View Profile"=>"view_profile.php?rec_id=" . $_GET['rec_id'],		
	"Posted Jobs"=>"posted_jobs.php",			
	"Bookmark Jobseekers"=>"bookmark_jobseekers.php",			
	);
	
	foreach($links as $title=>$url)
	{
?>	
	<tr>
	  <td background="../images/right_menu_bg.gif" height="34"><img src="../images/icon.gif"></td>
		<td background="../images/right_menu_bg.gif"><a href="<?=$url?>" class="<? if($chkUrl == $url) echo 'left_link_bold'; else echo 'left_link'; ?>"><?=$title?></a></td>
	</tr>
<?
	}
?>

</table>
