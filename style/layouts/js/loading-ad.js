html2element:(function( $ ) {
	'use strict';

  // Loading Ad js
  // ====================
$(document).ready(function () {
    var counter = loadingad.second;
    var id = setInterval(function() {
       counter--;
       if(counter > 0) {
            var msg = "You can skip ad in " + counter + "s";
            $("#notice").text(msg);
       } else {
            $("#notice").hide();
            $("#hidead").show();
            clearInterval(id);
      }
    }, 1000);
  
  $("#hidead").click(function() {
    $(".king-loading-ad").hide();
  });
  
  });
})( jQuery );
