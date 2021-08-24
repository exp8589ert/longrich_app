<?php
require 'includes/check.php';
if (isset($_COOKIE['c_user'])) {

	$sessionData = $showDATA->getSessionData($_COOKIE['c_user']);
	if($_COOKIE['c_user'] === $sessionData['session_cookie']) {

		$email = $_SESSION['email'];
		$userStatus = $_SESSION['status'];
		$newSessId = $sessionData['session_id'];
		$loggedIn = $sessionData['session_token'];
		$loggedBool = $_SESSION['logged_in_token'];
		$newCookie = $_SESSION['new_sess_cookie'];

		if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {
			header('location: https://longrichs.com');
		} 
		else {
			$userCred = $showDATA->acc_prof_ref_Table($email);
			$puserCode = $userCred['user_code'];
			$profImg = $userCred['prof_image'];
			$famName = $userCred['family_name'][0];
			$firstName = $userCred['first_name'][0];

			$userData = $showDATA->userAccount($_SESSION['email']);	

				


		}
	}
}


if(isset($_POST['currentPass']) && isset($_POST['newPassword']) && !empty($_POST['newPassword'])) {

	$inputPhNo = $_POST['inputPhNum'];
	$userPhNumber = $userData['phone'];
	$inputPass = $_POST['currentPass'];
	$newPass = $_POST['newPassword'];
	$userPass = $userData['password'];
	$email = $userData['email'];

	if($inputPhNo !== $userPhNumber) {
		echo json_encode(array(
			"type"=>"error",
			"message"=>"<span class=\"error_msg\">Phone number does not match the one in our record.</span>"
					));
	} else {

		if(password_verify($inputPass, $userPass)) {
			$password = password_hash($newPass, PASSWORD_BCRYPT);
			$result = $inputData->updatePassword($password, $email);		

			if($result === null) {
				echo json_encode(array(
					"type"=>"success",
					"message"=>"<span class=\"success_msg\">You have successfully changed your password.<i class=\"far fa-check-circle\"></i> 
					<br /><br /> 
					<a href=\"forum\">
					Forum &nbsp;<i class=\"fas fa-money-check\"></i>
					</a> &nbsp;&nbsp;&nbsp;
					<a href=\"logout.php\">
					Log out &nbsp;<i class=\"fas fa-power-off\"></i>
					</a></span>"
				));
			} else {
				echo json_encode(array(
					"type"=>"error",
					"message"=>"<span class=\"error_msg\">Error!, Operation to change password could not be executed. Please try again.</span>"
					));
			}
		}
		 else {
		 echo json_encode(array(
				"type"=>"error",
				"message"=>"<span class=\"error_msg\">Error! You have entered wrong password, Please try again.</span>"
				));
		}
	}
}






?>