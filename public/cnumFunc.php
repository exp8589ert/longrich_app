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
		}
	}
	else {
		header('location: https://longrichs.com/login');
	}
}
else {
		header('location: https://longrichs.com/login');
}


$userData = $showDATA->userAccount($_SESSION['email']);	
			$userID = $userData['user_id'];
			$udocType = $userData['doc_type'];

if(isset($_POST['upFamName']) && !empty($_POST['upFamName'])) {


	$biography = $_SESSION['biography'] = filter_var(strip_tags($_POST['biography']), FILTER_SANITIZE_SPECIAL_CHARS);
	$instagram = $_SESSION['instagram'] = filter_var(strip_tags($_POST['updatInstg']), FILTER_SANITIZE_SPECIAL_CHARS);
	$facebook = $_SESSION['facebook'] = filter_var(strip_tags($_POST['updatfaceBk']), FILTER_SANITIZE_SPECIAL_CHARS);
	$whatsapp = $_SESSION['whatsapp'] = filter_var(strip_tags($_POST['updatwhatapp']), FILTER_SANITIZE_SPECIAL_CHARS);
	$displayName = $_SESSION['displayName'] = filter_var(strip_tags($_POST['displayName']), FILTER_SANITIZE_SPECIAL_CHARS);
	$upFamName = $_SESSION['upFamName'] = filter_var(strip_tags($_POST['upFamName']), FILTER_SANITIZE_SPECIAL_CHARS);
	$upFstName = $_SESSION['upFstName'] = filter_var(strip_tags($_POST['upFstName']), FILTER_SANITIZE_SPECIAL_CHARS);
	$updtEmail = $_SESSION['updtEmail'] = filter_var(strip_tags($_POST['updtEmail']), FILTER_SANITIZE_SPECIAL_CHARS);
	$updtDocType = $_SESSION['updtDocType'] = filter_var($_POST['upgoveDocTyp'], FILTER_SANITIZE_SPECIAL_CHARS);

	$imageData = isset($_POST['updatdocImg'])? $_SESSION['imageData'] = $_POST['updatdocImg'] : $_SESSION['imageData'] = null;

	$updatAddress = $_SESSION['updatAddress'] = filter_var(strip_tags($_POST['upshippAddr']), FILTER_SANITIZE_SPECIAL_CHARS);
	$updtState = $_SESSION['updtState'] = filter_var(strip_tags($_POST['updaState']), FILTER_SANITIZE_SPECIAL_CHARS);
	$updatCity = $_SESSION['updatCity'] = filter_var(strip_tags($_POST['updatCity']), FILTER_SANITIZE_SPECIAL_CHARS);
	$updatuserCode = $_SESSION['updatuserCode'] = $userData['user_code'];
	$oldimage = $_SESSION['oldimage'] = $userData['doc_image'];
	$userPhNumber = decFunc($userData['phone'], $enckey);
}

	$biography = $_SESSION['biography'];
	$instagram = $_SESSION['instagram'];
	$facebook = $_SESSION['facebook'];
	$whatsapp = $_SESSION['whatsapp'];
	$displayName = $_SESSION['displayName'];
	$upFamName = $_SESSION['upFamName'];
	$upFstName = $_SESSION['upFstName'];
	$updtEmail = $_SESSION['updtEmail'];
	$updtDocType = $_SESSION['updtDocType'];
	$updatAddress = $_SESSION['updatAddress'];
	$updtState = $_SESSION['updtState'];
	$updatCity = $_SESSION['updatCity'];
	$updatuserCode = $_SESSION['updatuserCode'];
	$imageData = $_SESSION['imageData'];
	$oldimage = $_SESSION['oldimage'];

