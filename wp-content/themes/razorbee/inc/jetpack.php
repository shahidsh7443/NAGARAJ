<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Add theme support for Infinite Scroll.
// See: https://jetpack.me/support/infinite-scroll/
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if ( ! function_exists( 'nominee_jetpack_setup' ) ) :
	function nominee_jetpack_setup() {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'nominee_infinite_scroll_render',
			'footer'    => 'page',
		) );
	} // end function nominee_jetpack_setup
	add_action( 'after_setup_theme', 'nominee_jetpack_setup' );
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Custom render function for Infinite Scroll.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if ( ! function_exists( 'nominee_infinite_scroll_render' ) ) :
	function nominee_infinite_scroll_render() {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	} // end function nominee_infinite_scroll_render
endif;