<?php

class output extends database {

	private $sql = null;
	private $stmt = null;
	

	protected function accprofReferTable($email) {
		# Fetches single rows from account, profile, referral Tables.

		$sql = "SELECT *
				FROM ((account
				INNER JOIN profile ON account.user_id = profile.user_id)
				INNER JOIN referrals ON profile.user_id = referrals.user_id) 
				WHERE `email` = ?";
			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$email]);
				$result = $this->stmt->fetch(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return count($result) == 0 ? false : $result ;
	}

	protected function accountTable($email) {
		# Fetches single rows from account Table only.

		$sql = "SELECT * FROM account WHERE `email` = ?";
			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$email]);
				$result = $this->stmt->fetch(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return !is_array(count($result)) == 0 ? false : $result;
	}


	protected function acc_pro_ref_usercode($userCode) {
		# Fetches single rows from account, profile, referral where usercode = ?.

		$sql = "SELECT *
				FROM ((account
				INNER JOIN profile ON account.user_id = profile.user_id)
				INNER JOIN referrals ON profile.user_id = referrals.user_id) 
				WHERE `user_code` = ?";
			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$userCode]);
				$result = $this->stmt->fetch(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return !is_array(count($result)) == 0 ? false : $result ;
	}
	

	protected function user_activation($userCode, $activeStatus) {
		# Fetches single rows from account for user acccount activation.
 
		$sql = "SELECT * FROM account WHERE `user_code` = ? AND `active` = ?";
			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$userCode, $activeStatus]);
				$result = $this->stmt->fetch(PDO::FETCH_NAMED);
				// return count($result) === 0 ? false : $result;

			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}

			$this->stmt = null;
			return !is_array(count($result)) == 0 ? false : $result;
	}


	protected function acct_forum_profile($sortOrder, $limitNum) {
		# Fetches multiple rows from account, forum, profile Tables (Trends).
		$sql = "SELECT *
				FROM ((account
				INNER JOIN forum ON account.user_id = forum.user_id)
				INNER JOIN profile ON forum.user_id = profile.user_id)
				ORDER BY RAND(), post_date ".$sortOrder." LIMIT ".$limitNum."";
			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute();
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return count($result) == 0 ? false : $result ;
	}



	protected function getReportedPost($postcodex, $reporterId) {
		// Fetches multiple rows from reported_post Tables.
			$sql = "SELECT * FROM ".$this->reported_post." WHERE post_code = ? AND reporter_id = ?";

			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$postcodex, $reporterId]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return !is_array(count($result)) == 0 ? false : $result ;
	}


	protected function getMsgCount($accUsersId, $readStatus) {
		$sql = "SELECT * FROM ".$this->inbox_message." WHERE user_id = ? AND notification = ?";
		$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$accUsersId, $readStatus]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return count($result) == 0 ? false : $result;
	}


	protected function getuserInboxMsg($accUsersId) {
		# Fetches multiple rows from inbox message.
		$sql = "SELECT * FROM ".$this->inbox_message." WHERE user_id = ? ORDER BY date_sent DESC";
			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$accUsersId]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return count($result) == 0 ? false : $result;
	}


	protected function single_postAccFrmprof($uPostCode) {
	// 	# Fetches mult rows from account, forum, profile Tables for one user only (Trends).
		$sql = "SELECT *
				FROM ((account
				INNER JOIN forum ON account.user_id = forum.user_id)
				INNER JOIN profile ON forum.user_id = profile.user_id)
				WHERE post_code = ? ORDER BY post_date DESC";
		$result = [];

			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$uPostCode]);
				$result = $this->stmt->fetch(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return !is_array(count($result)) == 0 ? false : $result;
				// return count($result) == 0 ? false : $result;

	}

	protected function rating_action($postcodex) {
		// Fetches multiple rows from rating_info Tables.
			$sql = "SELECT *, COUNT(*) 
			       FROM rating_info
				   WHERE post_code = ?
				   GROUP BY rating_action ASC";

			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$postcodex]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return !is_array(count($result)) == 0 ? false : $result ;
	}


	protected function forumSearch($search) {
			$result = [];
			try {

			$sql = "SELECT DISTINCT *
			FROM ((account
			INNER JOIN forum ON account.user_id = forum.user_id)
			INNER JOIN profile ON forum.user_id = profile.user_id)
			WHERE post_text LIKE ? 
			OR  family_name LIKE ? 
			OR  first_name LIKE ? 
			OR  post_date LIKE ?";


				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute(["%".$search."%", "%".$search."%", "%".$search."%", "%".$search."%"]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return !is_array(count($result)) == 0 ? false : $result ;
	}



	protected function showFwProfile($dbUserId) {
		$sql = "SELECT *, COUNT(*) FROM followers WHERE user_id = ? GROUP BY follower_id";
			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$dbUserId]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return !is_array(count($result)) == 0 ? false : $result ;
	}



	protected function acct_response_profile($postcodex) {
		// Fetches multiple rows from account, post_response, profile Tables.
		$sql = "SELECT *
				FROM ((account
				INNER JOIN post_response ON account.user_id = post_response.user_id)
				INNER JOIN profile ON post_response.user_id = profile.user_id)
				WHERE `post_code` = ? GROUP BY reply_date DESC";

			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$postcodex]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return count($result) == 0 ? false : $result ;
	}


		protected function post_count($userid) {
		// Fetches multiple rows from forum Tables.

		$sql = "SELECT * FROM forum WHERE user_id = ?";

			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$userid]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return count($result) == 0 ? false : $result ;
	}


	protected function response_count($postcodex) {
		// Fetches multiple rows from post_response Tables.

		$sql = "SELECT * FROM post_response WHERE post_code = ?";

			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$postcodex]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return !is_array(count($result)) == 0 ? false : $result ;
	}

	protected function getRefCount($refByUc, $readStatus) {
		$sql = "SELECT * FROM ".$this->referrals." WHERE `ref_by_user_code` = ? AND `read_status` = ?";
		$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$refByUc, $readStatus]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return count($result) == 0 ? false : $result;
	}

	protected function Fetchall_referrals($userCode) {
		# Fetches mult rows from referral where usercode = ?.

		$sql = "SELECT *
				FROM referrals 
				WHERE `ref_by_user_code` = ?";
			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$userCode]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return count($result) == 0 ? false : $result ;
	}


	protected function retrieveSessions($sessCookie, $sort = null) {
	
		$sql = 'SELECT * FROM `sessions` WHERE `session_cookie` = ?';
		$result = [];
		try {
			$this->stmt = $this->connect()->prepare($sql);
			$this->stmt->execute([$sessCookie]);
			if (is_callable($sort)) {
				while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
					$result = $sort($row);
				}
			} 
			else {
				while ($row = $this->stmt->fetch(PDO::FETCH_NAMED)) {
					$result = $row;
				}
			}
		} catch (Exception $ex) {
			$this->error = $ex;
			return false;
		}	
		$this->stmt = null;
	    return count($result) === 0 ? false : $result;
	}


	protected function selectAll_prods($catName, $pdtId) {
		$sql = "SELECT *
				FROM products 
				WHERE `product_category` = ? OR `product_id` = ? ORDER BY RAND()";
				
		$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$catName, $pdtId]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return count($result) == 0 ? false : $result ;
	}




	protected function acc_prod_ordered($buyer_userid) {
		// Fetches multiple rows from account, product_ordered where buyer's user_id.
		$sql = "SELECT * FROM account
				INNER JOIN products_ordered 
				ON account.user_id = products_ordered.buyer_user_id
				WHERE buyer_user_id = ? ORDER BY `order_date` DESC";

			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$buyer_userid]);
				$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return !is_array(count($result)) == 0 ? false : $result ;


	}


	protected function totalUserProval($refUserId) {
		// Fetches total user product value.
		$sql = "SELECT buyer_user_id, SUM(product_value * quantity), SUM(amount * quantity) FROM products_ordered WHERE buyer_user_id = ?";

			$result = [];
			try {
				$this->stmt = $this->connect()->prepare($sql);
				$this->stmt->execute([$refUserId]);
				$result = $this->stmt->fetch(PDO::FETCH_NAMED);
			} catch (Exception $ex) {
				$this->error = $ex;
				return false;
			}
				$this->stmt = null;
				return $result == '' || $result == null ? false : $result ;
	}

	



	protected function getAllPimages($prodId) {
		$sql = 'SELECT * FROM '.$this->product_images.' WHERE `product_id` = ?';
		$result = [];
		try {
			$this->stmt = $this->connect()->prepare($sql);
			$this->stmt->execute([$prodId]);
			$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
		}
		catch(Exception $ex) {
			$this->error = $ex;
			return false;
		}
		$this->stmt = null;
		return is_array($result) && count($result) == 0 ? false : $result;
	}




	protected function selectReportedusers($dbUserId, $ucodeUserId) {
		$sql = 'SELECT * FROM '.$this->reported_users.' WHERE `reporter_id` = ? AND  `offender_id` = ?';
		$result = [];
		try {
			$this->stmt = $this->connect()->prepare($sql);
			$this->stmt->execute([$dbUserId, $ucodeUserId]);
			$result = $this->stmt->fetch(PDO::FETCH_NAMED);
		}
		catch(Exception $ex) {
			$this->error = $ex;
			return false;
		}
		$this->stmt = null;
		return is_array($result) && count($result) == 0 ? false : $result;

	}


	protected function show_videos() {
		try {
			$sql = "SELECT * FROM ".$this->videos." ORDER BY RAND()";
			$this->stmt = $this->connect()->prepare($sql);
			$this->stmt->execute();
			$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
		}
		catch(Exception $ex) {
			$this->error = $ex;
			return false;
		}
		$this->stmt = null;
		return is_array($result) && count($result) == 0 ? false : $result;
	}

	protected function getGalleryImg() {
		try {
			$sql = "SELECT * FROM ".$this->gallery." ORDER BY RAND()";
			$this->stmt = $this->connect()->prepare($sql);
			$this->stmt->execute();
			$result = $this->stmt->fetchAll(PDO::FETCH_NAMED);
		}
		catch(Exception $ex) {
			$this->error = $ex;
			return false;
		}
		$this->stmt = null;
		return is_array($result) && count($result) == 0 ? false : $result;
	}


	protected function selectRandomMsg() {
		$sql = "SELECT * FROM ".$this->random_message." ORDER BY RAND()";
		$result = [];
		try {
			$this->stmt = $this->connect()->prepare($sql);
			$this->stmt->execute();
			$result = $this->stmt->fetch(PDO::FETCH_NAMED);
		}
		catch(Exception $ex) {
			$this->error = $ex;
			return false;
		}
		$this->sql = null;
		return count($result) == 0 ? false : $result;

	}

	





	protected function showPaymentDetails($depositName, $tellerNo, $paymentDate, $amountDeposit, $transfName, $transfDate, $amountTransf) {
		
		$paid = 1;
		try {
			if(!empty($tellerNo) || $tellerNo != null) {

				$sqlx = "SELECT * FROM ".$this->payment_status." WHERE teller_number = ? AND amount_paid = ? AND depositor_name LIKE ? AND payment_date = ? AND paid = ?";
				$result = [];
				$this->stmt = $this->connect()->prepare($sqlx);
				$this->stmt->execute([$tellerNo, $amountDeposit, "%".$depositName."%", $paymentDate, $paid]);
				$result = $this->stmt->fetch(PDO::FETCH_NAMED);
			}
			else {
				$sqly = "SELECT * FROM ".$this->payment_status." WHERE account_name LIKE ? AND amount_paid = ? AND payment_date = ? AND paid = ?";
				$result = [];
				$this->stmt = $this->connect()->prepare($sqly);
				$this->stmt->execute(["%".$transfName."%", $amountTransf, $transfDate, $paid]);
				$result = $this->stmt->fetch(PDO::FETCH_NAMED);
			}
			
		}
		catch(Exception $ex) {
			$this->error = $ex;
			return false;
		}
		$this->sql = null;

		return count($result) == 0 ? false : $result;
	}



}