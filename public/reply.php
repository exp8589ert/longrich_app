<?php
if(isset($_POST['postAction'])) {

	require 'includes/check.php';
	$userIDx = $_SESSION['userid'];



	if(!empty($_POST['postText']) || $_POST['postText'] !== '') {
	$uxEditedReply = $uReplyText = trim(preg_replace('/\n{3,}|\s{350,}/', "\n\n", filter_var(strip_tags($_POST['postText']), FILTER_SANITIZE_SPECIAL_CHARS)));
	$uReplyNum = genhash(3);

	switch($_POST['postAction']) {
		case'replyPost':
		if(!empty($uReplyText)) {
			$userId = filter_var(strip_tags($_POST['replyUserId']), FILTER_SANITIZE_SPECIAL_CHARS);
			$replyText = $uReplyText;
			$replyPsCode = filter_var(strip_tags($_POST['replyPsCode']), FILTER_SANITIZE_SPECIAL_CHARS);
			$inputData->sendReplydText($userId, $uReplyNum, $replyText, $replyPsCode);
		}
		break;

		case "deleteReply":
		$userId = filter_var(strip_tags($_POST['replyUId']), FILTER_SANITIZE_SPECIAL_CHARS);
		$replyNo = filter_var(strip_tags($_POST['replyNo']), FILTER_SANITIZE_SPECIAL_CHARS);
		$replyCode = filter_var(strip_tags($_POST['replyPsCode']), FILTER_SANITIZE_SPECIAL_CHARS);
		$inputData->deleteReplydText($userId, $replyNo, $replyCode);
		break;

		case "editedReply":
		if(!empty($uxEditedReply)) {
			$uEditedReply = $uxEditedReply;
			$editUserId = filter_var(strip_tags($_POST['replyUsrId']), FILTER_SANITIZE_SPECIAL_CHARS);
			$replyNum = filter_var(strip_tags($_POST['replyNum']), FILTER_SANITIZE_SPECIAL_CHARS);
			$replyCode = filter_var(strip_tags($_POST['replyCode']), FILTER_SANITIZE_SPECIAL_CHARS);
			$inputData->editeReplydText($uEditedReply, $editUserId, $replyNum, $replyCode);
		}
		break;
	}
  }
}

if(isset($_POST['replyPsCode'])) {
	$postcodex = filter_var(strip_tags($_POST['replyPsCode']), FILTER_SANITIZE_SPECIAL_CHARS);
}

$userReply = $showDATA->acct_reply_profile($postcodex);	
$roChar = $_SESSION['roChar'];
$rThrChar = $_SESSION['rThrChar'];

if($userReply !== false) {	
foreach($userReply as $replies) {

		$replyarrUserId = $replies['user_id'];
		$replyNum = $replies['reply_no'];
		$replyurlUserCode = $replies['user_code'];
		$replyUserId = $replyarrUserId[0];
		$UserReplyText = $replies['reply_text'];
		$dateFmt = new dateTime($replies['reply_date']);
		$replyDate = date_format($dateFmt, 'M d, Y @ h:i A');
		$userReplyCode = $replies['post_code'];

		$replyProfImg = $replies['prof_image'];
		$FmName = $replies['family_name'];
		$FsName = $replies['first_name'];

echo '<div class="reply-wrapper second reply-display">';
echo '<div class="image-wrapper replies">';
echo '<a href="profile?_r='.$replyurlUserCode.strtolower($FmName). '.' .strtolower($FsName).'?_y='.$roChar.'&'.$replyUserId.'&'.$rThrChar.'" class="to-profile">
<img src="'.$replyProfImg.'" class="profile replies">
<div class="namedate reply">
<span class="name">'.$FmName.' '.$FsName.'</span></a>
<br /><span class="postdate">'.$replyDate. '</span>';

if($replyUserId === $userIDx) {
echo '<span title="Edit" class="options edit replyEdit replies">
	  <i class="far fa-edit"></i></span>
	  <span title="Delete" class="options edit delete replies">
	  <i class="far fa-trash-alt"></i>
	  </span>';
}
echo '</div></div>';
echo '<div data-userid="'.$replyUserId.'" data-replynum="'.$replyNum.'" class="userReplies" data-replycode="'.$userReplyCode.'" readonly="true" maxlength="1000">'.$UserReplyText.'</div>';
echo '</div>';	
	}
}
?>	

<script src="assets/script/reply.js"></script>