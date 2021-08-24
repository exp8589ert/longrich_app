<?php
	require 'includes/check.php';
	if(isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI'])) {
		$urlStr = htmlspecialchars(stripslashes(strip_tags($_SERVER['REQUEST_URI'])));
		$refCode = substr($urlStr, 26, 14);
		setcookie('ref_vault', $refCode, time() + 604800, '/'); 
		header('location: https://longrichs.com');
	}
	else {
		$_SESSION['refCode'] = 'No referral';
	}
?>
