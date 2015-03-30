<?php
$db = mysql_connect("localhost", 'las_rc_user', 'V69h3119TgHe25z') or die();
mysql_select_db('las_rc',$db);
$day30 = date("YmdHis", mktime(0, 0, 0, date("m"), date("d")-30,  date("Y")));
$sql = "
	DELETE FROM AHO_Request
	WHERE Date_Time < $day30
";
mysql_query($sql, $db);