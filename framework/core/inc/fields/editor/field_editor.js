/**
 * Reduk Editor on change callback
 * Dependencies        : jquery
 * Feature added by    : Dovy Paukstys
 *                     : Kevin Provance (who helped)  :P
 * Date                : 07 June 2014
 */

/*global reduk_change, wp, tinymce, reduk*/
(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.editor = reduk.field_objects.editor || {};
    
    $( document ).ready(
        function() {
            //reduk.field_objects.editor.init();
        }
    );

    reduk.field_objects.editor.init = function( selector ) {
        setTimeout(
            function() {
                if (typeof(tinymce) !== 'undefined') {
                    for ( var i = 0; i < tinymce.editors.length; i++ ) {
                        reduk.field_objects.editor.onChange( i );
                    }   
                }
            }, 1000
        );
    };

    reduk.field_objects.editor.onChange = function( i ) {
        tinymce.editors[i].on(
            'change', function( e ) {
                var el = jQuery( e.target.contentAreaContainer );
                if ( el.parents( '.reduk-container-editor:first' ).length !== 0 ) {
                    reduk_change( $( '.wp-editor-area' ) );
                }
            }
        );
    };
})( jQuery );
