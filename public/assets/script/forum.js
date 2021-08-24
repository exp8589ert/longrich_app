autosize($('textarea'));
var fRbvm = $('.forum-image-modal'),
	albumList = $('.forum-image-modal .image-wrapper ul'),
	listCont = $('.forum-image-modal .list-container'),
	imageList = $('.forum-image-modal .image-wrapper ul li'),
	imageListWidth = imageList.width(),
	albumlength = $(imageList).length,
	Ftarget = $('[class*="fmedia-holder"]');
	slideMax = albumlength - 6;



function forumImgModal(arguments) {
$(arguments).on('click', (e)=> {

($(e.target).attr('class').match(/\b(media-holder|exception)\b/))?
		(()=> {
			
if($(e.target).attr('src') != undefined) {
	var ImageSrc = $(e.target).attr('src');
	$('img.fsrc-collector').attr('src', ImageSrc);

	if($(e.target).hasClass('pic-album')) {
		$(listCont).css('display', 'flex');
		

	$('.image-album li img').each((v, q)=> {
		$(q).click(function(ev) {
			$(ev.target).css('opacity', '1');
			

			if($(q).data('pindex') <= slideMax) {
				$(albumList).css({
					'transform':'translateX('+($(q).data('pindex') * -imageListWidth)+'px)', 
					'transition' : '1s',
				});	
			}
			if($(q).data('pindex') == albumlength) {
				$(albumList).css({
					'transform':'translateX('+($(q).data('pindex') - 10)+'px)', 
					'transition' : '1s',
				});
			}
			$('.image-album li img').not(ev.target).each((xv, xq)=> {
					$(xq).css('opacity', '0.3');
			});
		});

	});

	} 
	if($(e.target).hasClass('post-img')) {
		$(listCont).css('display', 'none');
	}
}
	fRbvm.add($('body')).addClass('display noscroll');
})()
: 
fRbvm.add($('body')).removeClass('display noscroll');
});
}
forumImgModal(Ftarget);

var postarea = $("#text-areaf"),
errorDisplay = $('#error-display'),
imageSizeError,
videoSize,
emptyError,
imageTypeError;

imageSizeError = '<span class="error_msg">Image size is larger than 5 MB. Maximum allowed image size is 5 MB.</span>';
videoSize = '<span class="error_msg">Video size is larger than 10 MB. Maximum required video size is 10 MB.</span>';
emptyError = '<span class="error_msg">Text field can not be empty, please add a discussion before posting.</span>';
imageTypeError = '<span class="error_msg">Image type not supported. Please upload a jpg, jpe, jpeg, png, bmp, or gif file.</span>';


var overSized,
	upFileDataURL,
	fileType;

function fileUploadFunc() {

$('.file-upload').change(function(e) {
	var updfile = e.target;
	if(updfile.files && updfile.files[0]) {
		var uploadFile = updfile.files[0],
			postUpfileSize = uploadFile.size;

		if(parseInt(postUpfileSize/1000) > 5000) {
			errorDisplay.html(imageSizeError);
			overSized = true;
			return overSized;
		} 
		else {
			overSized = false;
			errorDisplay.html('');
			fileR = new FileReader();
			fileR.readAsDataURL(uploadFile);
				fileR.onload = (e)=> {
					upFileDataURL = fileR.result;
				}
		}
	}
});

}
fileUploadFunc();


