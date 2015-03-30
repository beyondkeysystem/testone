<? 
   setcookie("TestCookie", "1");
   
?>
<body onLoad="document.form1.submit();">
	<form name="form1" method="post" action="http://localhost/namrecruit/emaillist/admin/index.php">
		<input type="hidden" value="namrecru" name="login">
		<input type="hidden" value="namrecru" name="password">
		<input type="hidden" value="1" name="val">
	</form>
</body>
