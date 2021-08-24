<?php 
require 'includes/check.php';

if(!isset($_SESSION)) { session_start(); }

$_SESSION['errmessage'] = "<div class='error_msg'>You must be logged in before accessing your profile page. Please login to your account <br /> using your already registered details or <a href='signup'>Register</a> a new account. <br /><br />If you wish to retrieve your user account information, please click on forgot <a href='femail.php'>email address</a><br />or <a href='fpass.php'>password</a> on <a href='login'>log In</a> page or See <a href='help.php'>FAQ</a> on how do I retrieve my email and/or password?</span></div>";

if (isset($_COOKIE['c_user'])) {

	$sessionData = $showDATA->getSessionData($_COOKIE['c_user']);
	if($_COOKIE['c_user'] === $sessionData['session_cookie']) {

		$newSessId = $sessionData['session_id'];
		$loggedIn = $sessionData['session_token'];
		$loggedBool = $_SESSION['logged_in_token'];
		$newCookie = $_SESSION['new_sess_cookie'];	
				
		if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {
			$_SESSION['errmessage'];
			header('location: error.php');
		} 
		else {
		$email = $_SESSION['email'];
		$userCred = $showDATA->acc_prof_ref_Table($email);
		if($userCred === false) {
			header('location: logout');
		}
		
		$dbUserId = $userCred['user_id'][0];
		$loggedInUc = $userCred['user_code'];
		$userReferralUrl = $userCred['referral_url'];
		if(isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI'])) {
			$urlUserId = htmlspecialchars(stripslashes(strip_tags($_SERVER['REQUEST_URI'])));
			$result = substr($urlUserId, 12, 14); 
			$usersCode = $showDATA->acc_prof_ref_usercode($result); 
			$_SESSION['urlResult'] = $usersCode;
			
			if($usersCode === false) {
				header('location: forum');
			} 
			else {
				
				$accUsersId = $usersCode['user_id'][0];
				$accUsersCode = $usersCode['user_code'];
				$profImg = $usersCode['prof_image'];
				$username = $usersCode['user_name'];
				$famName = $usersCode['family_name'][0];
				$firstName = $usersCode['first_name'][0];
				$accUserEmail = $usersCode['email'];
				$accUserPhone = decFunc($usersCode['phone'], $enckey);
				$userAddress = decFunc($usersCode['address'], $enckey);
				$userPackage = $usersCode['package'];
				$docType = $usersCode['doc_type'];
				$userDocImage = $usersCode['doc_image'];
				$userGender = decFunc($usersCode['gender'], $enckey);
				$userState = decFunc($usersCode['state'], $enckey);
				$userCity = decFunc($usersCode['city'], $enckey);
				$userAccRegDate = $usersCode['reg_date'];
				$membershipCode = $usersCode['mem_code'];
				$profBiography = $usersCode['prof_biography'];
				$memStatus = $usersCode['user_status'];
				$amountPaid = $usersCode['amount_paid'];
				$totalPv = $usersCode['total_pv'];				
				$shippAddress = decFunc($usersCode['shipping_address'], $enckey);
				$activeStatus = $usersCode['active'];
				$facebkURL = $usersCode['facebook_link'];
				$instagramURL = $usersCode['instagram_link'];
				$whatsappURL  = $usersCode['whatsapp_link'];
				$refByuId  = $usersCode['ref_by_userid'];
				$readStatus = '0';
			$unreadMsg = $showDATA->unreadMsgCount($accUsersId, $readStatus);
			$userInboxMsg = $showDATA->getInboxMsg($accUsersId);
			$randMsg = $showDATA->showRandomMsg();

	}
}

 

$picRand = genhash(5);

if(isset($_POST['upload-img']) && $_FILES['pimgupload']['error'] == UPLOAD_ERR_OK) {

$oldimage = $usersCode['prof_image'];
if($_FILES['pimgupload']['size'] < 5000000) {
	$ppimage = $_FILES['pimgupload']['name'];
		$extensions = ['jpg', 'jpe', 
					   'jpeg', 'jfif', 
					   'png', 'bmp', 
					   'dib', 'gif' ];

		$array = explode('.', $ppimage);
		$type = strtolower(end($array));

		if(in_array($type, $extensions)) { 
			$newImgname = $picRand . '.' . $type;
			$renamed = "resources/images/profile/".basename($newImgname);
			move_uploaded_file($_FILES['pimgupload']['tmp_name'], $renamed);
			$response = $inputData->profileImgUpdate($renamed, $dbUserId);
			if($response === null) {
				$error = '<div id="upload-success">Profile Image updated successfully. <i class="far fa-check-circle"></i></div>';
			} else {
				$error = '<div id="upload-err">Error &nbsp;Image update failed. Please try again. <i class="fas fa-times"></i> </div>';
			}
			$oldImg = 'resources/images/profile/'.basename($oldimage);
			if(is_file($oldImg)) {
				unlink($oldImg);
			}
		} 
		else { 
			$error = '<div><i class="fas fa-exclamation-triangle"></i>&nbsp; Image type not supported. Please upload a jpg, jpe, jpeg, png, bmp, or gif file type.</div>'; 
		}
		}
else {
	$error = '<div><i class="fas fa-exclamation-triangle"></i> &nbsp; Image size is larger than 5 MB. Maximum required image size is 5 MB.</div>';
}
} 
elseif (isset($_POST['upload-img']) && $_FILES['pimgupload']['error'] != UPLOAD_ERR_OK) {
$error = '<div><i class="fas fa-exclamation-triangle"></i>&nbsp; No image file selected. Please select an image file with extension Jpg, Jpe, Jpeg, Png, Jfif, Bmp, Dib or Gif.</div>';
}


$sortOrder = 'ASC';
$limitNum = null;
$usersPostHistory = $showDATA->account_forum_profile($sortOrder, $limitNum);
$referredUsers = $showDATA->FA_ref_userc($accUsersCode);
$userCode = $refByUc = $usersCode['user_code'];
$usersCode = $showDATA->acc_prof_ref_usercode($result); 
$profImgx = $usersCode['prof_image'];
$buyer_userid = $ucodeUserId = $usersCode['user_id'][0];
$postcounter = $showDATA->postCount($ucodeUserId);
$products = $showDATA->acc_prod_ppurc($buyer_userid);
$unreadRefCount = $showDATA->unreadRefCount($refByUc, $readStatus);

if($products !== false) {
	$productsCount = count($products);
}

function postHistory($usersPostHistory, $showDATA, $ucodeUserId, $postcount) {
	foreach($usersPostHistory as $column) {

		$urlUserCode = $column['user_code'];
		$arrayId = $column['user_id'];
		$Fuserid = $arrayId[0];
		$FamilyName = $column['family_name'];
		$FirstName = $column['first_name'];
		$pimage = $column['prof_image'];
		$userpost = $column['post_text'];
		$postImage = $column['post_image'];
		$date = new dateTime($column['post_date']);
		$postdate = date_format($date, 'M d, Y @ h:i A');
		$postcode = $column['post_code'];
		$likecounter = $column['post_like'];
		$dislikecounter = $column['post_dislike'];
		$replycounter = count($showDATA->reply_count($postcode));
		$_SESSION['urlUserCode'] = $urlUserCode;
		$_SESSION['FamilyName'] = $FamilyName;
		$_SESSION['FirstName'] = $FirstName;
		$_SESSION['Fuserid'] = $Fuserid;
							

if($ucodeUserId == $Fuserid) {


  echo '<div class="wrapper">
		<div class="image-wrapper">
		<a href="profile?_r='.$urlUserCode.strtolower($FamilyName). '.' .strtolower($FirstName).'?_y='.$_SESSION['roChar'].'&'.$Fuserid.'&'.$_SESSION['rThrChar'].'" >
		<img src="'.$pimage.'" class="to-profile">

			<div class="namedate">
			<span class="name">
			<a class="name-a" href="profile?_r='.$urlUserCode.strtolower($FamilyName). '.' .strtolower($FirstName).'?_y='.$_SESSION['roChar'].'&'.$Fuserid.'&'.$_SESSION['rThrChar'].'">'.$FamilyName.' '.$FirstName.'
			</a>
			</span><br />
			<span class="postdate">
			'.$postdate.'
			</span>
			</div>

		</a>
		</div>

		<div class="content-wrapper">
		<div class="postHist" autocorrect="on" disable="disable" spellcheck="spellcheck" maxlength="1000" readonly="true">'.$userpost.'
		</div><img src="'.$postImage.'" class="post-image">
		</div>';

			

echo '<div class="action-wrapper">';
									


$ratingInfo =  $showDATA->post_rating_info($postcodex);
$likeCnt = $dislikeCnt = 0;
$fontAw = $disFontAw = 'far';
$liked = '';
$colorCnt = '';
$disliked = '';
$colorDisCnt = '';

foreach ($ratingInfo as $ratingCol) {
	$ratActn = $ratingCol['rating_action'];
	$ratCount = intval($ratingCol['COUNT(*)']);	
	$raterUc = $ratingCol['user_code'];

	if($ratActn === 'like' && $raterUc === $puserCode) {
		$likeCnt = $ratCount;
		$liked = 'user-LIKED';
		$colorCnt = 'colour-liked';
		$fontAw = 'fas';
	} 
	elseif($ratActn === 'like' && $raterUc !== $puserCode) {
		$likeCnt = $ratCount;
	}
	if($ratActn === 'dislike' && $raterUc === $puserCode) {
		$dislikeCnt = $ratCount;
		$disliked = 'user-DISLIKED';
		$colorDisCnt = 'colour-disliked';
		$disFontAw = 'fas';
	} 
	elseif($ratActn === 'dislike' && $raterUc !== $puserCode) {
		$dislikeCnt = $ratCount;
	}
}	

echo '<span title="like" class="like-BTN '.$liked.'"><i class="'.$fontAw.' fa-thumbs-up"></i> &nbsp;LIKE [&nbsp;<span class="like-counter '.$colorCnt.'"> '.$likeCnt.' </span>&nbsp;]</span>';

echo '<span title="dislike" class="dislike-BTN '.$disliked.'"><i class="'.$disFontAw.' fa-thumbs-down"></i> &nbsp;DISLIKE [&nbsp;<span class="dislike-counter '.$colorDisCnt.'"> '.$dislikeCnt.' </span>&nbsp;]</span>';





echo '<span class="show-reply counter">Replies ('.$replycounter.')</span>
	<input type="hidden" value="'.$replycounter.'" />
	</div>

	<div class="reply-content">
	<div class="reply-wrapper">';

$userReply = $showDATA->acct_reply_profile($postcode);	

if($userReply !== false) {
	foreach($userReply as $replies) {
		$replyarrUserId = $replies['user_id'];
		$replyurlUserCode = $replies['user_code'];
		$replyUserId = $replyarrUserId[0];
		$UserReplyText = $replies['reply_text'];
		$dateFmt = new dateTime($replies['reply_date']);
		$replyDate = date_format($dateFmt, 'M d, Y @ h:i A');
		$userReplyCode = $replies['reply_code'];
		$replyProfImg = $replies['prof_image'];
		$FmName = $replies['family_name'];
		$FsName = $replies['first_name'];

			echo '<div class="reply-wrapper reply-display">';
			echo '<div class="image-wrapper replies">';
			echo '<a href="profile?_r='.$replyurlUserCode.strtolower($FmName). '.' .strtolower($FsName).'?_y='.$_SESSION['roChar'].'&'.$replyUserId.'&'.$_SESSION['rThrChar'].'" class="to-profile">
				<img src="'.$replyProfImg.'" class="profile replies"><div class="namedate reply">
				<span class="name">'.$FmName.' '.$FsName.'</span>
				</a><br />
							
				<span class="postdate">'.$replyDate. '</span>';
			echo '</div></div>';
			echo '<div class="reply-history" disable="disable" readonly="true">'.$UserReplyText.'</div>';
			echo '</div>';	
	}
}
			echo '</div></div>';
			echo '</div>';
	}
}
}
}
}
else {
	$_SESSION['errmessage'];
	header('location: error');
}
}
else {
	$_SESSION['errmessage'];
	header('location: error');
}

