function thumbs_rating_vote(ID, type)
{
	jQuery.ajax({
	type: 'POST',
	url: thumbs_rating_ajax.ajaxurl,
	data: {
	action: 'thumbs_rating_add_vote',
	postid: postId,
	type: type
},
success:function(data, textStatus, XMLHttpRequest){
	var linkid = '#thumbs-rating-' + postId;
	jQuery(linkid).html('');
	jQuery(linkid).append(data);
	},
	error: function(MLHttpRequest, textStatus, errorThrown){
		alert(errorThrown);
		}
	});
}