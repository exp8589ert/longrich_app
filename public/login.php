<?php 
require 'includes/check.php';

$login = '<a href="login"><li class="access-link pipe">Log In</li></a>';
$signup = '<a href="signup"><li class="access-link active-link">Sign Up</li></a>';

if (isset($_COOKIE['c_user'])) {

	$sessionData = $showDATA->getSessionData($_COOKIE['c_user']);
	if($_COOKIE['c_user'] === $sessionData['session_cookie']) {
		$newSessId = $sessionData['session_id'];
		$loggedIn = $sessionData['session_token'];
		$newCookie = $sessionData['session_cookie'];
		$loggedBool = (isset($_SESSION['logged_in_token']))? $_SESSION['logged_in_token'] : false;
		if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {
		} 
		else {
			header('location: forum');
		}
	}
}

require 'header.php';
?>
	
<section class="wrapper entry-page login">
<div class="logo-header">
	<a href="https://longrichs.com"><img src="resources/images/logo.png" alt="Logo"></a>
	<a href="https://longrichs.com" class="home-page">&nbsp;Home</a> 
</div>


<fieldset class="login page">
	<div class="pending-order">
		<?php if(!empty($_SESSION['shoppingCart'])) {
					echo $_SESSION['loginRequired'];
			   } 
		?>
	</div>

	<h2>Login to view your Longrich-Gtriune account</h2>
	<br />
	<br />
	<form method="POST" 
		  autocomplete="off" 
		  id="login-form">
		  <input type="hidden" autocomplete="off">
		<div id="bug_msg" class="login">
			<? echo $error; ?>	
		</div>
		<div id="login-modal">
			<span>Processing, please wait ...</span>
			<div id="submit-loader"></div>
		</div>

		<legend>Email 
		<input type="text" 
			   name="loginemail" 
			   id="emailPhone" 
			   placeholder="Enter email"value="<?= $lemail ?>" 
			   class="reqlogInput logInemail" 
			   autofocus="autofocus" 
			   autocomplete="off">
		</legend>

		<legend>Password
		<span class="showPass login far fa-eye-slash"></span>
		<input type="password" 
			   name="loginpass" 
			   id="loginPass" 
			   placeholder="Enter passoword"
			   value="<?= $lpassw ?>" 
			   class="form-control logInPass reg-password reqlogInput" 
			   aria-required="true" 
			   autocomplete="off">
		</legend>

		<legend id="cucaragacha"> Institution
			<input type="text" name="institution" class="cucaragacha">
		</legend>

		<input type="hidden" 
			   name="attempt"
			   value="0">

<script>
	var waitCounter = 10;
	var countDown = ()=> {
	 return function() {
		waitCounter--;
		if(waitCounter < 0) {
			location.reload();
			return false;
		}
		$('span.timer').text(waitCounter);
		}();
	}
	function callTimer(countDown) {
		setInterval(countDown, 1000);
	}
</script> 

<?php 
	if(isset($_SESSION['attempt']) && $_SESSION['attempt'] > 2) {
		$_SESSION['lockedTime'] = time();

			$attmemail = filter_var(strip_tags($_POST['loginemail']), FILTER_SANITIZE_SPECIAL_CHARS);
			$userDetails = $showDATA->userAccount($attmemail);
			if($userDetails != false) {
				$userIDentity = $userDetails['user_id'];
				$attempterEmail = $userDetails['email'];
				$uloginatt = intval($userDetails['login_attempt']);
				$loginCounter = ++$uloginatt;
				$inputData->loginAttempt($loginCounter, $attempterEmail);
				if($uloginatt > 2) {
					$inputData->upSuspendStatus($revSuspStatus == null, $uloginatt, $userIDentity, $suspended = null, $threedaysgone = null);
				}
				
			}
		
		$logerror = '<div class="error_msg">Error! You have attempted to log in 3 times. Please wait after 10 seconds. </div>';
		echo '<script> callTimer(countDown); </script>';
		echo '<button type="button" 
				class="login-btn" 
				id="disabledLogin" 
				disabled="disabled" 
				name="loginbtn">Login disabled for 
				<span class="timer"></span> seconds.
			</button>';
	} else {
		echo '<button type="submit" 
				class="login-btn" 
				id="login-disable" 
				name="loginbtn">Login to your Account
			</button>';
	}
?>

<br />
<br />

<span class="not-a-member-yet">Forgot your 
	<!-- <a href="femail" class="forgot-link">Email address</a> or  -->
	<a href="fpass" class="forgot-link">Password?</a><br />
Not a Member yet? &nbsp;<a href="signup" class="register-link">| &nbsp;Register </a>
</span>
<br />
<br />

<div class="phpError login"><?php echo $logerror; ?></div>
</form>
<div class="login-instruction">
	<img class="bgPic" src="resources/images/login-bg-1.jpg" alt="Alkaline Cup">
	<br />
	<ul>		
		<li>Your password was created by you during account registeration.</li>
		<li>Passwords are case sentitive. [ Contains at least one digit, one lowercase, one uppercase and minimum of 8 characters].</li>
		<li>If you are having trouble logging in, please clear your browser cookies and try again or <a href="email-us">Email Us</a></li>
	</ul>
		Please see our <a href="help" class="help-info">HELP & INFO</a> section for other Login Questions.
</div>
</fieldset>
</section>

<?php include("x-footer.php"); ?>


