/**
 * hadley-btb-control.js
 * Control the size of the 'Book Tour' button based on screen size
 */

jQuery(window).on("load resize scroll",function($){

	var btbww = $( window ).width();

	if( btbww < 800){
    $( "#booktour_button" ).removeClass( "button--big" );
    $( "#booktour_button" ).removeClass( "button--transbig" );  
	} else {
    $( "#booktour_button" ).addClass( "button--big" );
    $( "#booktour_button" ).addClass( "button--transbig" );      
	}

});
