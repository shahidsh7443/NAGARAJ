<?php

    header('Content-type: text/css');

    $parse_uri = explode('wp-content', $_SERVER[ 'SCRIPT_FILENAME' ]);
    $wp_load = $parse_uri[ 0 ] . 'wp-load.php';
    require_once($wp_load);

    // color options
    $accent_color = nominee_option('accent-color', false, '#ef4836');
    $section_title = nominee_option('section-title-color', false, '#2f2f2f');
    $link_color = nominee_option('link-color', false, '#ef4836');

    // background color options
    $body_bg_color = nominee_option('body-bg-color', false, '#ffffff');
    
    // accent color darken
    $accent_darken = nominee_modify_color( $accent_color, -50 );
    $link_darken = nominee_modify_color( $link_color, -50 );

    // body typography
    $font_color = nominee_option('body-typography', 'color');
    $font_size = nominee_option('body-typography', 'font-size');
    $font_family = nominee_option('body-typography', 'font-family');
    $font_weight = nominee_option('body-typography', 'font-weight');
    $line_height = nominee_option('body-typography', 'line-height');

    // heading typography
    $heading_color = nominee_option('heading-typography', 'color');
    $heading_font_family = nominee_option('heading-typography', 'font-family');
    $heading_font_weight = nominee_option('heading-typography', 'font-weight');

    // specific title size and it's line height

    // for H1
    $h1_font_size = nominee_option('h1-typography', 'font-size');
    $h1_line_height = nominee_option('h1-typography', 'line-height');

    // for H2
    $h2_font_size = nominee_option('h2-typography', 'font-size');
    $h2_line_height = nominee_option('h2-typography', 'line-height');

    // for H3
    $h3_font_size = nominee_option('h3-typography', 'font-size');
    $h3_line_height = nominee_option('h3-typography', 'line-height');

    // for H4
    $h4_font_size = nominee_option('h4-typography', 'font-size');
    $h4_line_height = nominee_option('h4-typography', 'line-height'); 

    // for H5
    $h5_font_size = nominee_option('h5-typography', 'font-size');
    $h5_line_height = nominee_option('h5-typography', 'line-height');

    // for H6
    $h6_font_size = nominee_option('h6-typography', 'font-size');
    $h6_line_height = nominee_option('h6-typography', 'line-height');

    // default menu color
    $default_font_color = nominee_option('menu-color', false, false);
    if ($default_font_color) :
        $default_font_color = 'color:' .$default_font_color. '';
    endif;

    // mobile menu color
    $mobile_menu_font_color = nominee_option('mobile-menu-color', false, false);
    if ($mobile_menu_font_color) :
        $mobile_menu_font_color = 'color:' .$mobile_menu_font_color. '';
    endif;

    // sticky menu color
    $sticky_font_color = nominee_option('sticky-menu-color', false, false);
    if ($sticky_font_color) :
        $sticky_font_color = 'color:' .$sticky_font_color. '';
    endif;

    // menu background
    $menu_bg_color = nominee_option('menu-bg-color', false, false);
    if ($menu_bg_color) :
        $menu_bg_color = 'background-color:' .$menu_bg_color. '';
    endif;

    // mobile menu background
    $mobile_menu_bg_color = nominee_option('mobile-menu-bg-color', false, false);
    if ($mobile_menu_bg_color) :
        $mobile_menu_bg_color = 'background-color:' .$mobile_menu_bg_color. '';
    endif;

    // sticky menu background
    $sticky_menu_bg_color = nominee_option('sticky-menu-bg-color', false, false);
    if ($sticky_menu_bg_color) :
        $sticky_menu_bg_color = 'background-color:' .$sticky_menu_bg_color. '';
    endif;
?>

body{
    background-color: <?php echo esc_attr($body_bg_color) ?>;
    color: <?php echo esc_attr($font_color) ?>;
    font-size: <?php echo esc_attr($font_size) ?>;
    font-family: <?php echo esc_attr($font_family) ?>, sans-serif;
    font-weight: <?php echo esc_attr($font_weight) ?>;
    line-height: <?php echo esc_attr($line_height) ?>;
}

