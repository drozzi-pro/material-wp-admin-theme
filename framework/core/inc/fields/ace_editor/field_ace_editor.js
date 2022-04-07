/*global jQuery, document, reduk*/

(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.ace_editor = reduk.field_objects.ace_editor || {};

    reduk.field_objects.ace_editor.init = function( selector ) {
        if ( !selector ) {
            selector = $( document ).find( ".reduk-group-tab:visible" ).find( '.reduk-container-ace_editor:visible' );
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
                el.find( '.ace-editor' ).each(
                    function( index, element ) {
                        var area = element;
                        var params = JSON.parse( $( this ).parent().find( '.localize_data' ).val() );
                        var editor = $( element ).attr( 'data-editor' );

                        var aceeditor = ace.edit( editor );
                        aceeditor.setTheme( "ace/theme/" + jQuery( element ).attr( 'data-theme' ) );
                        aceeditor.getSession().setMode( "ace/mode/" + $( element ).attr( 'data-mode' ) );
                        var parent = '';
                        if ( el.hasClass( 'reduk-field-container' ) ) {
                            parent = el.attr( 'data-id' );
                        } else {
                            parent = el.parents( '.reduk-field-container:first' ).attr( 'data-id' );
                        }

                        aceeditor.setOptions( params );
                        aceeditor.on(
                            'change', function( e ) {
                                $( '#' + area.id ).val( aceeditor.getSession().getValue() );
                                reduk_change( $( element ) );
                                aceeditor.resize();
                            }
                        );
                    }
                );
            }
        );
    };
})( jQuery );