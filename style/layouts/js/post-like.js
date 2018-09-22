html2element:(function( $ ) {
	'use strict';
	$(document).on('click', '.king-like-button', function() {
		var button = $(this);
		var post_id = button.attr('data-post-id');
		var security = button.attr('data-nonce');

		var allbuttons;
		allbuttons = $('.king-like-button-'+post_id);
		var loader = allbuttons.next('#sl-loader');
		if (post_id !== '') {
			$.ajax({
				type: 'POST',
				url: simpleLikes.ajaxurl,
				data : {
					action : 'king_process_simple_like',
					post_id : post_id,
					nonce : security,
				},
				beforeSend:function(){
					loader.html('&nbsp;<div class="loader"></div>');
					allbuttons.addClass('effect');
				},				
				success: function(response){
					var icon = response.icon;
					var count = response.count;
					allbuttons.html(icon+count);
					if(response.status === 'unliked') {
						var like_text = simpleLikes.like;
						allbuttons.prop('title', like_text);
						allbuttons.removeClass('liked');
					} else {
						var unlike_text = simpleLikes.unlike;
						allbuttons.prop('title', unlike_text);
						allbuttons.addClass('liked');
					}
					loader.empty();		
					allbuttons.removeClass('effect');			
				}
			});
			
		}
		return false;
	});

	$(document).on('click', '.king-reactions-icon', function(event) {
		event.preventDefault();

		var main = $(this).parent().parent();
		var type = $(this).data('action');
		var voted = main.data('voted');
		var logged = main.data('logged');
		var local = localStorage.getItem('king_reaction');
		var disabled_class = 'disabled';
		if( voted === 'disabled' ){
			$('.king-reactions-post-'+main.data('post')).find('#king-reacted').removeClass( 'hide' );
			return;
		}		
		if( main.hasClass( disabled_class ) ){
			return;
		}
		if( ( logged === 'not_logged' ) && ( local == 'reaction-'+main.data('post') ) ) {
			$('.king-reactions-post-'+main.data('post')).find('#king-reacted').removeClass( 'hide' );
			return;
		}		
		$.ajax({
			url: simpleLikes.ajaxurl,
			dataType: 'json',
			type: 'POST',
			data: {
				action: 'king_reactions_box',
				nonce: main.data('nonce'),
				type: type,
				post: main.data('post'),
			},
			success: function( data ) {
				$('.king-reactions-post-'+main.data('post')).find( '.king-reactions-icon' ).each( function(){
					var reaction_id = $( this ).data( 'action' );
					var new_action = $( this ).data( 'new' );
				if( logged === 'not_logged' ) {					
					localStorage.setItem('king_reaction', 'reaction-'+main.data('post'));
				}
				$('.king-reactions-post-'+main.data('post')).addClass( disabled_class );
				$('.king-reactions-post-'+main.data('post')).find('.king-reactions-count-'+type).html(data.reactions);
				$('.king-reactions-post-'+main.data('post')).find('.king-reaction-percent-'+reaction_id).height( new_action + '%' );	
				$('.king-reactions-post-'+main.data('post')).find('.king-reaction-percent-'+type).height( data.new_reactions + '%' );		

			} );
			}
		});
	});	
})( jQuery );