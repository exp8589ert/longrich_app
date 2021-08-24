<?php 
declare(strict_types = 1);
define('DIR_NAME', __DIR__ . DIRECTORY_SEPARATOR);
if(!isset($_SESSION)){ session_start(); }
error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(0);
setcookie('presence', 'sdfkf798sd8sa8ef6d57o262bj3', time() + 604800, '/'); 

?><!DOCTYPE html>
<head>
<meta 
http-equiv="Content-Security-Policy" 
content="
script-src 'self' *.longrichs.com 'unsafe-inline' https://code.jquery.com https://ajax.googleapis.com https://assets.pinterest.com http: https: 'report-sample';
img-src 'self' *.longrichs.com data: log.pinterest.com;
connect-src 'self' *.longrichs.com; 
form-action  'self' *.longrichs.com;
worker-src none;
media-src 'self' *.longrichs.com https://www.youtube.com; 
frame-src 'self' *.longrichs.com https://www.youtube.com;
child-src 'self' *.longrichs.com;
style-src 'self' *.longrichs.com 'unsafe-inline' https://use.fontawesome.com https://fonts.googleapis.com;
">
<meta http-equiv="Content-Type" content="text/html" charset= "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="referrer" content="origin">
<meta name=’pageKey’ content=’guest-home’>
<meta http-equiv="refresh" content="2000" />
<meta name="description" content="Longrichs.com - A LIFE TIME BUSINESS
With the most advanced and powerful compensation plan which offers
greater profitability that eliminates the pitfalls and weakness of most marketing systems." >
<meta name="keywords" content="Tootpaste, Mosquito, Mouth Spray, Body Lotion">
<meta name="title" content="Long Rich Easy Affiliate Product | Long Rich">
<link rel="shortcut icon" href="resources/images/favicon.png" type="img/x-icon?" />
<title><?php 
if(basename($_SERVER["PHP_SELF"]) !== 'index.php') {
    echo str_replace("_", " ", basename($_SERVER["PHP_SELF"], ".php"))." - Long rich";
	} 
    else { print "Long Rich Products -Easy affiliate"; }
?></title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Roboto:400,700|Ubuntu:400,700">
<link rel="stylesheet" type="text/css" href="assets/style/metro.css" />
<link rel="stylesheet" type="text/css" href="assets/style/style.css" />

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="assets/script/jquery-3.3.1.min.js"></script>
<script src="assets/script/textarea-resize.js"></script>

<noscript>
    <h2 class="no-script">
        This site requires javascript, please turn on your javascript to have complete access to this website.
    </h2>
    <meta HTTP-EQUIV="refresh" content=0;url="nojsscript">
</noscript>
<script type="text/javascript">

 $(document).ready(function() {
    function logoutTimer() {
        window.location = 'logout';
    }
    setTimeout(logoutTimer, 2500000);
});
</script>
</head>
<body onload="spinnerLoader()">
