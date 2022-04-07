(function( $ ) {
	"use strict";

	$(function() {

		$('#theme-check > h2').html( $('#theme-check > h2').html() + ' with Reduk Theme-Check' );

		if ( typeof reduk_check_intro !== 'undefined' ) {
			$('#theme-check .theme-check').append( reduk_check_intro.text );
		}
		$('#theme-check form' ).append('&nbsp;&nbsp;<input name="reduk_wporg" type="checkbox">  Extra WP.org Requirements.');
	});

}(jQuery));
