/*global reduk_change, reduk*/

(function( $ ) {
    "use strict";

    reduk.field_objects                 = reduk.field_objects || {};
    reduk.field_objects.options_object  = reduk.field_objects.options_object || {};

//    $( document ).ready(
//        function() {
//            reduk.field_objects.import_export.init();
//        }
//    );

    reduk.field_objects.options_object.init = function( selector ) {

        if ( !selector ) {
            selector = $( document ).find( '.reduk-container-options_object' );
        }

        var parent = selector;

        if ( !selector.hasClass( 'reduk-field-container' ) ) {
            parent = selector.parents( '.reduk-field-container:first' );
        }

        if ( parent.hasClass( 'reduk-field-init' ) ) {
            parent.removeClass( 'reduk-field-init' );
        } else {
            return;
        }

        $( '#consolePrintObject' ).on(
            'click', function( e ) {
                e.preventDefault();
                console.log( $.parseJSON( $( "#reduk-object-json" ).html() ) );
            }
        );

        if ( typeof jsonView === 'function' ) {
            jsonView( '#reduk-object-json', '#reduk-object-browser' );
        }        
    };
})( jQuery );