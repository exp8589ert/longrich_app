<?php 
// error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);
if(!isset($_SESSION)) { session_start(); }

require 'autoloader.inc.php';
$showDATA = new showdata();
$inputData = new inputdata();



$phoneRegExp = '/^\d{11}$/';
$accNoRegExp = '/^\d{10}$/';
$wrongAddress = '/^[a-zA-Z0-9\s,.\'-]{3,}$/'; 
$passRegExp = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/';
$emailRegExp = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
$_SESSION['x0'] = 'Error!, Please fill in all required fields.';
$_SESSION['x1'] = 'Family name cannot be empty.';
$_SESSION['x2'] = 'First name cannot be empty.';
$_SESSION['x3'] = 'Your names must be a minimum 2 charachters.';
$_SESSION['x4'] = 'Error!, Password field is required.';	
$_SESSION['x5'] = 'Password must be minimum of 8 charachters.';
$_SESSION['x6'] = 'Password entered is weak. <br />Must contain at least 1 uppercase letter, 
<br />1 lowercase letter, 1 number and at least 8 Characters.';
$_SESSION['x7'] = 'Email address is required.';
$_SESSION['x8'] = 'Please enter a valid email address.';
$_SESSION['x9'] = 'Please enter a valid Nigerian Mobile phone number.';
$_SESSION['x10'] = 'Error!, address field is required.';
$_SESSION['x11'] = 'Please enter a valid residence address.';
$_SESSION['x12'] = 'Please enter your correct sponsor code.';
$_SESSION['x13'] = 'Please choose an entry level.';
$_SESSION['x14'] = 'Select a verification document type.';
$_SESSION['x15'] = 'Please upload your selected document type.';
$_SESSION['x16'] = 'Please select document type to upload.';
$_SESSION['x17'] = 'Please select your bank name.';
$_SESSION['x18'] = 'Your bank account number is required.';
$_SESSION['x19'] = 'Please enter a 10 digit valid account number. No space.';
$_SESSION['x20'] = 'Your date of birth is required';
$_SESSION['x21'] = 'Please select your gender type.';
$_SESSION['x22'] = 'Your state is required.';
$_SESSION['x23'] = 'Please select your city.';


function errFunc($errIndex) {
	 return '<div class="error_msg">
				<span>System Response Message.
				&nbsp;&nbsp; 
				Error! &nbsp;
				<i class="fas fa-exclamation-triangle"></i>
				</span><br /><br />
				'.$_SESSION[$errIndex].'</div>'; 
    
}






