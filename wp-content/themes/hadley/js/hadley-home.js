/**
 * hadley-home.js
 * Hadley home page scripts
 */


/**
 * Throttled load, resize event
 *
 * Reference:
 * https://gomakethings.com/javascript-resize-performance/
 * 
 * !! Make sure this only loads on the home page !!
 * 
 */
jQuery(function($){

  var resizeTimer; // Set resizeTimer to empty so it resets on page load

  function resizeFunction() {

    // Control front-page image display based on screen size:
    // < 768 : image is 50% of window height
    // > 768 & <= 2400 : 100% of window height (U27 = 2560)
    // > 2400 : 75% of window height
    // So:
    // 1. Smaller than iPad portrait (768), it's 50% of screen height
    //    (with a minimum height of 300px)
    // 2. From iPad portrait (768) to 2400, it's full-screen
    // 3. Bigger than 2400, it's 75% of screen height

    // Get current window width/height
    var wdw = jQuery(window).width();
    var wdh = jQuery(window).height();

    // Show window width during development
    jQuery("#checkw").html( wdw );

    // Get the height of the entire masthead element
    // which, in this case, is just the nav
    var mhh = jQuery('#masthead').height();

    // The window height, minus the height of the #masthead
    var diffh = ( wdh - mhh );

    // Attach CSS to the #frontpage_branding div (image holder) to control its size
    if (wdw > 2400) {
      jQuery( '#frontpage_branding' ).css( 'height', (diffh * .75) );
    } else if (wdw > 768 && wdw <= 2400) {
      jQuery( '#frontpage_branding' ).css( 'height', diffh );
    } else {
      jQuery( '#frontpage_branding' ).css( 'height', (diffh * .5) );
      jQuery( '#frontpage_branding' ).css( 'min-height', "300px" );
    }

    // When the "Book Tour" button is showing, 
    // add/remove some classes, based on screen size, 
    // to control the button appearance
    
    // Do this with CSS only
    // if( wdw > 1440){
    //   console.log("BIG BUTTON");
    //   jQuery( "#booktour_button" ).addClass( "button--big" );
    //   jQuery( "#booktour_button" ).addClass( "button--transbig" );      
    // } else {
    //   jQuery( "#booktour_button" ).removeClass( "button--big" );
    //   jQuery( "#booktour_button" ).removeClass( "button--transbig" );
    // }

  };

  // On resize, run the function and reset the timeout
  // 250 is the delay in milliseconds. Change as you see fit.
  $(window).resize(function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(resizeFunction, 250);
  });

  resizeFunction();

});


/* NOT Throttled:

jQuery(window).on("load resize",function(e){

  // Control front-page image display based on screen size:
  // < 768 : image is 50% of window height
  // > 768 & <= 2400 : 100% of window height (U27 = 2560)
  // > 2400 : 75% of window height
  // So:
  // 1. Smaller than iPad portrait (768), it's 50% of screen height
  //    (with a minimum height of 300px)
  // 2. From iPad portrait (768) to 2400, it's full-screen
  // 3. Bigger than 2400, it's 75% of screen height

  // Get current window width/height
  var wdw = jQuery(window).width();
  var wdh = jQuery(window).height();

  // Show window width during development
  jQuery("#checkw").html( wdw );

  // Get the height of the entire masthead element
  // which, in this case, is just the nav
  var mhh = jQuery('#masthead').height();

  // The window height, minus the height of the #masthead
  var diffh = ( wdh - mhh );

  // Attach CSS to the #frontpage_branding div (image holder) to control its size
  if (wdw > 2400) {
    jQuery( '#frontpage_branding' ).css( 'height', (diffh * .75) );
  } else if (wdw > 768 && wdw <= 2400) {
    jQuery( '#frontpage_branding' ).css( 'height', diffh );
  } else {
    jQuery( '#frontpage_branding' ).css( 'height', (diffh * .5) );
    jQuery( '#frontpage_branding' ).css( 'min-height', "300px" );
  }

  // When the "Book Tour" button is showing, 
  // add/remove some classes, based on screen size, 
  // to control the button appearance
  
  // Do this with CSS only
  // if( wdw > 1440){
  //   console.log("BIG BUTTON");
  //   jQuery( "#booktour_button" ).addClass( "button--big" );
  //   jQuery( "#booktour_button" ).addClass( "button--transbig" );      
  // } else {
  //   jQuery( "#booktour_button" ).removeClass( "button--big" );
  //   jQuery( "#booktour_button" ).removeClass( "button--transbig" );
  // }

});
*/
