<?php

class control extends database {

private $sql = null;
private $stmt = null;
private $error = null;


protected function registeration($usergenCode, $fmName, $fsName, $passWord, $email, $regPhone, $address, $packLevel, $docType, $newnamedimg, $bankName, $accNumber, $dateofB, $gender, $state, $city, $hash) {

	try {
		$sql = "INSERT INTO ".$this->account." (user_code, family_name, first_name, password, email, phone, address, package, doc_type, doc_image, bank_name, acc_number, date_of_brth, gender, state, city, hash) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$this->stmt = $this->connect()->prepare($sql);
		$this->stmt->execute([$usergenCode, $fmName, $fsName, $passWord, $email, $regPhone, $address, $packLevel, $docType, $newnamedimg, $bankName, $accNumber, $dateofB, $gender, $state, $city, $hash]);
	}
	catch(Exception $ex) {
		$this->error = $ex;
		return false;
	}
	$this->sql = null;
	return true;
}



protected function setSuspendStatus($revSuspStatus, $uloginatt, $userIDentity, $suspended, $threedaysgone) {
	try {
	// Update suspended status on login ...
	if($threedaysgone == true && $suspended == 1) {
		$ustDate = time();
		$sql = "UPDATE ". $this->account ." SET suspended = ?, date_suspended = ? WHERE user_id = ?";
		$this->stmt = $this->connect()->prepare($sql);
		$this->stmt->execute([$revSuspStatus, $ustDate, $userIDentity]);
	}
	
	if($uloginatt > 2) {
			$timezone = date_default_timezone_set('Africa/Lagos');
			$tDate = time();
			$setuloginatt = 0;
			$suspendTrue = 1;
			$sqlx = "UPDATE ". $this->account." SET login_attempt = ?, suspended = ?, date_suspended = ? WHERE user_id  = ?";
			$this->stmt = $this->connect()->prepare($sqlx);
			$this->stmt->execute([$setuloginatt, $suspendTrue, $tDate, $userIDentity]);

		}
	}
	catch(Exception $ex) {
	$this->error = $ex;
	return false;
	}
	$this->stmt = null;
	return true;	
}



protected function setloginAttempt($loginCounter, $attempterEmail) {
	try {
	$sql = "UPDATE ". $this->account ." SET login_attempt = ? WHERE email = ?";

	$this->stmt = $this->connect()->prepare($sql);
	$this->stmt->execute([$loginCounter, $attempterEmail]);
	}
	catch(Exception $ex) {
	$this->error = $ex;
	return false;
	}
	$this->stmt = null;
	return true;	
}


protected function changePassword($password, $email) {

try {
$sql = "UPDATE ". $this->account ." SET password = ? WHERE email = ?";

$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$password, $email]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->stmt = null;
return true;	
}

protected function updateUserStatus($activate, $userCode) {

try {
$sql = "UPDATE ". $this->account ." SET active = ? WHERE user_code = ?";

$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$activate, $userCode]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->stmt = null;
return true;	
}



protected function genUserUpdate($displayName, $upFamName, $upFstName, $updtEmail, $updtDocType, $filepath, $updatAddress, $updtState, $updatCity, $updatuserCode, $userID) {

try {
$sql = "UPDATE ". $this->account ." SET display_name = ?, family_name = ?, first_name = ?, email = ?, doc_type = ?, doc_image = ?, address = ?, state = ?, city = ?  WHERE user_code = ?";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$displayName, $upFamName, $upFstName, $updtEmail, $updtDocType, $filepath, $updatAddress, $updtState, $updatCity, $updatuserCode]);

$sqly = "UPDATE ". $this->referrals ." SET user_email = ? WHERE user_id = ?";
$this->stmt = $this->connect()->prepare($sqly);
$this->stmt->execute([$updtEmail, $userID]);

}
catch(Exception $ex) {
$this->error = $ex;
return false;
}	
$this->stmt = null;
return true;

}


protected function updtBioNsMediaLinks($biography, $facebook, $instagram, $whatsapp, $userID) {
try {
$sql = "UPDATE ". $this->profile ." SET prof_biography = ?,  facebook_link = ?, instagram_link = ?, whatsapp_link = ? WHERE user_id = ?";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$biography, $facebook, $instagram, $whatsapp, $userID]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}	
$this->stmt = null;
return true;
}


protected function updateShippingAdd($shpAddres, $userID) {
try {
$sql = "UPDATE ". $this->profile ." SET shipping_address = ? WHERE user_id = ?";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$shpAddres, $userID]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->stmt = null;
return true;			
}


protected function ForumPost($userIDx, $uNewPost, $upfilepath = null, $uPostCode) {
try {

$sql = "INSERT INTO ". $this->forum ." (user_id, post_text, post_image, post_code) VALUES(?, ?, ?, ?)";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$userIDx, $uNewPost, $upfilepath, $uPostCode]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}


protected function setUpdatedPost($uEditedPost, $upfilepath, $olduPCode, $userIDx) {
try {

$sql = "UPDATE ". $this->forum ." SET post_text = ?, post_image = ? WHERE post_code = ? AND user_id = ?";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$uEditedPost, $upfilepath, $olduPCode, $userIDx]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}