h1, 
h2, 
h3, 
h4, 
h5, 
h6{
    color: <?php echo esc_attr($heading_color) ?>;
    font-family: <?php echo esc_attr($heading_font_family) ?>, sans-serif;
    font-weight: <?php echo esc_attr($heading_font_weight) ?>;
}
h1{
    font-size: <?php echo esc_attr($h1_font_size) ?>;
    line-height: <?php echo esc_attr($h1_line_height) ?>;
}
h2{
    font-size: <?php echo esc_attr($h2_font_size) ?>;
    line-height: <?php echo esc_attr($h2_line_height) ?>;
}
h3{
    font-size: <?php echo esc_attr($h3_font_size) ?>;
    line-height: <?php echo esc_attr($h3_line_height) ?>;
}
h4{
    font-size: <?php echo esc_attr($h4_font_size) ?>;
    line-height: <?php echo esc_attr($h4_line_height) ?>;
}
h5{
    font-size: <?php echo esc_attr($h5_font_size) ?>;
    line-height: <?php echo esc_attr($h5_line_height) ?>;
}
h6{
    font-size: <?php echo esc_attr($h6_font_size) ?>;
    line-height: <?php echo esc_attr($h6_line_height) ?>;
}

.counter-section{
    font-family: <?php echo esc_attr($heading_font_family) ?>;
}

.navbar-default {
    <?php echo esc_attr($menu_bg_color) ?>;
}

.sticky.navbar-default {
    <?php echo esc_attr($sticky_menu_bg_color) ?>;
}

.navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($default_font_color) ?>;
}

.sticky.navbar-default .navbar-nav>li>a{
    <?php echo esc_attr($sticky_font_color) ?>;
}

<?php 
/**
* Color preset
*
* Color
*/
?>
a,
a:focus{
    color: <?php echo esc_attr($link_color) ?>;
}

a:hover {
    color: <?php echo esc_attr($link_darken) ?>;
}


<?php 
/**
*
* Section title color
*/
?>
.section-intro h2{
    color: <?php echo esc_attr($section_title); ?>;
}

.section-intro h2 span{
    color: <?php echo esc_attr($accent_color); ?>;
}



<?php 
/**
*
* Background color
*/
?>
.spotlight-card .tt-effect figcaption::before,
.intro hr::after,
.owl-theme .owl-dots .owl-dot.active span, 
.owl-theme .owl-dots .owl-dot:hover span,
.team-carousel .owl-theme .owl-dots .owl-dot.active span, 
.team-carousel .owl-theme .owl-dots .owl-dot:hover span,
.btn-primary,
.btn-outline.active, 
.btn-outline.focus, 
.btn-outline:active, 
.btn-outline:focus, 
.btn-outline:hover,
.navbar-default .navbar-toggle:focus, 
.navbar-default .navbar-toggle:hover,
.open>.dropdown-toggle.btn-outline,
.tt-slider .slides-pagination a.current,
.tt-social-icon li a:hover,
.timeline>li:hover .posted-date,
.archivement-carousel .carousel-indicators .active,
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body,
.tt-filter li button.active,
.subscribe-form .btn,
.pagination>li>a:focus,
.pagination>li>a:hover,
.pagination>li>span:focus,
.pagination>li>span:hover,
.pagination>li>span.current,
.widget_archive > ul > li::before,
.widget_categories > ul > li::before,
.widget_mc4wp_form_widget,
.tagcloud a:hover,
.single-post-navigation a:hover,
.comment-author .comment-reply-link:hover,
.comment-author .comment-reply-login:hover,
.page-pagination a:hover,
.page-pagination > span,
.social-links li a:hover,
#toTop:hover,
span.separator,
span.separator span,
.abilities-tab .panel-heading a,
.schedule-wrap:hover,
.single-member-page .member-content .team-social a:hover,
.leader-social-profile ul li a:hover,
.tt-popup-wrapper:hover .tt-popup i,
.donate-button a,
.member-wrapper .member-biography a:hover,
.donate-amount .amount-button.active,
.icon-effect h3::after,
.modal-dialog .close::after,
.icon-effect .tt-icon i:after,
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a, 
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body
.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab.vc_active, 
.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab:hover, 
.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab:hover a{
    background-color: <?php echo esc_attr($accent_color) ?>;
}

