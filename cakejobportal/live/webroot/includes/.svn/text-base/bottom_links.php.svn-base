<? 
	global $objDB;
	
	$links = array();
	$links["Home"] = "index.php";
	$links["About"] = "about.php";	
	//$links["Jobseeker"] = "recruiter/search_jobseekers.php";	
	$links["Employers"] = "jobseeker/seeker_emp.php";	
	$links["Register"] = "jobseeker/seeker_main_page.php";		
	$links["FAQs"] = "jobseeker/faq.php";			
	$links["Login"] = "jobseeker/seeker_login.php";			
	$links["FAQs"] = "jobseeker/faq.php";		
	$links["Job Search"] = "jobseeker/job_search.php";				
	$links["FAQs"] = "jobseeker/faq.php";		
	$links["Legal"] = "legal.php";		
	$links["Privacy"] = "privacy.php";		
	$links["Terms and Conditions"] = "terms.php";	
	$links["Code of Good Practice"] = "code-of-practice.php";	
	
	$sqlAdminProfile = "select * from job_user";
	$resultAdminProfile = $objDb->ExecuteQuery($sqlAdminProfile);
	$rsAdminProfile = mysql_fetch_object($resultAdminProfile);
	
?>
<table align="center">
<tr>
	<td align="center" class="white_small">
<?
	foreach($links as $title=>$url)
	{
?>
		<a href="<?=$url?>" class="white_small_link"><?=$title?></a>&nbsp;&nbsp;
<?
	}
?>
<br>
		<?=$rsAdminProfile->user_copyright?> &nbsp;&nbsp;|&nbsp;&nbsp;
		Email <a class="white_small" href="mailto:<?=$rsAdminProfile->user_email?>"><?=$rsAdminProfile->user_email?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
		Tel <?=$rsAdminProfile->user_phone?>
	</td>
</tr>

</table>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9057098-2");
pageTracker._trackPageview();
} catch(err) {}</script>
