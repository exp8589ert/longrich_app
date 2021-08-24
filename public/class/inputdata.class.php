<?php

class inputdata extends control {


	public function createUser($usergenCode, $fmName, $fsName, $passWord, $email, $regPhone, $address, $packLevel, $docType, $newnamedimg, $bankName, $accNumber, $dateofB, $gender, $state, $city, $hash) {
		$this->registeration($usergenCode, $fmName, $fsName, $passWord, $email, $regPhone, $address, $packLevel, $docType, $newnamedimg, $bankName, $accNumber, $dateofB, $gender, $state, $city, $hash);
	}

	public function upSuspendStatus($revSuspStatus, $uloginatt, $userIDentity, $suspended, $threedaysgone) {
		$this->setSuspendStatus($revSuspStatus, $uloginatt, $userIDentity, $suspended, $threedaysgone);
	}


	public function loginAttempt($loginCounter, $attempterEmail) {
		$this->setloginAttempt($loginCounter, $attempterEmail);
	}

	
	public function updateUserStat($activate, $userCode) {
		$this->updateUserStatus($activate, $userCode);
	}

	public function userGenUpdate($displayName, $upFamName, $upFstName, $updtEmail, $updtDocType, $filepath, $updatAddress, $updtState, $updatCity, $updatuserCode, $userID) {

		$this->genUserUpdate($displayName, $upFamName, $upFstName, $updtEmail, $updtDocType, $filepath, $updatAddress, $updtState, $updatCity, $updatuserCode, $userID);
	}



	public function updtBioNSocial($biography, $facebook, $instagram, $whatsapp, $userID) {
		$this->updtBioNsMediaLinks($biography, $facebook, $instagram, $whatsapp, $userID);
	}

	public function updtShippAdd($shpAddres, $userID) {
		$this->updateShippingAdd($shpAddres, $userID);
	}

	public function updatePassword($password, $email) {
		$this->changePassword($password, $email);
	}

	public function postData($userIDx, $uNewPost, $upfilepath, $uPostCode) {
		$this->ForumPost($userIDx, $uNewPost, $upfilepath, $uPostCode);
	}


	public function updatePost($uEditedPost, $upfilepath, $olduPCode, $userIDx) {
		$this->setUpdatedPost($uEditedPost, $upfilepath, $olduPCode, $userIDx);
	}

	public function deletePost($olduPCode) {
		$this->delPost($olduPCode);
	}

	public function sendPostReport($reporterId, $postOwnerId, $postCode, $reportStatus) {
		$this->insertPostReport($reporterId, $postOwnerId, $postCode, $reportStatus);
	}

	public function sendReplydText($userId, $uReplyNum, $replyText, $replyPsCode) {
		$this->repliedText($userId, $uReplyNum, $replyText, $replyPsCode);
	}

	public function editeReplydText($uEditedReply, $editUserId, $replyNum, $replyCode) {
		$this->editedReply($uEditedReply, $editUserId, $replyNum, $replyCode);
	}

	public function deleteReplydText($userId, $replyNo, $replyCode) {
		$this->deleteReply($userId, $replyNo, $replyCode);
	}



	public function userPostRating($postCode, $userid, $userCode, $ratingAction) {
		$this->postRating($postCode, $userid, $userCode, $ratingAction);
	}

	public function fwAction($forumUserId, $postUcode, $followerId, $followerUC) {
		$this->userFollowAction($forumUserId, $postUcode, $followerId, $followerUC);
	}

	public function unFollowAction($forumUserId, $postUcode, $followerId, $followerUC) {
		$this->userUnFollowAction($forumUserId, $postUcode, $followerId, $followerUC);
	}

	public function deletePostRating($postCode, $userid, $userCode, $ratingAction) {
		$this->delpostRating($postCode, $userid, $userCode, $ratingAction);
	}

	public function readAlert($unreadMsg, $unreadRef, $readStatus, $userID, $refByuc) {
		$this->readNotificaiton($unreadMsg, $unreadRef, $readStatus, $userID, $refByuc);
	}

	public function profileEntry($confmUserId, $defaultProImg, $username, $refURL, $userCode, $address, $sponCode) {
		$this->ProfileInput($confmUserId, $defaultProImg, $username, $refURL, $userCode, $address, $sponCode);
	}
	public function registerRef($confmUserId, $fmName, $fsName, $userProfUrl, $email, $packLevel, $refReadStatus) {
		$this->addReferrals($confmUserId, $fmName, $fsName, $userProfUrl, $email, $packLevel, $refReadStatus);
	}
	public function InputsessUserId($confmUserId) {
		$this->InputsessionUserId($confmUserId);
	}


	public function profileImgUpdate($renamed, $email) {
		$this->profileImg($renamed, $email);
	}

	public function updateRef($refByUserCode, $refByEmail,  $refByUserid, $refByVault, $confmUserId, $refByFamName, $refByFstName, $refRStatus) {
		$this->updateReferrals($refByUserCode, $refByEmail,  $refByUserid, $refByVault, $confmUserId, $refByFamName, $refByFstName, $refRStatus);
	}

	public function updateRefCount($refCount, $refByUserCode) {
		$this->updateReferCount($refCount, $refByUserCode);
	}
	public function UpdateSessionData($sessionID, $sessionToken, $sessCookie, $userID) {
		$this->sessionManager($sessionID, $sessionToken, $sessCookie, $userID);
	}

	public function placeOrder($orderNo, $delivCost, $proId, $proVal, $proQnty, $pAmount, $buyerUserId) {
		$this->insertPlaceOrder($orderNo, $delivCost, $proId, $proVal, $proQnty, $pAmount, $buyerUserId);
	}

	public function setReport($reporteruId, $reporterUc, $offenderId, $offenderUc, $reportState) {
		$this->insetReport($reporteruId, $reporterUc, $offenderId, $offenderUc, $reportState);
	}

	public function registerPayment($regDepName, $regTellerNo, $regPayDate, $regAmtDepos, $transfName, $transfDate, $amountTransf) {
		$this->insertPayDetails($regDepName, $regTellerNo, $regPayDate, $regAmtDepos, $transfName, $transfDate, $amountTransf);
	}



}