/*global reduk_change, wp, reduk*/

(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.slides = reduk.field_objects.slides || {};

    $( document ).ready(
        function() {
            //reduk.field_objects.slides.init();
        }
    );

    reduk.field_objects.slides.init = function( selector ) {

        if ( !selector ) {
            selector = $( document ).find( ".reduk-group-tab:visible" ).find( '.reduk-container-slides:visible' );
        }

        $( selector ).each(
            function() {
                var el = $( this );

                reduk.field_objects.media.init(el);

                var parent = el;
                if ( !el.hasClass( 'reduk-field-container' ) ) {
                    parent = el.parents( '.reduk-field-container:first' );
                }
                if ( parent.is( ":hidden" ) ) { // Skip hidden fields
                    return;
                }
                
                if ( parent.hasClass( 'reduk-container-slides' ) ) {
                    parent.addClass( 'reduk-field-init' );    
                }
                
                if ( parent.hasClass( 'reduk-field-init' ) ) {
                    parent.removeClass( 'reduk-field-init' );
                } else {
                    return;
                }

                el.find( '.reduk-slides-remove' ).live(
                    'click', function() {
                        reduk_change( $( this ) );

                        $( this ).parent().siblings().find( 'input[type="text"]' ).val( '' );
                        $( this ).parent().siblings().find( 'textarea' ).val( '' );
                        $( this ).parent().siblings().find( 'input[type="hidden"]' ).val( '' );

                        var slideCount = $( this ).parents( '.reduk-container-slides:first' ).find( '.reduk-slides-accordion-group' ).length;

                        if ( slideCount > 1 ) {
                            $( this ).parents( '.reduk-slides-accordion-group:first' ).slideUp(
                                'medium', function() {
                                    $( this ).remove();
                                }
                            );
                        } else {
                            var content_new_title = $( this ).parent( '.reduk-slides-accordion' ).data( 'new-content-title' );

                            $( this ).parents( '.reduk-slides-accordion-group:first' ).find( '.remove-image' ).click();
                            $( this ).parents( '.reduk-container-slides:first' ).find( '.reduk-slides-accordion-group:last' ).find( '.reduk-slides-header' ).text( content_new_title );
                        }
                    }
                );

                //el.find( '.reduk-slides-add' ).click(
                el.find( '.reduk-slides-add' ).off('click').click(
                    function() {
                        var newSlide = $( this ).prev().find( '.reduk-slides-accordion-group:last' ).clone( true );

                        var slideCount = $( newSlide ).find( '.slide-title' ).attr( "name" ).match( /[0-9]+(?!.*[0-9])/ );
                        var slideCount1 = slideCount * 1 + 1;

                        $( newSlide ).find( 'input[type="text"], input[type="hidden"], textarea' ).each(
                            function() {

                                $( this ).attr(
                                    "name", jQuery( this ).attr( "name" ).replace( /[0-9]+(?!.*[0-9])/, slideCount1 )
                                ).attr( "id", $( this ).attr( "id" ).replace( /[0-9]+(?!.*[0-9])/, slideCount1 ) );
                                $( this ).val( '' );
                                if ( $( this ).hasClass( 'slide-sort' ) ) {
                                    $( this ).val( slideCount1 );
                                }
                            }
                        );

                        var content_new_title = $( this ).prev().data( 'new-content-title' );

                        $( newSlide ).find( '.screenshot' ).removeAttr( 'style' );
                        $( newSlide ).find( '.screenshot' ).addClass( 'hide' );
                        $( newSlide ).find( '.screenshot a' ).attr( 'href', '' );
                        $( newSlide ).find( '.remove-image' ).addClass( 'hide' );
                        $( newSlide ).find( '.reduk-slides-image' ).attr( 'src', '' ).removeAttr( 'id' );
                        $( newSlide ).find( 'h3' ).text( '' ).append( '<span class="reduk-slides-header">' + content_new_title + '</span><span class="ui-accordion-header-icon ui-icon ui-icon-plus"></span>' );
                        $( this ).prev().append( newSlide );
                    }
                );

                el.find( '.slide-title' ).keyup(
                    function( event ) {
                        var newTitle = event.target.value;
                        $( this ).parents().eq( 3 ).find( '.reduk-slides-header' ).text( newTitle );
                    }
                );


                el.find( ".reduk-slides-accordion" )
                    .accordion(
                    {
                        header: "> div > fieldset > h3",
                        collapsible: true,
                        active: false,
                        heightStyle: "content",
                        icons: {
                            "header": "ui-icon-plus",
                            "activeHeader": "ui-icon-minus"
                        }
                    }
                )
                    .sortable(
                    {
                        axis: "y",
                        handle: "h3",
                        connectWith: ".reduk-slides-accordion",
                        start: function( e, ui ) {
                            ui.placeholder.height( ui.item.height() );
                            ui.placeholder.width( ui.item.width() );
                        },
                        placeholder: "ui-state-highlight",
                        stop: function( event, ui ) {
                            // IE doesn't register the blur when sorting
                            // so trigger focusout handlers to remove .ui-state-focus
                            ui.item.children( "h3" ).triggerHandler( "focusout" );
                            var inputs = $( 'input.slide-sort' );
                            inputs.each(
                                function( idx ) {
                                    $( this ).val( idx );
                                }
                            );
                        }
                    }
                );
            }
        );
    };
})( jQuery );