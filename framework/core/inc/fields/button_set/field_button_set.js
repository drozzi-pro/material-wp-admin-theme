/*
 Field Button Set (button_set)
 */

/*global jQuery, document, reduk*/

(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.button_set = reduk.field_objects.button_set || {};

    $( document ).ready(
        function() {
            //reduk.field_objects.button_set.init();
            if ( $.fn.button.noConflict !== undefined ) {
                var btn = $.fn.button.noConflict();
                $.fn.btn = btn;
            }
        }
    );

    reduk.field_objects.button_set.init = function( selector ) {
        if ( !selector ) {
            selector = $( document ).find( ".reduk-group-tab:visible" ).find( '.reduk-container-button_set:visible' );
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
                        if ( $( this ).is( ':checkbox' ) ) {
                            $( this ).find( '.buttonset-item' ).button();
                        }

                        $( this ).buttonset();
                    }
                );
            }
        );

    };
})( jQuery );