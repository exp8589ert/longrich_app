<?php 
require 'includes/check.php';
			
$userIDx = $_SESSION['userid'];
$_SESSION['errmessage'] = "<div class='error_msg'>You must be logged in before accessing forum page where you can see longrich members <br />and probably some of your friends. Please login to your account using your already registered details or <a href='signup'>Register</a> a new account. <br /><br />If you wish to retrieve your user account information, please click on forgot <a href='femail.php'>email address</a><br />or <a href='fpass.php'>password</a> on <a href='login'>log In</a> page or See <a href='help.php'>FAQ</a> on how do I retrieve my email and/or password?</span></div>";

if (isset($_COOKIE['c_user'])) {
	$sessionData = $showDATA->getSessionData($_COOKIE['c_user']);
	
	if($_COOKIE['c_user'] === $sessionData['session_cookie']) {
		$userid = $_SESSION['userid'];
		$email = $_SESSION['email'];
		$newSessId = $sessionData['session_id'];
		$loggedIn = $sessionData['session_token'];
		$loggedBool = $_SESSION['logged_in_token'];
		$newCookie = $_SESSION['new_sess_cookie'];

		if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {
				$_SESSION['errmessage'];
				header('location: error');
		} 
		else {
			$galleryTable = $showDATA->showGallery();
			require 'showfunc.php';
}	
}
else {
	$_SESSION['errmessage'];
	header('location: error.php');
}
}	
else {
$_SESSION['errmessage'];
header('location: error');

}

require 'header.php';
?>

<?php include'includes/logout.php'; ?>



<div class="search-modal">
	<div id="spinner" class="spin"></div>
</div>

<div class="fmedia-holder forum-image-modal">
	<label class="target close" title="Close">
		<i class="fas fa-times"></i>
	</label>
	<div class="image-wrapper">
		<img src="" class="fsrc-collector exception forumex">
		<div class="list-container exception">
			<ul class="image-album exception">

				<?php 
						
						
						foreach ($galleryTable as $gkey => $gvalue) {
							$pictureName = $gvalue['picture_name'];
							$pictureUrl = $gvalue['picture_url'];
							$pictureIndex += 1;

							echo '<li class="exception" data-pindex="'.$pictureIndex.'">
								<img data-pindex="'.$pictureIndex.'" class="exception" src="'.$pictureUrl.'" /></li>';
						}
				?>
			</ul>
		</div>
	</div>
</div>

<div id="menu-wrapper" class="universal-menu forum">
	<div id="centre">
		<aside class="logo-cont">
			<a href="https://longrichs.com">
				<div class="white-logo"></div>
			</a>
		</aside>
		<?php include("menu.php") ?>
	</div>
</div>

<section class="wrapper forum-wrapper">
<div class="page-title forum">
	<div class="inner"> 
	<a href="forum" class="forum">FORUM&nbsp; 
		<i class="fab fa-flipboard"></i>
	</a> 
		<form action="" method="POST" id="search-form">
			<div id="search-wrapper">
			<input type="search" name="" autocomplete="off" id="search" placeholder="Enter text to search forum">
			<button type="submit"><i class="fas fa-search"></i></button>
			</div>
		</form>
		
		<span 
		id="popout-link" 
		class="live-chat" 
		title="Check payment status">				
		<a href="payment-status">
					<i class="fas fa-align-center icon"></i>
				</a>
		</span>
	</div>
</div>	

<div class="forum-inner">
<aside class="left-nav">
	<div class="transition">
		<div class="carouselitems">
			
			<?php 
				foreach ($galleryTable as $gkey => $gvalue) {

					$pictureName = $gvalue['picture_name'];
					$PictureUrl = $gvalue['picture_url'];

					echo '<div class="item">
							<img src="'.$PictureUrl.'" class="fmedia-holder media-holder pic-album" />
							<label>'.$pictureName.'</label>
						</div>';
				}
			?>
			
		</div>
	</div><br />

