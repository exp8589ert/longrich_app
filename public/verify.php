<?php 
require 'includes/check.php';
error_reporting(0);

if(isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI'])) {

		$urlStr = htmlspecialchars(stripslashes(strip_tags($_SERVER['REQUEST_URI'])));
		$userCode = substr($urlStr, 18, 14);
		$activate = 1;
        
		$vefresult = $showDATA->acc_activation($userCode, 0);

		if(is_array($vefresult)) {
			$inputData->updateUserStat($activate, $userCode);
			$_SESSION['succmessage'] = '<div class="success_msg">Congratulations!, Your account has successfully been activated. You can now log in to access your account using the log In button.</div>'.'
			<br />
			<br /> 
			<br />
			<a href="https://longrichs.com">
			    <button>Home</button>
			</a>
			<a href="login">
			<button>Log In</button>
			</a>';
			header('location: success');
		} 

		elseif(!is_array($vefresult) && $vefresult === false) {
		    
		    header('location: error');
			
			$_SESSION['errmessage'] = "<div class='error_msg'>Account has already been activated or the URL is invalid.
			<br/> Please login to your account using your already registered details. <br /><br />If you wish to retrieve your user account information, please click on forgot <a href='https://longrichs.com/femail'>email address</a>
			<br />or <a href='https://longrichs.com/fpass'>password</a> 
			on <a href='login'>log In</a> page or See <a href='help'>FAQ</a> 
			on how do I retrieve my email and/or password?
			</span>
			<br /> 
			<br /> 
			<br />
			</div>";
		}
} 


?>