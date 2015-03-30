<?php
require("twitter/twitteroauth.php");
require 'twitter/twconfig.php';
session_start();

$twitteroauth = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET); // No need to change anything in this line.

$request_token = $twitteroauth->getRequestToken('http://localhost/twitter/getTwitterData.php');
echo '<pre>';print_r($request_token);

$_SESSION['oauth_token'] = '2754904789-wwGuK7VyYyncvV1x7iMv1c4B8ajwwby6tE4CXhe';//$request_token['oauth_token'] // Save value in session variable
$_SESSION['oauth_token_secret'] = "v73hU8iRv2YLTko0EOkWRpR85eSQTPX9QvlRue39IvO6B";//$request_token['oauth_token_secret'];

if ($twitteroauth->http_code == 200) {
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    header('Location: ' . $url);
} else {
    die('ERROR: Some thing goes wrong.');
}
?>
