<? 
	require_once("../../includes/functions.php");
	$curPage  = curPageName();
?>
View : <select name="seeker_view" onChange="document.form1.action=this.value; document.form1.submit();">
			<option value="view_profile.php?seeker_id=<?=$_GET['seeker_id']?>&url=<?=$_GET['url']?>&urlPage=<?=$_GET['urlPage']?>" <? if($curPage == 'view_profile.php') echo 'selected'; ?>>Job Seeker Profile</option>
			<option value="bookmark_jobs.php?seeker_id=<?=$_GET['seeker_id']?>&url=<?=$_GET['url']?>&urlPage=<?=$_GET['urlPage']?>" <? if($curPage == 'bookmark_jobs.php') echo 'selected'; ?>>Job Bookmarks</option>
			<option value="bookmark_employers.php?seeker_id=<?=$_GET['seeker_id']?>&url=<?=$_GET['url']?>&urlPage=<?=$_GET['urlPage']?>" <? if($curPage == 'bookmark_employers.php') echo 'selected'; ?>>Employer Bookmarks</option>									
		</select>