<?php
include("../../../aho-ui/connect.php");
include("../../../aho-ui/functions.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
    <title>Remove Subscription</title>

    <script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript">
</script>
</head>

<body>
    <div data-role="header" data-theme="b">
        <h1>Remove Subscription</h1>
    </div>

    <div data-role="content">
    
<?php

if($Remove != 1){

?>    
    
        <h4>Are you sure you want to remove this subscription [
        <?php
        
    

$sql = "SELECT * FROM subscription_periods WHERE  id = '$ID'";
$sql_result = mysql_query($sql);
$row = mysql_fetch_array($sql_result);

print "{$row['type']}]?</h4><br>
";


print "<a href='remove_subscription.php?ID={$row['id']}&Remove=1' data-ajax='false' data-mini='true' data-role='button' data-theme='b'>Yes</a><br>";

print "<a href='remove_subscription.php?ID={$row['id']}' data-ajax='false' data-mini='true' data-role='button' data-theme='e'>No</a>";



}else{

mysql_query("DELETE FROM subscription_periods WHERE id = $ID ");

?>

Subscription Removed.

<?php

}

?>

    </div>
</body>
</html>
