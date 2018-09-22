html2element:(function( $ ) {
	'use strict';
	$(document).on('click', '.follow-button', function() {
		var button = $(this);
		var post_id = button.attr('data-post-id');
		var security = button.attr('data-nonce');

		var allbuttons;
			allbuttons = $('.follow-button-'+post_id);
		var loader = allbuttons.next('#follow-loader');
		if (post_id !== '') {
			$.ajax({
				type: 'POST',
				url: simpleFollows.ajaxurl,
				data : {
					action : 'king_process_simple_follow',
					post_id : post_id,
					nonce : security,
				},
				beforeSend:function(){
					loader.html('&nbsp;<div class="loader">Loading...</div>');
				},	
				success: function(response){
					var icon = response.icon;
					var count = response.count;
					allbuttons.html(icon+count);
					if(response.status === 'unfollowd') {
						var follow_text = simpleFollows.follow;
						allbuttons.prop('title', follow_text);
						allbuttons.removeClass('followd');
					} else {
						var unfollow_text = simpleFollows.unfollow;
						allbuttons.prop('title', unfollow_text);
						allbuttons.addClass('followd');
					}
					loader.empty();					
				}
			});
			
		}
		return false;
	});	

})( jQuery );
