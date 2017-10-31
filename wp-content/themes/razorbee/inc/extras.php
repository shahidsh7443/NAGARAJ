<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Adds custom classes to the array of body classes.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_body_classes' ) ) :

	function nominee_body_classes( $classes ) {

		// header style classes
		$classes[] = nominee_option('header-style', false, 'header-default');
		
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) :
			$classes[ ] = 'group-blog';
		endif;

		return $classes;
	}
	add_filter( 'body_class', 'nominee_body_classes' );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_page_menu_args' ) ) :

	function nominee_page_menu_args( $args ) {

		$args[ 'show_home' ] = TRUE;

		return $args;
	}

	add_filter( 'wp_page_menu_args', 'nominee_page_menu_args' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Sets the authordata global when viewing an author archive.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_setup_author' ) ) :
	function nominee_setup_author() {
		global $wp_query;

		if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
			$GLOBALS[ 'authordata' ] = get_userdata( $wp_query->post->post_author );
		}
	}

	add_action( 'wp', 'nominee_setup_author' );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page break button in editor
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_wp_page_pagination' ) ) :

	function nominee_wp_page_pagination( $mce_buttons ) {
		if ( get_post_type() == 'post' or get_post_type() == 'page' ) {
			$pos = array_search( 'wp_more', $mce_buttons, TRUE );
			if ( $pos !== FALSE ) {
				$buttons     = array_slice( $mce_buttons, 0, $pos + 1 );
				$buttons[ ]  = 'wp_page';
				$mce_buttons = array_merge( $buttons, array_slice( $mce_buttons, $pos + 1 ) );
			}
		}

		return $mce_buttons;
	}

	add_filter( 'mce_buttons', 'nominee_wp_page_pagination' );

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Set post view on single page
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_put_post_view_function' ) ) :

    function nominee_put_post_view_function( $contents ) {
        if ( function_exists( 'tt_set_post_views' ) and is_single() ) {
            tt_set_post_views(get_the_ID());
        }

        return $contents;
    }

    add_filter( 'the_content', 'nominee_put_post_view_function', 9999 );

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// PayPal donate modal
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_paypal_donate_modal' ) ) :

	function nominee_paypal_donate_modal() {

		get_template_part( 'template-parts/paypal', 'donation' );
	}

	add_action( 'wp_footer', 'nominee_paypal_donate_modal', 9999 );
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get site url by replacing 'http://site_url/' for one page menu
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_get_site_url' ) ) :

	function nominee_get_site_url($output) {

		global $post;
		$front_id = get_option('page_on_front');
		
		if(is_object($post)) :
			$output = str_replace( 'http://site_url/', get_permalink($front_id), $output);	
			$output = str_replace( get_permalink($post->ID).'#', '#', $output );
		endif;

	    return $output;
	}
	add_filter( 'walker_nav_menu_start_el', 'nominee_get_site_url', 10, 4);
endif;