if(isset($_POST['confButton'])) {

	$updtDocSize = (int )(strlen(base64_decode($imageData)));
	$imgRandName = genhash(5);
	$filepath = $oldimage;

	if($updtDocSize < 5000000) {
		$pos  = strpos($imageData, ';');
		$extPart = explode('/', substr($imageData, 0, $pos));
		$docExtens = isset($extPart[1])? $extPart[1] : null;
		$extens = ['jpg', 'jpe', 
		'jpeg', 'jfif', 
		'png', 'bmp', 
		'dib', 'gif' ];

		if(in_array($docExtens, $extens)) {
		$imgNewName = $imgRandName . '.' . $docExtens;
		$filepath = "resources/images/govdoc/".$imgNewName;
		function insertImg($imgRandName, $filepath, $docExtens, $imageData, $oldimage) {

		$fileP = fopen($filepath, 'wb');
		$imgContParts = explode(',', $imageData);
		$imgdataPart = isset($imgContParts)? $imgContParts[1] : null;
		fwrite($fileP, base64_decode($imgdataPart));
		fclose($fileP);
		$oldImg = 'resources/images/govdoc/'.basename($oldimage);
		if(is_file($oldImg)) {
			unlink($oldImg);
		} 
			return true;
		}
		insertImg($imgRandName, $filepath, $docExtens, $imageData, $oldimage); 
		} 
		else { 
			$upError = '<div><i class="fas fa-exclamation-triangle"></i>&nbsp; Image type not supported. Please upload a jpg, jpe, jpeg, png, bmp, or gif file type.</div>'; 
		}
	}
	else {
		$upError = '<div><i class="fas fa-exclamation-triangle"></i> &nbsp; Image size is larger than 5 MB. Maximum required image size is 5 MB.</div>';
	}


	$GenUserUpdate = $inputData->userGenUpdate($displayName, $upFamName, $upFstName, $updtEmail, $updtDocType, $filepath, encFunc($updatAddress, $enckey), encFunc($updtState, $enckey), encFunc($updatCity, $enckey), $updatuserCode, $userID);

	$bioUpdtNSocial = $inputData->updtBioNSocial($biography, $facebook, $instagram, $whatsapp, $userID);

	if($GenUserUpdate === null && $bioUpdtNSocial === null) {
	echo '<span class="success_msg exception account-update">Account update was successful.<i class="far fa-check-circle"></i></span>';
	} else {
	echo '<span class="error_msg exception account-update">Error! <i class="fas fa-exclamation-triangle"></i> Update failed. Please try again.</span>';
	}
}


if(isset($_POST['textareaVal']) && isset($_POST['editBtnValue'])) {
		$shpAddres = filter_var(strip_tags($_POST['textareaVal']), FILTER_SANITIZE_SPECIAL_CHARS);
		$shpUpResult = $inputData->updtShippAdd(encFunc($shpAddres, $enckey), $userID);
		if($shpUpResult === null) {
			echo '<div class="success_msg"> Shipping address updated successfully &nbsp! </div>';
		} else {
			echo '<div class="error_msg">Error! &nbsp;Shipping address could not be updated. Please try again.</div>';
		}
}


if(isset($_POST['sendStatusp']) && $_POST['sendStatusp'] == 'postStatus') {

	$userID = (empty($_POST['msgUserId']))? '' : filter_var(strip_tags($_POST['msgUserId']), FILTER_SANITIZE_SPECIAL_CHARS);
	$refByuc = (empty($_POST['refByuc']))? '' : filter_var(strip_tags($_POST['refByuc']), FILTER_SANITIZE_SPECIAL_CHARS);
	$unreadMsg = (empty($_POST['unreadMsg']))? '' : filter_var(strip_tags($_POST['unreadMsg']), FILTER_SANITIZE_SPECIAL_CHARS);
	$unreadRef = (empty($_POST['unreadRef']))? '' : filter_var(strip_tags($_POST['unreadRef']), FILTER_SANITIZE_SPECIAL_CHARS);
	$readStatus = filter_var(strip_tags($_POST['readStatus']), FILTER_SANITIZE_SPECIAL_CHARS);
	
	$inputData->readAlert($unreadMsg, $unreadRef, $readStatus, $userID, $refByuc);
}

if(isset($_POST['reportCond']) && $_POST['reportCond'] == "setReport") {
	
	$reporteruId = filter_var(strip_tags($_POST['reporteruId']), FILTER_SANITIZE_SPECIAL_CHARS);
	$reporterUc = filter_var(strip_tags($_POST['reporteruUc']), FILTER_SANITIZE_SPECIAL_CHARS);
	$offenderId = filter_var(strip_tags($_POST['offenderuId']), FILTER_SANITIZE_SPECIAL_CHARS);
	$offenderUc = filter_var(strip_tags($_POST['offenderUuc']), FILTER_SANITIZE_SPECIAL_CHARS);
	$reportState = filter_var(strip_tags($_POST['reportState']), FILTER_SANITIZE_SPECIAL_CHARS);
		
	$inputData->setReport($reporteruId, $reporterUc, $offenderId, $offenderUc, $reportState);
}


if(isset($_POST['postReportsta']) && $_POST['postReportsta'] == 'reportPost') {

		$reporterId = filter_var(strip_tags($_POST['reporterId']), FILTER_SANITIZE_SPECIAL_CHARS);
		$postOwnerId = filter_var(strip_tags($_POST['postOwnerId']), FILTER_SANITIZE_SPECIAL_CHARS);
		$postCode = filter_var(strip_tags($_POST['postCode']), FILTER_SANITIZE_SPECIAL_CHARS);
		$reportStatus = filter_var(strip_tags($_POST['reportStatus']), FILTER_SANITIZE_SPECIAL_CHARS);
		$inputData->sendPostReport($reporterId, $postOwnerId, $postCode, $reportStatus);
}


?>