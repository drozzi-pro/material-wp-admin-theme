/**
 * @Package: WordPress Plugin
 * @Subpackage: Mtrl - White Label WordPress Admin Theme
 * @Since: Mtrl 1.0
 * @WordPress Version: 4.0 or above
 * This file is part of Mtrl - White Label WordPress Admin Theme Plugin.
 */


jQuery(function($) {

    'use strict';

    var MTRL_LOGIN_SETTINGS = window.MTRL_LOGIN_SETTINGS || {};


    MTRL_LOGIN_SETTINGS.placeholderFields = function() {



        $('#user_login').attr('placeholder', 'Username');
        $('#user_email').attr('placeholder', 'Email');
        $('#user_pass').attr('placeholder', 'Password');

    };



    /******************************
     initialize respective scripts 
     *****************************/
    $(document).ready(function() {
        MTRL_LOGIN_SETTINGS.placeholderFields();

    });

    $(window).resize(function() {
    });

    $(window).load(function() {
    });

});