protected function delPost($olduPCode) {
try {

$sqlx = "DELETE FROM ". $this->forum." WHERE post_code = ?";
$this->stmt = $this->connect()->prepare($sqlx);
$this->stmt->execute([$olduPCode]);

$sqly = "DELETE FROM ". $this->post_response." WHERE post_code = ?";
$this->stmt = $this->connect()->prepare($sqly);
$this->stmt->execute([$olduPCode]);

$sqlz = "DELETE FROM ". $this->rating_info." WHERE post_code = ?";
$this->stmt = $this->connect()->prepare($sqlz);
$this->stmt->execute([$olduPCode]);

}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sqlx = null;
$this->sqly = null;
$this->sqlz = null;
return true;
}



protected function insertPostReport($reporterId, $postOwnerId, $postCode, $reportStatus) {
try {

if($reportStatus == '1') {
$sqlx = "INSERT INTO ".$this->reported_post." (reporter_id, post_code, post_owner_id, report_status) VALUES(?, ?, ?, ?)";
$this->stmt = $this->connect()->prepare($sqlx);
$this->stmt->execute([$reporterId, $postCode, $postOwnerId, $reportStatus]);
}
else {
$sqly = "DELETE FROM ".$this->reported_post." WHERE reporter_id = ? AND post_code = ?";
$this->stmt = $this->connect()->prepare($sqly);
$this->stmt->execute([$reporterId, $postCode]);
}

}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}



protected function repliedText($userId, $uReplyNum, $replyText, $replyPsCode) {
try {
$sql = "INSERT INTO ".$this->post_response." (user_id, reply_no, reply_text, post_code) VALUES (?, ?, ?, ?)";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$userId, $uReplyNum, $replyText, $replyPsCode]);

}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}


protected function editedReply($uEditedReply, $editUserId, $replyNum, $replyCode) {
try {
$sql = "UPDATE ".$this->post_response." SET reply_text = ? WHERE user_id = ? AND reply_no = ? AND post_code = ? ";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$uEditedReply, $editUserId, $replyNum, $replyCode]);

}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}



protected function deleteReply($userId, $replyNo, $replyCode) {
try {
$sql = "DELETE FROM ". $this->post_response." WHERE user_id = ? AND reply_no = ? AND post_code = ?";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$userId, $replyNo, $replyCode]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}

protected function postRating($postCode, $userid, $userCode, $ratingAction) {
try {

$sql = "INSERT INTO ". $this->rating_info ." (post_code, user_id, user_code, rating_action) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE rating_action = VALUES(rating_action)";

$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$postCode, $userid, $userCode, $ratingAction]);
return $this->stmt->lastInsertId();
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}


protected function delpostRating($postCode, $userid, $userCode, $ratingAction) {
try {
$sql = "DELETE FROM ". $this->rating_info ." WHERE post_code = ? AND user_id = ? AND user_code = ? AND rating_action != ?";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$postCode, $userid, $userCode, $ratingAction]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}


protected function userFollowAction($forumUserId, $postUcode, $followerId, $followerUC) {
try {
$sql = "INSERT INTO ". $this->followers ." (user_id, user_code, follower_id, follower_uc) VALUES (?, ?, ?, ?)";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$forumUserId, $postUcode, $followerId, $followerUC]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}

protected function userUnFollowAction($forumUserId, $postUcode, $followerId, $followerUC) {
try {
$sql = "DELETE FROM ". $this->followers ." WHERE user_id = ? AND user_code = ? AND follower_id = ? AND follower_uc = ?";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$forumUserId, $postUcode, $followerId, $followerUC]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}




protected function readNotificaiton($unreadMsg, $unreadRef, $readStatus, $userID, $refByuc) {
try {
	if($unreadMsg == 'unreadmsg') {
		$sql = "UPDATE ". $this->inbox_message." SET notification = ? WHERE user_id = ?";
		$this->stmt = $this->connect()->prepare($sql);
		$this->stmt->execute([$readStatus, $userID]);
	}
	if($unreadRef == 'unreadref') {
		$sql = "UPDATE ".$this->referrals." SET read_status = ? WHERE ref_by_user_code = ?";
		$this->stmt = $this->connect()->prepare($sql);
		$this->stmt->execute([$readStatus, $refByuc]);
	}
}
catch(Exception $ex) {
	$this->error = $ex;
	return false;
}
	$this->sql = null;
	return true;
}


protected function ProfileInput($confmUserId, $defaultProImg, $username, $refURL, $userCode, $address, $sponCode) {
try {
$sql = "INSERT INTO ". $this->profile ." (user_id, prof_image, user_name, referral_url, referral_vault, shipping_address, sponsor_code) VALUES (?, ?, ?, ?, ?, ?, ?)";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$confmUserId, $defaultProImg, $username, $refURL, $userCode, $address, $sponCode]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->sql = null;
return true;
}

protected function profileImg($renamed, $email) {
try {
$sql = "UPDATE ". $this->profile ." SET prof_image = ? WHERE user_id = ?";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$renamed, $email]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->stmt = null;
return true;			
}


