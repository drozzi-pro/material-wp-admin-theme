/*global reduk*/

(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.spacing = reduk.field_objects.spacing || {};

    $( document ).ready(
        function() {
            //reduk.field_objects.spacing.init();
        }
    );

    reduk.field_objects.spacing.init = function( selector ) {

        if ( !selector ) {
            selector = $( document ).find( ".reduk-group-tab:visible" ).find( '.reduk-container-spacing:visible' );
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
                var default_params = {
                    width: 'resolve',
                    triggerChange: true,
                    allowClear: true
                };

                var select2_handle = el.find( '.select2_params' );
                if ( select2_handle.size() > 0 ) {
                    var select2_params = select2_handle.val();

                    select2_params = JSON.parse( select2_params );
                    default_params = $.extend( {}, default_params, select2_params );
                }

                el.find( ".reduk-spacing-units" ).select2( default_params );

                el.find( '.reduk-spacing-input' ).on(
                    'change', function() {
                        var units = $( this ).parents( '.reduk-field:first' ).find( '.field-units' ).val();

                        if ( $( this ).parents( '.reduk-field:first' ).find( '.reduk-spacing-units' ).length !== 0 ) {
                            units = $( this ).parents( '.reduk-field:first' ).find( '.reduk-spacing-units option:selected' ).val();
                        }

                        var value = $( this ).val();

                        if ( typeof units !== 'undefined' && value ) {
                            value += units;
                        }

                        if ( $( this ).hasClass( 'reduk-spacing-all' ) ) {
                            $( this ).parents( '.reduk-field:first' ).find( '.reduk-spacing-value' ).each(
                                function() {
                                    $( this ).val( value );
                                }
                            );
                        } else {
                            $( '#' + $( this ).attr( 'rel' ) ).val( value );
                        }
                    }
                );

                el.find( '.reduk-spacing-units' ).on(
                    'change', function() {
                        $( this ).parents( '.reduk-field:first' ).find( '.reduk-spacing-input' ).change();
                    }
                );
            }
        );
    };
})( jQuery );