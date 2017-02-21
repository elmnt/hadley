/**
 * hadley-settings.js
 * Misc global Hadley scripts
 */


/**
 * Global scroll-to-top anchor
 * Must add 'scrollanchor' class to the a tag
 */
jQuery(".scrollanchor").click(function(e){
  e.preventDefault();
  jQuery('html, body').animate({
    scrollTop: jQuery("#page").offset().top
  }, 500);
});


/**
 * Hadley Navigation
 */
jQuery(function($){

    "use strict";

	// populate the mobile nav
	$(".navmobile").html($(".navmain").html());

	// the nav button click event
	$(".navmobile-trigger").click(function(){
	  if ($(".navmobile ul").hasClass("expanded")) {
	    $(".navmobile ul.expanded").removeClass("expanded").slideUp(250);
	    $(this).removeClass("open");
	  } else {
	    $(".navmobile ul").addClass("expanded").slideDown(250);
	    $(this).addClass("open");
	  }
	});

	// Hamburger menu icon
	var $hamburger = jQuery(".hamburger");
	$hamburger.on("click", function(e) {
	  $hamburger.toggleClass("is-active");
	  // Do something else, like open/close menu
	});

  /*
  Add a span around the #primary-menu link text,
  so we can add an underline to the 'active' link.
  This is a simpler solution than extending the Walker class in WP
  just to add some spans around the text of each link :)
  */
  $( "#primary-menu li a" ).wrapInner( "<span></span>");

});