require 'header.php';
?>

<div class="image-holder profile-image-modal">
	<label class="target close" title="Close">
		<i class="fas fa-times"></i>
	</label>
	<div class="image-wrapper">
		<img class="profilexec exception" src="<?php echo $profImgx; ?>">
	</div>
</div>

<?php 

if($dbUserId === $ucodeUserId) {	

echo '<section class="user-update target u-modal">
	  <div class="target content exception container pf">
	  <i class="fas fa-times target close"></i>
	  <form class="target exception" id="user-update" name="userdata-update" method="POST" action="">
			<div class="target exception header">
			<img src="/longrichs.com/resources/vectors/edit.svg">&nbsp; EDIT PROFILE
			</div>
				<div class="bug_msg">'.$upError.'</div>
			<div class="third-inner-modal exception">
			</div>

		<table class="target exception">
			<tr>
				<td colspan="4">
					<label for="into-bio">Intro 
					<span>&nbsp;[<span class="small-device">Give a background information about yourself.</span> <span class="count"></span>  of 305.</span> ]
					<textarea id="into_bio" type="text" maxlength="305" name="">'.$profBiography.'</textarea>
					</label>
				</td>
				<td colspan="2">
					<label for="display-name" style="visibility: hidden;">Display name
						<select id="display-name" name="display-name">
							<option value="'.$famName.' '.$firstName.'">'.$famName.' '.$firstName.'</option>
							<option value="'.$username.'">'.$username.'</option>
							<option disabled="disabled"></option>
						</select>
					</label>
				</td>
			</tr>

			<tr>
				<td colspan="2"><br />
					<label for="family-name">Family name
					<input id="family-name" type="text" maxlength="50" name="updFamName" value="'.$famName.'" autocomplete="off" placeholder="">
					</label>
				</td>
				<td colspan="2">
					<br />
					<label for="first-name">First name
					<input id="first-name" type="text" maxlength="50" name="updFirstName" value="'.$firstName.'" autocomplete="off" placeholder="">
					</label>
				</td>
				<td colspan="2">
					<br />
					<label for="">Email address
					<input id="updateEmail" type="text" maxlength="100" name="" value="'.$accUserEmail.'" autocomplete="off">
					</label>
				</td>
			</tr>

			<tr>
				<td colspan="2">
					<br />
					<label for="phone-number">Phone number
					<input type="text" name="" placeholder="'.substr($accUserPhone, 0, 2).' * * * * * * * '.substr($accUserPhone, 9, 11).'" autocomplete="off" disabled="disabled">
					</label>
				</td>
				<td colspan="2"><br />
					<label for="">Entry level <span class="small-device">(Buy more products)</span>
					<input type="text" name="" autocomplete="off" placeholder="N'.$userPackage.'" disabled="disabled">
					</label>
				</td>
				<td colspan="2" class="file-upload exception exception"><br />
					<label for="" class=" exception ">Governt doc. type';
			
			include_once "doc-type.php";
			echo '</label> 

			<label class="upload-label exception " title="Upload file"> 
			<div class="image-upload-wrapper" title="Upload file">
			<div id="gov-doc-image" class="">
			</div><i class="fas fa-file-upload"></i>
			
			<input type="file"
				   id="change-doc-image"
				   name="docimgupdate" 
				   value="'.$userDocImage.'"
				   accept=".jpg, .png, .jpe, .jpeg, .jfif, .png, .bmp, .dib, .gif">
			</div>
			</label>
			</td>
			</tr>

			<tr>
				<td colspan="2"><br />
					<label for="">Bank name <span class="attention">[Can not be edited]</span>
					<input type="text" name="" autocomplete="off" placeholder="******" disabled="disabled">
					</label>
				</td>
				<td colspan="2">
					<br />
					<label for="">Account number <span class="attention">[Can not be edited]</span>
					<input id="" type="text" name="" placeholder="******" autocomplete="off" disabled="disabled">
					</label>
				</td>
				<td colspan="2">
					<br />
					<label for="">Account name <span class="attention">[Can not be edited]</span>
					<input type="text" name="" autocomplete="off" disabled="disabled" placeholder="******">
					</label>
				</td>
			</tr>

			<tr>
				<td colspan="6"><br />
					<label for="shipping-address">Resident address
					<input id="shipping-address" type="text" maxlength="100" name="" value="'.$userAddress.'" autocomplete="off">
					</label>
				</td>
			</tr>

			<tr>
				<td colspan="2"><br />
					<label for="update-password">Date of Birth <span class="attention">[Can not be edited]</span>
					<input type="text" name="" placeholder="******" autocomplete="off" disabled="disabled">
					</label>
				</td>
				<td colspan="2"><br />
					<label for="update-password">City (Town)
					<input id="userCity" type="text" name="" value="'.$userCity.'" autocomplete="off">
					</label>
				</td>
				<td colspan="2"><br />
					<label for="update-phone-no">State (Province)
					<input id="userState" type="text" name="" value="'.$userState.'" autocomplete="off">
					</label>
				</td>
			</tr>

			<tr>	
				<td colspan="2"><br />
					<label for="">Instagram 
					<i class="fab fa-instagram"></i>
					<input id="update-instagram" type="text" name="" placeholder="'.$instagramURL.'" autocomplete="off" value="'.$instagramURL.'">
					</label>
				</td>


				<td colspan="2"><br />
					<label for="update-facebook">Facebook
					<i class="fab fa-facebook-square"></i>
					<input id="update-facebook" type="text" name="" placeholder="'.$facebkURL.'" autocomplete="off" value="'.$facebkURL.'">
					</label>
				</td>
				<td colspan="2"><br />
					<label for="update-whatsapp">Whatsapp 
					<i class="fab fa-whatsapp"></i>
					<input id="update-whatsapp" type="text" name="" placeholder="'.$whatsappURL.'" autocomplete="off" value="'.$whatsappURL.'">
					</label>
				</td>
				
			</tr>

			<tr>
				<td colspan="2" class="no-border"></td>
				<td colspan="2" class="no-border"></td>
			</tr>
			<tr>
				<td colspan="2" class="no-border"></td>
				<td colspan="2" class="no-border"></td>
				<td colspan="2" class="no-border"></td>
			</tr>

			<tr>
				<td colspan="6" class="error-td">
				<div id="bug_msg"></div>
				<div class="bug_msg"></div>
				</td>
			</tr>

		</table><br />
		<button class="target exception" type="submit" name="" title="Update Record">UPDATE PROFILE &nbsp;<i class="fas fa-check exception"></i>
		</button>
	</form><br />
</div>
</section>';
}
?>