.vc_tta-tabs-position-top .vc_tta-tab > a:hover,
.vc_tta-tabs-position-top .vc_tta-tab > a:focus,
.vc_tta-tabs-position-top .vc_tta-tab.vc_active > a,
.vc_tta-tabs-position-bottom .vc_tta-tab > a:hover,
.vc_tta-tabs-position-bottom .vc_tta-tab > a:focus,
.vc_tta-tabs-position-bottom .vc_tta-tab.vc_active > a,
.vc_tta-tabs-position-left .vc_tta-tabs-list .vc_tta-tab>a:hover,
.vc_tta-tabs-position-right .vc_tta-tabs-list .vc_tta-tab>a:hover,
.vc_tta-tabs-position-left .vc_tta-tabs-list .vc_tta-tab.vc_active>a,
.vc_tta-tabs-position-right .vc_tta-tabs-list .vc_tta-tab.vc_active>a
{
    background-color: <?php echo esc_attr($accent_color) ?> !important;
}


<?php 
/**
*
* Color
*/
?>
.btn-default,
.btn-default.active, 
.btn-default.focus, 
.btn-default:active, 
.btn-default:focus, 
.btn-default:hover, 
.open>.dropdown-toggle.btn-default,
.tt-effect figcaption .content .btn:hover,
.open>.dropdown-toggle.btn-default,
.navbar-default .navbar-nav>li>a:focus, 
.navbar-default .navbar-nav>li>a:hover,
.navbar-default .navbar-nav>.active>a, 
.navbar-default .navbar-nav>.active>a:focus, 
.navbar-default .navbar-nav>.active>a:hover,
.navbar-default .navbar-nav>.open>a, 
.navbar-default .navbar-nav>.open>a:focus, 
.navbar-default .navbar-nav>.open>a:hover,
.header-transparent .navbar-default .navbar-nav>.active>a, 
.header-transparent .navbar-default .navbar-nav>.active>a:focus, 
.header-transparent .navbar-default .navbar-nav>.active>a:hover,
.dropdown-menu>.active>a, 
.dropdown-menu>.active>a:focus, 
.dropdown-menu>.active>a:hover,
.dropdown-menu>li>a:focus, 
.dropdown-menu>li>a:hover,
.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus, 
.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
.navbar-default .navbar-nav .open .dropdown-menu>.active>a, 
.navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus, 
.navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover,
.navbar-default .navbar-nav li a:focus, 
.navbar-default .navbar-nav li a:hover,
.intro-sub .clored-text,
.testimonial-carousel blockquote i,
.testimonial-carousel blockquote footer cite,
.icon-block i,
.counter-wrapper .timer,
.timeline-heading h3 a:hover,
.timeline-body .readmore:hover,
.archivement-carousel .item i,
.twitterfeed i,
.social-count-plus .items .count,
.related-reformation .content .links a:hover,
.tt-grid .content .links a:hover,
.reformation-navigation a:hover,
.campaign-scoop .title a:hover,
.countdown li > span,
.entry-meta .the-time,
.entry-header .entry-title a:hover,
.entry-footer .readmore:hover,
.widget .entry-meta ul li a:hover,
.blog-wrapper .entry-meta ul li a:hover,
.widget a:hover,
.footer-sidebar .widget_nav_menu ul li a:hover,
.widget-title,
.tt-recent-comments .comment-content .comment-title a:hover,
.nav-tabs>li.active>a,
.nav-tabs>li.active>a:focus,
.nav-tabs>li.active>a:hover,
.nav-tabs>li>a:hover,
.nav-tabs>li>a:focus,
.navbar-default .navbar-nav>li.current-menu-parent>a,
.navbar-default .navbar-nav>li.current-menu-item>a,
.navbar-default .navbar-nav li.current-menu-ancestor>a,
.navbar-default .navbar-nav li.current-menu-parent>a, 
.navbar-default .navbar-nav li.current-menu-item>a,
.tt-popular-post h4 a:hover,
.widget_mc4wp_form_widget .btn:hover,
.widget_mc4wp_form_widget .btn:focus,
.tags-links a:hover,
.latest-post-carousel .entry-title a:hover,
#toTop,
.colored,
.team-social a,
.event-wrapper .event-info h3 a:hover,
.schedule-meta ul li i,
.schedule-wrap h3,
.zilla-likes,
.zilla-likes:hover,
.more-link,
.widget_calendar table a,
.single-post-navigation a,
.icon-block h3 a,
.error-message h2,
.issue-wrapper .entry-content h2 a:hover,
.single-member-page .member-content .designation,
.footer-menu ul li a:hover,
.contact-info ul li a:hover,
.tt-slider .intro-sub,
.footer-sidebar ul li i,
.footer-sidebar .widget_nav_menu ul li a::before,
.tt-latest-post .media-body h4 a:hover,
.post-category-wrapper .entry-meta ul li a:hover,
.footer-multi-wrapper .social-links-wrap li a:hover,
.footer-sidebar .widget-title,
.biography-info-wrapper .leader-name h3,
.career-info-wrapper h4,
.education-info-wrapper h4,
.icon-effect .tt-icon i,
.all-category-links a:hover,
.all-tweets-links a:hover{
    color: <?php echo esc_attr($accent_color) ?>;
}



