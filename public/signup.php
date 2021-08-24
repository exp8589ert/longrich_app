<?php 
require 'includes/check.php';
error_reporting(0);

if (isset($_COOKIE['c_user'])) {
	$sessionData = $showDATA->getSessionData($_COOKIE['c_user']);
	if($_COOKIE['c_user'] === $sessionData['session_cookie']) {
			$userid = $_SESSION['userid'];
			$email = $_SESSION['email'];
			$userStatus = $_SESSION['status'];
			$newSessId = $sessionData['session_id'];
			$loggedIn = $sessionData['session_token'];
			$loggedBool = $_SESSION['logged_in_token'];
			$newCookie = $_SESSION['new_sess_cookie'];

			if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {
			} 
			else {
				header('location: forum');
			}
	}
}
require 'header.php';
?>

<section class="wrapper reg-page entry-page">
<div class="logo-header">
	<a href="https://longrichs.com">
		<img src="resources/images/logo.png" alt="Logo"></a>
	<a href="https://longrichs.com" class="home-page">&nbsp;Home</a>
</div>

<fieldset class="login sign-up">
<h2>Register for Longrich-E Account</h2>
<br />
<form method="POST" 
	  id="signup-form" 
	  name="regFrm" 
	  autocomplete="off"  
	  class="reg-form"
	  enctype="multipart/form-data" 
	  novalidate="novalidate">
<table>

<tbody>
	<tr>
		<td>
			<legend>Family Name
			<input type="text" 
				   name="familyName" 
				   maxlength="100" 
				   class="italics family-name regInput requiredv" 
				   placeholder="Enter your Surname" 
				   autofocus="autofocus" 
				   maxlength="30" 
				   autocomplete="off" 
				   value="<?= $fmName; ?>">
			</legend>
		</td>
		<td>
			<legend>First Name
			<input type="text" 
				   name="firstName" 
				   maxlength="100" 
				   class="italics first-name regInput requiredv" 
				   placeholder="Enter your First Name" 
				   maxlength="30" 
				   autocomplete="off" 
				   value="<?= $fsName; ?>">
			</legend>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<legend>Password <span class="inputReq"> (Must contain at least 1 uppercase letter, 1 lowercase letter, 1 number and at least 8 characters long) </span>
			<span class="showPass far fa-eye-slash"></span>
			<input type="password" 
				   name="password" 
				   maxlength="100" 
				   class="italics reg-password regInput requiredv" 
				   placeholder="Enter new passoword" 
				   autocomplete="off" 
				   value="">
			</legend>
		</td>
	</tr>

	<tr>
		<td>
			<legend>Email Address
			<input type="text" 
				   name="email" 
				   maxlength="100" 
				   class="italics reg-email regInput requiredv" 
				   placeholder="Enter your email" 
				   autocomplete="off" 
				   value="">
			</legend>
		</td>

		<td>
			<legend class="italics">Phone No. 
			<span class="inputReq">(Exclude '+234 & -' )</span>
			<input type="number" 
				   name="regPhone" 
				   autocomplete="off"
				   class="italics reg-phone regInput requiredv" 
				   placeholder="Example: 0x0 0000 0000" 
				   ng-model="number" 
				   onKeyPress="if(this.value.length === 11) return false;" 
				   value="<?= $regPhone; ?>">
			</legend>
		</td>
	</tr>

	<tr>
		<td colspan="2">
		<legend>Home Address
			<input type="text" 
					name="address" 
					class="italics home-address regInput requiredv" 
					maxlength="100" 
					placeholder="Enter your Home Address" 
					autocomplete="off" 
					value="<?= $address; ?>">
		</legend>
		</td>
	</tr>	

	<tr>
		<td colspan="2">
		<legend class="exception">Your Sponsor Code:
			<span class="inputReq"></span>
			<input type="text" 
				   name="sponsorcode" 
				   maxlength="15" 
				   max="15" 
				   placeholder="Enter sponsor code" 
				   class="italics sponsor-cd regInput" 
				   autocomplete="off" 
				   value="<?= $sponCode; ?>">
		</legend>
		</td>
	</tr>

<tr>
<td>
	<legend> Entry Level (Reg. Amount)<?php include("entry.php") ?></legend>
</td>
<td>
<div id="doc-wrapper">
	<legend class="exception">Document Type (5MB Max)&nbsp;
	<span class="info">
	<i class="fas fa-info"></i>
	</span>	

	<span class="doc-tooltip">
	Please upload a valid Government issued Identity (5 MB Max). This document will be used for Account Recovery Purposes and For Verification Resolutions.
	</span>	
