<?php


class showdata extends output {
	

		public function acc_prof_ref_Table($email) {
			return $this->accprofReferTable($email);
		}

		public function userAccount($email) {
			return $this->accountTable($email);
		}

		public function acc_prof_ref_usercode($userCode) {
			return $this->acc_pro_ref_usercode($userCode);
		}

		public function acc_activation($userCode, $activeStatus) {
			return $this->user_activation($userCode, $activeStatus);
		}

		public function account_forum_profile($sortOrder, $limitNum) {
			return $this->acct_forum_profile($sortOrder, $limitNum);
		}

		public function showReportedPost($postcodex, $reporterId) {
			return $this->getReportedPost($postcodex, $reporterId);
		}

		public function unreadMsgCount($accUsersId, $readStatus) {
			return $this->getMsgCount($accUsersId, $readStatus);
		}

		public function getInboxMsg($accUsersId) {
			return $this->getuserInboxMsg($accUsersId);
		}

		public function sPostAccFrmprof($uPostCode) {
			return $this->single_postAccFrmprof($uPostCode);
		}

		public function post_rating_info($postcodex) {
			return $this->rating_action($postcodex);
		}

		public function forumUserSearch($search) {
			return $this->forumSearch($search);
		}

		public function followersProfile($dbUserId) {
			return $this->showFwProfile($dbUserId);
		}

		public function acct_reply_profile($postcodex) {
			return $this->acct_response_profile($postcodex);
		}


		public function postCount($userid) {
			return $this->post_count($userid);
		}

		public function reply_count($postcodex) {
			return $this->response_count($postcodex);
		}

		public function selectPrd($catName, $pdtId) {
			return $this->selectAll_prods($catName, $pdtId);
		}

		public function acc_prod_ppurc($buyer_userid) {
			return $this->acc_prod_ordered($buyer_userid);
		}

		public function totalUserPv($refUserId) {
			return $this->totalUserProval($refUserId);
		}

		public function unreadRefCount($refByUc, $readStatus) {
			return $this->getRefCount($refByUc, $readStatus);
		}

		public function FA_ref_userc($userCode) {
			return $this->Fetchall_referrals($userCode);
		}

		public function getSessionData($sessCookie) {
			return $this->retrieveSessions($sessCookie);
		}


		public function getPimages($prodId) {
			return $this->getAllPimages($prodId);
		}

		public function getReportedusers($dbUserId, $ucodeUserId) {
			return $this->selectReportedusers($dbUserId, $ucodeUserId);
		}

		public function get_videos() {
			return $this->show_videos();
		}

		public function showGallery() {
			return $this->getGalleryImg();
		}

		public function showRandomMsg() {
			return $this->selectRandomMsg();
		}

		public function checkPaymentDetails($depositName, $tellerNo, $paymentDate, $amountDeposit, $transfName, $transfDate, $amountTransf) {
			return $this->showPaymentDetails($depositName, $tellerNo, $paymentDate, $amountDeposit, $transfName, $transfDate, $amountTransf);
		}

}