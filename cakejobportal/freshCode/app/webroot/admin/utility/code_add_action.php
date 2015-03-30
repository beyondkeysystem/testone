<?   session_start();
	 if(!isset($_SESSION["user_id"]))
	 {
		header("location: ../index.php"); exit();
	 }

	require_once("../../classes/db_class.php");
        include("../../includes/thumbnail_generator.php");
	$objDb = new db();
	$array=array();
	
	//print_r($_POST); exit; // 2010-01-05
	if(isset($_POST["voucher_code"]) and $_POST["voucher_code"] !="")
	{	$vid = "";
		$voucherCode = trim($_POST["voucher_code"]);
		$sqladvert = "select * from  job_voucher_code where voucher_code = '". $voucherCode ."'"; 
		
		
		$resultadvert = $objDb->ExecuteQuery($sqladvert);
		$rowCount = mysql_num_rows($resultadvert);	
			if(isset( $_GET['action'] ) && $_GET['action'] =='edit' ) { 
		//$sqladvert = "select * from  job_voucher_code where voucher_code = '". $voucherCode ."' and code_id = ".$_REQUEST["code_id"]; 
		
		$actn = "edit";
		$vid = "&vid=".$_REQUEST["code_id"];
		if( $rowCount > 1 ){				
				echo("<script>location.href=\"code_add.php?action=$actn&msg=Exist".$vid."\";</script>"); exit; 
			}
		}else{
			if( $rowCount > 0 ){				
				echo("<script>location.href=\"code_add.php?msg=Exist\";</script>"); exit; 
			}			
		}
			
		
	}
	if(isset($_POST["voucher_code"]) and $_POST["voucher_code"] !="")
	{	
		$array["voucher_code"] = htmlentities(trim($_POST["voucher_code"]));
	}
	if( ( isset($_POST["expiry_date"]) && isset($_POST["expiry_month"]) && isset($_POST["expiry_year"]) ) && ( $_POST["expiry_date"] !="" && $_POST["expiry_month"] !="" && $_POST["expiry_year"] !="" ) )
	{
		$array["expiry_date"] =  $_POST["expiry_year"]."-".$_POST["expiry_month"]."-".$_POST["expiry_date"];
	}
	if(isset($_POST["no_of_uses"]) && $_POST["no_of_uses"] !="")
	{
		$array["no_of_uses"] = $_POST["no_of_uses"];
	}
	
	if ( isset($_POST["planOpt"]) and $_POST["planOpt"] ==1) { 
		if(isset($_POST["plan_id"]) and $_POST["plan_id"] !="") {
			foreach( $_POST['plan_id'] as $pid )
			{
					$plantTxt .= trim($pid).",";					
			}			
			//$array["plan_id"] = substr( $plantTxt , 0 , - (strlen( $plantTxt - 1)) ) ;
			$array["plan_id"] = rtrim( $plantTxt , ',' ) ;			
		}
	}
	else if ( isset($_POST["planOpt"]) and $_POST["planOpt"] ==0 ){
		$array["plan_id"] = "all";
	}
	
	if ( isset($_POST["opt"]) and $_POST["opt"] ==1) { 
		if(isset($_POST["rec_id"]) and $_POST["rec_id"] !="") {
			foreach( $_POST['rec_id'] as $cid )
			{
					$recTxt .= trim($cid).",";					
			}			
			//$array["rec_id"] = substr( $recTxt , 0 , - (strlen( $recTxt - 1)) ) ;			
			$array["rec_id"] = rtrim( $recTxt ,',' ) ;			
		}
	}
	else if ( isset($_POST["opt"]) and $_POST["opt"] ==0 ){
		$array["rec_id"] = "all";
	}			
	//echo ($array["rec_id"]);	 exit;
	if(	isset( $_GET['action'] ) && $_GET['action'] =='add') {
		$array["status"] =1;
		$objDb->InsertData("job_voucher_code",$array);
		$vid = mysql_insert_id();
		$msg = "&msg=add&vid=".$vid;
		
	}	
	if(isset( $_GET['action'] ) && $_GET['action'] =='edit' ) {
		if(isset( $_POST['code_id'] ) && $_POST['code_id'] !="" ) {
			$vid = $_POST['code_id'];
			$objDb->UpdateData( "job_voucher_code", $array,"code_id", $vid );		
			$msg = "&msg=edit&vid=".$vid;
		}
	}		
	header("location:code_add.php?action=edit".$msg);

		
		
?>
	