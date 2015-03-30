    <?php
    function send_mail($to)
    {
        $fileatt = "files/sample.pdf"; // Path to the file
        $fileatt_type = "application/pdf"; // File Type
        $fileatt_name = "signed_document.pdf"; // Filename that will be used for the file as the attachment
        $email_from = "burt@americanhomesonline.com"; // Who the email is from
        $email_subject = "Your Signed Document"; // The Subject of the email
        $email_message = "Thanks for visiting americanhomesonline.com! Here is your Signed Document.<br>";
        $email_message .= "Thanks for visiting.<br>"; // Message that the email has in it
        $email_to = $to; // Who the email is to
$headers = "From: ".$email_from;
$file = fopen($fileatt,'rb');
$data = fread($file,filesize($fileatt));
fclose($file);
$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
$headers .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .
" boundary=\"{$mime_boundary}\"";
$email_message .= "This is a multi-part message in MIME format.\n\n" .
"--{$mime_boundary}\n" .
"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" .
$email_message .= "\n\n";
$data = chunk_split(base64_encode($data));
$email_message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatt_type};\n" .
" name=\"{$fileatt_name}\"\n" .
//"Content-Disposition: attachment;\n" .
//" filename=\"{$fileatt_name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data .= "\n\n" .
"--{$mime_boundary}--\n";
$ok = @mail($email_to, $email_subject, $email_message, $headers);
if($ok) {
return 1;
} else {
return 0;
} 

    }// send_mail($to) ends
   

    ?> 
    
   
    <a href="send_mail.php?action=send_mail">Send Mail</a>
    <?php
     if(isset($_REQUEST['action']) && $_REQUEST['action']=='send_mail')
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
     }
    ?>
