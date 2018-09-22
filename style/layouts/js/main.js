html2element:(function( $ ) {
	'use strict';

  // Switch View
  // ====================
$(document).ready(function() {
    var csshref = localStorage["fav"];
    if (csshref) {
        $("#switchview").prop("class", csshref);
    }
    var activeid = localStorage["activeid"];
    if (activeid) {
        $("#" + activeid).prop("checked", true).closest("label").addClass("active");
    }

    $('#btn-switch [type="radio"]').on("change", function() {
        $("#switchview").attr("class", $(this).data('color'));        
        localStorage.setItem('fav', $(this).data('color'));        
        localStorage.setItem('activeid', $(this).prop('id'));        
        return false;
    });
});
  // Infinite Scroll
  // ====================
$(document).ready(function() {
  	var ias = $.ias({
  	  container:  "#switchview",
  	  item:       "article.post",
  	  pagination: ".posts-navigation",
  	  next:       ".nav-previous a"
  	});
    
    var inumber = mainscript.infinitenumber;

  	ias.extension(new IASSpinnerExtension({
  	  html: '<div class="switch-loader"><span class="loader"></span></div>'      // override text when no pages left
  	}));            // shows a spinner (a.k.a. loader)
  	ias.extension(new IASTriggerExtension({offset: inumber})); // shows a trigger after page 3
  	ias.extension(new IASNoneLeftExtension({
  	  html: '<div class="load-nomore"><span>There are no more pages left to load.</span></div>'      // override text when no pages left
  	}));
  });
  // Featured Slider
  // ====================
$(document).ready(function(){
  var items = mainscript.itemslength;
  $(".king-featured").owlCarousel({
	nav:true,
    margin:0,
    center:true,
    loop: true,
    autoplay: true,
    items: items,
    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>']
  });
});
  // Header search active
  // ====================
$(document).ready(function(){

	$(".header-search-form").click(function(event){
		event.stopPropagation();
		$("div.king-search").addClass("active");
	});

	$(document).on("click", function () {

		$("div.king-search").removeClass("active");
	});


});
  // Sticky ad in sidebar
  // ====================
$(document).ready(function(){
  $(".sidebar-ad").stick_in_parent({
    parent: "#primary",
    offset_top: 80
  });
});
  // bootstrap loading state
  // ====================
$(document).ready(function(){
$("#king-submitbutton").click(function() {
  var $btn = $(this).find('#king-submitbutton');
  $btn.button('loading');
});
});

})( jQuery );
