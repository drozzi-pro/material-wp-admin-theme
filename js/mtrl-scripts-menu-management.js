/**
 * @Package: WordPress Plugin
 * @Subpackage: Material - White Label WordPress Admin Theme Theme
 * @Since: Mtrl 1.0
 * @WordPress Version: 4.0 or above
 * This file is part of Material - White Label WordPress Admin Theme Theme Plugin.
 */


jQuery(function($) {

    'use strict';

    var MTRL_MENUMNG_SETTINGS = window.MTRL_MENUMNG_SETTINGS || {};

    

    MTRL_MENUMNG_SETTINGS.iconPanel = function(e) {

      $(document).on("click",".mtrlicon",function(e) {
        e.stopPropagation();
        var panel = $(this).parent().find(".mtrliconpanel");
        var iconstr = $(".mtrlicons").html();
        panel.html("");
        panel.append(iconstr);
        panel.show();
      });


    };




    MTRL_MENUMNG_SETTINGS.menuToggle = function() {

      $(document).on("click",".mtrltoggle",function(e) {

        var id = $(this).parent().attr("data-id");

        if($(this).hasClass("plus")) {
          $(this).removeClass("plus dashicons-plus").addClass("minus dashicons-minus");
          //$(this).html("-");
          $(this).parent().parent().find(".mtrlmenupanel").removeClass("closed").addClass("opened");
        } else if($(this).hasClass("minus")) {
          $(this).removeClass("minus dashicons-minus").addClass("plus dashicons-plus");
          //$(this).html("+");
          $(this).parent().parent().find(".mtrlmenupanel").removeClass("opened").addClass("closed");
        }

      });


      $(document).on("click",".mtrlsubtoggle",function(e) {

        var id = $(this).parent().attr("data-id");

        if($(this).hasClass("plus")) {
          $(this).removeClass("plus dashicons-plus").addClass("minus dashicons-minus");
          //$(this).html("-");
          $(this).parent().parent().find(".mtrlsubmenupanel").removeClass("closed").addClass("opened");
        } else if($(this).hasClass("minus")) {
          $(this).removeClass("minus dashicons-minus").addClass("plus dashicons-plus");
          //$(this).html("+");
          $(this).parent().parent().find(".mtrlsubmenupanel").removeClass("opened").addClass("closed");
        }

      });


    };

    MTRL_MENUMNG_SETTINGS.saveMenu = function() {

      $(document).on('click', '#mtrl-savemenu', function(e){


      // });      
      // $('#mtrl-savemenu').click(function(e) {

          var neworder = "";
          var newsuborder = "";
          var menurename = "";
          var submenurename = "";
          var menudisable = "";
          var submenudisable = "";

          $(".mtrlmenu").each(function(){
                    var id = $(this).attr("data-id");
                    var menuid = $(this).attr("data-menu-id");
                    neworder += menuid+"|";
                    if($(this).hasClass("disabled")){
                      menudisable += menuid+"|";
                    }
          });

          $(".mtrlsubmenu").each(function(){
                    var id = $(this).attr("data-id");
                    var parentpage = $(this).attr("data-parent-page");
                    newsuborder += parentpage+":"+id+"|";
                    if($(this).hasClass("disabled")){
                      submenudisable += parentpage+":"+id+"|";
                    }
          });

          $(".mtrl-menurename").each(function(){
                    var id = $(this).attr("data-id");
                    var sid = $(this).attr("data-menu-id");
                    var val = $(this).val();
                    var icon = $(this).parent().parent().find(".mtrl-menuicon").attr("value");
                    //console.log(icon);
                    menurename += id+":"+sid+"@!@%@"+val+"[$!&!$]"+icon+"|#$%*|";
                    // console.log(val);
          });


          $(".mtrl-submenurename").each(function(){
                    var id = $(this).attr("data-id");
                    var parent = $(this).attr("data-parent-id");
                    var parentpage = $(this).attr("data-parent-page");
                    var val = $(this).val();
                    submenurename += parentpage+"[($&)]"+parent+":"+id+"@!@%@"+val+"|#$%*|";
                    // console.log(val);
          });


          // console.log(neworder);
          // console.log(menurename);

            var action = 'mtrl_savemenu';
            var data = {
                neworder: neworder,
                newsuborder: newsuborder,
                menurename: menurename,
                submenurename: submenurename,
                menudisable: menudisable,
                submenudisable: submenudisable,
                action: action,
                mtrl_nonce: mtrl_vars.mtrl_nonce
            };

        $.post(ajaxurl, data, function(response) {
             //console.log(response);
             location.reload();
            //console.log(response);
        });

        return false;

        });

    };


    MTRL_MENUMNG_SETTINGS.resetMenu = function() {

      $(document).on('click', '#mtrl-resetmenu', function(e){

            var action = 'mtrl_resetmenu';
            var data = {
                action: action,
                mtrl_nonce: mtrl_vars.mtrl_nonce
            };

        $.post(ajaxurl, data, function(response) {
             location.reload();
            //console.log(response);
        });

        return false;

        });

    };





    MTRL_MENUMNG_SETTINGS.menuDisplay = function() {

      $(document).on('click', '.mtrldisplay, .mtrlsubdisplay', function(e){


        //var id = $(this).parent().attr("data-id");

        if($(this).hasClass("disable")) {
          $(this).removeClass("disable").addClass("enable");
          //$(this).html("show");
          $(this).parent().parent().removeClass("enabled").addClass("disabled");
        } else if($(this).hasClass("enable")) {
          $(this).removeClass("enable").addClass("disable");
          //$(this).html("hide");
          $(this).parent().parent().removeClass("disabled").addClass("enabled");
        }

      });

    };


    /******************************
     initialize respective scripts 
     *****************************/
    $(document).ready(function() {
       
        MTRL_MENUMNG_SETTINGS.menuToggle();
        MTRL_MENUMNG_SETTINGS.saveMenu();
        MTRL_MENUMNG_SETTINGS.menuDisplay();
        MTRL_MENUMNG_SETTINGS.iconPanel();
        MTRL_MENUMNG_SETTINGS.resetMenu();
       

    });


});



jQuery(function($) {
    if($.isFunction($.fn.sortable)){
        $( "#mtrl-enabled, #mtrl-disabled" ).sortable({
          connectWith: ".mtrl-connectedSortable",
          handle: ".mtrlmenu-wrap",
          cancel: ".mtrltoggle",
          placeholder: "ui-state-highlight",
        }).disableSelection();
      }
  });


jQuery(function($) {
    if($.isFunction($.fn.sortable)){
      $( ".mtrlsubmenu-wrap" ).sortable({
        placeholder: "ui-state-highlight",
      }).disableSelection();
  }
  });


jQuery(function($) {
  $(document).ready(function(){
    $(document).on('click', ".pickicon", function () {
          var clss = $(this).attr("data-class");
          var prnt = $(this).parent().parent();
          //console.log(clss);
          prnt.find("input").attr("value",clss);
          prnt.find("input").val(clss);
          var main = prnt.find(".mtrlmenuicon");
          main.removeClass(main.attr("data-class")).addClass(clss);
          main.attr("data-class",clss);
          return false;
      });

    $(document).on('click', "body", function () {
          $(".mtrliconpanel").hide();
          //return false;
      });



    });
});
