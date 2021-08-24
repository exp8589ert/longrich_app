<!DOCTYPE html>
<html>
<head>
    <title>Error page not found</title>
    <link rel="stylesheet" type="text/css" href="style/mini.css" />
</head>
<body>
    
<?php
    $code = $_SERVER['REDIRECT_STATUS'];
    $codes = array(
        403 => 'Forbidden',
        404 => 'Not Found',
        500 => 'Internal Server Error'
    );
    $source_url = 'http'.((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') ? 's' : '').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
        if (array_key_exists($code, $codes) && is_numeric($code)) {
            
          echo '<section class="system-wrapper">
                    <div class="centre-me">
                        Error 404! The page you navigated to does not exist. 
                    </div>
                </section>';
        } 
        else {
            echo 'Error page does not exist';
        }
?>  

</body>
</html>