<!-- '.substr($accUserEmail, 0,2).' * * * * * * '.substr($accUserEmail, 8).' -->


<div id="menu-wrapper" class="universal-menu loggedin">
	<div class="centre">
		<aside id="page-menu" class="">
			<a href="https://longrichs.com">
				<div class="white-logo"></div>
			</a>
		</aside>
		<?php include 'menu.php'; ?>
	</div>
</div>

<?php 
if($dbUserId === $ucodeUserId) {
	if($activeStatus === 0){
	echo '<div class="status-alert resent-msg">'.$_SESSION['resentMsg'].'</div>';
	echo '<div class="status-alert error">
				Your account has not yet been verified, please confirm your email address by clicking on the link sent to your email inbox or <a href="resend?resendSet=s9id5f7bvu" title="Resend link">resend</a> link
		</div>'; 
	} 
	else {
		echo '<div class="status-alert user">
			<span class="">'.$randMsg["long_message"].'</span>
		</div>';
	}
}
elseif($dbUserId !== $ucodeUserId) {
echo '<div class="status-alert visitor">
	<span class="">'.$randMsg["long_message"].'</span>
</div>';
}

?>

<?php include'includes/logout.php'; ?>

<section class="wrapper profile-wrapper">
	<div class="last-logged-in">
	<?php 

		if($dbUserId === $ucodeUserId) {
			if($memStatus === '0') {
			echo '<span class="no-referral red">Note: No referral will be assigned to you when your membership status reads "zero purchase" or before purchase of products.</span>';
			} else {
				echo '<span class="no-referral">'.$randMsg["short_message"].'</span>';
			}
		} 
		else if($dbUserId !== $ucodeUserId) {
			echo '<span class="no-referral">'.$randMsg["short_message"].'</span>';
		}
		?>
		<span class="date-registered">ACCOUNT REGISTERED ON:&nbsp;
			<?php 
				$dt = strtotime($userAccRegDate); 
				echo date('d-M-Y', $dt);
			?>
     	</span>
	</div><br /><br />

	<div class="user-wrapper">
	<div class="number">
		<label class="icon"></label>&nbsp;
		<?php 
			$userNumber = '**********';
			if($dbUserId === $ucodeUserId) {
				echo 'USER NUMBER: '. $userNumber.'&nbsp;&nbsp;';
				echo '<br />&nbsp;<a href="payment-status" class="p-status">Payment status <i class="fas fa-tags"></i></a>';
			} 
			else {
				echo 'USER NUMBER: **********';
			}
	    ?>
	</div>

	<?php 
		if($dbUserId === $ucodeUserId) { 
			echo '	<div class="referral-link">
						Referral Link:
						<input type="text" 
						readonly="true" 
						autocomplete="off" 
						autocorrect="off" 
						autocapitalize="off" 
						spellcheck="false" 
						value="'.$userReferralUrl.'" 
						class="readonly-input">
						<i class="far fa-clipboard" style="visibility: hidden;" id="clipBtn"></i>
						<span class="tooltiptext" class="profileTooltip">Copy to clipboard</span></div>';
		}
	?>

	<div title="Log in to back office">
		<?php 
			if($dbUserId === $ucodeUserId) {
				echo '<a href="https://www.longliqicn.cn/login.html" title="Access Back Office" target="_blank" class="back-office">Back Office <i class="fas fa-project-diagram"></i></a>';
			}
		?>
	</div>
	</div>