$($("#post-form")[0]).on('submit', function(e) {
	e.preventDefault();
	e.stopImmediatePropagation();
	var $this = $(this);

	if(overSized == true) {
		errorDisplay.html(imageSizeError);
		return false;
	}
	if(postarea.val() === '' || postarea.val().trim().length < 1) {
		errorDisplay.html(emptyError);
		return false;
	}
	else {

		errorDisplay.html('');

		var postText = postarea.val().replace(/<\/?[^>]+(>|$)/g, ""),
			postFile = upFileDataURL,
			fmPostParam = {
			"postText": postText,
			"fileDataURL": postFile,
			"postAction":"sendPost"
		}
    	
		$.ajax({
			url: 'post.php',
		    method:"POST",
			cache: false,
		    data: fmPostParam,
		    beforeSend: function() {
		    	$('#postspinner').css({
					'background': 'rgba(234, 237, 240, 0.5)',
					'display': 'block',
					'width': '97.5%',
					'height': '11.8em',
					'z-index': '4',
					'position': 'absolute',
					'justify-content': 'center',
					'align-items': 'center'
				});
		    	$('#ppinner.spin').css({
		    		'display': 'block',
		    		'width': '2.4em',
		    		'height': '2.4em',
					'left': '44%',
					'top': '10em'
		    	});	
		    },
		    success: function(response, status, xhr) {
		    	$('#postspinner').css('display', 'none');
		    	$('.showAjax.content').prepend(response);
		    	$('#previewImg').css('display', 'none');
		    	postarea.css('height', '6.14em');
		    	$('#char-message span.count').text('0');	
		    	postarea.val('');
			    upFileDataURL = null;	
		    }
		});	
			
			
	}
});



// if($(window).scrollTop() > 280) {
// 	alert('Scroll dectected');
// }

$('button.load-more').on('click', function() {
	location.reload();
});

$(postarea).on('keyup', function(e) {
	if($(this).val() != '' && $(this).val().trim().length > 0) {
		errorDisplay.html('');
	} 
});



