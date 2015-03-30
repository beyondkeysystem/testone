<? 
	require_once("../../includes/functions.php");
	$curPage  = curPageName();
?>
View : <select name="rec_view" onChange="document.form1.action=this.value; document.form1.submit();">
			<option value="view_profile.php?rec_id=<?=$_GET['rec_id']?>&url=<?=$url?>&urlPage=<?=$urlPage?>" <? if($curPage == 'view_profile.php') echo 'selected'; ?>>Recruiter/Employer Profile</option>
			<option value="posted_jobs.php?rec_id=<?=$_GET['rec_id']?>&url=<?=$url?>&urlPage=<?=$urlPage?>" <? if($curPage == 'posted_jobs.php') echo 'selected'; ?>>Posted Jobs</option>
		</select>