<div class="upload-error"><?php echo $error;?></div><br />
<aside class="left-aside">
		<form method="POST" 
			  id="img-form"
			  name="iupload" 
			  enctype="multipart/form-data">
			<div id="preview"></div>
			<div class="pic-cont">
			<div class="image-holder">
			
			<?php
				if($dbUserId === $ucodeUserId) {
					echo '<div id="previewImg" class="profile-image">
					<div class="preview">PREVIEW 
						<span class="remove-image" title="remove image">
							<i class="fas fa-times"></i>
						</span>
					</div>
					</div>';
				} 
			 ?>
			<img src="
					<?php if(!empty($profImgx)) {
						echo $profImgx;
					  } else {
					  	echo '';
					} ?> " class="image-wrapper profile-holder">
			</div>
			<?php 
				if($dbUserId === $ucodeUserId) {
					echo '<div class="edit-btn fileBtn"><span>Select Image <i class="far fa-image"></i></span><input type="file" 
						   id="fileUploadElem" name="pimgupload" accept=".jpg, .png, .jpe, .jpeg, .jfif, .png, .bmp, .dib, .gif"></div> 

						   <button type="submit" name="upload-img" 
					class="edit-btn upload" title="Upload Image"> <i class="fas fa-file-upload"></i> Upload </button>';
				}
			?>
			</div>
		</form>