if(isset($_POST['email'])) {


	$fmName = filter_var(strip_tags($_POST['familyName']), FILTER_SANITIZE_SPECIAL_CHARS);
	$fsName = filter_var(strip_tags($_POST['firstName']), FILTER_SANITIZE_SPECIAL_CHARS);
	$passWord = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$email = filter_var(strip_tags($_POST['email']), FILTER_SANITIZE_SPECIAL_CHARS);
	$regPhone = filter_var(strip_tags($_POST['regPhone']), FILTER_SANITIZE_SPECIAL_CHARS);
	$address = filter_var(strip_tags($_POST['address']), FILTER_SANITIZE_SPECIAL_CHARS);
	$sponCode = filter_var(strip_tags($_POST['sponsorcode']), FILTER_SANITIZE_SPECIAL_CHARS);
	$packLevel = filter_var(strip_tags($_POST['packlevel']), FILTER_SANITIZE_SPECIAL_CHARS);
	$docType = filter_var(strip_tags($_POST['govdocument']), FILTER_SANITIZE_SPECIAL_CHARS);
	$docImage = $_FILES['govimage']['name'];
	$docSize = $_FILES['govimage']['size'];
	$docError = $_FILES['govimage']['error'];
	$bankName = filter_var(strip_tags($_POST['bankname']), FILTER_SANITIZE_SPECIAL_CHARS);
	$institution = filter_var(strip_tags($_POST['institution']), FILTER_SANITIZE_SPECIAL_CHARS);
	$accNumber = filter_var(strip_tags($_POST['accountno']), FILTER_SANITIZE_SPECIAL_CHARS);
	$dateofB = filter_var(strip_tags($_POST['dateofb']), FILTER_SANITIZE_SPECIAL_CHARS);
	$gender = filter_var(strip_tags($_POST['gender']), FILTER_SANITIZE_SPECIAL_CHARS);
	$state = filter_var(strip_tags($_POST['userstate']), FILTER_SANITIZE_SPECIAL_CHARS);
	$city = filter_var(strip_tags($_POST['usercity']), FILTER_SANITIZE_SPECIAL_CHARS);
	$hash = genhash(16);
	$exten = ['jpg', 'jpe', 'jpeg', 'jfif', 'png', 'bmp', 'dib', 'gif', 'pdf'];
	$array = explode('.', $docImage);
	$type = strtolower(end($array));
	$randx = genhash(4);
	$usergenCode = genhash(7);

	if(isset($fmName) && empty($fmName)) { 	$error = errFunc('x1'); }
	
		elseif (!empty($fmName) && strlen($fmName) < 2) { $error = errFunc('x3'); }
		elseif (isset($fsName) && empty($fsName)) { $error = errFunc('x2'); }
		elseif (!empty($fsName) && strlen($fsName) < 2) { $error = errFunc('x3'); }
		elseif (isset($passWord) && empty($passWord)) { $error = errFunc('x4'); }
		elseif (!empty($passWord) && strlen($passWord) < 8) { $error = errFunc('x5'); }
		elseif (!empty($passWord) && !preg_match($passRegExp, $passWord)) { $error = errFunc('x6'); }
		elseif (isset($email) && empty($email)) { $error = errFunc('x7'); }
		elseif (!empty($email) && !preg_match($emailRegExp, $email)) { $error = errFunc('x8'); }
		elseif (isset($regPhone) && !preg_match($phoneRegExp, $regPhone)) { $error = errFunc('x9'); }
		elseif (isset($address) && empty($address)) { $error = errFunc('x10'); }
		elseif (!empty($address) && !preg_match($wrongAddress, $address)) { $error = errFunc('x11'); }
		elseif (strlen($sponCode) > 15) { $error = errFunc('x12'); }
		elseif (isset($packLevel) && $packLevel === '0') { $error = errFunc('x13'); }
		elseif ($docType != '0' && $docError != UPLOAD_ERR_OK) { $error = errFunc('x15'); }
		elseif ($docType == '0' && $docError == UPLOAD_ERR_OK) { $error = errFunc('x16'); }
		elseif ($docType != '0' && $docError == UPLOAD_ERR_OK && $docSize > 5000000) { $error = '<div class="error_msg"> Image size is larger than 5 MB. Maximum required image <br />size is 5 MB.</div>'; }
		elseif ($docType != '0' && $docError == UPLOAD_ERR_OK && $docSize <=5000000 && in_array($type, $exten) == false) {			
			$error = '<div class="error_msg"> Image type not supported. Please upload a jpg, jpe, jpeg, png, bmp, or gif file type.</div>';
		}
		elseif ($bankName === '0') { $error = errFunc('x17'); }
		elseif (isset($Institution) && !empty($institution)) { return false; header('location: https://longrichs.com'); }
		elseif (isset($accNumber) && empty($accNumber)) { $error = errFunc('x18'); }
		elseif (!empty($accNumber) && !preg_match($accNoRegExp, $accNumber)) { $error = errFunc('x19'); }
		elseif (isset($dateofB) && empty($dateofB)) { $error = errFunc('x20'); }
		elseif ($gender === '0') { $error = errFunc('x21'); }
		elseif ($state === '0') { $error = errFunc('x22'); }
		elseif ($city === '0') { $error = errFunc('x23'); }


else {

	$existence = $showDATA->userAccount($email);
	
	if($existence == false) {

		if($docError == UPLOAD_ERR_OK) {
			
			$newImgname = $randx.'.'.$type;
			$renamed = "resources/images/govdoc/".basename($newImgname);
			$newnamedimg = $renamed;
			move_uploaded_file($_FILES['govimage']['tmp_name'], $renamed);
		} 
		
		else {
			$newnamedimg = '';
		}
		

		$inputData->createUser($usergenCode, $fmName, $fsName, $passWord, $email, encFunc($regPhone, $enckey), encFunc($address, $enckey), $packLevel, $docType, $newnamedimg, encFunc($bankName, $enckey), encFunc($accNumber, $enckey), encFunc($dateofB, $enckey), encFunc($gender, $enckey), encFunc($state, $enckey), encFunc($city, $enckey), $hash);
       
        
		$defaultProImg = "resources/vectors/user.svg";
		$userID = $showDATA->userAccount($email);
		$confmUserId = $userID['user_id'];
		$userCode = $userID['user_code'];
		$username = preg_replace('/\s+/', '', $fmName.'@'.genhash(2));
		$refURL = "https://longrichs.com/crypt?lock=".$userCode;
		$inputData->profileEntry($confmUserId, $defaultProImg, $username, $refURL, $userCode, $address, $sponCode);

		$userProfUrl = "https://longrichs.com/profile?_r=".$userCode.strtolower($fmName).'.'.strtolower($fsName);

		$refReadStatus = 1;
		$inputData->registerRef($confmUserId, $fmName, $fsName, $userProfUrl, $email, $packLevel, $refReadStatus);
		$inputData->InputsessUserId($confmUserId);
		


		if(!empty($_SESSION['refCode']) || !empty($_COOKIE['ref_vault'])) {
			
			$refCode = $_SESSION['refCode'];
			$refByUserCode = $_COOKIE['ref_vault'];
			$exist = $showDATA->acc_prof_ref_usercode($refByUserCode);
			if($exist != false) {
				$refByEmail = $exist['email'];
				$refByUserid = $exist['user_id'][0];
				$refByUserCode = $exist['user_code'];
				$initRefCount = intval($exist['referral_count']);
				$refCount = ++$initRefCount;
				$paidStatus = $exist['user_status'];
				$refByVault = $exist['referral_vault'];
				$refByFamName = $exist['family_name'];
				$refByFstName = $exist['first_name'];

				if($paidStatus == '1') {
					$refRStatus = 0;
					$inputData->updateRef($refByUserCode, $refByEmail,  $refByUserid, $refByVault, $confmUserId, $refByFamName, $refByFstName, $refRStatus);
					$inputData->updateRefCount($refCount, $refByUserCode); 
				}
			

			} 
		} 

		include 'includes/phpmailer.inc.php';   
        $mail->From = 'no-reply noreply@longrichs.com';
        $mail->SetFrom('noreply@longrichs.com', 'Longrich Gtriune');
        $mail->AddReplyTo("noreply@longrichs.com", "Longrich Gtriune");	
		$mail->Subject = 'Longrich Gtriune Account Verification';
		$mail->Body = '<html><head><title>User email verification</title>
		<style>
			#mail-body {
				width: 100%; 
				height: 50em;
				background: #ebebef; 
				padding: 2em 0 5em;
				
				font-family:"Roboto", sans-serif;
			}
			#mail-body > p {
				font-size: 1em; 
				text-align: left;
			}
			#mail-body .section {
				margin-left: auto;
				margin-right: auto;
				width: 54%;
				height: 50em;
				padding: 1em 2.3em;
				background: #fff;
				border-radius: 2px;
				font-size: 1.05em;
			}
			#mail-body .section > div.intro {
				font-size: 1.1em;
				color: #38393c;
				padding: 0.3em 0;
			}
		</style>
		</head>
		<body id="mail-body">
			<div class="section">
				<div class="intro">
					<label>Longrich Gtriune</label>
				</div><br />
				<p>Hi '.$fmName.',<br /></p>
					<span> Thank you for signing up on https://longrichs.com we appreciate your commitment. <br /><br />In order to have full access to your account, we need to verify that your contact email is correct and is still active. Please click confirm email address to <br /> activate your account </span>


					<a href="https://longrichs.com/verify.php?crypt='.$usergenCode.'&hash='.$hash.'">

					Confirm email address</a> <br /><br />or copy and paste the link below in your browser address bar: <br />https://longrichs.com/verify.php?crypt='.$usergenCode.'&hash='.$hash.'<br /> Please note that this is an auto generated email, so do NOT send messages to this email, it will not be replied. <br /><br /> 

						Kind regards, <br />
	                    Longrich Gtriune.

	                    <br /><br /><br />Please do not reply to this email (noreply@longrichs.com). <br />If you have questions about Longrich Gtriune, send us a message with your inquiry via live chat on our website or visit our frequently asked questions page <a href="https://longrichs.com/help.php">FAQ </a> for more information.
			</div></body></html>';
		$mail->addAddress($email);
		if(!$mail->send()) {
				$error = '<div class="error_msg"> Message could not be sent to the email address you provided. <br /> Your details may have been registered but the network is slow/bad. Try and log in to your account and re-send the email verification link.<br /></div>';
		} else {
			$_SESSION['succmessage'] = "<div class='success_msg'>Successful! 
			<i class='far fa-check-circle'></i><br /><br />
			Thank you for filling out your information! A Confirmation link has been sent to your email '$email' please verify your email account by clicking on the link in your inbox.</a> </div> <br /><br />
				<a href='login'>
				<button>Log In</button>";
			header('location: success');
		}

	} 

	else {

	$error = "<div class='error_msg'> User with this email has registered already. <br /> If you know your existing account information click on <a href='login'>Log In</a> to enter your existing email and password.<br /><span class='default-color'>
		<br/> If you wish to retrieve your user account information, please click on forgot <a href='https://longrichs.com/femail.php'>email address</a> or <a href='https://longrichs.com/fpass'>password</a> on <a href='login.php'>log In</a> page or See <a href='https://longrichs.com/help'>FAQ</a> 
		on how do I retrieve my email and/or password?
	</span>
	<br /> 
	<br /> 
	<br /> 
	</div>";
	}
  }  
}


