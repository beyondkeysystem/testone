<?
	require_once("../classes/db_class.php");
	$objDb = new db();
	
	$table = $_GET['table'];
	$status_head = $_GET['status_head'];
	$status = $_GET['status'];	
	$id_head = $_GET['id_head'];	
	$id = $_GET['id'];
	$alertname = $_GET['alertname'];
	
	//echo "update " . $table . " set " . $status_head . "=" . $status . " where " . $id_head . "=" . $id; exit();
	
	$array = array();
	$array[$status_head] = $status;
	
	$objDb->updateData($table,$array,$id_head,$id);
	
	if($status == 1)
		echo "<span id='status_" . $id . "'><a href='javascript:void(0)' class='paging_text' title='In-activate " . $alertname . "?' onclick=\"setStatus('" . $alertname . "','" . $id_head . "'," . $id . ",'" . $status_head . "',0,'" . $table . "');\">Active</span>";
	else
		echo "<span id='status_" . $id . "'><a href='javascript:void(0)' class='paging_text' title='activate " . $alertname . "?' onclick=\"setStatus('" . $alertname . "','" . $id_head . "'," . $id . ",'" . $status_head . "',1,'" . $table . "');\">Inactive</span>";
?>