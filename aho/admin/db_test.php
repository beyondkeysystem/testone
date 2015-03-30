<?php
require_once('includes/Database.php');
$db->insert("INSERT INTO widget_pay (trans_id, user_id, sub_id, payer_id, amount, pay_time) VALUES ('1', 1, '1', '1', 24, '" . time() . "')");
echo "INSERT INTO widget_pay (trans_id, user_id, sub_id, payer_id, amount, pay_time) VALUES ('1', 1, '1', '1', 24, '" . time() . "')";
//print_r($db->select("SELECT * FROM AHO_User"));