<?php include_once 'doc-type.php'; ?>

<div class="image-upload" title="Upload file">
	<i class="fas fa-file-upload"></i>
	<i class="fas fa-check"></i>
	<input type="file" 
		   id="doc-upload" 
		   class="regInput document-upload" 
		   name="govimage" 
		   accept=".jpg, .png, .jpe, .jpeg, .jfif, .png, .bmp, .dib, .pdf">
</div>

</legend>
</div>
</td>
</tr>

<tr>
<td>
<legend>Bank Name					

<select name="bankname" class="bankname bank-name regInput requiredv">
	<option disabled="disabled"></option>
	<option value="0" selected="selected">Select Bank</option>
	<option <?= ($bankName === 'first bank')? 'selected' : '' ?>  value="first bank">First Bank</option>
	<option <?= ($bankName === 'zenith bank')? 'selected' : '' ?> value="zenith bank">Zenith Bank</option>
	<option <?= ($bankName === 'access bank')? 'selected' : '' ?> value="access bank">Access Bank</option>
	<option <?= ($bankName === 'gtbank')? 'selected' : '' ?> value="gtbank">GT-Bank</option>
	<option <?= ($bankName === 'ecobank')? 'selected' : '' ?> value="ecobank">Ecobank</option>
	<option <?= ($bankName === 'uba bank')? 'selected' : '' ?> value="uba bank">UBA Bank</option>
	<option <?= ($bankName === 'access(diamond bank)')? 'selected' : '' ?> value="access(diamond bank)">Access (Diamond)</option>
	<option <?= ($bankName === 'union bank')? 'selected' : '' ?> value="union bank">Union Bank</option>
	<option <?= ($bankName === 'fidelity bank')? 'selected' : '' ?> value="fidelity bank">Fidelity Bank</option>
	<option <?= ($bankName === 'skye bank(polaris bank)')? 'selected' : '' ?> value="skye bank(polaris bank)">Skye Bank (Polaris)</option>
	<option <?= ($bankName === 'unity bank')? 'selected' : '' ?> value="unity bank">Unity Bank</option>
	<option <?= ($bankName === 'stanbic IBTC')? 'selected' : '' ?> value="stanbic IBTC">Stanbic IBTC</option>
	<option <?= ($bankName === 'keystone bank')? 'selected' : '' ?> value="keystone bank">Keystone Bank</option>
	<option <?= ($bankName === 'sterling bank')? 'selected' : '' ?> value="sterling bank">Sterling Bank</option>
	<option <?= ($bankName === 'wema Bbank Plc')? 'selected' : '' ?> value="wema Bbank Plc">Wema Bank Plc</option>
	<option <?= ($bankName === 'standard chartered bank')? 'selected' : '' ?> value="standard chartered bank">Standard Chartered Bank</option>
	<option <?= ($bankName === 'FCMB')? 'selected' : '' ?> value="first City monument bank">FCMB</option>
	<option disabled="disabled"></option>
</select>

</legend>
</td>
	<td>
		<legend>Bank Acc. Number <span class="acc-ten-digits">(10 digits)</span>
			<input type="number" 
				   name="accountno" 
				   class="italics accountno regInput requiredv" 
				   placeholder="Enter Bank Acc number" 
				   ng-model="number" 
				   onKeyPress="if(this.value.length === 10) return false;"  
				   autocomplete="off" 
				   value="<?= $accNumber ?>">				
		</legend>
	</td>
</tr>

<tr id="cucaragacha">
	<td>
		<legend> Institution
			<input type="text" name="institution" class="cucaragacha">
		</legend>
	</td>
</tr>

	<tr>
		<td>
		<legend>Birth Day
		<input type="date" 
			   name="dateofb" 
			   value="<?= $dateofB; ?>" 
			   class="birthdate dateofb regInput requiredv" 
			   min="1940-01-01" 
			   max="2015-12-31">	
		</legend>
		</td>

		<td>
		<legend>Gender
			<select name="gender" class="gendertype gender regInput requiredv">
				<option disabled="disabled"></option>
				<option selected="selected" value="0">Gender</option>
				<option <?= ($gender === 'Female' )? 'selected' : '' ; ?>>Female</option>
				<option <?= ($gender === 'Male' )? 'selected' : '' ; ?>>Male</option>
				<option disabled="disabled"></option>
			</select>			
		</legend>
		</td>
	</tr>

