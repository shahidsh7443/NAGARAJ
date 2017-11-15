jQuery(function ($) {

    'use strict';

    /* === Pro Features === */
    (function () {
        var container = document.querySelector('.welcome-panel.sp-wpc-pro-features .welcome-panel-column-container');
        var msnry = new Masonry( container, {
            // options
            itemSelector: '.welcome-panel-column',
            horizontalOrder: true
        });
    }());


});