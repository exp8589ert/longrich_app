<?php 
require_once 'header.php';
?>

<fieldset class="forgot-pass recover-email">
	<div class="dynamic-container">
		<label class="alert-header">Recover your Email 
			<i class="fas fa-at"></i>
		</label>
	<br />
	<span class="reset-info">[ A 6 digit one time password will be sent to your phone. Please enter the number in the form provided when you receive it ]</span>
	<br />
	<br />

	<form action="" 
		  id="femail-form" 
		  name="femailform"
		  autocomplete="off" 
		  novalidate="on" 
		  method="POST">
		  <div class="bug_msg"></div>
		<label for="phone-number">Enter your registered mobile number (Exclude '234' )
		<input type="number" 
			   autocomplete="off" 
			   name="mobile-number" 
			   id="mobile-number"
			   maxlength="14" 
			   placeholder="Enter 11 digit phone number E.g XXX XXXX XXXX" 
			   onKeyPress="if(this.value.length === 11) return false;" />
		</label>
		<div class="button-wrapper">				
		<button type="submit"
				class="btn rec-email" 
				name="reset" 
				id="reset">Recover my email
		</button>
		<br />
		<br />
			<a href="login">Log In <i class="fas fa-sign-in-alt"></i></a>
		</div>
	</form>
	</div>
</fieldset>

<?php include 'x-footer.php'; ?>

<script>

$('#femail-form').on('submit', (e)=> {
	e.preventDefault();
	var phoneNumber = $('#mobile-number'),
		errorMsg = $('.bug_msg'),
		numberRegExp = /^\d{11}/,
		sentParameters = null,
		emptyMsg = '<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i> Phone number field can not be empty.</span>',
		invalidNumber = '<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i> Please enter a valid 11 digit phone number Excluding 234.</span>';

	$(phoneNumber).on('keyup', ()=> {
		if(phoneNumber.val().length > 0) {
			errorMsg.html('');
		}
	});

	(phoneNumber.val() == '')? errorMsg.html(emptyMsg) :
	(!numberRegExp.test(phoneNumber.val()))? 
	errorMsg.html(invalidNumber) : 
	(()=> {
		errorMsg.html('');
		numberInput = phoneNumber.val()
		sentParameters = {
				'phone_number': numberInput,
				'action': 'send_token'
		}
		$.ajax({
			url: 'oTpcontroller.class.php',
			method: 'POST',
			data: sentParameters,
			success: function(response) {
				$('.dynamic-container').hide();
				// $('.forgot-pass.recover-email').html('');
			}
		});
	})();
});

</script>
</body>
</html>