<?php
session_start();
$_SESSION = array();

include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();

?>
<!DOCTYPE html>
<html>
<head>

    
<pre>
<?php
print_r($_SESSION['captcha']);
?>

    
    <p>
    	<?php
    	echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
    	
    	?>
    </p>
    

</body>
</html>