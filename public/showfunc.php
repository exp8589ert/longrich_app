<?php
	error_reporting(0);

	$videos = $showDATA->get_videos();
	$sortOrder = 'ASC';
	$limitNum = 20;
	$usersPost = $showDATA->account_forum_profile($sortOrder, $limitNum);
	$userCred = $showDATA->acc_prof_ref_Table($email);
	$roChar = genhash(8);
	$rThrChar = genhash(12);
	$_SESSION['roChar'] = $roChar;
	$_SESSION['rThrChar'] = $rThrChar;
	$_SESSION['userIdCred'] = $userIdCred = $userCred['user_id'][0];
	$_SESSION['profImg'] = $profImg = $userCred['prof_image'];
	$_SESSION['famName'] = $famName = $userCred['family_name'][0];
	$_SESSION['firstName'] = $firstName = $userCred['first_name'][0];
	$_SESSION['puserCode'] = $puserCode = $userCred['user_code'];
		
	function showPost($usersPost, $showDATA, $userIDx, $profImg, $famName, $firstName, $roChar, $rThrChar, $puserCode) { 
							
			foreach($usersPost as $column) {

				$urlUserCode = $column['user_code'];
				$arrayId = $column['user_id'];
				$Fuserid = $arrayId[0];
				$FamilyName = $column['family_name'];
				$FirstName = $column['first_name'];
				$pimage = $column['prof_image'];
				$userpost = $column['post_text'];
				$postimage = $column['post_image'];
				$date = new dateTime($column['post_date']);
				$postdate = date_format($date, 'M d, Y @ h:i A');
				$postcodex = $column['post_code'];
				$replycounter = count($showDATA->reply_count($postcodex));
				$reporterId = $userIDx;
				$postReported = $showDATA->showReportedPost($postcodex, $reporterId);

				

			echo '<form method="POST" 
						action="" 
						name="post-row-form" 
						class="post-row-form" enctype="multipart/form-data" > 

						<div class="postrows post-wrapper">
						<div class="image-wrapper">';
		
			echo '<a href="profile?_r='.$urlUserCode.strtolower($FamilyName). '.' .strtolower($FirstName).'?_y='.$roChar.'&'.$Fuserid.'&'.$rThrChar.'" class="to-profile">
					<img src="'.$pimage.'" class="post ">
				  </a>

				<div class="namedate">
					<span class="name">
					<a href="profile?_r='.$urlUserCode.strtolower($FamilyName). '.' .strtolower($FirstName).'?_y='.$roChar.'&'.$Fuserid.'&'.$rThrChar.'">'.$FamilyName.' '.$FirstName.'</a>
					</span><br />
					<span class="postdate">'.$postdate.'</span>';

			echo '<ul class="options edit evTarget">';
			
			if($Fuserid == $userIDx) {
				echo '<li class="edit-content evTarget">
				<i class="far fa-edit evTarget"></i> 
				&nbsp;Edit content
				</li>
				<li class="delete-content">
				<i class="far fa-trash-alt"></i> 
				&nbsp;Delete post
				</li>';
			}
			if($Fuserid != $userIDx) {
				echo '<li class="edit hide-post"></li>';
				// <i class="fas fa-minus-circle edit"></i>
				
				foreach ($postReported as $reportValue) {
						
					$reporterID = $reportValue['reporter_id'];
					$postReported = $reportValue['post_code'];

					if($userIDx == $reporterID && $postcodex == $postReported) {
						echo '<li class="edit report-post"><div class="reported color edit">Post reported <i class="fas fa-check edit"></i></div></li>';
					}
				}

				if($postReported == false) {
					echo '<li class="edit report-post"><i class="fas fa-flag edit"></i> &nbsp;Report post</li>';
				}

				


				
			}
	?>




<li class="facebook-share edit">
<a href="#" class="facebook-share " onclick='window.open("https:www.facebook.com/sharer/sharer.php?u=https://longrichs.com&quote=Work and earn reasonably at your own pace.", "Facebook Share", "facebook-share-dialog", "width=620, height=420"); return false;'>

<i class="fas fa-share-alt edit"></i> 
&nbsp;Share on Facebook <img class="facebook edit">
</a>
</li>


<li class="twitter-share edit">
<a href="#" onclick='window.open("https:www.twitter.com/share?url=https://longrichs.com/forum.php&via=Sitename&text=Work and earn reasonably at your own pace.", "Twitter Share", "width=620, height=420"); return false;'>
<i class="fas fa-share-alt edit"></i> 
&nbsp;Share on Twitter 
<img class="twitter edit">
</a>
</li>


<li class="pinterest-share edit">
<a href="javascript:void(0);" class=" edit">&nbsp;&nbsp;Share on Pinterest <img class="pinterest edit">
<i class="pin-share fas fa-share-alt edit"></i> 
</a>

<a data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/button/?url=https://longrichs.com/forum.php&media=https://longrichs.com/resources/images/why3.png&description=Work and earn reasonably at your own pace.">
</a>
</li>

<?php

echo '</ul>
		<span class="edit" title="Edit post">
			<i class="fas fa-ellipsis-v edit"></i>
		</span>';

if($Fuserid != $userIDx) {
	$fwArray = [];
	$fllwers = $showDATA->followersProfile($Fuserid);
	foreach($fllwers as $column) {

	$fwUserId = $column['follower_id'];
	$fwUserCode = $column['follower_uc'];
	array_push($fwArray, $fwUserId);
}
	$followers = '';
	$following = 'Follow';
	$followStatus = 'fas fa-user-plus';
if(in_array($userIDx, $fwArray)) {
	$followers = 'follwng';
	$following = 'Following';
	$followStatus = 'fas fa-user-check';
}
$fwCount = count($fllwers);
echo '<i class="'.$followStatus.' fwuser '.$followers.'" data-fwcount="'.$fwCount.'" data-userId="'.$Fuserid.'" data-uscode="'.$urlUserCode.'" title="'.$following.'"></i>';
}
echo '</div></div>';
echo '<textarea class="displayed-post evTarget" readonly="true" maxlength="1000" disable="disable" name="'.$postcodex.'">'.$userpost.'</textarea>
	
<div id="mediaWrapper" class="mediaWrapper">
<div id="previewImg" class="forum-image-preview evTarget">
<span class="remv-image r-prevw evTarget" title="remove image">
<i class="fas fa-times r-prevw evTarget"></i></span>
</div>

<div id="uploadwrapper">';
if(!empty($postimage)) {
	echo '<div class="edit-preview evTarget rmvImg r-prevw">
		  <div class="edit-image rmvImg r-prevw evTarget" title="remove image">
		  <i class="fas fa-times rmvImg r-prevw evTarget"></i>
		  </div><img src="'.$postimage.'" class="evTarget" /></div>';
}
echo '<i class="fas fa-cloud-upload-alt evTarget"></i><input type="file" title="Upload image" class="file-upload evTarget" id="post-image" name="post-image" accept=".jpg, .png, .jpe, .jpeg, .jfif, .png, .bmp, .dib, .gif, .pdf">
</div>

<button type="submit" name="postbutton" class="editsubBtn">DONE&nbsp;
<i class="fas fa-check exception"></i>
</button>
</div>';

if(!empty($postimage)) {
	echo '<img src="'.$postimage.'" class="post-img fmedia-holder media-holder forumex">';
}
echo '<div class="action-wrapper"><span class="show-reply-box show-reply counter">Reply</span>';

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

echo '<input type="hidden" class="fUserId" value="'.$Fuserid.'" />
	<input type="hidden" class="userid" value="'.$userIDx.'" />
	<input type="hidden" class="usercode" value="'.$puserCode.'" />';

echo '<span class="show-reply counter">Replies [&nbsp;'.$replycounter.'&nbsp;]</span>
	  <input type="hidden" value="'.$replycounter.'" />

	  </div>
	  <div class="reply-content">
	  <div class="reply-wrapper first">
	  <div class="image-wrapper reply">';

echo '<div class="inner-image-wrapper">
		<a href="profile?_r='.$puserCode.strtolower($famName). '.' .strtolower($firstName).'?_y='.$roChar.'&'.$Fuserid.'&'.$rThrChar.'" class="to-profile"><img src="'.$profImg.'" class="profile">
		</a>

<textarea class="send reply" autocorrect="on" placeholder="Reply here..." spellcheck="spellcheck" maxlength="1000"></textarea>
</div>

<div class="reply-button-wrapper">
<button type="submit" class="reply-btn">Reply </button></div>
</div>';

echo '<div class="ajax-load" data-replycode="'.$postcodex.'">';
	require'reply.php';
echo '</div> 
	  </div>
	  </div>
	  </div>
</form>';


		} 
	}

?>