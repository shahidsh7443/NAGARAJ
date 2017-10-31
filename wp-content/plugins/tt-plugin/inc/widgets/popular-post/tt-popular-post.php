<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

    //---------------------------------------------------------------------
    // Post view
    //---------------------------------------------------------------------
    if (!function_exists('tt_set_post_views')) {
        function tt_set_post_views($postID) {
            $count_key = 'tt_post_views_count';
            $count = get_post_meta($postID, $count_key, true);
            if($count==''){
                $count = 0;
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
            }else{
                $count++;
                update_post_meta($postID, $count_key, $count);
            }
        }
    }


    if (!function_exists('tt_get_post_views')) {
        function tt_get_post_views($postID){
            $count_key = 'tt_post_views_count';
            $count = get_post_meta($postID, $count_key, true);
            if($count==''){
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
                return 0;
            }
            return $count;
        }
    }


    //---------------------------------------------------------------------
    // Loading widget
    //---------------------------------------------------------------------

    require_once "widget.php";