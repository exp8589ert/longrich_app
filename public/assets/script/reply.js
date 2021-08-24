$('.delete.replies').click(function(e) {

	var replyTextElement = $(e.target).parents('.reply-wrapper.reply-display').children('[class*="userReplies"]'),
		replyUsrId = replyTextElement.data('userid'),
		replyNum = replyTextElement.data('replynum'),
		replyCode = replyTextElement.data('replycode');

	var delReplyPara = {
		'replyUId': replyUsrId,
		'replyNo': replyNum,
		'replyPsCode': replyCode,
		'postText': replyTextElement.text(),
		"postAction":"deleteReply"
	}


	$.ajax({
		url: 'reply.php', 
		method: 'POST', 
		data: delReplyPara, 
		cache: false,
		success: function(response, status, xhr) {
			$(e.target).parents('.reply-wrapper.reply-display').remove();
		}
	});
});


$('.edit.replyEdit').click(function(e) {

	function sendEditedReply(editedReplyTxt, replyUsrId, replyNum, replyCode) {
	var editreplyPara = {
		"postText": editedReplyTxt.text(),
		"replyUsrId": replyUsrId,
		"replyNum": replyNum,
		"replyCode": replyCode,
		"postAction": "editedReply"
	}
	$.ajax({
		'url': 'reply.php',
		'method': 'POST',
		 data: editreplyPara,
		 cache: false
	});
}
var replytextDiv = $(e.target).parents('.reply-display'),
	replyUsrId = $(replytextDiv).children('.userReplies').data('userid'),
	replyNum = $(replytextDiv).children('.userReplies').data('replynum'),
	replyCode = $(replytextDiv).children('.userReplies').data('replycode'),
	replytextcnvt = $(replytextDiv).children('.userReplies').text(),
	replytext = replytextcnvt.replace(/<\/?[^>]+(>|$)/g, "");
	

	$($(replytextDiv).children('.userReplies')).replaceWith('<div contenteditable="true" onkeypress="if($(this).text().length === 1000 || $(this).height() > 340) return false;" data-userid="'+replyUsrId+'" data-replynum="'+replyNum+'" data-replycode="'+replyCode+'" class="userReplies focused cjoiner" maxlength="1000">'+replytext+'</div>');
	


	function callBlurSend(editedReplyTxt, replyUsrId, replyNum, replyCode) {
		$($(replytextDiv).children('.userReplies.focused')).attr('contenteditable', 'false').css({
			'background': '#f3f6f8',
			'border': '0.1em solid transparent',
			'height': 'auto',
			'max-width': '39em',
			'padding': '0.8em 1em 1em',
			'overflow': 'hidden',
			'white-space': 'wrap',
			'word-break': 'break-all'
		});
		sendEditedReply(editedReplyTxt, replyUsrId, replyNum, replyCode);
	};

	var replyTelem = $(replytextDiv).children('.userReplies.focused'),
		txtAcont = $(replyTelem).text();
				   $(replyTelem).blur().focus().text(txtAcont);

	$(replyTelem).on('keypress', (ev)=> {}).blur((et)=> {
		var editedReplyTxt = $(et.target);
			callBlurSend(editedReplyTxt, replyUsrId, replyNum, replyCode);
	}).keydown((evt)=> {

		if(evt.which === 13) {
		var editedReplyTxt = $(evt.target);
			if (!evt.shiftKey){
				callBlurSend(editedReplyTxt, replyUsrId, replyNum, replyCode);
			} 	
		}
	});
});
