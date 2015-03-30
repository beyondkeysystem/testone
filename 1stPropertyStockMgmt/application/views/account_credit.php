<?php

// PayPal settings
$paypal_email = 'sameer.c@cisinlabs.com';
$return_url = ''. site_url().'success_credit';
$cancel_url = ''. site_url().'success_credit';
// $notify_url = ''. site_url().'success_credit';

$item_name = $_GET["item_name_1"];
$item_amount = $_GET["amount_1"];

         $cmd='_xclick';
        $upload=1;
        $no_note=1;
        $lc='MYR';
        $currency_code='MYR';
        $payer_email='nitin.s@cisinlabs.com';
        $src=1;
        $sra=1;
        $rm=2;

// Check if paypal request or response
if (!isset($_REQUEST["tx"])){

	// Firstly Append paypal account to querystring
	$querystring .= "?business=".urlencode($paypal_email)."&";	
	
	// Append amount& currency (£) to quersytring so it cannot be edited in html
	
	//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
        $querystring .= "cmd=".urlencode($cmd)."&";
        $querystring .= "upload=".urlencode($upload)."&";
        $querystring .= "no_note=".urlencode($no_note)."&";
        $querystring .= "lc=".urlencode($lc)."&";
        $querystring .= "currency_code=".urlencode($currency_code)."&";
        $querystring .= "src=".urlencode($src)."&";
        $querystring .= "rm=".urlencode($rm)."&";
        $querystring .= "sra=".urlencode($sra)."&";
        $querystring .= "payer_email=".urlencode($payer_email)."&";
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";
	
	//loop for posted values and append to querystring
	foreach($_GET as $key => $value){
		$value = urlencode(stripslashes($value));
		$querystring .= "$key=$value&";
	}
	
	// Append paypal return addresses
	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	// $querystring .= "notify_url=".urlencode($notify_url);
	
	// Append querystring with custom field
	//$querystring .= "&custom=".USERID;
	
	// Redirect to paypal IPN
	header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
	exit();

}
?>