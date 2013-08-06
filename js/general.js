function thumbs_rating_vote(ID, type)
{
	var data = {
		action: 'thumbs_rating_add_vote',
		postid: ID,
		type: type
	};

	jQuery.post(thumbs_rating_ajax.ajax_url, data, function(response) {

		var caontainer = '#thumbs-rating-' + ID;
		
		jQuery(caontainer).html('');
		
		jQuery(caontainer).append(response);
	});
}