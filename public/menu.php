<?php 
	if(!isset($_SESSION)) { session_start(); }
?>

<aside class="general-menu menuright">
<nav>
<ul class="nav-list">
	<a href="https://longrichs.com/forum"><li><i class="fab fa-flipboard "></i>&nbsp; Home</li></a>
	<a href="https://longrichs.com">
		<li><i class="fas fa-boxes small-nav-icon"></i>&nbsp; Welcome</li></a>
	<a href="benefits"><li><i class="fas fa-bullseye small-nav-icon"></i>&nbsp; Benefits</li></a>
	<a href="products" class="extra-a-list" >
		<li class="product-cate"><i class="fas fa-align-justify small-nav-icon">
		</i>&nbsp; Products<i class="fas fa-chevron-down"></i>

	<ul class="extra-list">
		<li><a href="products#daily-cosmetics">Daily Cosmetics</a></li>
		<li><a href="products#health-care">Health Care</a></li>
		<li><a href="products#superklean">Superklean</a></li>
		<li><a href="products#health-series">Health Series</a></li>
		<li><a href="products#nutri-vrich">Nutri VRich</a></li>
		<li><a href="products#energy-shoes">Energy Shoes</a></li>
		<li><a href="products#accessories">Accessories</a></li>
		<li><a href="products#value-pack">Value Pack</a></li>
	</ul>
</li></a>
				 
<a href="help"><li><i class="far fa-question-circle small-nav-icon"></i>&nbsp; Help & Info </li></a>			
<a href="company"><li><i class="fab fa-artstation small-nav-icon"></i>&nbsp; Company Bio</li></a>
<a href="#cart" class="action-btn"><li id="cart" title="Shopping Cart" class="action-btn"><span id="cartCounter" class="action-btn"></span><i class="fas fa-cart-plus action-btn small-nav-icon"></i>Cart</li>
</a>

<ul id="cart-items" class="nodisplay menu-tray action-btn"><?php require 'cart.php'; ?>
</ul>

<?php

	$login = '<a href="login" class="exception"><li class="access-link pipe">Log In</li></a>';
	$signup = '<a href="signup" class="exception">
	<li class="access-link active-link">Sign Up</li></a>';


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
				echo $login.''.$signup;
			} 
			else {
				$userCred = $showDATA->acc_prof_ref_Table($email);
				$profImg = $userCred['prof_image'];
				$famname = $userCred['family_name'][0];
				$fstname = $userCred['first_name'][0];
				$puserCode = $userCred['user_code'];
				
				echo '<a href="https://longrichs.com/profile?r_='.$puserCode.strtolower($famname).'.'.strtolower($fstname).$_SESSION['rThrChar'].'" class="logged-in small-screen">
					<div class="pimg "><img src="'.$profImg.'" class=""></div>
					</a>';

				echo '<a href="#" class="logged-in action-btn large-screen">
					<div class="pimg action-btn"><i class="fas fa-sort-down action-btn"></i><img src="'.$profImg.'" class="action-btn">
					</div>
					</a>


				<ul id="accounty" class="menu-tray action-btn">
					<a href="https://longrichs.com/profile?r_='.$puserCode.strtolower($famname).'.'.strtolower($fstname).$_SESSION['rThrChar'].'">
						<li><i class="fas fa-user-cog"></i>
						&nbsp;&nbsp;Profile</li>
					</a>
					<a href="https://longrichs.com/profile?r_='.$puserCode.$_SESSION['rThrChar'].'"><li><i class="fas fa-mail-bulk"></i>&nbsp;&nbsp;Inbox</li>
					</a>
					<a href="benefits?r_='.$puserCode.$_SESSION['rThrChar'].'#advanced" target="_blanket"><li>
						<i class="fas fa-calculator"></i>&nbsp;
						&nbsp;Calculator</li>
					</a>
					<a href="https://longrichs.com/earnings?r_='.$puserCode.$_SESSION['rThrChar'].'" target="_blanket"><li>Earning Sample &nbsp;<i class="fas fa-donate"></i></li>
					</a>
					<a href="https://longrichs.com/cpass?r_='.$puserCode.$_SESSION['rThrChar'].'" target="_blanket"><li><i class="fas fa-lock"></i>&nbsp;&nbsp;Change password</li>
					</a>
					<a href="https://longrichs.com/help?r_='.$puserCode.$_SESSION['rThrChar'].'" target="_blanket"><li><i class="far fa-comments"></i>&nbsp;&nbsp;Support Center</li>
					</a>
					<a href="https://longrichs.com/logout"><li><i class="fas fa-power-off"></i>&nbsp;&nbsp;Log out</li>
					</a>
				</ul>';
			}
		}
		else {
			echo $login.''.$signup;
		}
	}
	else {
	echo $login.''.$signup;
}		
?>

<script>
$("ul.menu-tray").addClass('nodisplay');
$("a.action-btn").each((x, y)=> {
	$(y).on('click', (e)=> {
		e.preventDefault();
		var result = $(e.target).hasClass('action-btn');
		if(result === true) {				
			$(y).next('ul.menu-tray').toggleClass('nodisplay display');
		}
					
	});
	$(window).click((e)=> {
		$(e.target).hasClass('action-btn')? 
			$(y).next('ul.menu-tray').addClass('display') : 
			$(y).next('ul.menu-tray').addClass('nodisplay');
	});
});
</script>

</ul>
</nav>
</aside>