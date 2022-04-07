/*global jQuery, document, reduk*/

(function( $ ) {
    "use strict";

    reduk.field_objects = reduk.field_objects || {};
    reduk.field_objects.date = reduk.field_objects.date || {};

    $( document ).ready(
        function() {
            //reduk.field_objects.date.init();
        }
    );

    reduk.field_objects.date.init = function( selector ) {
        if ( !selector ) {
            selector = $( document ).find( '.reduk-container-date:visible' );
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
//                        var someArr = []
//                        someArr = i;
//                        console.log(someArr);
                
//                var str = JSON.parse('{"reduk_demo[opt-multi-check]":{"reduk_demo[opt-multi-check][1]":"1","reduk_demo[opt-multi-check][2]":"","reduk_demo[opt-multi-check][3]":""}}');
//                console.log (str);
//                
//                $.each(str, function(idx, val){
//                    var tmpArr = new Object();
//                    var count = 1;
//                    
//                    $.each(val, function (i, v){
//                        
//                        tmpArr[count] = v;
//                        count++;
//                    });
//
//                    var newArr = {};
//                    newArr[idx] = tmpArr;
//                    var newJSON = JSON.stringify(newArr)
//                    //console.log(newJSON);
//                });
                
                el.find( '.reduk-datepicker' ).each( function() {
                    $( this ).datepicker({
                        "dateFormat":"mm/dd/yy",
                        beforeShow: function(input, instance){
                            var el = $('#ui-datepicker-div');
                            //$.datepicker._pos = $.datepicker._findPos(input); //this is the default position
                            var popover = instance.dpDiv;
                            $('.reduk-container:first').append(el);
                            $('#ui-datepicker-div').hide();
                            setTimeout(function() {
                                popover.position({
                                    my: 'left top',
                                    at: 'left bottom',
                                    collision: 'none',
                                    of: input
                                });
                            }, 1);
                        } 
                    });
                });
            }
        );


    };
})( jQuery );