<div class="name-cont">
	<div class="name">
	<label class="icon"></label>&nbsp; <?php echo $famName .' '. $firstName ?>
	</div>
<div class="username"> <label class="icon"></label>&nbsp; Username: <?php echo $username ?><br /> <label class="icon"></label>&nbsp; 

<?php  
if($membershipCode == 'N/A') {
	echo '<span title="Membership Code will be assigned to you once you make a purchase"> Membership Code: '.$membershipCode.'</span>';
} else {
	echo '<span> Membership Code: '.$membershipCode.'</span>';
}
echo '<br /><div class="status"><span class="title">Status:</span> ';
	if($memStatus == '0') {
		echo '<span class="status-display" title="You have not purchased any product yet.">Zero Purchase <i class="fas fa-ban"></i></span>';
	} else {
		echo '<span class="status-display" title="Membership activated">
		Paid <i class="far fa-check-circle"></i></span>';
	}
?>

</div>
</div>
</div>

<div class="biography-cont">
	<?php 
		if($dbUserId === $ucodeUserId) {
			echo '<button class="target show-button edit-profile">Edit Profile</button><br /><br />';
		} 
	?>
	<i class="fas fa-id-card-alt"></i>
	<textarea maxlength="305" class="biography" readonly="true" disabled="disabled"><?php echo $profBiography ?></textarea>

	<ul>
		<li><i class="fas fa-map-marker-alt"></i>Delta State, Nigeria.</li>
		<li><i class="fab fa-instagram"></i><a href="<?php echo $instagramURL ?>"><?php echo $instagramURL ?></a>
		</li>

		<li><i class="fab fa-facebook-square"></i>
			<a href="<?php echo $facebkURL ?>"><?php echo $facebkURL ?></a>
		</li>

		<li><i class="fab fa-whatsapp"></i><a href="<?php echo $whatsappURL ?> "><?php echo $whatsappURL ?></a>
		</li>
		
		<li>
			<?php 
				if($dbUserId !== $ucodeUserId) {

					
					$reportedUsers = $showDATA->getReportedusers($dbUserId, $ucodeUserId);

					$reprtId = $reportedUsers['reporter_id'];
					$reprtUc = $reportedUsers['reporter_uc'];
					$ofendId = $reportedUsers['offender_id'];
					$ofendUc = $reportedUsers['offender_uc'];
					
					if($dbUserId == $reprtId && $ofendId == $ucodeUserId) {
						echo '<span id="report-user" class="reported" title="Undo report">Reported <i class="fas fa-check"></i></span>';
					}
					else {
						echo '<span id="report-user" title="Report user">Report</span>';
					}
					
					echo '<input type="hidden" class="reporterid" value="'.$dbUserId.'" />
					<input type="hidden" class="reporteruc" value="'.$loggedInUc.'" />
					<input type="hidden" class="offenderid" value="'.$ucodeUserId.'" />
					<input type="hidden" class="offenderuc" value="'.$accUsersCode.'" />
					';
				}
			?>
		</li>
	</ul>

	</div>
</aside>

