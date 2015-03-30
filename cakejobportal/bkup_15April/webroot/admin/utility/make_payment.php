<html>
<body>
<form name="form1" method="post" action="<? echo "approval.php?invoice_id=" . $_GET['invoice_id'] . "&plan=" . $_GET['plan']; ?>">
	
	<input type="hidden" name="pay_by" value="<? if(isset($_POST['pay_by'])) echo $_POST['pay_by']; ?>">
	
</form>
<? 
	echo "<script language='javascript'>document.form1.submit();</script>";
	exit();
?>
</body>
</html>



