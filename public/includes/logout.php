<?php

if (isset($_COOKIE['c_user'])) {
$sessionData = $showDATA->getSessionData($_COOKIE['c_user']);
if($_COOKIE['c_user'] === $sessionData['session_cookie']) {
		$userid = $_SESSION['userid'];
		$email = $_SESSION['email'];
		$userStatus = $_SESSION['status'];
		$newSessId = $sessionData['session_id'];
		$loggedIn = $sessionData['session_token'];
		$loggedBool = $_SESSION['logged_in_token'];
		$newCookie = $_SESSION['new_sess_cookie'];

		if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {
		} 
		else {
		echo '<a href="..//longrichs.com/logout.php" class="float-logout">&nbsp;Log out</a>';
		}
	}
}
?>