<nav>
	<ul>
		<li><i class="fab fa-rev"></i> &nbsp;Referrals (7,089+)</li>
		<li><i class="fas fa-random"></i> &nbsp;Members (248,985+)</li>
		<li><i class="fas fa-shopping-cart"></i> &nbsp;Products (2000+)</li>
		<li><i class="far fa-dot-circle"></i> &nbsp;Bonuses shared (5,475+)</li>
		
	</ul>
</nav>

	<br />
	<br class="hide-break"/>

	We've put together some terms and condition of our operation to help you learn the way we operate. Please find help using any of the links below.

	<br class="hide-break"/>
	<br class="hide-break" />
	<ul class="assist-list">
		<li><a href="terms">Terms</a></li>
		<li><a href="terms#privacy">Privacy policy</a></li>
		<li><a href="help">Help</a></li>
	</ul>
	<br class="hide-break" />
	© 2020 Longrich - Alpha Team.
</aside>

<div class="xpost_wrapper">
	<div class="over-flow"></div>
	<div class="inner-wrapper">

<div class="header-intro">Start a dicussion, not a fire. Post with kindness. &nbsp;&nbsp;

	<div id="error-display"><?php echo $upError; ?></div>
</div>

<div class="post-wrapper">
	<div id="postspinner">
		<div id="ppinner" class="spin"></div>
	</div>
	<form method="POST" 
		  action="post.php" 
		  name="post-form" 
		  id="post-form" 
		  enctype="multipart/form-data">
	
	<div class="image-wrapper">
		<a href="<?php echo 'profile?_r='.$puserCode.strtolower($famName). '.' .strtolower($firstName).'?_y='.$roChar.'&'.$userIdCred.'&'.$rThrChar.'' ?>" class="to-profile">
			<img src="<?php echo $profImg ?>" 
			class="post">
		</a>

		<div class="namedate">
		<span class="name">
			<a href="<?php echo 'profile?_r='.$puserCode.strtolower($famName). '.' .strtolower($firstName).'?_y='.$roChar.'&'.$userIdCred.'&'.$rThrChar.'' ?>"><?php echo $famName .' '. $firstName ?></span></a><br />
		<span class="postdate"><?php echo date('M d, Y @ h:i A')?></span>
		</div>
	</div>

	<textarea id="text-areaf" 
			  name="postText" 
			  class="text-area" 
			  autocorrect="on" 
			  spellcheck="spellcheck" 
			  placeholder="Add a discussion ..." 
			  maxlength="1000"></textarea>

	<span id="char-message" 
		  class="char char-length">[ <span class="count"></span> of 1000 characters ]
	</span>

	<div id="mediaWrapper">
		<div id="previewImg" 
			 class="forum-image-preview">
			<span class="remove-image" 
				  title="remove image">
				  <i class="fas fa-times"></i>
			</span>
		</div>

		<div id="uploadwrapper" title="Upload image">
		<i class="fas fa-cloud-upload-alt"></i>
		<input type="file" 
			   class="file-upload" 
			   id="post-image" 
			   name="post-image" 
			   accept=".jpg, .png, .jpe, .jpeg, .jfif, .png, .bmp, .dib, .gif, .pdf">
		</div>

		<button type="submit" 
				name="postbutton" 
				id="postButton">POST&nbsp;
			<i class="far fa-dot-circle"></i>
		</button>
	</div>
</form>
</div>

<div class="history-post-wrapper panels">
	<div class="showAjax content"></div>
		<div class="showAjax below">
			<?php 
			showPost($usersPost, $showDATA, $userIDx, $profImg, $famName, $firstName, $roChar, $rThrChar, $puserCode);
			?>
		</div>
		<div class="load-more">
			<button class="load-more">Refresh page <i class="fas fa-spinner"></i></button>
		</div>
</div>
<div class="last-division">
	End of content. You can refresh the page to see new content. Contents are randomly displayed for readers best consumption.
	<br />
</div>
</div>
</div>

<aside id="taglist">
	<div class="fixed-container">		
		<div class="records">
			<!-- <span class="post-count">ALL POST [ 248 ]</span> -->
			<?php 
			echo '
				<span class="video-count"></span>'; 
			?>
		</div>

