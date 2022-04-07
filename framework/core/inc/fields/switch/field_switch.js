/*global reduk_change, reduk*/

/**
 * Switch
 * Dependencies        : jquery
 * Feature added by    : Smartik - http://smartik.ws/
 * Date            : 03.17.2013
 */

(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.switch = reduk.field_objects.switch || {};

    $( document ).ready(
        function() {
            //reduk.field_objects.switch.init();
        }
    );

    reduk.field_objects.switch.init = function( selector ) {

        if ( !selector ) {
            selector = $( document ).find( ".reduk-group-tab:visible" ).find( '.reduk-container-switch:visible' );
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
                el.find( ".cb-enable" ).click(
                    function() {
                        if ( $( this ).hasClass( 'selected' ) ) {
                            return;
                        }

                        var parent = $( this ).parents( '.switch-options' );

                        $( '.cb-disable', parent ).removeClass( 'selected' );
                        $( this ).addClass( 'selected' );
                        $( '.checkbox-input', parent ).val( 1 ).trigger('change');

                        reduk_change( $( '.checkbox-input', parent ) );

                        //fold/unfold related options
                        var obj = $( this );
                        var $fold = '.f_' + obj.data( 'id' );

                        el.find( $fold ).slideDown( 'normal', "swing" );
                    }
                );

                el.find( ".cb-disable" ).click(
                    function() {
                        if ( $( this ).hasClass( 'selected' ) ) {
                            return;
                        }

                        var parent = $( this ).parents( '.switch-options' );

                        $( '.cb-enable', parent ).removeClass( 'selected' );
                        $( this ).addClass( 'selected' );
                        $( '.checkbox-input', parent ).val( 0 ).trigger('change');

                        reduk_change( $( '.checkbox-input', parent ) );

                        //fold/unfold related options
                        var obj = $( this );
                        var $fold = '.f_' + obj.data( 'id' );

                        el.find( $fold ).slideUp( 'normal', "swing" );
                    }
                );

                el.find( '.cb-enable span, .cb-disable span' ).find().attr( 'unselectable', 'on' );
            }
        );
    };
})( jQuery );