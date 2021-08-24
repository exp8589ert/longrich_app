<?php
require 'includes/check.php';

if(isset($_POST['postAction'])) {

	$userIDx = $_SESSION['userid'];
	if(!empty($_POST['postText']) || $_POST['postText'] !== '') {
	$uNewPost = $uEditedPost = $uEditedReply = $uReplyText = trim(preg_replace('/\n{3,}|\s{350,}/', "\n\n",  filter_var(strip_tags($_POST['postText']), FILTER_SANITIZE_SPECIAL_CHARS)));


	$uPostCode = genhash(8);
	$uReplyNum = genhash(3);
	$imageData = isset($_POST['fileDataURL'])? $_POST['fileDataURL'] : null;
	$getDbImage = isset($_POST['getDbImage'])? filter_var(strip_tags($_POST['getDbImage']), FILTER_SANITIZE_SPECIAL_CHARS) : null;
	$olduPCode = isset($_POST['ouPostCode'])? filter_var(strip_tags($_POST['ouPostCode']), FILTER_SANITIZE_SPECIAL_CHARS) : null;
	$updtDocSize = (int )(strlen(base64_decode($imageData)));
	$imgRandName = genhash(5);

		if($updtDocSize < 5000000 && isset($_POST['fileDataURL'])) {

			$pos  = strpos($imageData, ';');
			$extPart = explode('/', substr($imageData, 0, $pos));
			$docExtens = isset($extPart[1])? $extPart[1] : null;
			$extens = ['jpg', 'jpe', 
			'jpeg', 'jfif', 
			'png', 'bmp', 
			'dib', 'gif' ];

			if(in_array($docExtens, $extens)) {
				$imgNewName = $imgRandName . '.' . $docExtens;
				$filepath = "resources/images/forum/".$imgNewName;
				function insertImg($imgRandName, $filepath, $docExtens, $imageData) {
					$fileP = fopen($filepath, 'wb');
					$imgContParts = explode(',', $imageData);
					$imgdataPart = isset($imgContParts)? $imgContParts[1] : null;
					fwrite($fileP, base64_decode($imgdataPart));
					fclose($fileP);
					return true;
				}
				insertImg($imgRandName, $filepath, $docExtens, $imageData); 
			} 
			else { 
			$upError = '<div><i class="fas fa-exclamation-triangle"></i>&nbsp; Image type not supported. Please upload a jpg, jpe, jpeg, png, bmp, or gif file type.</div>'; 
			}
		}
	else {
		$upError = '<div><i class="fas fa-exclamation-triangle"></i> &nbsp; Image size is larger than 5000 MB. Maximum required image size is 5 MB.</div>';
	}

	($imageData === '' || $imageData === null)? $upfilepath = '' : $upfilepath = $filepath;
	if(isset($getDbImage) && empty($filepath)) {
		($getDbImage === '' || $getDbImage === null)? $upfilepath = '' :  $upfilepath = $getDbImage;
	}

	switch ($_POST['postAction']) {
		case 'sendPost':
			if(!empty($uNewPost)) {
				$inputData->postData($userIDx, $uNewPost, filter_var(strip_tags($upfilepath), FILTER_SANITIZE_SPECIAL_CHARS), $uPostCode);
			} else {

			}
			break;
		case 'editedPost':
			if(!empty($uEditedPost)) {
				$inputData->updatePost($uEditedPost, filter_var(strip_tags($upfilepath), FILTER_SANITIZE_SPECIAL_CHARS), $olduPCode, $userIDx);
				$rmImageSrc = isset($_POST['rmvImageSrc'])? $_POST['rmvImageSrc'] : null;
				$oldImgUrl = 'resources/images/forum/'.basename($rmImageSrc);
				if(is_file($oldImgUrl)) { unlink($oldImgUrl); } 
			} else {

			}
			break;
		case 'deletePost':
			$postImgUrl = isset($_POST['postImgUrl'])? $_POST['postImgUrl'] : null;
			$oldFImg = 'resources/images/forum/'.basename($postImgUrl);
			if(is_file($oldFImg)) { unlink($oldFImg); } 
			$postCodedel = $_POST['ouPostCode'];
			$inputData->deletePost($postCodedel);
			break;
		case 'followActn':
			$followAction = filter_var(strip_tags($_POST['fwAction']), FILTER_SANITIZE_SPECIAL_CHARS);
			$forumUserId = filter_var(strip_tags($_POST['forumUserId']), FILTER_SANITIZE_SPECIAL_CHARS);
			$postUcode = filter_var(strip_tags($_POST['Ucode']), FILTER_SANITIZE_SPECIAL_CHARS);
			$followerId = filter_var(strip_tags($_POST['followerID']), FILTER_SANITIZE_SPECIAL_CHARS);
			$followerUC = filter_var(strip_tags($_POST['followerUC']), FILTER_SANITIZE_SPECIAL_CHARS);
			if($followAction === 'follow') {
				$inputData->fwAction($forumUserId, $postUcode, $followerId, $followerUC);
			} 	
			if($followAction === 'unfollow') {
				$inputData->unFollowAction($forumUserId, $postUcode, $followerId, $followerUC);
			}
		break;
		case 'postReaction':
			$userid = filter_var(strip_tags($_POST['userId']), FILTER_SANITIZE_SPECIAL_CHARS);
			$postCode = filter_var(strip_tags($_POST['postCode']), FILTER_SANITIZE_SPECIAL_CHARS);
			$userCode = filter_var(strip_tags($_POST['userCode']), FILTER_SANITIZE_SPECIAL_CHARS);
			$ratingAction = filter_var(strip_tags($_POST['PostRating']), FILTER_SANITIZE_SPECIAL_CHARS);

			if($ratingAction === 'like' || $ratingAction === 'dislike') {
				$inputData->userPostRating($postCode, $userid, $userCode, $ratingAction);
			}
			if($ratingAction === 'unlike' || $ratingAction === 'undislike') {
				$inputData->deletePostRating($postCode, $userid, $userCode, $ratingAction);
			}
		break;
	}

$roChar = $_SESSION['roChar'];
$rThrChar = $_SESSION['rThrChar'];
$userIdCred = $_SESSION['userIdCred'];
$profImg = $_SESSION['profImg'];
$famName = $_SESSION['famName'];
$firstName = $_SESSION['firstName'];
$puserCode = $_SESSION['puserCode'];

$column = $showDATA->sPostAccFrmprof($uPostCode);

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

if(!empty($column) || $column !== false) {

echo '<form method="POST" 
			action="" 
			name="post-row-form" 
			class="post-row-form" 
			enctype="multipart/form-data"> 

		  	<div class="postrows post-wrapper">
		  	<div class="image-wrapper">';

		  	echo '<a href="profile?_r='.$urlUserCode.strtolower($FamilyName). '.' .strtolower($FirstName).'?_y='.$roChar.'&'.$Fuserid.'&'.$rThrChar.'" class="to-profile"><img src="'.$pimage.'" class="post "></a>

			<div class="namedate">
			<span class="name">
			<a href="profile?_r='.$urlUserCode.strtolower($FamilyName). '.' .strtolower($FirstName).'?_y='.$roChar.'&'.$Fuserid.'&'.$rThrChar.'">'.$FamilyName.' '.$FirstName.'
			</a>
			</span>
			<br />
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
?>

<li class="facebook-share edit">
<a href="#" onclick='window.open("https:www.facebook.com/sharer/sharer.php?u=https://longrichs.com&quote=Work and earn reasonably at your own pace.", "Facebook Share", "facebook-share-dialog", "width=620, height=420"); return false;'>
<i class="fas fa-share-alt edit"></i> 
&nbsp;Share on Facebook <img class="facebook edit">
</a>
</li>

<li class="twitter-share edit">
<a href="#" onclick='window.open("https:www.twitter.com/share?url=https://longrichs.com/forum.php&via=Sitename&text=Work and earn reasonably at your own pace.", "Twitter Share", "width=620, height=420"); return false;'>
<i class="fas fa-share-alt edit"></i>&nbsp;Share on Twitter 
<img class="twitter edit">
</a>
</li>

<li class="pinterest-share edit">
<a href="javascript:void(0);">&nbsp;&nbsp;Share on Pinterest 
<img class="pinterest edit"><i class="pin-share fas fa-share-alt edit"></i> 
</a>

<a data-pin-do="buttonPin" href="https:www.pinterest.com/pin/create/button/?url=https://longrichs.com/forum.php&media=https://longrichs.com/resources/images/why3.png&description=Work and earn reasonably at your own pace.">
</a>
</li>

<?php
echo '</ul> 
	 <span class="edit" title="Edit post">
	 <i class="fas fa-ellipsis-v edit"></i>
	 </span>';

	if($Fuserid != $userIDx) {
	echo '<span class="addUser " 
				title="Follow">
				<i class="fas fa-user-plus"></i>
		 </span>';
	}
  	echo '</div></div>';

  	echo '<textarea class="displayed-post evTarget" 
  					readonly="true" 
  					maxlength="1000" 
  					disable="disable" 
  					name="'.$postcodex.'">'.$userpost.'</textarea>

  		<div id="mediaWrapper" class="mediaWrapper">
  		<div id="previewImg" class="forum-image-preview evTarget">

  		<span class="remv-image r-prevw evTarget" title="remove image">
  		<i class="fas fa-times r-prevw evTarget"></i>
  		</span>
</div>

<div id="uploadwrapper">';
if(!empty($postimage)) {
	echo '<div class="edit-preview evTarget rmvImg r-prevw">
		  <div class="edit-image rmvImg r-prevw evTarget" title="remove image">
		  <i class="fas fa-times rmvImg r-prevw evTarget"></i>
		  </div><img src="'.$postimage.'" class="evTarget" />
	</div>';
}
echo '<i class="fas fa-cloud-upload-alt evTarget"></i>
	  <input type="file" 
	  		 title="Upload image" 
	  		 class="file-upload evTarget" 
	  		 id="post-image" 
	  		 name="post-image" 
	  		 accept=".jpg, .png, .jpe, .jpeg, .jfif, .png, .bmp, .dib, .gif, .pdf">
</div>
<button type="submit" 
		name="postbutton" 
		class="editsubBtn">DONE&nbsp;
		<i class="fas fa-check exception"></i>
</button>
</div>';

if(!empty($postimage)) {
	echo '<img src="'.$postimage.'" 
			   class="post-img fmedia-holder media-holder">';
}

echo '<div class="action-wrapper">
	  <span class="show-reply-box show-reply counter">Reply</span>';

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

echo '<span title="like" 
			class="like-BTN '.$liked.'">
			<i class="'.$fontAw.' fa-thumbs-up"></i> 
			&nbsp;LIKE (<span class="like-counter '.$colorCnt.'">'.$likeCnt.'</span>)</span>';

echo '<span title="dislike" 
			class="dislike-BTN '.$disliked.'">
			<i class="'.$disFontAw.' fa-thumbs-down"></i> 
			&nbsp;DISLIKE (<span class="dislike-counter '.$colorDisCnt.'">'.$dislikeCnt.'</span>)</span>';

echo '<input type="hidden" 
			 class="fUserId" 
			 value="'.$Fuserid.'" />
			 <input type="hidden" class="userid" value="'.$userIDx.'" />
			 <input type="hidden" class="usercode" value="'.$puserCode.'" />';

echo '<span class="reply counter">Replies ('.$replycounter.')</span></div>
	  <div class="reply-content">
	  <div class="reply-wrapper">
	  <div class="image-wrapper reply">';

echo '<div class="inner-image-wrapper">
			<a href="profile?_r='.$puserCode.strtolower($famName). '.' .strtolower($firstName).'?_y='.$roChar.'&'.$Fuserid.'&'.$rThrChar.'" class="to-profile">
			<img src="'.$profImg.'" class="profile">
			</a>

			<textarea class="send reply" autocorrect="on" placeholder="Reply here..." spellcheck="spellcheck" maxlength="1000"></textarea>
		</div>

		<div class="reply-button-wrapper">
			<button type="submit" class="reply-btn">Reply </button>
		</div>

	</div>';
echo '<div class="ajax-load" data-replycode="'.$postcodex.'"></div>';
echo '</div>';
echo '</div></div>';
echo '</form>';

}

}

else { 
	$upError = '<div>Text field can not be empty, please add a discussion before posting.</div>'; 
}
}

?>

<script src="assets/script/forum.js"></script>