<tr>
<td>
<legend>State
<select name="userstate" id="states" class="state userstate regInput requiredv">
	<?php require 'state.php'; ?>
</select>
</legend>
</td>

<td>
<legend>City
<select name="usercity" id="cities" class="city usercity regInput requiredv">
	<option disabled="disabled"></option>
	<?php require 'cities.inc.php'; ?>
	<option disabled="disabled"></option>
</select>
</legend>
</td>
</tr>

<tr>
<td colspan="2">

	<div id="email-exist">
		<?php echo $error; ?>
	</div>
	<div id="bug_msg"></div>
</td>
</tr>

<tr>
<td colspan="3" class="notification">
	<div id="reg-modal">
		<span>Processing, please wait ...</span>
		<div id="submit-loader"></div>
	</div>
	After successfully creating an account, you need to select product(s) of your choice that are worth in total the Entry level amount above in order to start using your referral link and start earning.<br /> <br />
<span class="agree">By Creating account, you agree to our <a href="terms">user agreement</a> 
</span>
</td>
</tr>

<tr>
	<td>
	<br />

	 <!--<button type="submit" name="regbtn" id="regbtn-disable" class="register-btn">Create an Account</button> -->
	 
	</td>
</tr>

</tbody>		
</table>
<br />

<span class="not-a-member-yet sign-up">Have an account?&nbsp;
	<a href="login" class="register-link">Log In
	</a>&nbsp;to your Account
</span>
</form>

<div class="sign-up-instruction">
<span>Fields marked with 
	<span class="fieldmarked">*
	</span> are required.
</span>
<br /><br />
A Comfirmation link will be sent to the email address you used for registeration. Please click on the link to confirm your email. <br /><br />
Stk.B = Stockist Bonus. <br /> Gs.B = Group Sales Bonus. <br />Pm.B = Performance Bonus.<br /><br />

<span class="fieldmarked">
- Bank name, <br />
- Account number, <br />
- Account name, <br />
- Phone number and <br />
- Date of Birth CANNOT be edited once registered.
<br />
<br />
Please use the same name that appeared on your Bank Account details for registeration.
<br />
<br />
Note: Minimum entry level required to start earning is Q-Silver (60pv).

</span>
<br />
<br />

<table class="sign-up-table">
	<th>
		<tr class="center">
			<td colspan="3">Entry Level Selection Guide</td>
		</tr>
	</th>
		<tr>
			<td>Entry Level</td>
			<td>Qualification</td>
			<td>Commission</td>
		</tr>

		<tr>
			<td>Senior Stockist</td>
			<td>15,000 PV</td>
			<td>12% + 6% Stk.B + 1% Gs.B</td>
		</tr>

		<tr>
			<td>Junior Stockist</td>
			<td>5,000 PV</td>
			<td>12% + 4% Stk.B + 1% Gs.B</td>
		</tr>

		<tr>
			<td>Platinum VIP</td>
			<td>1,680 PV</td>
			<td>12% + 1% Gs</td>
		</tr>

		<tr>
			<td>Platinum</td>
			<td>720 PV</td>
			<td>12%</td>
		</tr>

		<tr>
			<td>Gold</td>
			<td>240 PV</td>
			<td>10%</td>
		</tr>

		<tr>
			<td>Silver</td>
			<td>120 PV</td>
			<td>8%</td>
		</tr>

		<tr>
			<td>Q-Silver</td>
			<td>60 PV</td>
			<td>8%</td>
		</tr>

		<tr>
			<td>Combo</td>
			<td>4 PV</td>
			<td>N/A</td>
		</tr>
</table>

<br /><br />
<div class="phpError"><?php echo $error; ?></div>
</div>
</fieldset>
</section>

<?php include 'x-footer.php'; ?>

<script type="text/javascript">
var regSuccess = $(".success_msg");
var regInput = $('[class*="regInput"]');
var fmSubmInput = $('[class*="requiredv"]');
var errorMsg = [
	'Error!, Please fill in all required fields.',
	'Family name cannot be empty.',
	'First name cannot be empty.',
	'Your names must be a minimum 2 charachters.',
	'Error!, Password field is required.',		
	'Password must be minimum of 8 charachters.',
	'Password entered is weak.',
	'Email address is required.',
	'Please enter a valid email address.',
	'Please enter a valid Phone number.',
	'Error!, address field is required.',
	'Please enter a valid residence address.',
	'Please enter your correct sponsor code.',
	'Please choose an entry level.',
	'Select a verification document type.',
	'Please upload your selected document type.',
	'Please select your bank name.',
	'Your bank account number is required.',
	'Please enter a valid account number 10 digits.',
	'Your date of birth is required',
	'Please select your gender type.',
	'Your state is required.',
	'Please select your city.',
	'Please select your state first before city.',
	'Image size is larger than 5 MB. Allowed max size is 5 MB.'
];

