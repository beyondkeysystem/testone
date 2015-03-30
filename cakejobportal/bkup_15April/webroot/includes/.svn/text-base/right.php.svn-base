<?
	require_once("includes/functions1.php");
	
	$sqlCntSeekers = "SELECT * FROM job_jobseeker";
	$resultCntSeekers = $objDb->ExecuteQuery($sqlCntSeekers);
	$rsCntSeeker = mysql_num_rows($resultCntSeekers);
	
	$sqlCntJobs = "SELECT * FROM job_ad 
				   WHERE adFrom<='" . date("Y-m-d") . "' 
				   AND adTo>='" . date("Y-m-d") . "' 
				   ORDER BY ad_date";
	$resultCntJobs = $objDb->ExecuteQuery($sqlCntJobs);
	$rsCntJobs = mysql_num_rows($resultCntJobs);	
	
	$logo = 1;
	$headHunters = getHeadHunters($logo);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="20" class="subhead_gray" align="left"><?=stripslashes(REGISTERED_JOB_SEEKERS)?> <span class="subhead_gray_small">
      <?=number_format($rsCntSeeker)?>
      </span>&nbsp;&nbsp; </td>
  </tr>
  <tr>
    <td height="20" class="subhead_gray" align="left"><?=JOB_LISTINGS?>: <span class="subhead_gray_small">
      <?=number_format($rsCntJobs)?>
      </span>&nbsp;&nbsp; </td>
  </tr>
  <tr>
    <td height="27" class="head_violet" align="left" ><?=TOP_RECRUITERS_THIS_WEEK?> </td>
  </tr>
  <tr>
    <td align="left"><img src="images/line2.gif"></td>
  </tr>
  <tr>
    <td align="left" height="5"></td>
  </tr>
<?
	$j = 1;
	foreach($headHunters as $rec_id=>$shortlist_count)
	{			
		if($j > 4) break;
		
		$logo = getFieldValue("job_recruiter", "comp_logo", "rec_id", $rec_id);
				
		$img_exist = 0;
		
		$directory = "recruiter/logos/";
		$handle = opendir($directory);
		while(FALSE !== ($item = readdir($handle)))
		{
			if($item == $logo)
			{
				$img_exist = 1;
			}
		}		
			
		if($img_exist == 1)
		{
   ?>
  <tr>
    <td align="left" height="82"><img src="recruiter/logos/<?=$logo?>" ></td>
  </tr>
<? 
			$j++;
		}
	}
?>
</table>