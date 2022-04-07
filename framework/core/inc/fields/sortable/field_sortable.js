/*global jQuery, document, reduk_change, reduk*/

(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.sortable = reduk.field_objects.sortable || {};

    var scroll = '';

    reduk.field_objects.sortable.init = function( selector ) {

        if ( !selector ) {
            selector = $( document ).find( ".reduk-group-tab:visible" ).find( '.reduk-container-sortable:visible' );
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
                el.find( ".reduk-sortable" ).sortable(
                    {
                        handle: ".drag",
                        placeholder: "placeholder",
                        opacity: 0.7,
                        scroll: false,
                        out: function( event, ui ) {
                            if ( !ui.helper ) return;
                            if ( ui.offset.top > 0 ) {
                                scroll = 'down';
                            } else {
                                scroll = 'up';
                            }
                            reduk.field_objects.sortable.scrolling( $( this ).parents( '.reduk-field-container:first' ) );
                        },

                        over: function( event, ui ) {
                            scroll = '';
                        },

                        deactivate: function( event, ui ) {
                            scroll = '';
                        },

                        update: function() {
                            reduk_change( $( this ) );
                        }
                    }
                );

                el.find( '.checkbox_sortable' ).on(
                    'click', function() {
                        if ( $( this ).is( ":checked" ) ) {
                            el.find( '#' + $( this ).attr( 'rel' ) ).val( 1 );
                        } else {
                            el.find( '#' + $( this ).attr( 'rel' ) ).val( '' );
                        }
                    }
                );
            }
        );
    };

    reduk.field_objects.sortable.scrolling = function( selector ) {
        if (selector === undefined) {
            return;
        }
        
        var $scrollable = selector.find( ".reduk-sorter" );

        if ( scroll == 'up' ) {
            $scrollable.scrollTop( $scrollable.scrollTop() - 20 );
            setTimeout( reduk.field_objects.sortable.scrolling, 50 );
        } else if ( scroll == 'down' ) {
            $scrollable.scrollTop( $scrollable.scrollTop() + 20 );
            setTimeout( reduk.field_objects.sortable.scrolling, 50 );
        }
    };

})( jQuery );