var regForm,
	errFunc;
	
errFunc = (elem, eIndex)=> {
	$(elem).css('border', '1.1px solid #ff0000');
	error.html('<div class="error_msg">'+errorMsg[eIndex]+'</div>');
	return false;
};

 var fmvalue = $('.family-name'),
	 fsvalue = $('.first-name'),
	 rpvalue = $('.reg-password'),
	 revalue = $('.reg-email'),
	 epvalue = $('.reg-phone'),
	 havalue = $('.home-address'),
	 flvalue = $('.sponsor-cd'),
	 mlvalue = $('.m-level'),
	 imgUpload = $('.image-upload'),
	 bnvalue = $('.bank-name'),
	 acvalue = $('.accountno'),
	 bdvalue = $('.dateofb'),
	 gdvalue = $('.gender'),
	 usvalue = $('.userstate'),
	 ucvalue = $('.usercity'),
	 rform,
	 erroNo = errorMsg[24];

var regDelay = ()=> {
	$('#reg-modal').css('display', 'block');
	$('#regbtn-disable').css({
		'background': '#d4d7db',
		'cursor': 'not-allowed',
		'color': '#4d5157'
	}).attr('disabled', 'disabled');

}

$("#signup-form").submit(function(e) {
	e.preventDefault();
	return false;
	rform = $('#signup-form')[0];
	const numberRegExp = /^\d{11}/;
	const accNoRegExp = /^\d{10}/;
	const wrongAddress = /^[a-zA-Z0-9\s,.'-]{1,}$/g;
	const emailRegExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	const passRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g;

		(fmvalue.val() === '' &&
		fsvalue.val() === '' &&
		rpvalue.val() === '' &&
		revalue.val() === '' &&
		epvalue.val() === '' &&
		havalue.val() === '' &&
		mlvalue.val() === '0' &&
		bnvalue.val() === '0' &&
		acvalue.val() === '' &&
		bdvalue.val() === '' &&
		gdvalue.val() === '0' &&
		usvalue.val() === '0' &&
		ucvalue.val() === '0')?
		    errFunc(fmSubmInput, 0) :
		(fmvalue.val() === '')?
			errFunc(fmvalue, 1) :
		(fmvalue.val().length < 2)? 
			errFunc(fmvalue, 3) :
		(fsvalue.val() === '')?
			errFunc(fsvalue, 2) :
		(fsvalue.val().length < 2)?
			errFunc(fsvalue, 3) :
		(rpvalue.val() === '')?
			errFunc(rpvalue, 4) :
		(rpvalue.val().length < 8)?
			errFunc(rpvalue, 5) :
		(!passRegExp.test(rpvalue.val()))?
			errFunc(rpvalue, 6) :
		(revalue.val() === '')?
			errFunc(revalue, 7) :
		(!emailRegExp.test(revalue.val()))?
			errFunc(revalue, 8) :
		(epvalue.val() === '' || epvalue.val().length < 11 || !numberRegExp.test(epvalue.val()))?
			errFunc(epvalue, 9) :
		(havalue.val() === '')?
			errFunc(havalue, 10) :
		(!wrongAddress.test(havalue.val()))?
			errFunc(havalue, 11) :
		(flvalue.val() != '' && flvalue.val().length > 15)?
			errFunc(flvalue, 12) :
		(mlvalue.val() === '0')?
			errFunc(mlvalue, 13) :
		(bnvalue.val() === '0')?
			errFunc(bnvalue, 16) :
		(acvalue.val() === '')?
			errFunc(acvalue, 17) :
		(acvalue.val().length < 10 || !accNoRegExp.test(acvalue.val()))?
			errFunc(acvalue, 18) :
		(bdvalue.val() === '')?
			errFunc(bdvalue, 19) :
		(gdvalue.val() === '0')?
			errFunc(gdvalue, 20) :
		(usvalue.val() === '0')?
			errFunc(usvalue, 21) :
		(ucvalue.val() === '0')?
			errFunc(ucvalue, 22) :
		(()=> {
				regDelay();
				$(rform).unbind('submit').submit();
		})();

$(regInput).on('keyup change', (e)=> {
		const numberRegExp = /^\d{11}/;
		const accNoRegExp = /^\d{10}/;
		const wrongAddress = /^[a-zA-Z0-9\s,.'-]{1,}$/g;
		const emailRegExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		const passRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/g;
		error.html('');

		if($(e.target).attr('class').match(/\b(family-name)\b/)) {
				($(e.target).val() === '')?
				errFunc(e.currentTarget, 1)
				: ($(e.target).val().length < 2)? 
				errFunc(e.currentTarget, 3)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(first-name)\b/)) {
				($(e.target).val() === '')?
				errFunc(e.currentTarget, 2)
				: ($(e.target).val().length < 2)? 
				errFunc(e.currentTarget, 3)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(reg-password)\b/)) {
				($(e.target).val() === '')?
				errFunc(e.currentTarget, 4)
				: ($(e.target).val().length < 8)? 
				errFunc(e.currentTarget, 5)
				: (!passRegExp.test($(e.target).val()))? 
				errFunc(e.currentTarget, 6)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(reg-email)\b/)) {
				($(e.target).val() === '')?
				errFunc(e.currentTarget, 7)
				: (!emailRegExp.test($(e.target).val()))? 
				errFunc(e.currentTarget, 8)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(reg-phone)\b/)) {
				($(e.target).val() === '')?
				errFunc(e.currentTarget, 9)
				: (!numberRegExp.test($(e.target).val()) || e.keyCode === 110 || e.keyCode === 190 || e.keyCode === 107 || e.keyCode === 109)?
				errFunc(e.currentTarget, 9)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(home-address)\b/)) {
				($(e.target).val() === '')?
				errFunc(e.currentTarget, 10)
				: (!wrongAddress.test($(e.target).val()))? 
				errFunc(e.currentTarget, 11) 
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(sponsor-cd)\b/)) {
				($(e.target).val() != ''  && $(e.target).val().length > 15)?
				errFunc(e.currentTarget, 12)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(m-level)\b/)) {
				($(e.target).val() === '0')?
				errFunc(e.currentTarget, 13)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(bank-name)\b/)) {
				($(e.target).val() === '0')?
				errFunc(e.currentTarget, 16)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(accountno)\b/)) { 
				($(e.target).val() === '')?
				errFunc(e.currentTarget, 17) : 
				(!accNoRegExp.test($(e.target).val()) || e.keyCode === 110 || e.keyCode === 190 || e.keyCode === 107 || e.keyCode === 109)?
				errFunc(e.currentTarget, 18)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(dateofb)\b/)) {
				($(e.target).val() === '')?
				errFunc(e.currentTarget, 19)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(gender)\b/)) {
				($(e.target).val() === '0')?
				errFunc(e.currentTarget, 20)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(userstate)\b/)) {
				($(e.target).val() === '0')?
				errFunc(e.currentTarget, 21)
				: noerrb(e.currentTarget);
		}
		else if($(e.target).attr('class').match(/\b(usercity)\b/)) {
				($(e.target).val() === '0')?
				errFunc(e.currentTarget, 22)
				: noerrb(e.currentTarget);
		}
	});
}); 


