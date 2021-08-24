<?php 
require 'includes/check.php';
error_reporting(0);

if(isset($_POST['fpemail']) && !empty($_POST['fpemail'])) {
	$existence = $showDATA->userAccount(filter_var(strip_tags($_POST['fpemail']), FILTER_SANITIZE_SPECIAL_CHARS));
	if($existence == false) {
		$resetErr = '<span class="error_msg">Error! <i class="fas fa-exclamation-triangle"></i> User with that email does not exist.</span>';
	} 
	else {
		$fmName = $existence['family_name'];
		$email = $existence['email'];
		$hash = $existence['hash'];
		include 'includes/phpmailer.inc.php';   
        $mail->From = 'no-reply noreply@longrichs.com';
        $mail->SetFrom('noreply@longrichs.com', 'Longrich Gtriune');
        $mail->AddReplyTo("noreply@longrichs.com", "Longrich Gtriune");
		$mail->Subject = 'Password Reset - Longrich Gtriune';
		$mail->Body = '<html><head><title>Longrich- Gtriune Password Reset</title>
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
				width: 52%;
				height: 43em;
				padding: 1em 2.3em;
				background: #fff;
				border-radius: 2px;
				font-size: 1.05em;
			}
			#mail-body .section > div.intro {
				font-size: 1.3em;
				color: #38393c;
				padding: 0.3em 0;
			}
		</style>
		</head>
		<body id="mail-body">
			<div class="section">
				<div class="intro">
					<label>Password Reset - Longrich Gtriune</label>
				</div><br />
				<p>Hello '.$fmName.',<br /></p>
					<span> You have just requested to reset your password for your Longrich Gtriune\'s account. <br />		Please click the following link

					<a href="https://longrichs.com/reset.php?email='.$email.'&hash='.$hash.'">Reset Password</a>
					<br />
					<br />
					If you have not requested to reset your password, do not worry, it has not been changed; however if you are concerned that someone has done this without your knowledge, then please do contact Longrich Gtriune Support Team.
					<br />
					<br />
					Please note that this is a generated email as requested, so do NOT send messages to this email, it will not be replied. <br /><br /> 
					Kind regards, <br />
					Longrich Gtriune.

					<br /><br /><br />Please do not reply to this email (noreply@longrichs.com). <br />If you have questions about Longrich Gtriune, send us a message with your inquiry via live chat on our website or visit our frequently asked questions page <a href="https://longrichs.com/help.php">FAQ </a> for more information.
			</div></body></html>';
		$mail->addAddress($email);
		if(!$mail->send()) {
			$resetErr = '<span class="error_msg">Error! <i class="fas fa-exclamation-triangle"></i> Password reset link could not be sent. Error info ".$mail->ErrorInfo."</span>';
		} 
		else {
			$_SESSION['succmessage'] = '<div class="success_msg">
			<i class="far fa-check-circle"></i><br /><br />
			A reset link has been sent to your email '.$email.' Please check your email and click on the link to complete your password reset.  </div> <br /> <br /> 
				<a href="https://longrichs.com">
				<button>Home</button>
				</a>';
			header('location: success.php');
		} 
	}
}
require 'header.php';
?>

<fieldset class="forgot-pass destn">
	<label class="alert-header">Reset your password &nbsp;<i class="fas fa-user-lock"></i></label>
	<br /><br />
	<form action="fpass.php" 
		  id="fpass-form"
		  name="emailform"
		  method="POST">
		  <div class="bug_msg">
		  	<?php echo $resetErr; ?>
		  </div>
		<label for="email">Enter your correct email to reset your password
		<input type="text" 
		   autocomplete="off" 
		   name="fpemail" 
		   id="fpemail" 
		   placeholder="Email address" />
		</label>

		<div class="button-wrapper">
		<button type="submit" class="btn " name="reset" id="reset">Reset Password</button>
		<br /><br />
			<a href="https://longrichs.com/login">Log In <i class="fas fa-sign-in-alt"></i></a>
		</div>
	</form>
</fieldset>

<?php include 'x-footer.php'; ?>

<script>

$('#fpass-form').submit(function(e) {
	e.preventDefault();
	var emailAddr = $('#fpemail'),
	errorMsg = $('.bug_msg'),
	emailInput = null;
	var emailRegExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var emptyField = '<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i> Email field can not be empty.</span>';
	var validEmail = '<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i> Please enter a valid email address.</span>';
	var serverErr = '<span class="error_msg">A server error occured please try again.</span>';

	(emailAddr.val() == '')? 
	errorMsg.html(emptyField) : 
	(!emailRegExp.test(emailAddr.val()))? 
	errorMsg.html(validEmail) :
	(()=> { errorMsg.html(''); $(this).unbind('submit').submit(); })();
});
</script>

</body>
</html>