<aside class="right-aside inner-wrapper togglex togglexsmall">

	<nav>
		<ul class="rightTab-list">
			<li class="tabx active"><i class="far fa-list-alt smalltab active"></i> &nbsp;OVERVIEW </li>

			<li class="tabx">
				<i class="fas fa-history smalltab"></i> POST HISTORY
				<span>(<?php 
				if($postcounter == false) {echo '0'; } 
				else { echo count($postcounter); }
				?>)
				</span>
			</li>
			<?php 
				if($dbUserId === $ucodeUserId) {
					echo '<li class="tabx">
					<i class="fas fa-mail-bulk smalltab"></i>&nbsp;INBOX  <span>';
					if($userInboxMsg !== false && $unreadMsg !== false) { echo '<div data-userid="'.$dbUserId.'" data-unreadm="unreadmsg" class="msg alert">'.count($unreadMsg).'</div>'; } 
					echo'
					</span>
					</li>';
				} 
			?>	
			<li class="tabx">
				<i class="fas fa-cart-plus smalltab"></i> PRODUCTS
				<span>(<?php
					if($productsCount === false) { echo '0'; } 
					else { echo $productsCount; }					 
					?>)</span>
			</li>
			<li class="tabx">
				<i class="fas fa-sync-alt smalltab"></i> &nbsp;FOLLOWERS
				<?php $followers = $showDATA->followersProfile($ucodeUserId);?>
				<span>(<?php 
						if($followers === false) { echo '0'; } 
						else { echo count($followers); }
					?>)
				</span>
			</li>
			<li class="tabx">
				<i class="fas fa-users smalltab"></i> REFERRALS 
				<span><?php
						if($dbUserId === $ucodeUserId && $referredUsers !== false && $unreadRefCount !== false) { echo '
						<div data-refbyuc="'.$userCode.'" data-unreadrefe="unreadref" class="ref alert">'.count($unreadRefCount).'</div>'; }	
					?></span>
			</li>
		</ul>
	</nav> 

	<section class="panels">
	<div class="panel first-panel">
		<div class="overview">
			<label>Member Ranking</label><img src="resources/images/award-profile.png" class="pimg">
		</div>

		<div>
		<label>Product purchased</label>
		<img src="resources/images/products-profile.png" class="pimg">
		<label class="description">Total unit: 
		<span><?php 
			if($productsCount === false) { echo '0'; } 
			else { echo $productsCount; }					 
		?>
		</span>
		</label>
		</div>

		<div class="except">
		<label>Total Product cost</label>
		<img src="resources/images/total-product-price.png" class="pimg">
		<label class="description">Total: 
			<span class="fa-naira">
			<?php
				if($dbUserId === $ucodeUserId) {
					if($amountPaid == false) { 
						echo 'N/A';
					} else { echo $amountPaid; }
				} 
				else {
					if($amountPaid == false) {
						echo 'N/A';
					} else { echo $amountPaid; }
				}
			?>
			</span>
		</label>
		</div>

		<div>
		<label>Accumulated Produts value (PV)</label>
		<label class="description">Total: 
			<span>
				<?php 
					if($dbUserId === $ucodeUserId) {
						if($totalPv == false) { 
							echo 'N/A'; 
						} else { echo $totalPv.'pv'; }
					} else {
						if($totalPv == false) { 
							echo 'N/A'; 
						} else { echo $totalPv.'pv'; }
					}
				?>
			</span>
			</label>
		</div>

		<div>
		<label>Estimated Weekly earnings</label>
			<label class="description">Total:  
			<span>
				<?php 
					if(false == false) { echo 'N/A'; } 
					else { echo count([0,1,3,6]); }	
				?>
			</span>
			</label>
		</div>

		<div class="except">
		<label>Number of Referrals</label>
		<label class="description">Total:  
			<span>
			<?php 
				if($referredUsers == false) { echo 'N/A'; } 
				else { echo count($referredUsers); }	
			?>		
			</span>		
		</label>
		</div>
<br />

<?php 

if($dbUserId === $ucodeUserId) {
	echo '<section class="change-level"><aside class="view-office">To view your earnings, click on the Back Office link above.</aside></section>
					
		<span class="note">SHIPPING ADDRESS &nbsp;<i class="fas fa-truck"></i><br/>
		</span>
		
		<div class="msg_notific"></div>
		<form class="shipping">
			<textarea id="shipping" readonly="true" value="yIASI" maxlength="120">'.$shippAddress.'</textarea>
			<button type="submit" value="shpEditBtn" id="edit" title="Edit shipping address">Edit <i class="far fa-edit"></i>
			</button>
		</form>

		<br />
		<br />

		<div class="doc-image change-package">
		<br />
		<br />
		<aside class="left">

		Gov. issued Document
		<img class="govImg" alt="Government doc." src="';
		if(!empty($userDocImage)) {
			echo $userDocImage; 
		} 
		else { 
			echo 'resources/vectors/user.svg';
		}
		echo '">
		</aside>

		<aside class="right">
		<span class="note">To change package level or upgrade to a higher package levels, you need to earn more product value by purchasing more products. Use the upgrade button to acquire more product values.
		</span>
		<br /><br />
		<a href="products.php">
			<button class="upgrade" title="Upgrade level">Upgrade <i class="fas fa-long-arrow-alt-up"></i>
			</button>
		</a>
		</aside>
		</div>';
	}
?>

</div>

<div class="panel archives">
<label class="tilte-details">Post History</label>
<div class="notice">
<?php 
	if($postcounter === false) {
		echo '<div class="notice post-history">Post History empty, No post to display.</div>';
	}
	else {
		postHistory($usersPostHistory, $showDATA, $ucodeUserId, $postcount);
	}
?> 
</div>
</div>

<?php 
	if($dbUserId === $ucodeUserId) {
		echo '<div class="panel">
		<label class="tilte-details">Messages</label>
		
		<div class="notice inbox">';
		if($userInboxMsg === false) {
			echo 'Inbox empty, no message to display';
		 } 

		 else {
		 		foreach ($userInboxMsg as $msgcol) {
		 			$notice = $msgcol['notification'];
		 			$msgSubject = $msgcol['message_subject'];
		 			$textMsg = $msgcol['text_message'];
		 			$dateStr = $msgcol['date_sent'];	
		 			$dateSent = date('h:i A, d-M-Y', strtotime($dateStr));
		 			
		 		echo '<div class="msg-wrapper">
		 				  <div class="msg-info-row">
		 				 	 <div class="msg-subject"><i class="far fa-envelope"></i> Subject: '.$msgSubject.'</div>
		 				 	 <div class="msg-date">'.$dateSent.'</div>
		 				  </div>
		 				  <div class="text-msg">'.$textMsg.'</div>
		 		  	  </div>';
		 		}
		 }
		echo '
		</div>
		</div>';
	}
?>

<div class="panel products-container">
<label class="tilte-details">Products ordered</label>

<?php 

if($productsCount === 0) {
	echo '<div class="notice product">Product catalogue is empty, no item to display.</div>';
	}
else {
    echo ' <table class="panel-table items">
			<tr>
				<th width="7%">S/N</th>
				<th width="14%">Order Ticket No.</th>
				<th width="16.5%">Date Ordered</th>
				<th width="22%">Item Name</th>
				<th width="8%">Item PV</th>
				<th width="10%">Item Quantity</th>
				<th width="10%">Unit Price</th>
			</tr> ';

foreach ($products as $items) {
		$orderNumber = $items['order_number'];
		$orderDate = $items['order_date'];
		$pdtId = $items['product_id'];
		$pdValue = $items['product_value'];
		$pdQuantity = $items['quantity'];
		$pdAmount = $items['amount'];
		$serialNum++;
		$ordDate = strtotime($orderDate); 
				

		$proNamebyId = $showDATA->selectPrd($diffIndex = null, $pdtId);
		
		foreach ($proNamebyId as $prdCol => $prdNvalue) {
			$pdName = $prdNvalue['product_name'];
		}
		echo '<tr>
				<td>'.$serialNum.'</td>
				<td>'.$orderNumber.'</td>
				<td>'.date('d-M-Y, h:i A', $ordDate).'</td>
				<td>'.$pdName.'</td>
				<td>'.$pdValue.'</td>
				<td>'.$pdQuantity.'</td>
				<td><span class="fa-naira">'.number_format($pdAmount).'</span></td>
			 </tr>';
		}
		echo '</table>';
	}
?>
</div>

<div class="panel activity"><label class="tilte-details">Followers</label>
<div class="notice followers">
<?php
if(count($followers) === 0) {
	echo '<div class="notice nofollower">No follower(s) to display at the moment .</div>';
}
else {
	foreach($followers as $userFId => $follwId) {
		$fllwerID = $follwId['follower_id'];
		$fllwerUC = $follwId['follower_uc'];
		$usersCode = $showDATA->acc_prof_ref_usercode($fllwerUC);
		$userImg = $usersCode['prof_image'];
		$fwFamName = $usersCode['family_name'][0];
		$fwFstName = $usersCode['first_name'][0];
		echo '<a href="profile?_r='.$fllwerUC.strtolower($fwFamName). '.' .strtolower($fwFstName).'?_y='.$_SESSION['roChar'].'&'.$fllwerID.'&'.$_SESSION['rThrChar'].'" class="fws" title="'.$fwFamName.'"><div class="fprofile"><img src="'.$userImg.'" class="" /><label>'.$fwFamName.'</label></div></a>';
	}
}
?>
</div>
</div>

<div class="panel referral">
		<label class="tilte-details">Referred members details:</label>
<?php
if($referredUsers === false) {
  	echo '<div class="notice referral">Referral catalogue is empty, no referral data to display.</div>';
}
else {	
	echo '<table class="panel-table referral">
		<tr>
			<th width="8%">S/N</th>
			<th width="18%">Account Name</th>
			<th width="15%">Registration Date</th>
			<th width="10%">Total PV</th>
			<th width="12%">Entry Amount</th>
			<th width="18%">Status</th>
			<th width="21%">Profile</th>
		</tr>';


$totalPvarr = [];

foreach($referredUsers as $refUsersData) {
	$serialNo++;
	$refUserId = $refUsersData['user_id'];
	$refFamName = $refUsersData['family_name'];
	$refFirstName = $refUsersData['first_name'];
	$userEmail = $refUsersData['user_email'];
	$dateStr = new dateTime($refUsersData['referred_date']);
	$referredDate = date_format($dateStr, 'M d, Y');
	$refRegAmount = $refUsersData['user_reg_amount'];
	$referralProfUrl = $refUsersData['user_prof_url'];
	$usersStatus = $showDATA->acc_prof_ref_Table($userEmail);
	$refStatus = $usersStatus['user_status'];

	$accumPdpv = $showDATA->totalUserPv($refUserId);

	if($showDATA->totalUserPv($refUserId)['buyer_user_id'] === null) {
		$reftotalPv = 'None';
		$initrefRegAmt = $refRegAmount;
	} 
	else {
		$totaluserPval = $accumPdpv['SUM(product_value * quantity)'];
		$totalPdAmt = $accumPdpv['SUM(amount * quantity)'];
		$initrefRegAmt = number_format($totalPdAmt);

		if($totaluserPval > 1000) {
			$reftotalPv = number_format($totaluserPval);
		} 
		else {
			$reftotalPv = $totaluserPval;
		}
	}
	
	echo '	<tr>
				<td>'.$serialNo.'</td>
				<td>'.$refFamName.' '.$refFirstName.'</td>
				<td>'.$referredDate.'</td>
				<td>'.$reftotalPv.'</td>
				<td><span class="fa-naira">'.$initrefRegAmt.'</span></td>
				<td>';
				if($refStatus === '0') {
					echo 'Awaiting payment <i class="fas fa-ban"></i>';
				} else {
					echo 'Items paid for <i class="far fa-check-circle"></i>';
				}
				echo '</td>
				<td>
					<a href="'.strtolower($referralProfUrl).'?_y='.$_SESSION['roChar'].'&'.$replyUserId.'&'.$_SESSION['rThrChar'].'">
					'.$referralProfUrl.'
					</a>
				</td>
			</tr>';
}
}
?>
</table>
</div>
</section>
</aside>
</section>

<?php require 'x-footer.php'; ?>

<script src="assets/script/forum.js"></script>
<script>


var fileSize,
fDataURL,
errorMsg = $('#bug_msg');

var govDocImgPrev = (elem)=> {
	errorMsg = $('[class*="bug_msg"]');
	$(elem).change(function(e) {
		var input = e.target;
		if (input.files && input.files[0]) {
		var file = input.files[0];
		fileSize = input.files[0].size;
		fDataURL = new FileReader();
		fDataURL.readAsDataURL(file);

		fDataURL.onload = (e)=> {
			if(parseInt(fileSize/1000) > 5000) {
				errorMsg.html('<span class="error_msg">Error ! <i class="fas fa-exclamation-triangle"></i> Image size is larger than 5 MB. Allowed max size is 5 MB.</span>');
				$('.fa-file-upload').css('display', 'block');
				$('.fa-check').css('display', 'none');
				return false;
			} 
			else {	
				errorMsg.html('');
				$('#gov-doc-image').css({
					'display':'flex',
					'background-image':'url(' + fDataURL.result + ')' }
				);
				$('.user-update td.file-upload .fa-file-upload').css('display', 'none');

				$('.image-wrapper').css({
					'background-image':'none',
					'border':'none',
					'background': 'transparent'
				});
				}
			}
		}
	});
}
govDocImgPrev('#change-doc-image');
var seletdgovId;
$('#govDocId').on('change', (e)=> {
	errorMsg.html('');
	 seletdgovId = $(this).find(':selected').attr("value");
});

var dbImgUrl = '<?php echo $userDocImage; ?>';
$('#user-update').on('submit', (e)=> {
	e.preventDefault();
	var bioTextarea = $('#into_bio'),
	displayName = $('#display-name'),
	updfamName = $('#family-name'),
	updfstName = $('#first-name'),
	shippingAddr = $('#shipping-address'),
	updEmail = $('#updateEmail'),
	updocType = $('.document-type'),
	docValue = $('#change-doc-image');
	var emailRegExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var updCity = $('#userCity'),
	updState = $('#userState'),
	instagramURL = $('#update-instagram'),
	facebkURL = $('#update-facebook'),
	whatsappURL = $('#update-whatsapp');

	if(bioTextarea.val() == '' || 
		updfamName.val() == '' || 
		updfstName.val() == '' || 
		updEmail.val() == '' ||
		// updocType.val() == '0' ||
		shippingAddr.val() == '' ||
		updCity.val() == '' || 
		updState.val() == '' ) {

		errorMsg.html(errArrMsg[0]);
		return false;
	} 
	else if (parseInt(fileSize/1000) > 5000) {
		return false;
	}
	else if(updfamName.val() === '' || updfamName.val().length < 2) {
		errorMsg.html(errArrMsg[1]);
	} 
	else if(updfstName.val() === '' || updfstName.val().length < 2) {
		errorMsg.html(errArrMsg[2]);
	}
	else if(bioTextarea.val().length < 1) {
		errorMsg.html(errArrMsg[3]);
	}
	else if(updEmail.val() === '' || updEmail.val().length < 2) {
		errorMsg.html(errArrMsg[4]);
	} 
	else if(!emailRegExp.test(updEmail.val()) ) {
		errorMsg.html(errArrMsg[5]);
	}
	else {
		errorMsg.html('');
		var bioTextAval = bioTextarea.val(),
		dispNameVal = displayName.val(),
		updfamNameVal = updfamName.val(),
		updfstNameVal = updfstName.val(),
		upgoveDocType = updocType.val(),
		updocValue = docValue.val();

		var docTypefile = ()=> {
		return (updocType.val() == '0' || updocType.val() == undefined)? seletdgovId : upgoveDocType;
		}
		var docImgfile = ()=> {
		return (fDataURL == undefined || fDataURL == '')? dbImgUrl : fDataURL.result;
		}
		var docImgfileup = docImgfile(),
		updEmailVal = updEmail.val(),
		shippAddr = shippingAddr.val(),
		updStateVal = updState.val(),
		updCityVal = updCity.val(),
		updtinstagrm = instagramURL.val(),
		updtfacebk = facebkURL.val(),
		updtwhatsapp = whatsappURL.val();

		var UpdatedValues = {
			"biography" : bioTextAval,
			"displayName" : dispNameVal,
			"upFamName" : updfamNameVal,
			"upFstName" : updfstNameVal,
			"upshippAddr" : shippAddr,
			"upgoveDocTyp" : docTypefile,
			"updatdocImg" : docImgfileup,
			"updtEmail" : updEmailVal,
			"updaState" : updStateVal,
			"updatCity" : updCityVal,
			"updatInstg" : updtinstagrm,
			"updatfaceBk" : updtfacebk,
			"updatwhatapp" : updtwhatsapp
		}

		$.ajax({
			url: 'cnumber.php',
			method: 'POST',
			cache: false,
			data: UpdatedValues,
			success: function(response, status, xhr) {
				$('.third-inner-modal').html(response);
				$('.third-inner-modal').css('display','block');
			}
		})
	}

});

$('.action-wrapper span.like, span.dislike').addClass('disabled');
var clearMsg = ()=> {
	setTimeout(()=> {
	$('#upload-success').text('');
	$('.status-alert.resent-msg').html('');
	$('.right-aside div.msg_notific').html('');
		<?php unset($_SESSION['resentMsg']); ?>
	}, 5000);
}
clearMsg();
var bvmx = $('.profile-image-modal'),
targetw = $('[class*="image-holder"]');
function pImgModal(arguments) {
	$(arguments).on('click', (e)=> {
		($(e.target).attr('class').match(/\b(profile-holder|exception)\b/))?
		   bvmx.add($('body')).addClass('display noscroll')
		 : bvmx.add($('body')).removeClass('display noscroll');
	});
}
pImgModal(targetw);


$('#edit').on('click', function(e) {
	e.preventDefault();
	var $this, 
	texta, 
	len, 
	ovalue,
	$this = $(this);
	texta = $('form.shipping > textarea');
	function removeReadonly() {
		return (()=> {
		texta.removeAttr('readonly').focus();
		ovalue = texta.val();
		texta.val('');
		texta.blur().focus().val(ovalue);
		$('.right-aside form').css({
		'border':'1px solid #c64247'
		});
		$this.attr('title', 'Save new entry').html('Save <i class="fas fa-plus"></i>').css({'background':'#a32171'});
	})();
	}
		
if(texta.attr('readonly')) {
	removeReadonly();
} else {
	$('.right-aside form').css({
		'border':'1px solid transparent'
	});
	texta.attr('readonly', 'true');
	$this.attr('title', 'Edit shipping address').html('Edit <i class="far fa-edit"></i>').css({'background':'#4c6dac'});
	if(texta.val() === '' || texta.val().trim().length < 1) {
		$('.right-aside .msg_notific').html('<div class="error_msg">Error! &nbsp;Shipping address can not be empty. Please enter address.</div>');
			removeReadonly();
} else {
	var textaVal = texta.val(),
	btnValue = $(this).val();
	var sentPara = {
		'textareaVal' : textaVal,
		'editBtnValue': btnValue
	}
	$.ajax({
		url: 'cnumFunc.php',
		method: 'POST',
		data: sentPara,
		cache: false,
		success: function(response, status, xhr) {
			$('.right-aside .msg_notific').html(response);
			clearMsg();
		}
	});
}
	}
});

</script>