$('#cities > option').addClass('nodisplay');
	var stOptions = $('#states > option'),
		cities,
		cityRange,
		convcityR,
		stdState = null;

$('#states').on('change', function() {	
	$('#cities').trigger('change').val(0);
	var stname, 
		cities = $('#cities > option');
		stdState = $(this).find(':selected').data('state');
		cityRange = $(this).find(':selected').data('cities');

		(stdState !== null || stdState !== 'zero')?
		noerrb(ucvalue) :
		console.log('');
	var selectCity = (cities, [s, u])=> {
			return $(cities).each(function(o, k) {
					 (o >= s && o <= u)? 
					 $(k).removeClass('nodisplay') : 
					 $(k).addClass('nodisplay');
		});
	}
	convcityR = cityRange.split(',').map(Number);
	for(var e = 2; e < stOptions.length - 1; e++) {
		stname = $(stOptions[e]).text();
		(stdState !== 'zero' && stname !== 'Select State')?
			(stdState === stname)?
			selectCity(cities, convcityR) : 
			console.log('')		
		  : console.log('');
	}	
});
$('#cities').on('click change', function() {
	selCity = $(this).find(':selected').data('city')
	if(stdState === null || stdState === 'zero') {
		$('#cities > option').addClass('nodisplay');
		errFunc(ucvalue, 23);
	}
});
</script>






