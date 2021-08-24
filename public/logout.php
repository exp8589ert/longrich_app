<?php
session_start();
session_unset();
session_destroy();
setcookie('c_user', '', time() - 604800, '/');
setcookie('ref_vault', '', time() - 604800, '/');
header("location: https://longrichs.com/login");
?>
