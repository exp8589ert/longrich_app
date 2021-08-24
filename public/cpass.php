<?php 
error_reporting(0);
require 'cnumFunc.php';

if (isset($_COOKIE['c_user'])) {
	$sessionData = $showDATA->getSessionData($_COOKIE['c_user']);
	if($_COOKIE['c_user'] === $sessionData['session_cookie']) {
		$email = $_SESSION['email'];
		$userStatus = $_SESSION['status'];
		$newSessId = $sessionData['session_id'];
		$loggedIn = $sessionData['session_token'];
		$loggedBool = $_SESSION['logged_in_token'];
		$newCookie = $_SESSION['new_sess_cookie'];

		if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {
			header('location: https://longrichs.com/login');
		} 
		else {

			$userCred = $showDATA->acc_prof_ref_Table($email);
			$puserCode = $userCred['user_code'];
			$profImg = $userCred['prof_image'];
			$famName = $userCred['family_name'][0];
			$firstName = $userCred['first_name'][0];
		}
	}
	else {
		header('location: https://longrichs.com/login');
	}
}
else {
	header('location: https://longrichs.com/login');
}
require 'header.php';
?>

<fieldset id="change-password">
	<form name="changeform" method="POST" id="cpass-form">   
		<div class=""><i class="fas fa-user-lock"></i>
		REQUEST TO CHANGE CURRENT PASSWORD
	   </div> 
	   <br />
		<div class="">
			<a href="<?php echo 'profile?r_='.$puserCode.$_SESSION['rThrChar'].'' ?>"><img src="<?php echo $profImg ?>" title="<?php echo $famName .' '. $firstName ?>">
			</a>
		</div>
		<br />
		<div class="bug_msg"></div>
		<table> 
			<tr>
				<tr>
					<td>
						<span class="showPass far fa-eye-slash"></span>
					</td>
				</tr>
				<td colspan="">
					<label for="pass_word">Enter current password</label>
					<input type="password" name="current-password" id="current-pass" class="reg-password current-pass" maxlength="100" aria-required="true" autocomplete="off" placeholder="Enter current password"/>
				</td>
				<td colspan="">
					<label for="current-pass_word">Enter phone number (11 Digits)</label>
					<input type="number" name="current-phone" id="phone-number" onKeyPress="if(this.value.length === 11) return false;" placeholder="0 * * * * * * * * * *" autocomplete="off"/>
				</td>
			</tr>           
			<tr>
				<td colspan="2">
					<label for="new-pass_word">Enter new password</label>
					<input type="password" name="newp-password" id="new-pass" class="reg-password new-pass" maxlength="100" autocomplete="off" placeholder="Enter new password" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label for="conf-pass_word">Confirm new password</label>
					<input type="password" name="confirm-new-password" id="confirm-pass" class="reg-password confirm-pass" maxlength="100" autocomplete="off" placeholder="Confirm new password"/>
				</td>
			</tr>
			<tr>                  
				<td colspan="2">
				<br /> 
				<button type="submit" class="submit" name="change_pass"> Change password </button>
				<a href="logout.php">
						Log out &nbsp;<i class="fas fa-power-off"></i>
				</a>
				<br /> 
				</td>
			</tr>
		</table>                
	</form>     
</fieldset>

<?php include_once 'x-footer.php' ?>

<script>

function checkRegeX(inputParam) {
	let passRegx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g;
	return (passRegx.test(inputParam))? true : false;
}

$('#cpass-form').on('submit', (e)=> {
	e.preventDefault();
	var errorMsg = $('.bug_msg'),
	phoneNum = $("#phone-number"),
	currPass = $(".current-pass"),
	nPass = $(".new-pass"),
	cPass = $(".confirm-pass"),
	numRegEx = /^\d{11}/;

	(currPass.val() === '')?
	errorMsg.html(errArrMsg[6]): 
	(currPass.val().length < 8)?
	errorMsg.html(errArrMsg[7]):
	(checkRegeX(currPass.val()) === false)?
	errorMsg.html(errArrMsg[8]):
	(!numRegEx.test(phoneNum.val()))?
	errorMsg.html(errArrMsg[9]):
	(nPass.val() === '')?
	errorMsg.html(errArrMsg[10]):
	(nPass.val().length < 8)?
	errorMsg.html(errArrMsg[11]):
	(checkRegeX(nPass.val()) === false)?
	errorMsg.html(errArrMsg[12]):
	(cPass.val() === '')?
	errorMsg.html(errArrMsg[13]):
	(cPass.val().length < 8)?
	errorMsg.html(errArrMsg[14]):
	(checkRegeX(cPass.val()) === false)?
	errorMsg.html(errArrMsg[15]):
	(currPass.val() === nPass.val())?
	errorMsg.html(errArrMsg[16]):
	(nPass.val() !== cPass.val())?
	errorMsg.html(errArrMsg[17]):

	(()=> {
			
		var phnNum = $("#phone-number").val(),
		oldpass = $(".current-pass").val(),
		unewpass = $(".new-pass").val();

		var passwdInputs = {
			"inputPhNum": phnNum,
			"currentPass": oldpass,
			"newPassword": unewpass
		};

		$.ajax({
			url: 'cpassFunc.php',
			method: 'POST',
			data: passwdInputs,
			cache: false,
			dataType: 'json',
			success: function(response, status, xhr) {
				if(response.type === 'success') {
					errorMsg.html('');
					$('#change-password  table').html(response.message);
				} else {
					errorMsg.html(response.message);
				}
			},
			error: function(response, status, xhr) {
				errorMsg.html('<span class="error_msg">Error!, Operation could not be executed. Please try again.</span>');
			}
		});
	})();	
});

</script>
</body>
</html>