$("span.edit").each((et, f)=> {
	$(f).on('click', (e)=> {
		if($(e.target).hasClass('edit') === true) {
			$(f).prev('ul.options').css('display', 'block');
		} 
		$(window).click(function(editBtnEv) {
			if($(editBtnEv.target).hasClass('edit') !== true) {
				$(f).prev('ul.options').css('display', 'none');
			} 
		});
	});

$($(f).prev('ul.options').find('li')).each((v, w)=> {

var editedFileDataURL,
fileLength,
exFunCounter = 1,
editableTAval = $(w).parents('.image-wrapper'),
editedText = editableTAval.next('textarea'),
imgPrevW = editeFile = editableTAval.next().next().find('[class*="r-prevw"]'),
editeFile = editableTAval.next().next().find('input.file-upload')[0],
dbImage = $(editedText).next('div.mediaWrapper').next('img.post-img');

$(editeFile).on('change', function(e) {
	var newFile = e.currentTarget;
	if(newFile.files && newFile.files[0]) {
	var editedfile = newFile.files[0],
		editreader = new FileReader();
		editreader.readAsDataURL(editedfile);
		editreader.onload = (e)=> {
			editedFileDataURL = editreader.result;
			fileLength = editedfile.size;

			$(editedText).next('div.mediaWrapper').children('#previewImg').css({
				'display': 'block',
				'background-image':'url(' + editreader.result + ')'
			});
		};
	}
});


function updateEditedPost(editedFileDataURL, fileLength, rmvBtnImgsrc) {

	if(editedText.val() === '' || editedText.val().trim().length < 1) {
		errorDisplay.html(emptyError);
		return false;
	} 
	else {
		
		errorDisplay.html('');
		var editedPostText = editedText.val(),
			dbImageSrc = dbImage.attr('src'),
			rmvImgsrc = rmvBtnImgsrc,
			editedPostFile = editedFileDataURL,
			olduPostCode = editedText.attr('name'),
			

			editedParam = {
			"postText": editedPostText,
			"getDbImage": dbImageSrc,
			"rmvImageSrc": rmvImgsrc,
			"fileDataURL": editedPostFile,
			"ouPostCode": olduPostCode,
			"postAction":"editedPost"
		}

		$.ajax({
			url: 'post.php',
		    method:"POST",
			cache: false,
		    data: editedParam,
		    success: function(response, status, xhr) {	


		    	var mediaWrp = $(editedText).next('div.mediaWrapper'),
		    		imgCount = mediaWrp.next('img.addedImg');

		    	if(fileLength > 0 && editedFileDataURL != null) {
		    		if(imgCount.length < 1) {
		    			mediaWrp.after('<img src="'+editedFileDataURL+'" class="post-img fmedia-holder media-holder addedImg">');
		    			forumImgModal($(mediaWrp).next('.fmedia-holder'));
		    		} 
		    		var othImgSrc = $(mediaWrp).next('img.addedImg').attr('src'),
			    		otherImgCount = $(mediaWrp).next('img.addedImg');
		    		
		    		if(otherImgCount.length > 0) {
		    			$(mediaWrp).after('<img src="'+editedFileDataURL+'" class="post-img fmedia-holder media-holder addedImg">');
		    			forumImgModal($(mediaWrp).next('.fmedia-holder'));
		    			otherImgCount.css('display', 'none');
		    		}
		    	} 
		    	else {
		    	    $(mediaWrp).next('img.addedImg').css('display', 'none');
		    	}
		    	/*## Show back image from DB after editing...*/
		    	if(fileLength == undefined && editedFileDataURL == undefined) {
		    		$(mediaWrp).next('img.post-img.fmedia-holder').css('display', 'block');
		    	}

		    }
		});

  }
}



function deletePost(postForm, postImgUrl) {

	var olduPostCode = editedText.attr('name'),
		pImgUrl = postImgUrl,
		deleteParam = {
		"ouPostCode": olduPostCode,
		"postImgUrl": pImgUrl,
		"postAction":"deletePost"
	}
	$.ajax({
		url: 'post.php',
	    method:"POST",
		cache: false,
	    data: deleteParam,
	    beforeSend: function() {
	    	$(postForm).html('<span class="post-deleted">deleting...</span>');
	    },
	    success: function(response, status, xhr) {
	    	if(status === 'success') {
	    		$(postForm).children().remove();
	    		$(postForm).html('<span class="post-deleted">Post deleted.</span>');
				var removeMsg = ()=> $(postForm).html('');
				setTimeout(removeMsg, 1500);
	    	}
	    }
	});

	
	
}





if(et === 1 || v === 1) {


$(imgPrevW).click(function(e) {

	if($(e.target).hasClass('r-prevw')) {
		/* # Remove image preview. */
		
		fileLength = 0;
		editedFileDataURL = null;
		$(e.target).parents('#previewImg.evTarget').css('display', 'none');
		updateEditedPost(editedFileDataURL, fileLength);

	}

	if($(e.target).hasClass('rmvImg')) {
		/* # Remove image from database.*/
		var rmvBtnImgsrc = $(e.target).parents().parents().next('img.post-img.fmedia-holder').attr('src');
		$(e.target).parents().parents().next('img.post-img.fmedia-holder').attr('src', '');
		$(this).css('display', 'none');
		fileLength = 0;
		editedFileDataURL = null;
		updateEditedPost(editedFileDataURL, fileLength, rmvBtnImgsrc);
		exFunCounter++;

		
	}
});


$(window).click(function(ev) {

	if($(ev.target).hasClass('evTarget') === true) {
		if($(ev.target).attr('readonly')) {
			exFunCounter++;
		} 
		else {
			exFunCounter = 0;			
		}	
	} 

	if($(ev.target).hasClass('evTarget') !== true) {
	 
	  if(exFunCounter < 1) {

	  if(updateEditedPost(editedFileDataURL, fileLength) !== false) {
	  	
			exFunCounter++;			
			$(editedText).css({
				'background': '#f3f6f8',
				'border': '0.1em solid transparent',
				'box-shadow': 'none'
			}).attr('readonly', 'true');
			$(editedText).next('div.mediaWrapper').css('display', 'none');
		}
	   }
	}
	
	
});



editableTAval.next().next().find('button.editsubBtn').click(function(e) {
	e.preventDefault();
});

}


$(w).click(function(e) {
	if($(w).hasClass('edit-content')) {
		
		$(editableTAval.next('textarea')).removeAttr('readonly disable').focus().css({
			'background': '#fff',
			'border': '0.1em solid #94578c'
		});
		$(editedText.next('div.mediaWrapper')).css('display', 'flex');
		$(editedText.next('div.mediaWrapper').next('img.post-img')).css('display','none');

		var txtAcont = $(editableTAval.next('textarea')).val();
		$(editableTAval.next('textarea')).val('');
		editableTAval.next('textarea').blur().focus().val(txtAcont);
		
	}

	if($(w).hasClass('delete-content')) {
		var postForm,
			postImgUrl;
			postForm = $(e.target).parents('form.post-row-form');
			postImgUrl = $(e.target).parents().children('img.post-img').attr('src');
			deletePost(postForm, postImgUrl);
	}

	if($(w).hasClass('report-post')) {
		var reportPara,
			unReportPara,
			reporterId = $(this).parents('.postrows.post-wrapper').find('input.userid').val(),
			postOwnerId = $(this).parents('.postrows.post-wrapper').find('input.fUserId').val(),
			postCode = $(editableTAval.next('textarea')).attr('name'),
			reportStatus = 1,
			unreportStatus = 0;

		if($(this).find('i').hasClass('fa-flag')) {
			$(this).html('<div class="reported color edit">Post reported <i class="fas fa-check edit"></i></div>');
			reportPara = {
				"reporterId": reporterId,
				"postOwnerId": postOwnerId,
				"postCode": postCode,
				"reportStatus": reportStatus,
				"postReportsta": "reportPost"
			}
			$.post('cnumFunc.php', reportPara);			
		} 
		else {
			$(this).html('<i class="fas fa-flag edit"></i> &nbsp;Report post');
			unReportPara = {
				"reporterId": reporterId,
				"postOwnerId": postOwnerId,
				"postCode": postCode,
				"reportStatus": unreportStatus,
				"postReportsta": "reportPost"
			}
			$.post('cnumFunc.php', unReportPara);
		}
		
	}

	   


	   });
	});
});

