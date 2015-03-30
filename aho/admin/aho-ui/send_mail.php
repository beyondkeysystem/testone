    <?php
    function send_mail($to)
    {
        
        
$from = "burt@americanhomesonline.com";
$subject = "Here is your Signed Document";
$mess = "This is a test message";
$fileatt = "../files/sample.pdf";
$fileatt_type = "application/pdf";
$fileatt_name = "Signed_Document.pdf";
$headers = "From: $from";
$file = fopen($fileatt, "rb");
$data = fread($file, filesize($fileatt));
fclose($file);

$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

// Add the headers for a file attachment
$headers .= "\nMIME-Version: 1.0\r\n" .
          "Content-Type: multipart/mixed;\r\n" .
          " boundary=\"{$mime_boundary}\"";

// Add a multipart boundary above the plain message
$message = "This is a multi-part message in MIME format.\r\n\r\n" .
         "--{$mime_boundary}\r\n" .
         "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n" .
         "Content-Transfer-Encoding: 7bit\r\n\r\n" .
         $mess . "\r\n\r\n";

// Base64 encode the file data
$data = chunk_split(base64_encode($data));

// Add file attachment to the message
$message .= "--{$mime_boundary}\r\n" .
          "Content-Type: {$fileatt_type};\r\n" .
          " name=\"{$fileatt_name}\"\r\n" .
          "Content-Transfer-Encoding: base64\r\n\r\n" .
          $data . "\r\n\r\n" .
          "--{$mime_boundary}--\r\n";
$ok=mail($to, $subject, $message, $headers,'-fburt@americanhomesonline.com');

if($ok) {
return 'mail sent';
} else {
return 'failed';
} 

    }// send_mail($to) ends
   

    ?> 
    
   
    <!--<a href="send_mail.php?action=send_mail">Send Mail</a>-->
    <?php
     /*if(isset($_REQUEST['action']) && $_REQUEST['action']=='send_mail')
     {
        $flag= send_mail('ankit.a@cisinlabs.com');
        if($flag)
        {
            echo 'mail success';
        }
        else
        {
            echo 'mail sending fail';
        }
     }*/
    ?>
