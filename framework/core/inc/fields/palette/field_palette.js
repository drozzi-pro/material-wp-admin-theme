/*
 Field Palette (color)
 */

/*global jQuery, document, reduk_change, reduk*/

(function( $ ) {
    'use strict';

    reduk.field_objects         = reduk.field_objects || {};
    reduk.field_objects.palette = reduk.field_objects.palette || {};

    reduk.field_objects.palette.init = function( selector ) {
        
        if ( !selector ) {
            selector = $( document ).find( ".reduk-group-tab:visible" ).find( '.reduk-container-palette:visible' );
        }

        $( selector ).each(
            function() {

                var el = $( this );
                var parent = el;
                
                if ( !el.hasClass( 'reduk-field-container' ) ) {
                    parent = el.parents( '.reduk-field-container:first' );
                }
                
                if ( parent.is( ":hidden" ) ) { // Skip hidden fields
                    return;
                }
                
                if ( parent.hasClass( 'reduk-field-init' ) ) {
                    parent.removeClass( 'reduk-field-init' );
                } else {
                    return;
                }
                
                el.find( '.buttonset' ).each(
                    function() {
                        $( this ).buttonset();
                    }
                );
        
//                el.find('.reduk-palette-set').click(
//                    function(){
//                        console.log($(this).val());
//                    }
//                )
            }
        );
    };
})( jQuery );