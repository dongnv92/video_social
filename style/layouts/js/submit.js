html2element:(function( $ ) {
	'use strict';

  // Image Preview Before Upload
  // ====================
$(document).ready(function(){
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function (e) {
				$('.inputprev').attr('src', e.target.result);
			}
			
			reader.readAsDataURL(input.files[0]);
		}
	}
	
	$("#featured-image").change(function(){
		readURL(this);
	});
});

// Submit Post button loading
// ====================
$("#king_posts_form").submit(function(e) {
  var $btn = $(this).find('#submit-loading');
  $btn.button('loading');
});

// tinymece for content in submit pages
// ====================
tinymce.init({
  selector: 'div.tinymce',
  theme: 'inlite',
  plugins: 'paste textpattern autolink',
  insert_toolbar: 'quicktable',
  selection_toolbar: 'bold italic | quicklink h2 h3 blockquote',
  inline: true,
  paste_data_images: false,
});

// Submit page tags js
// ====================
$(document).ready(function(){
	$('#king_post_tags').tagsInput({
 		'defaultText':'enter tags',
		'height':'auto',
		'width':'100%',
		'maxChars' : 100,
		'placeholderColor' : '#a8b6c0'
	});
});

  // Sticky news
  // ====================
$(document).ready(function(){
    $(".submit-news-right").stick_in_parent({
        parent: "#main",
        offset_top: 60
    });
});

})( jQuery );