/*.... Options ends. ####*/




function followFunc(textaElem, immedUserId, Ucode, followerID, followerUC, followAction) {

	followPara = {
		'postText': textaElem.val(),
		'forumUserId': immedUserId,
		'Ucode': Ucode,
		'followerID': followerID,
		'followerUC': followerUC,
		'fwAction': followAction,
		"postAction":"followActn"
	}

	$.ajax({
		url: 'post.php', 
		method: 'POST', 
		data: followPara, 
		cache: false,
		success: function(response, status, xhr) {
			
		}
	});
}

$('i.fwuser').on('click', function(e) {

	var immedUserId = $(e.target).data('userid'),
		textaElem = $(e.target).parents('.post-wrapper').children('textarea.displayed-post'),
		actionWrapp = $(e.target).parents('.image-wrapper').siblings('.action-wrapper'),
		followerUC = $(actionWrapp).find('.usercode').val(),
		Ucode = $(e.target).data('uscode'),
		followerID = $(actionWrapp).find('.userid').val(),
		followStatus = null;

		if($(e.target).hasClass('fa-user-plus') === true) {
			followStatus = true;
			followFunc(textaElem, immedUserId, Ucode, followerID, followerUC, 'follow');
		}
		else {
			followStatus = false;
			followFunc(textaElem, immedUserId, Ucode, followerID, followerUC, 'unfollow');
		}
		

		$('i.fwuser').each(function(x, y) {
			if($(y).data('userid') === immedUserId) {
				$(y).toggleClass('fa-user-plus fa-user-check');
				if(followStatus === true) {
					$(y).css({
						'color' : '#be4058',
						'background' : '#f7f8fa',
						'border' : '1px solid #d9dbe2'
					}).attr('title', 'Following');
				}
				else {
					$(y).css({
						'color' : '#467aad',
						'background' : '#f7f8fa',
						'border': '1px solid transparent'
					}).attr('title', 'Follow');
				}
			}
		});
});


