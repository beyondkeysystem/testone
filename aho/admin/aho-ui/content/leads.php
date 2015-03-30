<style type="text/css">
.sTable th {
   
    border-left: 1px solid #CBCBCB;
    color: #878787;
    font-size: 11px;
    font-weight: normal;
    padding: 3px 8px 2px;
}


.sTable  td {
    border-left: 1px solid #CBCBCB;
    padding: 8px 12px;
    vertical-align: middle;
}
table, th, td
{
border: 1px solid #CBCBCB;
}
.hide{
    display:none;
}
.show{
    display: block;
}
td{text-align: center; vertical-align:middle;}
label{padding:5px;font-weight: bold;}
table a{text-decoration: none;}
th{font-weight:bold;font-size:16px;}
.container{width:95% !important;}
form{width:70% !important;}
form label{text-align: left;}
</style>
<header>
	<center> <h3><br>Leads</h3></center>
</header>

<?php


if(isset($_REQUEST['Remove']) && !empty($_REQUEST["ID"])){
    $sql = "DELETE from AHO_Agent_Leads WHERE ID = '".$_REQUEST["ID"]."'"; 
    $sql_result = mysql_query($sql); 
    header('location:index.php?Page=Leads');
}
if(isset($_REQUEST['LID'])){
    $sql = "SELECT AL.ID AS Lead_ID, AL.Property_ID,AL.Consumer_ID,C.Email_ID as Consumer_Email,C.Request_Type, U.Email_1 as Agent_Email,AL.Agent_ID ,AL.Received_Date FROM AHO_Consumers C,AHO_Agent_Leads AL, AHO_User U where Is_Accepted=1 and C.ID = AL.Consumer_ID and AL.Agent_ID = U.id and C.Agent_ID='".$_REQUEST['LID']."' order by AL.Received_Date desc";    
}else{
    $sql = "SELECT AL.ID AS Lead_ID, AL.Property_ID,AL.Consumer_ID,C.Email_ID as Consumer_Email,C.Request_Type, U.Email_1 as Agent_Email,AL.Agent_ID ,AL.Received_Date FROM AHO_Consumers C,AHO_Agent_Leads AL, AHO_User U where Is_Accepted=1 and C.ID = AL.Consumer_ID and AL.Agent_ID = U.id order by AL.Received_Date desc";
}
$sql_result = mysql_query($sql) or die(mysql_error());
if($sql_result && mysql_num_rows($sql_result))
{
    ?><br><br>
	    <table>
		<tr>
		    <th>S.No.</th>
		    <th>Lead ID</th>
		    <th>Lead Type</th>
		    <th>Consumer Email ID</th>
		    <th>Agent Email ID</th>
		    <!--<th>Property ID</th>-->
		    <th>Consumer ID</th>
		    <th>Agent ID</th>
		    <th>Reg. Date</th>
		    <th>Action</th>
		</tr>
		<?php
		    $i=0;
		    while($row = mysql_fetch_object($sql_result))
		    {
			?>
			    <tr>
				<td><?php echo ++$i;?></td>
				<td><?php echo $row->Lead_ID;?></td>
				<td>
				    <?php
					if($row->Request_Type==1){
					    echo 'Buy';
					}
					elseif($row->Request_Type==2){
					    echo 'Rent';
					}
					elseif($row->Request_Type==3){
					    echo 'Sell';
					}
					
				    ?>
				</td>
				<td><a target="_parent" style="color:#53abe0;" href="mailto:<?php echo $row->Consumer_Email;?>?Subject=Admin%20Feedback%20from%20American%20Homes%20Online"><?php echo $row->Consumer_Email;?></a></td>
				<td><a target="_parent" style="color:#53abe0;" href="mailto:<?php echo $row->Agent_Email;?>?Subject=Admin%20Feedback%20from%20American%20Homes%20Online"><?php echo $row->Agent_Email;?></a></td>
				<!--<td><?php if($row->Property_ID){echo $row->Property_ID;}else{echo "Not Available";}?></td>-->
				<td><?php echo $row->Consumer_ID;?></td>
				<td><?php echo $row->Agent_ID;?></td>
				<td><?php echo date('d-M-Y H:i:s',strtotime($row->Received_Date));?></td>
				<td>
				    <a href="index.php?Page=Leads&Remove=1&ID=<?php echo $row->Lead_ID;?>" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
				</td>
			    </tr>
			<?php
		    }
		?>
	    </table>
    <?php
}
else
{
    echo "<h4><font color='red'>No Record Found</font></h4>";
}
?>

<div style="clear:both"></div>

