<?php
require 'includes/check.php';
error_reporting(0);

if(isset($_GET['email']) && !empty($_GET['email']) 
&& isset($_GET['hash']) && !empty($_GET['hash'])) {
	
	$resetEmail = $_GET['email'];
	$resetHash = $_GET['hash'];
	$existence = $showDATA->userAccount($resetEmail);
	$email = $existence['email'];
	$dbhash = $existence['hash'];

if($existence == false || $resetHash!= $dbhash) {
	$resetErr = '<span class="error_msg">Invalid url parameters. Password reset will not be initiated."</span>';
} 
else {
	if(isset($_POST['new-pass']) && !empty($_POST['new-pass']) 
	&& isset($_POST['confirm-new-pass']) && !empty($_POST['confirm-new-pass'])) {

	$password = password_hash($_POST['new-pass'], PASSWORD_BCRYPT);
	$passUpdateResult = $inputData->updatePassword($password, $email);

	if($passUpdateResult === null) {
			$_SESSION['succmessage'] = "<div class='success_msg'>Done! 
				<i class='far fa-check-circle'></i><br />
			Your password has been changed successfully. You can now login using your new password as your old password have been changed in our database. </div> 
			<br /><br /><a href='http://localhost:81/longrichs.com'>
			<button>Home</button></a>
			<a href='login'><button>Log In</button></a>";
			header('location: success');
		} 
		else {
			$resetErr = '<span class="error_msg">Error! <i class="fas fa-exclamation-triangle"></i> A server error occurred. Password could not be changed. Please try again."</span>';
		}
	}
}
}
else {
	header('location: http://localhost:81/longrichs.com');
}
require 'header.php';
?>

<fieldset class="forgot-pass">
<label class="alert-header choose-pass">Choose your new password &nbsp;<i class="fas fa-key"></i></label><br /><br />
<form action="" 
	  id="reset-form"
	  name="reset-form"
	  method="POST">
	 <div class="bug_msg"><?php echo $resetErr; ?></div>

<label for="new-pass">New password
<span class="showPass far fa-eye-slash"></span>
<input type="password" 
   autocomplete="off" 
   name="new-pass" 
   id="new-pass" 
   class="reg-password"
   placeholder="New password" />
</label>

<label for="confirm-pass">Confirm new password
<input type="password" 
   autocomplete="off" 
   name="confirm-new-pass" 
   id="confirm-new-pass" 
   class="reg-password"
   placeholder="Confirm new password" />
</label>

<div class="button-wrapper">
<button type="submit" class="btn " name="apply-password" id="reset">Apply new password</button>
</div>

</form>
</fieldset>

<?php include 'x-footer.php'; ?>

<script type="text/javascript">

$('#reset-form').submit((e)=> {
	e.preventDefault();
	var newPass = $('#new-pass'),
	errorMsg = $('.bug_msg'),
	confmPass = $('#confirm-new-pass'),
	passRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g;
	var bothFieldsReq = '<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i> both password fields are required.</span>',
	minPassErr = '<span class="error_msg">Password must be a minimum of 8 charachters.</span>',
	weakPass = '<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i> password entered is weak.</span>',
	dontMatchErr = '<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i> passwords entered does not match.</span>';

	(newPass.val() == '' || confmPass.val() == '')?
	errorMsg.html(bothFieldsReq) :
	(newPass.val().length < 8 || confmPass.val().length < 8)?
	errorMsg.html(minPassErr) :
	(!passRegExp.test(newPass.val()))?
	errorMsg.html(weakPass) :
	(newPass.val() !== confmPass.val())?
	errorMsg.html(dontMatchErr): 
	(()=> { errorMsg.html(''); $('#reset-form').unbind('submit').submit();})();
});
</script>
</body>
</html>