$("textarea.send.reply").on('keyup', function() {
	if($(this).val().trim() !== '' && $(this).val().trim().length > 0) {
		$('.reply-button-wrapper').css({
			'display' : 'flex',
			'justify-content' : 'flex-end',
			'margin-bottom' : '0.5em',
			'padding-bottom' : '1em',
			'border-bottom' : '1px dashed #d8d8e2'
		});
	} else {
		$('.reply-button-wrapper').css('display', 'none');
		$('.reply-button-wrapper button').attr('type', 'button').addClass('disable');
		
	}
});

$(".post-wrapper textarea").on('keypress', function() {
	if($(this).val().trim().length === 1000 || $(this).height() > 340) {
		return false;
	}	
});



$('.reply-btn').click(function(e) {
	e.preventDefault();
	e.stopImmediatePropagation();

var userId = $(e.target).parents('.reply-content').prev().children('input.userid').val(),
	repltTexta = $(e.target).parents().prev().children('textarea.reply'),
	replyPostCode = $(e.target).parents('.reply-content').parents().parents('.post-row-form').children('.postrows').children('textarea.displayed-post').attr('name'),
	replyTxtVal = null;

	if(repltTexta.val() === '' || repltTexta.val().trim().length < 1) {
		replyTxtVal = false;
	} 
	else {
		replyTxtVal = true;
		repltTexta.val();
		
		if(replyTxtVal === true) {

			var replyPara = {
				"replyUserId" : userId,
				"postText" : repltTexta.val(),
				"replyPsCode" : replyPostCode,
				"postAction": "replyPost"
			}

			$.ajax({
				url: "reply.php",
				method: "POST",
				data: replyPara,
				success: function(response, status, xhr) {

					$(e.target).parents('.image-wrapper.reply').next('.ajax-load').html(response);				
					repltTexta.css('height', 'auto');
					repltTexta.val('');
				}
			});
		}
	}
});







function ratingFunc(textaElem, postCode, userId, userCode, ratingAction) {

	ratingPara = {
		'postText': textaElem.val(),
		'postCode': postCode,
		'userId': userId,
		'userCode': userCode,
		'PostRating': ratingAction,
		"postAction":"postReaction"
	}
	$.ajax({
		url: 'post.php', 
		method: 'POST', 
		data: ratingPara, 
		cache: false,
		success: function(response, status, xhr) {
			
		}
	});
}




$('.like-BTN').each(function(l, b) {

	var textaElem = $(b).parents().parents('.postrows').find('textarea.displayed-post'),
		postCode = textaElem.attr('name'),
		userId = $(b).siblings('input.userid').val(),
		userCode = $(b).siblings('input.usercode').val(),
		allSpan = $($(b).children('span')).add($(b)),
		dislikeSpanval = $(b).next('.dislike-BTN').children('span.dislike-counter'),
		likeSpanCnt = $(b).children('span.like-counter'),
		getSpanval;

	$(b).click((e)=> {

	getSpanval = parseInt($(likeSpanCnt).text());
	getDislikeSpanval = parseInt($(dislikeSpanval).text());

	if($(b).children('i').hasClass('far')) {
		
		$(b).children('i').toggleClass('far fas');
		
		$(allSpan).css({
				'color': '#4881b9',
				'background': '#fff'
		});
		(()=> {
			$($(b).next('.dislike-BTN')).add($(b).next('.dislike-BTN').children('span')).css({
				'color': '#89919d',
				'background': '#f7f8fa'
			}); 

				$(likeSpanCnt).text(getSpanval + 1);

				if($(b).next('.dislike-BTN').children('i').hasClass('fas')) {
					
					$(dislikeSpanval).text((getDislikeSpanval > 0)? getDislikeSpanval - 1 : getDislikeSpanval);
				}

				$(b).next('.dislike-BTN').children('i').attr('class', 'far fa-thumbs-down');		
		})();
		ratingFunc(textaElem, postCode, userId, userCode, 'like');
		}	

		else {
			$(b).children('i').toggleClass('fas far');
			$(allSpan).css({
				'color': '#89919d',
				'background': '#f7f8fa'
			});	
				$(likeSpanCnt).text(getSpanval - 1);
				ratingFunc(textaElem, postCode, userId, userCode, 'unlike');
		}		
	});
});


