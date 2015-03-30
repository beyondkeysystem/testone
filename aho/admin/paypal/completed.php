<?php
require_once('../includes/Database.php');
require_once('../includes/Email.php');
$curr_date = date('m/d/Y');

session_start();

/*Code to a paypal details send mail to developer*/
$data = date('d-m-y H:i:s')."\n";
$data .= print_r($_REQUEST, true)."\n\n";			
	
/*$str1 = "<HTML>
	<BODY>
	$data
	</BODY>
	</HTML>";
$aho_email = new Email('sameer.chourasia@cisinlabs.com', 'no-reply@americanhomesonline.com.com', 'AHO Credits Purchased', $str1);
$aho_email->send();

*/
$file = fopen("complete_det_log.txt","a+");
fwrite($file,$data);
fclose($file);

/* Mail to Developer Ends*/

if (isset($_POST['transaction_subject'])) {
	$trans_id = mysql_escape_string($_POST['txn_id']);
	$user_id = intval($_POST['custom']);
	$sub_id = mysql_escape_string($_POST['receiver_id']);
	$payer_id = mysql_escape_string($_POST['payer_id']);
	$amount = intval($_POST['payment_gross']);
	$quantity = intval($_POST['quantity']);
	$redirect_success = $_SESSION['redirect_success'];
	
	// $query = "INSERT INTO widget_pay (trans_id, user_id, sub_id, payer_id, amount, pay_time) VALUES ('$trans_id', $user_id, '$sub_id', '$payer_id', $amount, '$curr_time')";
    // $db->insert($query);
	
	$query = "UPDATE AHO_User SET credits = credits + $quantity WHERE id = $user_id"; 
    $db->update($query);
	
	$str = "<HTML>
	<BODY>
	Thank you {$_POST['first_name']} {$_POST['last_name']}.<br />
	Your payment of $amount has been received.<br />
	You have paid for $quantity credits.
	</BODY>
	</HTML>";
	
	$customer_email = new Email($_POST['payer_email'], 'no-reply@americanhomesonline.com', 'Payment Confirmation - AHO Credits.', $str, 'html');
	$customer_email->send();
	$str = "{$_POST['first_name']} {$_POST['last_name']} has paid for {$amount} American Homes Online Credits.";
	$aho_email = new Email('burt@americanhomesonline.com', 'no-reply@americanhomesonline.com.com', 'AHO Credits Purchased', $str);
	$aho_email->send();
	unset($_SESSION['redirect_success']);
	header('location:'.$redirect_success);
}
?>