protected function addReferrals($confmUserId, $fmName, $fsName, $userProfUrl, $email, $packLevel, $refReadStatus) {
try {

$sql = "INSERT INTO ". $this->referrals ." (user_id, family_name, first_name, user_prof_url, user_email, user_reg_amount, read_status) VALUES (?, ?, ?, ?, ?, ?, ?)";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$confmUserId, $fmName, $fsName, $userProfUrl, $email, $packLevel, $refReadStatus]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}	
$this->stmt = null;
return true;
}



protected function updateReferrals($refByUserCode, $refByEmail,  $refByUserid, $refByVault, $confmUserId, $refByFamName, $refByFstName, $refRStatus) {

try {

$sql = "UPDATE ". $this->referrals ." SET ref_by_user_code = ?, ref_by_email = ?, ref_by_userid = ?, ref_by_vault = ?, read_status = ? WHERE user_id = ?";

if($refByUserCode != '') {
	$msgSubj = "New referral notification";
	$textMsg = "Congratulation! ".$refByFamName[0]." ".$refByFstName[0]." a new referral has registered using your referral link. please switch over to the referral tab to see your new referral.";
	$notific = "0";

	$sqlx = "INSERT INTO ".$this->inbox_message."(user_id, user_email, message_subject, text_message, notification) VALUES(?, ?, ?, ?, ?)";
	$this->stmtx = $this->connect()->prepare($sqlx);
	$this->stmtx->execute([$refByUserid, $refByEmail, $msgSubj, $textMsg, $notific]);
}

$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$refByUserCode, $refByEmail,  $refByUserid, $refByVault, $refRStatus, $confmUserId]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}	
$this->stmt = null;
return true;

}

protected function updateReferCount($refCount, $refByUserCode) {
try {
$sql = "UPDATE ". $this->account ." SET referral_count = ? WHERE user_code = ?";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$refCount, $refByUserCode]);
} 
catch(Exception $ex) {
$this->error = $ex;
return false;
}
return true;
}


protected function InputsessionUserId($confmUserId) {
try {
$sql = "INSERT INTO ". $this->sessions ." (user_id) VALUES (?)";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$confmUserId]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->stmt = null;
return true;
}



protected function sessionManager($sessionID, $sessionToken, $sessCookie, $userID) {
try {
$sql = "UPDATE ". $this->sessions . " SET session_id = ?, session_token = ?, session_cookie = ? WHERE user_id = ?";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$sessionID, $sessionToken, $sessCookie, $userID]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}	
$this->stmt = null;
return true;
}



protected function insertPlaceOrder($orderNo, $delivCost, $proId, $proVal, $proQnty, $pAmount, $buyerUserId) {
try {
$sql = "INSERT INTO ". $this->products_ordered ." (order_number, delivery_cost, product_id, product_value, quantity, amount, buyer_user_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
$this->stmt = $this->connect()->prepare($sql);
$this->stmt->execute([$orderNo, $delivCost, $proId, $proVal, $proQnty, $pAmount, $buyerUserId]);
}
catch(Exception $ex) {
$this->error = $ex;
return false;
}
$this->stmt = null;
return true;
}



protected function insetReport($reporteruId, $reporterUc, $offenderId, $offenderUc, $reportState) {

	try {
		if($reportState == '1') {
			$sql = "INSERT INTO ". $this->reported_users ." (reporter_id, reporter_uc, offender_id, offender_uc) VALUES (?, ?, ?, ?)";
			$this->stmt = $this->connect()->prepare($sql);
			$this->stmt->execute([$reporteruId, $reporterUc, $offenderId, $offenderUc]);
		}
		else {
			$sql = "DELETE FROM ". $this->reported_users ." WHERE reporter_id = ? AND offender_id = ?";
			$this->stmt = $this->connect()->prepare($sql);
			$this->stmt->execute([$reporteruId, $offenderId]);
		}
	}
	catch(Exception $ex) {
	$this->error = $ex;
	return false;
	}
	$this->stmt = null;
	return true;
}


protected function insertPayDetails($regDepName, $regTellerNo, $regPayDate, $regAmtDepos, $transfName, $transfDate, $amountTransf) {

	try {
		if($regTellerNo !== null || !empty($regTellerNo)) {
			$sqlx = "INSERT INTO ". $this->payment_status ." (depositor_name, teller_number, amount_paid, payment_date) VALUES (?, ?, ?, ?)";
			$this->stmt = $this->connect()->prepare($sqlx);
			$this->stmt->execute([$regDepName, $regTellerNo, $regAmtDepos, $regPayDate]);
			$this->stmt = null;
			return true;
		}
		else {
			$sqly = "INSERT INTO ". $this->payment_status ." (account_name, payment_date, amount_paid) VALUES (?, ?, ?)";
			$this->stmt = $this->connect()->prepare($sqly);
			$this->stmt->execute([$transfName, $transfDate, $amountTransf]);
			$this->stmt = null;
			return true;
		}
	}
	catch(Exception $ex) {
	$this->error = $ex;
	return false;
	}
	// $this->stmt = null;
	// return true;
}



}