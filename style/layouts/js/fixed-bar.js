html2element:(function( $ ) {
	'use strict';

  // fixed bar in post page 
  // ====================
$(document).ready(function(){
  $(".king-social-share").stick_in_parent({
    parent: "#main",
    offset_top: 60
  });
   $(".floating-video").stick_in_parent({
    offset_top: -600
  }); 
});

  // Image Gallery Slider
  // ====================
$(window).load(function(){
  $(".king-images").owlCarousel({
    nav:true,
    margin:0,
    center:true,
    items: 1,
    autoHeight: true,
    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-chevron-right" aria-hidden="true"></i>']
  }); 
});
})( jQuery );
