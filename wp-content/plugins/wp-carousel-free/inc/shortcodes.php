<?php
// Registering shortcode
function wp_carousel_free_shortcode( $attr ) {
	$post = get_post();

	static $instance = 0;
	$instance ++;

	if ( ! empty( $attr['ids'] ) ) {
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	$output = apply_filters( 'sp_wcfgallery_shortcode', '', $attr );
	if ( $output != '' ) {
		return $output;
	}

	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) {
			unset( $attr['orderby'] );
		}
	}

	extract( shortcode_atts( array(
		'ids'                 => '',
		'items'               => '5',
		'items_desktop'       => '4',
		'items_desktop_small' => '3',
		'items_tablet'        => '2',
		'items_mobile'        => '1',
		'bullets'             => 'false',
		'nav'                 => 'true',
		'auto_play'           => 'true',
		'size'                => 'thumbnail',
		'include'             => '',
		'exclude'             => '',
	), $attr, 'gallery' ) );

	// helper function to return shortcode regex match on instance occurring on page or post
	if ( ! function_exists( 'get_match' ) ) {
		function get_match( $regex, $content, $instance ) {
			preg_match_all( $regex, $content, $matches );

			return $matches[1][ $instance ];
		}
	}

	// Extract the shortcode arguments from the $page or $post
	$shortcode_args = shortcode_parse_atts( get_match( '/\[wcfgallery\s(.*)\]/isU', $post->post_content, $instance - 1 ) );

	// get the ids specified in the shortcode call
	if ( is_array( $ids ) ) {
		$ids = $shortcode_args["ids"];
	}

	$id = uniqid();
	$order   = 'DESC';
	$orderby = 'title';

	if ( 'RAND' == $order ) {
		$orderby = 'none';
	}

	if ( ! empty( $ids ) ) {
		$_attachments = get_posts( array(
			'include'        => $ids,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => $order,
			'orderby'        => $orderby
		) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[ $val->ID ] = $_attachments[ $key ];
		}
	} elseif ( ! empty( $exclude ) ) {
		$attachments = get_children( array(
			'post_parent'    => $id,
			'exclude'        => $exclude,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => $order,
			'orderby'        => $orderby
		) );
	} else {

	}

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
		}

		return $output;
	}

	$gallery_style = $gallery_div = '';

	// Carousel Area Padding
	if ( $nav == 'true' ) {
		$carousel_area_padding = '0 15px';
	} else {
		$carousel_area_padding = '0';
	}

	// Bullet CSS
	if ( $bullets == 'true' ) {
		$the_nav_margin = '-40px';
	} else {
		$the_nav_margin = '-15px';
	}

	$gallery_div = "
	<style type='text/css'>
		div#wordpress-carousel-free-$id.wordpress-carousel-free-section .slick-prev, 
		div#wordpress-carousel-free-$id.wordpress-carousel-free-section .slick-next{
			margin-top: $the_nav_margin;
		}
	</style>
		
    <script type='text/javascript'>
    jQuery(document).ready(function() {
        		    jQuery('#wordpress-carousel-free-$id').slick({
			        infinite: true,
			        slidesToShow: " . $items . ",
			        slidesToScroll: 1,
			        prevArrow: \"<div class='slick-prev'><i class='fa fa-angle-left'></i></div>\",
	                nextArrow: \"<div class='slick-next'><i class='fa fa-angle-right'></i></div>\",
			        dots: " . $bullets . ",
			        arrows: " . $nav . ",
			        autoplay: " . $auto_play . ",
		            responsive: [
						    {
						      breakpoint: 1199,
						      settings: {
						        slidesToShow: " . $items_desktop . "
						      }
						    },
						    {
						      breakpoint: 979,
						      settings: {
						        slidesToShow: " . $items_desktop_small . "
						      }
						    },
						    {
						      breakpoint: 767,
						      settings: {
						        slidesToShow: " . $items_tablet . "
						      }
						    },
						    {
						      breakpoint: 479,
						      settings: {
						        slidesToShow: " . $items_mobile . "
						      }
						    }
						  ]
		        });
    });
    </script>

	<div id='wordpress-carousel-free-$id' class='wordpress-carousel-free-section' style='padding:$carousel_area_padding;'>";

	$output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

	foreach ( $attachments as $attach_id => $attachment ) {

		$wcf_image_url = wp_get_attachment_image_src( $attach_id, 'medium', false );

		$wcf_image_title = $attachment->post_title;


		$output .= "
		<div class='single_wcf_item'>
			<img src='$wcf_image_url[0]' alt='$wcf_image_title' />
		</div>
		";

	}

	$output .= "
		</div>\n";

	return $output;
}

add_shortcode( 'wcfgallery', 'wp_carousel_free_shortcode' );