<?php 
/**
*
* Border color
*/
?>

.intro hr.colored,
.owl-theme .owl-dots .owl-dot.active span, 
.owl-theme .owl-dots .owl-dot:hover span,
.form-control:focus,
.navbar-default .navbar-nav>.active>a, 
.navbar-default .navbar-nav>.active>a:focus, 
.navbar-default .navbar-nav>.active>a:hover,
.navbar-default .navbar-nav>.open>a, 
.navbar-default .navbar-nav>.open>a:focus, 
.navbar-default .navbar-nav>.open>a:hover,
.navbar-default .navbar-toggle:focus, 
.navbar-default .navbar-toggle:hover,
.header-transparent .navbar-default .navbar-nav>.active>a, 
.header-transparent .navbar-default .navbar-nav>.active>a:focus, 
.header-transparent .navbar-default .navbar-nav>.active>a:hover,
.tt-slider .slides-pagination a.current,
.timeline>li:hover .posted-date,
.archivement-carousel .carousel-indicators .active,
.member-wrapper .thumbnail,
.widget_archive > ul ul li::before,
.widget_categories > ul ul li::before,
.tagcloud a:hover,
.single-post-navigation a,
#toTop,
.abilities-tab .panel-heading a,
.team-carousel .owl-dots .owl-dot span,
.schedule-wrap:hover,
.single-member-page .member-content .team-social a:hover,
.leader-social-profile ul li a:hover,
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title > a, 
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body,
.vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-body, .vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading,
.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab.vc_active, 
.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab:hover{
    border-color: <?php echo esc_attr($accent_color) ?>;
}


.vc_tta-tabs.vc_tta-style-ultra-classic .vc_tta-tab.vc_active::after{
    border-top-color: <?php echo esc_attr($accent_color) ?>;
}


<?php 
/**
*
* hex2rgb and darken
*/
?>

.tt-effect figcaption::before,
.blog-wrapper .post-thumbnail .thumb-overlay{
    background-color: rgba(<?php echo nominee_hex2rgb($accent_color)?>,.8);
}

.subscribe-form .btn:hover,
.btn-primary.active, 
.btn-primary.focus, 
.btn-primary:active, 
.btn-primary:focus, 
.btn-primary:hover, 
.open>.dropdown-toggle.btn-primary,
.donate-button a:hover,
.donate-button a:focus{
    background-color: <?php echo esc_attr($accent_darken)?>;
}

.icon-block h3 a:hover,
.more-link:hover,
.widget_calendar table a:hover,
.location-info a:hover{
    color: <?php echo esc_attr($accent_darken)?>;
}




<?php
/**
*
* Media query
*/
?>

@media (max-width : 767px) {
    .navbar-default{
        <?php echo esc_attr($mobile_menu_bg_color)?> !important;
    }

    .navbar-default .navbar-nav li a{
        <?php echo esc_attr($mobile_menu_font_color) ?>;
    }

}