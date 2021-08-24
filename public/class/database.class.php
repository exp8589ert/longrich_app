<?php

abstract class database {

		private $DB_host = null;
		private $DB_user = null;
		private $DB_pass = null;
		private $DB_name = null;
		private $DB_charset = null;
		protected $pdo = null;

		protected $account = 'account';
		protected $attenders = 'attenders';
		protected $followers = 'followers';
		protected $forum = 'forum';
		protected $gallery = 'gallery';
		protected $inbox_message = 'inbox_message';
		protected $login_ip_address = 'login_ip_address';
		protected $payment_status = 'payment_status';
		protected $post_response = 'post_response';
		protected $products = 'products';
		protected $products_ordered = 'products_ordered';
		protected $product_images = 'product_images';
		protected $profile = 'profile';
		protected $random_message = 'random_message';
		protected $rating_info = 'rating_info';
		protected $referrals = 'referrals';
		protected $reported_post = 'reported_post';
		protected $reported_users = 'reported_users';
		protected $sessions = 'sessions';
		protected $videos = 'videos';

		protected function connect() {

			$this->DB_host = 'localhost';
			$this->DB_user = 'ddbxsemy';
			$this->DB_pass = 'qb9$2EE7lue_8589PcGenius';
			$this->DB_name = 'ddbxsemy_longrichs';
			$this->DB_charset = 'utf8';

			try {

				$str = "mysql:host=" . $this->DB_host . ";charset=" . $this->DB_charset;
				if($this->DB_name == 'ddbxsemy_longrichs') {
					$str .= ";dbname=" . $this->DB_name;
				}
				$this->pdo = new PDO(
					$str, $this->DB_user, $this->DB_pass, [
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES => false
					]
				);
				return $this->pdo;
			}
			catch(Exception $ex) {
				$this->error = $ex;
				return false;
			}
			
		}

	}
?>