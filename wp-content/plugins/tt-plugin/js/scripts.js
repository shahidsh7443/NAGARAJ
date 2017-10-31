/*
Theme Name: Nominee
Author: TrendyTheme
Version: 1.0
*/


jQuery(function ($) {

    'use strict';


    /* === Select2  === */
    (function () {

        $("select.select2").select2({
            placeholder : "Select",
            allowClear  : true
        });

        function icon_format(state) {
            if (!state.id) {
                return state.text;
            }
            return $("<span><i class='" + state.id + "'></i> &nbsp; " + state.text + "</span>");
        }


        $("select.select2-icon").select2({
            templateResult    : icon_format,
            templateSelection : icon_format,
            placeholder       : "Select Icon",
            allowClear        : true
        });


    }());

    

});