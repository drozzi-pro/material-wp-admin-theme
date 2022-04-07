/*
 Field Border (border)
 */

/*global reduk_change, wp, reduk*/

(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.border = reduk.field_objects.border || {};

    reduk.field_objects.border.init = function( selector ) {
        if ( !selector ) {
            selector = $( document ).find( ".reduk-group-tab:visible" ).find( '.reduk-container-border:visible' );
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
                el.find( ".reduk-border-top, .reduk-border-right, .reduk-border-bottom, .reduk-border-left, .reduk-border-all" ).numeric(
                    {
                        allowMinus: false
                    }
                );

                var default_params = {
                    triggerChange: true,
                    allowClear: true
                };

                var select2_handle = el.find( '.reduk-container-border' ).find( '.select2_params' );

                if ( select2_handle.size() > 0 ) {
                    var select2_params = select2_handle.val();

                    select2_params = JSON.parse( select2_params );
                    default_params = $.extend( {}, default_params, select2_params );
                }

                el.find( ".reduk-border-style" ).select2( default_params );

                el.find( '.reduk-border-input' ).on(
                    'change', function() {
                        var units = $( this ).parents( '.reduk-field:first' ).find( '.field-units' ).val();
                        if ( $( this ).parents( '.reduk-field:first' ).find( '.reduk-border-units' ).length !== 0 ) {
                            units = $( this ).parents( '.reduk-field:first' ).find( '.reduk-border-units option:selected' ).val();
                        }
                        var value = $( this ).val();
                        if ( typeof units !== 'undefined' && value ) {
                            value += units;
                        }
                        if ( $( this ).hasClass( 'reduk-border-all' ) ) {
                            $( this ).parents( '.reduk-field:first' ).find( '.reduk-border-value' ).each(
                                function() {
                                    $( this ).val( value );
                                }
                            );
                        } else {
                            $( '#' + $( this ).attr( 'rel' ) ).val( value );
                        }
                    }
                );

                el.find( '.reduk-border-units' ).on(
                    'change', function() {
                        $( this ).parents( '.reduk-field:first' ).find( '.reduk-border-input' ).change();
                    }
                );

                el.find( '.reduk-color-init' ).wpColorPicker(
                    {
                        change: function( e, ui ) {
                            $( this ).val( ui.color.toString() );
                            reduk_change( $( this ) );
                            el.find( '#' + e.target.getAttribute( 'data-id' ) + '-transparency' ).removeAttr( 'checked' );
                        },

                        clear: function( e, ui ) {
                            $( this ).val( ui.color.toString() );
                            reduk_change( $( this ).parent().find( '.reduk-color-init' ) );
                        }
                    }
                );

                el.find( '.reduk-color' ).on(
                    'keyup', function() {
                        var color = colorValidate( this );

                        if ( color && color !== $( this ).val() ) {
                            $( this ).val( color );
                        }
                    }
                );

                // Replace and validate field on blur
                el.find( '.reduk-color' ).on(
                    'blur', function() {
                        var value = $( this ).val();

                        if ( colorValidate( this ) === value ) {
                            if ( value.indexOf( "#" ) !== 0 ) {
                                $( this ).val( $( this ).data( 'oldcolor' ) );
                            }
                        }
                    }
                );

                // Store the old valid color on keydown
                el.find( '.reduk-color' ).on(
                    'keydown', function() {
                        $( this ).data( 'oldkeypress', $( this ).val() );
                    }
                );
            }
        );
    };
})( jQuery );