if(!isset($_SESSION['attempt'])) {
	 $_SESSION['attempt'] = 0;
}

if (isset($_SESSION['lockedTime'] )) {
$timeDiff = time() - $_SESSION['lockedTime'];
	if($timeDiff > 10) {
		unset($_SESSION['lockedTime']);
		unset($_SESSION['attempt']);
	}
}


if(isset($_POST['loginemail']) && isset($_POST['loginpass'])) {
	
	$lemail = $_SESSION['useremail'] = $_POST['loginemail'];
	$lpassw = $_POST['loginpass'];

	if(!empty($lemail) && !empty($lpassw)) {
		$userDetails = $showDATA->userAccount($lemail);
		if($userDetails != false) { 

			$userIDentity = $userDetails['user_id'];
			$uloginatt = $userDetails['login_attempt'];
			$familyName = $userDetails['family_name'];
			$firstName = $userDetails['first_name'];
			$emailx = $userDetails['email'];
			$packLevel = $userDetails['package'];
			$passhash = $userDetails['password'];
			$userCode = $userDetails['user_code'];
			$randhash = $userDetails['hash'];
			$userStatus = $userDetails['active'];
			$suspended = $userDetails['suspended'];
			$dateSuspended = $userDetails['date_suspended'];

			$timeZone = date_default_timezone_set('Africa/Lagos');
			$susTime = $dateSuspended;
			$newTime = time();
			$threeDays = (3 * 24 * 60 * 60);
			$unlockDate = $susTime + $threeDays;
			$dateDiff = $newTime - $susTime;

			$_SESSION['errmessage'] = "<div class='error_msg'>
				Your account has temporary been suspended and will be unlocked <br /> on <span>".date('d/M/Y | h:i A', $unlockDate)."</span> (3 days lock down). 
				
				<br />
				<br />We suspended your account because you violated the rule(s) of using our services. <br />You have either attempted to login to your account multiple times and have failed <br />or that you have posted contents which does not serve the purpose for which this platform <br />was created and for improving this platform and the identity for which we stand for.<br />
				<br />

				Please check back on <span>".date('d/M/Y | h:i A', $unlockDate)."</span>.
				<br />
				<br />
				For any inquiry or complain, you can call us or text our customer's service or see <a href='help.php'>FAQ</a> 
				<br />
				<br />
				<a href='index'>Home</a>
				<br />
				</div>";

			if(password_verify($lpassw, $passhash) && !empty($randhash)) {


				if($suspended === 1 && ($dateDiff < $threeDays)) {
					header("location: suspended");
					$_SESSION['suspended'] = true;
				}
				else {


					if(session_status() == PHP_SESSION_ACTIVE) {
						session_regenerate_id(true);
						$sessionID = session_id();
					}
					$sessionToken = genhash(8);
					$sessCookie = genhash(9); 
					$expiryTime = time() + 259200;
					setcookie('c_user', $sessCookie, $expiryTime, '/'); 
					$inputData->UpdateSessionData($sessionID, $sessionToken, $sessCookie, $userIDentity);

				// 	$encUserIp = encFunc($userLocapIp, $enckey);
					$encUEmail = encFunc($emailx, $enckey);
					$threedaysgone = true;
					$revSuspStatus = 0;
					$inputData->upSuspendStatus($revSuspStatus, $uloginatt, $userIDentity, $suspended, $threedaysgone);
				// 	$inputData->enterUIpaddress($userIDentity, $encUserIp, $encUEmail);
					$sessionDetails = $showDATA->getSessionData($sessCookie);

					$_SESSION['familyName'] = $familyName;
					$_SESSION['firstName'] = $firstName;
					$_SESSION['email'] = $emailx;
					$_SESSION['userid'] = $userIDentity;
					$_SESSION['status'] = $userStatus;
					$_SESSION['user_code'] = $userCode;
					$_SESSION['userid_new_sess'] = $sessionDetails['user_id'];
					$_SESSION['session_id_new'] = $sessionDetails['session_id'];
					$_SESSION['logged_in_token'] = TRUE;
					$_SESSION['new_sess_cookie'] = $sessionDetails['session_cookie'];

					if(!empty($_SESSION['shoppingCart'])) {
						header("location: checkout");
					} 
					else {
						header("location: forum");
					}

				}
			}
			else {
				$logerror = '<div class="error_msg">Error! <i class="fas fa-exclamation-triangle"></i></br ><br />Email or password does not match. Please enter correct email and password to log in.</div>';

				if($suspended == 1 && ($dateDiff < $threeDays)) {
					header("location: suspended");
					$_SESSION['suspended'] = true;
				}
			}
	} 
	else {
		$logerror = '<div class="error_msg">Error! <i class="fas fa-exclamation-triangle"></i> </br ><br /> Such combination of email and password does not exist. Please make sure you enter correct  email address and password combination.</div>';
  }
  if(isset($_SESSION['attempt'])) {
  	$_SESSION['attempt'] += 1;
  }

} else {
	$logerror = '<div class="error_msg">Error! <i class="fas fa-exclamation-triangle"></i></br ><br />Email and password required. Please enter correct email and password to log in.</div>';
}
	
}

?>