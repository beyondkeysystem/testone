<header><center>
    <h3><br>AGENT CREDITS</h3></center>
</header>
<hr>

<?php

 $Find_ID = $_REQUEST['ID'];
 // echo $Find_ID; 


if($Branch > 1){
$sql = "SELECT * FROM AHO_User WHERE Email_1 = '$Find_ID'  AND  b_id = '$B_ID'";
} 
 $sql_result = mysql_query($sql);

while ($row = mysql_fetch_array($sql_result)) {
		
	$AID = $row["id"];
	$total = $row["credits"];
        $metadata = $row["resources"];

if($Branch > 1){	
	print "<div style='float:left;width:210px;border-style:solid;border-color:#cdcdcd;border-width:1px;padding:10px;margin:10px;'>";
}else{
print "<div style='float:left;width:400px;border-style:solid;border-color:#cdcdcd;border-width:1px;padding:10px;margin:10px;'>";

			$day1 = date("Ymd", mktime(0, 0, 0, date("m"), date("d"),  date("Y")));
			$day2 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-1,  date("Y")));
			$day3 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-2,  date("Y")));
			$day4 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-3,  date("Y")));
			$day5 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-4,  date("Y")));
			$day6 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-5,  date("Y")));						
			$day7 = date("Ymd", mktime(0, 0, 0, date("m"), date("d")-6,  date("Y")));						

			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day1%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);

		
			$Logger1 = $rowa["Sum"];
			
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day2%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);

		
			$Logger2 = $rowa["Sum"];
			
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day3%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);

		
			$Logger3 = $rowa["Sum"];
			
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day4%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);

		
			$Logger4 = $rowa["Sum"];	
					
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day5%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);

		
			$Logger5 = $rowa["Sum"];		
			
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day6%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);

		
			$Logger6 = $rowa["Sum"];
			
			$sqla = "SELECT count(id) as Sum FROM AHO_Request WHERE Agent_ID = '$AID' AND Date_Time LIKE '$day7%' ORDER BY id DESC";
			$sql_resulta = mysql_query($sqla);
			$rowa = mysql_fetch_array($sql_resulta);

		
			$Logger7 = $rowa["Sum"];

		
}
		

?>
<?php  if($Branch > 1){

?>

    <script type="text/javascript">
  
      google.setOnLoadCallback(drawChart);
      
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Records'],
          ['|',  <?php print $Logger7+0 ?>],
          ['|',   <?php print $Logger6+0 ?>],
          ['|',   <?php print $Logger5+0 ?>],
          ['|',   <?php print $Logger4+0 ?>],
          ['|',   <?php print $Logger3+0 ?>],
          ['|',   <?php print $Logger2+0 ?>],
          ['|',   <?php print $Logger1+0 ?>]
        ]);
        

        var options = {
          title: 'Past 7 Days',
          hAxis: {title: 'Day',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div<?php print $row['id'] ?>'));
        chart.draw(data, options);
      }
    </script>
    
    <div id="chart_div<?php print $row['id'] ?>" style="width: 100%; height: 200px;"></div>

<?php
}
?>
    

	<?php
	$Email_1 = substr($row['Email_1'], 0 , 50);

if($Branch > 1){

	print "
	<ul>	
	<li><span style='font-size:16px; color:#036;'>$Email_1</span></li>
	<li><a href='index.php?Page=Accounts&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive' style='font-size:12px;' data-ajax='false'>Edit</a>
	<a href='index.php?Page=Contacts&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Contacts</a>
	<a href='index.php?Page=credits&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Credits	</a>
	<a href='aho-ui/content/pops/remove.php?ID={$row['id']}' class='various fancybox.iframe button bactive bsmall' style='font-size:12px;'>Remove</a></li></ul>
	</div>";
	
}else{

	print "
	<ul>
	<li><span style='font-size:16px;'>$Email_1</span></li>
<li><span style='font-size:16px;'>&nbsp;</span></li>
	<li><a href='index.php?Page=Accounts&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive' style='font-size:12px;'  data-ajax='false'>Edit</a>
	<a href='index.php?Page=Contacts&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Contacts</a>
    <a href='index.php?Page=credits&ID={$row['id']}' data-role='button'  data-mini='true' class='button binactive bsmall' style='font-size:12px;' data-ajax='false'>Credits</a>
	</li>
	</ul>
	</div>";

}?>
	<div id='agentbox'>
    <div style="float:left;">    <br>


<span style='font-size:32px; font-weight:bold; color:<?php echo ($total < 15) ? '#f00' : '#036'; ?>'>Credits Remaining: <?php echo $total; ?></span><br><br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
  <b>Purchase Additional Credits</b> <label><br>1 Credit = $1 | 5 Credits Needed For 1 Lead </label> 
<input name="amount" id="amount" placeholder="Enter Quantity" type="text" /><br />
            <input type="hidden" name="cmd" value="_ext-enter" />
            <input type="hidden" name="redirect_cmd" value="_xclick" />
            <input type="hidden" name="business" value="burt@americanhomesonline.com" />
            <input type="hidden" name="item_name" value="AHO Credits - <?php echo $Email_1; ?> " />
            <input type="hidden" name="currency_code" value="USD" />
           <input type="hidden" name="no_note" value="1" />
            <input type="hidden" name="no_shipping" value="1" />
			<input type="hidden" name="custom" value="<?php echo $AID; ?>" />
            <input type="hidden" name="return" value="http://americanhomesonline.com/admin/index.php?Page=credits" />
            <input type="hidden" name="cancel_return" value="http://americanhomesonline.com/admin/index.php?Page=cancel" />
            <input type="hidden" name="email" value="<?php echo $Email_1; ?>" />
         <input name="submit" type="submit" class='button binactive bsmall'  id="submit" value="MAKE PAYMENT VIA PAYPAL" style=" cursor:pointer;" />
            </label>
          </form>
</div>
</div>
<?

	}
		if($AID==''){ print "Add an agent or yourself to get started.";
	 }
?>

<div style="clear:both"></div>