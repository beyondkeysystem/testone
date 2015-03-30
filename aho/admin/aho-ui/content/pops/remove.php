<?php
include("../../../aho-ui/connect.php");
include("../../../aho-ui/functions.php");
if(!empty($ID)){
mysql_query("DELETE FROM AHO_User WHERE id = $ID ");
header('location:../../../index.php?Page=Accounts');


}

?>

   
