<?php
//setting parameters
$authcode= $_GET["code"];
//$clientid='265653234864.apps.googleusercontent.com';
$clientid='321897038026-6h1h03dd9v9h42nnpg3oohca6hnot09e.apps.googleusercontent.com';
//$clientsecret='KeyHtEq5D-ATKJAyAG-ds6Kr';
$clientsecret='ykuC54u7Yt02tmk5JSQaO-Pu';
$redirecturi='http://localhost/jobportal/mailimport/oauth';
$max_results =1000;
$fields=array(
    'code'=>  urlencode($authcode),
    'client_id'=>  urlencode($clientid),
    'client_secret'=>  urlencode($clientsecret),
    'redirect_uri'=>  urlencode($redirecturi),
    'grant_type'=>  urlencode('authorization_code')
);
//url-ify the data for the POST
$fields_string='';
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
$fields_string=rtrim($fields_string,'&');
//open connection
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL,'https://accounts.google.com/o/oauth2/token');
curl_setopt($ch,CURLOPT_POST,5);
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
// Set so curl_exec returns the result instead of outputting it.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//to trust any ssl certificates
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//execute post
$result = curl_exec($ch);
//echo "<pre>";
//print_r($result);
//close connection
curl_close($ch);
//extracting access_token from response string
$response=  json_decode($result);
$accesstoken= $response->access_token;
if($accesstoken!='')
{
//passing accesstoken to obtain contact details
$xmlresponse=  file_get_contents('https://www.google.com/m8/feeds/contacts/default/full?max-results='.$max_results.'&oauth_token='.$accesstoken);


//reading xml using SimpleXML
$xml=  new SimpleXMLElement($xmlresponse);
$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
//print_r($xml);die("sanj");
$results = array ();
error_reporting(0);
    foreach($xml->entry as $entry){

        $xml = simplexml_load_string($entry->asXML());

        $ary = array ();
	$ary['name'] = (string) $entry->title;

        foreach ($xml->email as $e) {
          $ary['emailAddress'][] = (string) $e['address'];
        }

        if (isset($ary['emailAddress'][0])) {
            $ary['email'] = $ary['emailAddress'][0];
        }

        $results[] = $ary;

    }
//$result = $xml->xpath('//gd:email');


?>
<form action="" id="invite_form" class="center" method="post">
    <table cellpadding="4px" cellspacing="0" width="100%;">
	<tr style="background-color:#D9D9D9;">
		<th style="width:20%;"><input type="checkbox" id="email_all" checked="checked" title="Toggle Selected"/></th>
		<th style="text-align: center; width:40%;">Name</th>
		<th style="text-align: center; width:40%;">Email</th>
	</tr>
	<tr>
	    <td colspan="3" style="width:100%;">
		    <div style="height: 350px; overflow: scroll;">
			<table cellpadding="4px" cellspacing="0" width="100%;"> 
			    <script type="text/javascript">
			    jQuery(document).ready(function()
			    {
					    
				    jQuery("#email_all").click(function()				
				    { 
					    var checked_status = this.checked;
					    jQuery("input[type=checkbox]").each(function()
					    {
						    this.checked = checked_status;
					    });
				    });					
			    });
			    function row_validation()
			    {
				    var chks = document.getElementById('cont_chk_val').value;
				    var hasChecked = false;
				    
				    for (var i = 0; i < chks; i++)
				    {
					    if (document.getElementById(i).checked)
					    {
						    hasChecked = true;
						    break;
					    }
				    }
				    if (hasChecked == false)
				    {
					    alert("Please select at least one.");
					    return false;
				    }
				    return true;
				    
			    }
			    
			    </script>
			    <?php
			    $i = 0;
			    foreach($results as $contact) {?>
			    <tr>
				    <td style="width:20%; text-align: canter;"><input type="checkbox" id="<?php echo $i;?>" name="contacts[<?php echo $contact['email']."***".$contact['name']; ?>]" value="<?php echo $contact['email']."***".$contact['name']; ?>" checked="checked" /></td>
				    <td style="width:40%; text-align: canter; "><?php echo $contact['name']; ?></td>
				    <td style="width:40%; text-align: center; "><?php echo $contact['email']; ?></td>
			    </tr><?php $i++;} ?>
			</table>
		    </div>
		</td>
	    </tr>
	    <tr>
		    <td colspan="3" style="width:100%;">
			    Total : <?php echo $i;?>
		    </td>
	    </tr>
	    <!--<tr>
		    <td>
			    
		    </td>
		    <td colspan="2">
			    <textarea name="msg" cols="60" rows="4"></textarea>
			    <input type="hidden" id="cont_chk_val" name="cont_chk_val" value="<?php //echo $i; ?>"/>
		    </td>
	    </tr>-->
	    <tr>
		    <td colspan="3" style="width:100%;">
			    <input type="submit" name="send_msg" value="Send Mail">	
		    </td>
	    </tr>
    </table>
</form>	
</body></html>
<?php }else{
	echo "<div class='post'><ul><li><a href='https://accounts.google.com/o/oauth2/auth?client_id=321897038026-6h1h03dd9v9h42nnpg3oohca6hnot09e.apps.googleusercontent.com&redirect_uri=http://localhost/ahmad/oauth&scope=https://www.google.com/m8/feeds/&response_type=code'> Get Your Contacts </a></li></ul></div>";
	}
	?>
