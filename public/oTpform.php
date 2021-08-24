<?php
require 'includes/autoloader.inc.php';
?>

<span><i class="fas fa-shield-alt"></i></span><br />
<span class="reset-info">Please enter the 6 digit token that was sent to the phone number you provided. </span>
<br />
<br />

<form action="" 
	  id="otp-form" 
	  name="oTp-verify"
	  autocomplete="off" 
	  novalidate="on" 
	  method="POST">
	  <div class="bug_msg"></div>
	<label for="otp-number">6 Digit token
	<input type="number" 
		   autocomplete="off" 
		   autofocus="autofocus" 
		   name="otp-number" 
		   id="otp-number"
		   placeholder="Enter 6 digit number" 
		   onKeyPress="if(this.value.length === 6) return false;" />
	</label>
	<div class="button-wrapper">				
	<button type="submit"
			class="btn oTp-verify" 
			name="oTp-verify" 
			id="oTp-verify">Verify Token
	</button>
	
	</div>
</form>

<script>

$('#otp-form').on('submit', (e)=> {
	e.preventDefault();
	var token = $('#otp-number'),
	errorMsg = $('.bug_msg'),
	tokenRegExp = /^\d{6}/,
	parameters = null,
	emptyInput = '<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i> Token field can not be empty.</span>',
	invalidToken = '<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i>Please enter a valid digit number.</span>';
	notProcessed = '<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i> Token validation can not be processed. Please try again.</span>';

	(token.val() == '')? errorMsg.html(emptyInput) : 
	(!tokenRegExp.test(token.val()))? html(invalidToken) : 
	(()=> {
		errorMsg.html('');
		tokenNum = token.val()
		parameters = {
				"token_number": tokenNum,
				"action": "verify_token"
		}
		$.ajax({
			url: 'oTpcontroller.class.php',
			method: 'POST',
			data: parameters,
			dataType: 'json',
			success: function(response) {
				errorMsg.html('');
				$('.' + response.type).html(response.message);
			},
			error: function() {
				errorMsg.html(notProcessed);
			}
		});
	})();
});

</script>
