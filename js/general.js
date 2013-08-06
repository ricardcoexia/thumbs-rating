function thumbs_rating_vote(ID, type)
{
	var data = {
		action: 'thumbs_rating_add_vote',
		postid: ID,
		type: type
	};

	jQuery.post(thumbs_rating_ajax.ajax_url, data, function(response) {

		var container = '#thumbs-rating-' + ID;
		
		var object = jQuery(container);
		
		jQuery(container).html('');
		
		jQuery(container).append(response);
		
				
		jQuery(object).removeClass('thumbs-rating-container');
		jQuery(object).attr('id', '');

	});
}