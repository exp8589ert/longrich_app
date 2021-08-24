<?php require 'cnumFunc.php'; ?>
	
<i class="fas exception fa-times inner exception close" title="Close"></i>
<div id="imported" class="imported-content exception">
<br />
<span class="heading exception">
To update account, you must verify your identity using your registered phone number.</span>
<br />

<div class="exception" for="update-data">
<div class="bug_msgConfm exception"></div>
Enter phone number (XXX XXXX XXXX)

<input 
type="number" 
autocomplete="off" 
name="" 
id="conf-number" 
class="exception"
onKeyPress="if(this.value.length === 11) return false;" 
placeholder="Enter 11 digits number" />
<br />
<button type="button" 
		value="confm-btn" 
		class="btn conf-number exception">
Confirm number</button>
</div>
</div>

<script>
	
$('#user-update i.inner.close').on('click', function() {
	$(this).parent().css('display', 'none');
});

var dbNumval = '<?php echo $userPhNumber;  ?>';
var inputNum = $('#conf-number'),
	matchMsg = $('.bug_msgConfm');

function refreshPage() {
	location.reload();
}

$('.btn.conf-number').on('click', ()=> {
	(inputNum.val() == '')?
		matchMsg.html('<span class="no-match_msg exception">Number field can not be empty.</span>') :
	(isNaN(inputNum.val()) == true)?
		matchMsg.html('<span class="no-match_msg exception">Error! Value entered is not a number.</span>') :
	(inputNum.val().length < 11)?
		matchMsg.html('<span class="no-match_msg exception">Please enter a valid 11 digit number.</span>') :
	(inputNum.val() !== dbNumval)? 
		matchMsg.html('<span class="no-match_msg exception">Error! number entered does not match.</span>') : 
	(inputNum.val() == dbNumval)?

	(()=> {
		var phNo = inputNum.val(),
			confBtn = $('.btn.conf-number').val();
		var confParam = {
			'inputPhoneNum': phNo,
			'confButton': confBtn
		}
		$.ajax({
			url: 'cnumFunc.php',
			method: 'POST',
			cache: false,
			data: confParam,
			success: function(response, status, xhr) {
				$('.imported-content').html(response);
				setTimeout(refreshPage, 3000)
			}
		});

	})() : console.log('');
});
</script>