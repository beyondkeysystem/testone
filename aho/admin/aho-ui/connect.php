<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');
foreach($_REQUEST as $name => $value){
	$res = $value;

	if(is_array($res) != 1){
		$res = htmlspecialchars($res);
		$res = strip_tags($res);
		$res = addslashes($res);
		$$name = $res;

	}
}
 //$connect = mysql_connect("localhost", 'las_rc_user', 'V69h3119TgHe25z') or die();
//$connect = mysql_connect("127.0.0.1", 'root', '') or die();

//$db_select = mysql_select_db('cakejobportal',$connect);
$connect = mysql_connect("localhost", 'ahomain', ',O8bOcL6JUXK') or die();
$db_select =mysql_select_db('ahomain_las_rc',$connect);


if($Connect_Failed == 1){
exit();
}

?>
