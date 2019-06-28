window.loader = {};

// 0 <= progress < 1
window.loader.progress = function( progress ){
	if( progress >= 1 ){
		window.loader.finishLoad(  );
		return;
	}

	jQuery( '#loader-container .progress' ).css( {
		width: ( progress * 100 ) + '%' 
	} )
}

window.loader.finishLoad = function(  ){
	jQuery( '#loader-container' ).animate({
		opacity: 0
	},{
		duration: 300,
		complete: function(  ){
			jQuery( 'body' ).addClass( 'loaded' );

		}

	})
}

jQuery( document ).ready( function( $ ){

	

	window.loader.progress( 0.05 );

} )