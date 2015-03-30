<? 
	require_once("../../includes/functions.php");
	$curPage  = curPageName();
?>
View : <select name="rec_view" onChange="location.href=this.value">
			<option value="view_profile.php?rec_id=<?=$_GET['rec_id']?>" <? if($curPage == 'view_profile.php') echo 'selected'; ?>>Recruiter/Employer Profile</option>
			<option value="posted_jobs.php?rec_id=<?=$_GET['rec_id']?>" <? if($curPage == 'posted_jobs.php') echo 'selected'; ?>>Posted Jobs</option>
			<option value="bookmark_jobseekers.php?rec_id=<?=$_GET['rec_id']?>" <? if($curPage == 'bookmark_jobseekers.php') echo 'selected'; ?>>Bookmark Jobseekers</option>									
		</select>