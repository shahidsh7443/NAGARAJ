<?php
/*
Plugin Name: TrendyTheme Plugin
Plugin URI: http://www.trendytheme.net
Description: Trendy Theme Plugin for Nominee Theme
Author: Trendy Theme
Version: 2.1
Author URI: http://www.trendytheme.net
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

// Defining Constance
define( 'TT_PLUGIN_URL', plugin_dir_url(__FILE__) );
define( 'TT_PLUGIN_DIR', dirname(__FILE__));
define( 'TT_PLUGIN_PATH', dirname( plugin_basename(__FILE__) ) );


// Loading TextDomain
function tt_plugin_init() {
	load_plugin_textdomain( 'tt-pl-textdomain', false, TT_PLUGIN_PATH . '/languages/' );
}
add_action( 'plugins_loaded', 'tt_plugin_init' );


// hide vc admin notic
function tt_hide_vc_admin_notice() {
    if(is_admin()) :
        setcookie('vchideactivationmsg', '1', strtotime('+3 years'), '/');
        setcookie('vchideactivationmsg_vc11', (defined('WPB_VC_VERSION') ? WPB_VC_VERSION : '1'), strtotime('+3 years'), '/');
    endif;
}
add_action('admin_init', 'tt_hide_vc_admin_notice');


// Loading Admin Scripts, Stylesheets
function tt_wp_admin_scripts() {
	
	// Fontawesome icon
	wp_enqueue_style( 'tt-fontawesome-css', TT_PLUGIN_URL . 'css/font-awesome.min.css' );
	// Select 2 CSS
	wp_enqueue_style( 'tt-select2-css', TT_PLUGIN_URL . 'css/select2.min.css' );
	// Custom CSS
	wp_enqueue_style( 'tt-custom-css', TT_PLUGIN_URL . 'css/custom.css' );

	// Custom Script
	wp_enqueue_script( 'tt-post-formate', TT_PLUGIN_URL . 'js/posts-meta.js' );
	// Select 2 JS
	wp_enqueue_script( 'tt-select2-js', TT_PLUGIN_URL . 'js/select2.min.js' );
	// Select 2 JS
	wp_enqueue_script( 'tt-select2-js', TT_PLUGIN_URL . 'js/select2.min.js' );
	// Scripts
	wp_enqueue_script( 'tt-scripts-js', TT_PLUGIN_URL . 'js/scripts.js' );
}

add_action( 'admin_enqueue_scripts', 'tt_wp_admin_scripts' );

// Custom post type
require_once TT_PLUGIN_DIR . "/inc/post-types/post-types.php";
// post like
require_once TT_PLUGIN_DIR . "/inc/post-likes/zilla-likes.php";
// popular post
require_once TT_PLUGIN_DIR . "/inc/widgets/popular-post/tt-popular-post.php";
// author widget
require_once TT_PLUGIN_DIR . "/inc/widgets/author-widget.php";
// comment widget
require_once TT_PLUGIN_DIR . "/inc/widgets/comments-widget.php";
// latest post widget
require_once TT_PLUGIN_DIR . "/inc/widgets/latest-posts.php";
// Flickr photo widget
require_once TT_PLUGIN_DIR . "/inc/widgets/flickr-widget.php";
// Mega Menu
require_once TT_PLUGIN_DIR . "/inc/mega-menu/admin-megamenu-walker.php";
// Fonts
require_once TT_PLUGIN_DIR . "/inc/fonts/font-awesome-icons.php";
// Google map API key
require_once TT_PLUGIN_DIR . "/inc/api-key-for-google-maps.php";
// demo import
require_once TT_PLUGIN_DIR . "/inc/one-click-demo-import/one-click-demo-import.php";
// inport process file
require_once TT_PLUGIN_DIR . "/inc/demo-import.php";