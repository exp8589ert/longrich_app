<?php
require 'class/textlocal.class.php';

class oTpcontroller {

		private $error = null;
		public function __construct() {
			return $this->callNumVFunc();
		}
		protected function callNumVFunc() {
			switch($_POST['action']) {
				case 'send_token':
					$phoneNumber = filter_var(strip_tags($_POST['phone_number']), FILTER_SANITIZE_SPECIAL_CHARS);
					$apiKey = urlencode('K2wF4YxLEC4-nyRiWesCWcJddIYqf84VIOLQRbxe1V');
					$textlocal = new Textlocal(false, false, $apiKey);
					$number = array($phoneNumber);
					$sender = 'longrich Alpha team';
					$token = mt_rand(100000, 999999);
					$_SESSION['session_token'] = $token;
					$message = "Your token is ". $token;
					try {
						$textlocal->sendSms($number, $message, $sender, $sched=null, $test=false, $receiptURL=null, $custom=null, $optouts=false, $simpleReplyService=false);
						require_once 'oTpform.php';
						exit();
					}
					catch(Exception $err) {
						$this->error = $err->getMessage();
					}
				break;
				case 'verify_token':
					$token = filter_var(strip_tags($_POST['token_number']), FILTER_SANITIZE_SPECIAL_CHARS);
					if($token == $_SESSION['session_token']) {
						unset($_SESSION['session_token']);
						echo json_encode(array("type"=>"bug_msg", "message"=>"<span class=\"success_msg\">Your mobile number has been verified.</span>"));
					} else {
						echo json_encode(array("type"=>"bug_msg", "message"=>"<span class=\"error_msg\">Mobile number does not match.</span>"));
					}
				break; 
			}
		}
	}
	
$controller = new oTpcontroller();
$randxStr = mt_rand(10000, 50000);
if(!isset($_GET[$randxStr]) && empty($_GET[$randxStr])) {
	header('location: http://localhost:81/longrichs.com');
}
?>