/**
 * Reduk Checkbox
 * Dependencies        : jquery
 * Feature added by    : Dovy Paukstys
 * Date                : 17 June 2014
 */

/*global reduk_change, wp, reduk*/

(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.checkbox = reduk.field_objects.checkbox || {};

    $( document ).ready(
        function() {
            //reduk.field_objects.checkbox.init();
        }
    );

    reduk.field_objects.checkbox.init = function( selector ) {
        if ( !selector ) {
            selector = $( document ).find( ".reduk-group-tab:visible" ).find( '.reduk-container-checkbox:visible' );
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
                el.find( '.checkbox' ).on(
                    'click', function( e ) {
                        var val = 0;
                        if ( $( this ).is( ':checked' ) ) {
                            val = $( this ).parent().find( '.checkbox-check' ).attr( 'data-val' );
                        }
                        $( this ).parent().find( '.checkbox-check' ).val( val );
                        reduk_change( $( this ) );
                    }
                );
            }
        );
    };
})( jQuery );
