<?php
// 97,105,138,149
require 'core/database/connect.php';
require 'core/functions/user_functions.php';
include 'includes/overall/header.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $res        =  mysql_query("SELECT * FROM wp_beneficiary WHERE benef_id = '".$_GET['id']."'");
    $r    =  mysql_fetch_array($res);
}
$errors = "";
if (empty($_POST) === false) {
	$required_fields = array('amount', 'fee', 'rate');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
	}
	
	
}

if(empty($errors) && empty($_POST) === false){
    if(!is_numeric($_POST['amount'])){
        $errors[] = 'Amount must be a integer value';
    }
    
     if(!is_numeric($_POST['fee'])){
        $errors[] = 'Fee must be a integer value';
    }
    
     if(!is_numeric($_POST['rate'])){
        $errors[] = 'Rate must be a integer value';
    }
    
}
if(empty($errors) === false) {
    echo output_errors($errors);
}
if(!empty($_POST) && empty($errors)) {
	if(isset($_POST['amount'], $_POST['fee'], $_POST['rate'])) {
		
		
                $register_data = array(
                'benef_id'              => $_GET['id'],
                'amount' 		=> $_POST['amount'],
                'rate'                  => $_POST['rate'],
                'fee'                   => $_POST['fee'],
                'amount_send'           => $_POST['amt'],
                'total' 		=> $_POST['total'],
               
                    
                );

                if(register_order($register_data)){
                    header('Location: beneficiary.php'); // redirect
                }else{
                    header('Location: add_beneficiary.php');
                }
		exit(); 	
		
	}
}
?>
<table border ="1">
        <thead>
                <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Bank</th>
                        <th>Branch</th>
                        <th>Account</th>
                        <th>Created</th>
                        
                </tr>
        </thead>
        <tbody>
                <tr>
                        <td><a href="information.php?id=<?php echo $r['id']?>"> <?php echo escape($r['first_name']); ?></a></td>
                        <td><?php echo escape($r['last_name']); ?></td>
                        <td><?php echo escape($r['bank']); ?></td>
                        <td><?php echo escape($r['branch']); ?></td>
                        <td><?php echo escape($r['account']); ?></td>
                        <td><?php echo escape($r['created']); ?></td>

                </tr>
        </tbody>
</table>
<form action="information.php?id=<?php echo $_GET['id']?>" method="post">
			<ul>
			<li>
				Amount*:<br>
				<input type="text" id="amount" name="amount" value="<?php echo !empty($_POST['amount'])?$_POST['amount']:""?>">
			</li>
			<li>
				Fee*:<br>
				<input type="text" id ="fee"name="fee" value="3.00" readonly="readonly">
			</li>
			<li>
				Amount To Send:<br>
				<input type="text" id="amt" name="amt" readonly="readonly" >
			</li>
			<li>
				rate*:<br>
				<input type="text" id="rate"name="rate" value="3.17" readonly="readonly">
			</li>
			<li>
				Total:<br>
				<input type="text" id="total" name="total" readonly="readonly">
			</li>
			<li>
				<input type="submit" class="submit" value="Confirm Payment">
			</li>
		</ul>
		</form>

<script>
    
    
    
    var floatRegex = /^((\d+(\.\d *)?)|((\d*\.)?\d+))$/;
   /* $("#amount").blur(function(){
        var amount  = $('#amount').val();
        alert(amount);
        if(!floatRegex.test(amount)){
          alert('Amount must be numeric');
          return false;
      }
    });
    $("#fee").blur(function(){
        var fee = $('#fee').val();
        if(!$.isNumeric(fee)){
          alert('Fee must be numeric');
          return false;
      }
    });*/
    
  $("#amount").blur(function(){
      var amount  = $('#amount').val();
      var fee = $('#fee').val();
     if(floatRegex.test(amount) && floatRegex.test(fee)){
      $('#amt').val(amount-fee);
     }else{
          alert('Amount & Fee  must be numeric');
     }
     
  });
 
  $("#amount").blur(function(){
      var rate = $('#rate').val();
      var amt = $('#amt').val();
      if(floatRegex.test(rate)){
          $('#total').val(amt*rate);
      }else{
        alert('Rate  must be numeric');
     }
  });
</script>