<div class="fvideo">
	<div class="list-wrapper">
		<div class="carousel">


	<?php
		foreach ($videos as $videosC => $colvalues) {
			$videoId = $colvalues["video_id"];
			$videoName = $colvalues["video_name"];
			$videoUrl = $colvalues["video_url"];
			$videothmb = $colvalues["thumbnail"];

			echo '
				<div class="iframe fmedia-holder media-holder">
					<video class="v-tag" data-autoplay="false" autostart="0" volume="1" width="100%" height="100%" height="240" poster="'.$videothmb.'" controls="controls">
						<source src="/longrichs.com/'.$videoUrl.'">
					</video>
				</div>	';
		}
	?>

	


		</div>
	</div>

<div class="video-slide btn left">
	<i class="fas xleft fa-chevron-left"></i>
</div>
<div class="video-slide btn right">
	<i class="fas xleft fa-chevron-right"></i>
</div>
</div>

<span class="trends">
	TRENDS &nbsp;<i class="fas fa-atom"></i>
</span>
<div class="trend-cont">
	<div id="spinner"></div>
<table>

<?php

$sortOrder = 'DESC';
$limitNum = 20;
$trendPost = $showDATA->account_forum_profile($sortOrder, $limitNum);
foreach($trendPost as $column) {
	$userpost = $column['post_text'];
	$postimage = $column['post_image'];
	$date = new dateTime($column['post_date']);
	$postdate = date_format($date, 'M d, Y @ h:i A');
	$postcodex = $column['post_code'];
	$rcounter = count($showDATA->reply_count($postcodex));
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

		echo '
			<tr class="post">
				<td colspan="2">
					<img src="';

					if($postimage != '') {
						echo $postimage;
					} else { echo 'resources/vectors/nopostimg.svg'; }

				echo '" />
					<span class="actions">
						<i class="far fa-comment-alt" title="'.$rcounter.'"></i> '.$rcounter.'&nbsp;&nbsp;
						<i class="'.$fontAw.' fa-thumbs-up"></i> '.$likeCnt.'&nbsp;&nbsp;
						<i class="'.$disFontAw.' fa-thumbs-down"></i> '.$dislikeCnt.'&nbsp;&nbsp;
						<span>'.$postdate.'</span>
					</span>
					<h4>
						'.$userpost.'
					</h4>
					<input type="hidden" class="upostcode" value="'.$postcodex.'" />
				</td>
			</tr>';

		}
	?>

</table>
</div>


</aside>
</div>
</div>
</section>

<script src="assets/script/forum.js"></script>
<script src="assets/script/script.js"></script>
<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>


<script>
if (window.performance) {
   if (performance.navigation.type == 1) {
	    window.location = 'forum';
  	}
}

$('table tr.post').on('click', function(e) {
	
	let upostCode = $(this).find('input.upostcode').val(),
		trendparam = {
		"upostCode": upostCode,
		"postactn": "gettrends"
	};

	$('table tr.post').each(function(i, e) {
		$(e).find('h4').css('color', '');
		$(this).find('img').css({
			'border': '',
			'padding': ''
		});
	});

	$('form.post-row-form').filter(function(g, k) {
		if($(k).find('textarea.evTarget').attr('name') == upostCode) {
			$(k).remove();
		}
	});

	$(this).find('h4').css('color', '#45aad0');
	$(this).find('img').css({
		'border': '0.14em solid #45aad0',
		'padding': '0.13em'
	});

	$.ajax({
		url: "trends.php",
		method: "POST",
		data: trendparam,
		cache: false,
		dataType: "html",
		beforeSend: function() {
			$('#taglist .trend-cont').css(
				'background',
				'rgba(234, 237, 240, 0.9)');
			$('#spinner, #spinner.spin').css('display', 'block');		
		},
		success: function(respx, status, xhr) {
			if(status == 'success') {
				$('.showAjax.content').animate({},20, 'linear', function() {
					$(this).prepend(respx);
				})
				$(window).scrollTop(270);
				$('#taglist .trend-cont').css('background','transparent');
				$('#spinner, #spinner.spin').css('display', 'none');	
			}
		}
	});
	
});

</script>
</body>
</html>




