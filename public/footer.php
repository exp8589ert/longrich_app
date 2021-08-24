<?php 

function loginStatus($showDATA) {

if (isset($_COOKIE['c_user'])) {
	$sessionData = $showDATA->getSessionData($_COOKIE['c_user']);
	if($_COOKIE['c_user'] === $sessionData['session_cookie']) {
		
		$newSessId = $sessionData['session_id'];
		$loggedIn = $sessionData['session_token'];
		$loggedBool = $_SESSION['logged_in_token'];
		$newCookie = $_SESSION['new_sess_cookie'];	

		if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {
			$notLoggedIn = false;
			return $notLoggedIn;
		} 
		else {
			
			$notLoggedIn = true;
			return $notLoggedIn;
		}
	}
}
}

?>

<footer id="footer">
<div class="inner-footer">
<table>
	<thead>
		<tr>
			<th>LONGRICHS.COM</th>
			<th>OPPORTUNITIES</th>
			<th>QUICK LINKS</th>					
			<th>HELP & INFO</th>
			<th>CONTACT US</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><a href="forum">Home</a></td>
			<td><a href="benefits#house-incentives">25 Million naira Incentive</a></td>			
			<td><a href="earnings">Sample Earnings</a></td>		
			<td><a href="help">F.A Questions.</a></td>			
			<td><a href="<?php require 'includes/app.whatsapp.php' ?>">Whatsapp</a></td>
		</tr>
		<tr>
			<td><a href="company">About Longrich</a></td>
			<td><a href="benefits#mba-programme">Executive MBA programme</a></td>
			<td><a href="https://icctnetwork.com" target="_blank">Developers { } </a></td>	
			<td><a href="terms">Terms of Use</a></td>		
			<td><a href="email-us" target="_blank">Email Us</a></td>
		</tr>
		<tr>
			<td><a href="benefits#systems">Bonus Systems</a></td>
			<td><a href="benefits#car-incentives">Car Incentives</a></td>
			<td><a href="benefits#advanced">Bonus Calculator</a></td>
			<td><a href="<?php require 'includes/app.telegram.php' ?>">Telegram</a></td>			
			<td>	
				<a href="payments" class="payment" title="Master card">
					<img class="master-card" />
				</a>
				<a href="payments" class="payment" title="Western Union">
				<img class="western-union" />
				</a>
				</td>
		</tr>
		<tr>
			<td><a href="products">Product Categories</a></td>
			<td><a href="benefits#travelIncentive">Travel Incentives</a></td>
			<td>
				<?php
				if(loginStatus($showDATA) === true) {
					
					$userid = 	$_SESSION['userid'];
					$familyName = $_SESSION['familyName'];
					$firstName = $_SESSION['firstName'];
					$userCode = $_SESSION['user_code'];

					echo '<a href="profile?_r='.$userCode.strtolower($familyName). '.' .strtolower($firstName).'?_y='.$_SESSION['roChar'].'&'.$Fuserid.'&'.$_SESSION['rThrChar'].'" >Profile</a>';
				}
				else {
					echo '<a href="signup">Sign Up</a>';
				}
				?>
			</td>
			<td><a href="terms">Privacy Policy</a></td>	
		</tr>
		<tr>	
			<td><a href="forum">Discussion Forum</a></td>	
			<td><a href="benefits#scholarshipIncentive">Scholarship Incentives</a></td>
			<td>
				<?php
				if(loginStatus($showDATA) === true) {
					echo '<a href="logout">Logout</a>';
				}
				else {
					echo '<a href="login">Sign In</a>';
				}
				?>
			</td>
			
		</tr>
	</tbody>
</table>
</div>
<div class="copy-right">@&nbsp;<?php $tdate = new dateTime();
				echo date_format($tdate, 'Y'); ?> Longrichs.com. All Right Reserved</div>
</footer>


<script src="assets/script/script.js"></script>
</body>
</html>


