/*global reduk_change, reduk*/

(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.select_image = reduk.field_objects.select_image || {};

    $( document ).ready(
        function() {
            //reduk.field_objects.select_image.init();
        }
    );

    reduk.field_objects.select_image.init = function( selector ) {

        if ( !selector ) {
            selector = $( document ).find( ".reduk-group-tab:visible" ).find( '.reduk-container-select_image:visible' );
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

                var select2_handle = el.find( '.reduk-container-select_image' ).find( '.select2_params' );

                if ( select2_handle.size() > 0 ) {
                    var select2_params = select2_handle.val();

                    select2_params = JSON.parse( select2_params );
                    default_params = $.extend( {}, default_params, select2_params );
                }

                el.find( 'select.reduk-select-images' ).select2( default_params );

                el.find( '.reduk-select-images' ).on(
                    'change', function() {
                        var preview = $( this ).parents( '.reduk-field:first' ).find( '.reduk-preview-image' );

                        if ( $( this ).val() === "" ) {
                            preview.fadeOut(
                                'medium', function() {
                                    preview.attr( 'src', '' );
                                }
                            );
                        } else {
                            preview.attr( 'src', $( this ).val() );
                            preview.fadeIn().css( 'visibility', 'visible' );
                        }
                    }
                );
            }
        );
    };
})( jQuery );