$('.dislike-BTN').each(function (d, b) {
		var textaElem = $(b).parents().parents('.postrows').find('textarea.displayed-post'),
			postCode = textaElem.attr('name'),
			userId = $(b).siblings('input.userid').val(),
			userCode = $(b).siblings('input.usercode').val(),
			allSpan = $($(b).children('span')).add($(b)),
			likeSpanval = $(b).prev('.like-BTN').children('span.like-counter'),
			dislikeSpanCnt = $(b).children('span.dislike-counter'),
			getSpanval;


		$(b).click((e)=> {

			getSpanval = parseInt($(dislikeSpanCnt).text());
			getlikeSpanval = parseInt($(likeSpanval).text());

			if($(b).children('i').hasClass('far')) {
				$(b).children('i').toggleClass('far fas');
				$(allSpan).css({
					'color': '#ed4949',
					'background': '#fff'
				});
				(()=> {
					$($(b).prev('.like-BTN')).add($(b).prev('.like-BTN').children('span')).css({
					'color': '#89919d',
					'background': '#f7f8fa'
					}); 
				
					$(dislikeSpanCnt).text(getSpanval + 1);
					
					if($(b).prev('.like-BTN').children('i').hasClass('fas')) {
						$(likeSpanval).text((getlikeSpanval > 0)? getlikeSpanval - 1 : getlikeSpanval);
					}

					$(b).prev('.like-BTN').children('i').attr('class', 'far fa-thumbs-up');
				})();

				ratingFunc(textaElem, postCode, userId, userCode, 'dislike');
			}	
			else {
				$(b).children('i').toggleClass('fas far');
				$(allSpan).css({
					'color': '#89919d',
					'background': '#f7f8fa'
				});

				$(dislikeSpanCnt).text(getSpanval - 1);
				ratingFunc(textaElem, postCode, userId, userCode, 'undislike');
			}		
	});
});



// $('.reply-content').addClass('nodisplay');
$('.show-reply.counter').each(function(s, h) {
	$(this).click(function(e){
		
		if($(e.target).next('input').val() > 0) {
			$(h).parent().next('.reply-content').css('display', 'block');
			// $(h).parent().next('.reply-content').toggleClass('nodisplay', 'display');
		}
		if($(e.target).hasClass('show-reply-box')) {
			$(h).parent().next('.reply-content').css('display', 'block');
			// $(h).parent().next('.reply-content').toggleClass('nodisplay', 'display');
		}		
	});
});



$('#search-form').on('submit', function(e) {
	e.preventDefault();
	var searchPara = $('input#search').val();
	if($('input#search').val().trim() !== '' || 
		$('input#search').val().trim().length > 0) {
		$.ajax({
			url: "search",
			method: "POST",
			data: {"searchPara" : searchPara},
			cache: false,
			beforeSend: function() {
				$('.search-modal').css({
					'background': 'rgba(234, 237, 240, 0.3)',
					'display': 'flex',
					'width': '100%',
					'height': '100%',
					'top': '0',
					'justify-content': 'center',
					'align-items': 'center'
				});
				$('#spinner.spin').css({
					'display': 'block',
					'margin-top': '-2em'
				});	
				$(window).scrollTop(270);	
			},
			success: function(response, status, xhr) {
				if(status === 'success') {
					console.log(response);
					$('.showAjax.below').html(response);
					$('.search-modal').add($('#spinner.spin')).css('display', 'none');
				}
			}
		});
	} 
});







