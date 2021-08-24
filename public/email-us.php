<?php 
include 'header.php';

if(isset($_POST['sendEmail'])) {
	
$senderName = filter_var(strip_tags($_POST['userName']), FILTER_SANITIZE_SPECIAL_CHARS);
$senderEmail = filter_var(strip_tags($_POST['userEmail']), FILTER_SANITIZE_SPECIAL_CHARS);
$senderMsg = filter_var(strip_tags($_POST['userMessg']), FILTER_SANITIZE_SPECIAL_CHARS);
$imageData = isset($_POST['attachFile'])? $_POST['attachFile'] : '';
$attchName = isset($_POST['attchName'])? $_POST['attchName'] : '';
$remail = 'longrich_gtriune@outlook.com';

if(!empty($senderName) && !empty($senderEmail) && !empty($senderMsg)) {


include 'includes/phpmailer.inc.php';   
$mail->From = 'Reply us: longrich_gtriune@outlook.com';
$mail->SetFrom('longrich_gtriune@outlook.com', 'Longrich Gtriune (Inquiry)');
$mail->AddReplyTo("".$senderEmail."", "".$senderName."");	
$mail->Subject = 'Inquiry email from visitor';
$mail->Body = '<html><head><title>Inquiry email from visitor</title>
<style>
	#mail-body {
		width: 100%; 
		height: 48em;
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
		height: 40em;
		padding: 1em 2.3em;
		background: #fff;
		border-radius: 2px;
		font-size: 1.05em;
	}
	#mail-body .section > div.intro {
		font-size: 1em;
		color: #38393c;
		padding: 0.3em 0;
	}

	#mail-body .msg-para { 
		padding-bottom: 5em;
		line-height: 1.2em;
		border-bottom:0.08em solid #ccc;
	}
</style>
</head>
<body id="mail-body">
	<div class="section">
		<div class="intro">
			<label>Longrich Gtriune visitor\'s inquiry</label>
		</div>
		<p>
			Sender\'s name: '.$senderName.',<br />
			Sender\'s email: '.$senderEmail.',<br /><br />
		</p>
		<p class="msg-para"> Sender\'s message : <br /><br />'.$senderMsg.'</p>


	</div>
   </body>
</html>';
$mail->addAddress($remail);
if(!empty($imageData)) {
$mail->addStringAttachment(file_get_contents($imageData), $attchName);
}
if(!$mail->send()) {
		$error = '<div class="error_msg"> Message could not be sent to the email address you provided. <br /> Your details may have been registered but the network is slow/bad. Try and log in to your account and re-send the email verification link.<br /></div>';
}


}

}

?>


<div class="spinner-container">
	<div id="spinner-load"></div>
</div>

<section class="wrapper chatroom-wrapper emailus forum-wrapper">

<div class="page-title emailus">
<div class="emailus-inner"> 
<a href="forum" class="link">FORUM&nbsp;<i class="fab fa-accusoft"></i></a>
<span class="live-chat"><a href="help" target="_self"><i class="far fa-comment-alt icon" title="LiveChat"></i></a>
</span>
</div>
</div>

<div id="available-time">
	Our Support Team are available Monday - Friday, 9am to 4pm.<br />
	Saturdays 10am to 3pm.
</div>

<fieldset class="login sign-up" id="emailus">
	

	<div class="email-error"></div>

	<form method="POST" novalidate autocomplete="off" id="email-us-form">

	<legend>Enter your name
		<input type="text" class="sname inputc" name="senderName" placeholder="Your name" maxlength="50">			
	</legend>

	<legend>Enter your email
		<input type="email" class="semail inputc" name="senderEmail" placeholder="Your email" maxlength="50" autocomplete="off">			
	</legend>

	<legend>Enter your message [Maximum of 800 characters. 
		<span class="count"></span>] 

	<div class="email-us-file" title="Upload file">
		<input type="file" 
		id="mail-file"
		name="inqimage"
		accept=".jpg, .png, .jpe, .jpeg, .jfif, .png, .bmp, .dib, .pdf, .docx, .gif">
		<i class="fas fa-check"></i>
		<i class="fas fa-file-upload"></i> 
		<span>Upload</span>
	</div>

	<textarea id="email-us" class="textmessage inputc" placeholder="Type your message here" autocorrect="on" spellcheck="spellcheck" maxlength="800"></textarea>	
	</legend>
	<br />
	<button type="submit">Send mail</button>
	</form>
</fieldset>

</section>
<?php include 'x-footer.php'; ?>



