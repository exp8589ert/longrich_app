<?php
include 'header.php';
?>
<section class="error-section unique-section">
<div id="wrapper">
<span>System response message.&nbsp;&nbsp;&nbsp; Error!
	<i class="fas fa-exclamation-triangle"></i>
</span> 

<?php
	$_SESSION['nomessage'] = "<div class='error_msg'>Error!, The page you navigated to does not exist or the session has expired.<br /> Please login to your account using your registered details. <br /><br />If you wish to retrieve your user account information, please click on forgot <a href='femail'>email address</a><br />or <a href='fpass'>password</a> on <a href='login'>log In</a> page or See <a href='help'>FAQ</a> on how do I retrieve my email and/or password?</span></div>";
		
	if(isset($_SESSION['errmessage']) AND !empty($_SESSION['errmessage'])) {
		echo $_SESSION['errmessage'];
	} 
	else {
		echo $_SESSION['nomessage'];
	}
?>
<a href="https://longrichs.com">
<button>Home</button>
</a>

<a href="https://longrichs.com/login">
<button>Log In</button>
</a>

</div>
</section>

<?php include 'x-footer.php'; ?>
</body>
</html>

