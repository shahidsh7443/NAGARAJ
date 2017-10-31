<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
        'name'        => esc_html__( 'TT Gallery', 'nominee' ),
        'base'        => 'tt_gallery',
        'icon'        => 'fa fa-picture-o',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Displays gallery with image or video', 'nominee' ),
        'params'      => array(

        	array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Gallery type', 'nominee' ),
                'param_name'  => 'gallery_type',
                'value'       => array(
                    esc_html__('Select gallery type', 'nominee') => '',
                    esc_html__('Image Gallery', 'nominee') => 'image-gallery',
                    esc_html__('Video Gallery', 'nominee')  =>'video-gallery'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Select gallery type', 'nominee' )
            ),

            array(
				'type' => 'attach_images',
				'heading' => esc_html__( 'Images', 'nominee'),
				'param_name' => 'images',
				'description' => esc_html__( 'Select images from media library.', 'nominee' ),
				'dependency'  => Array(
	                'element' => 'gallery_type',
	                'value'   => array( 'image-gallery' )
	            )
			),

			array(
                'type' => 'param_group',
                'heading' => esc_html__('Video content', 'nominee'),
                'param_name' => 'video_content',
                'description' => esc_html__('Enter video content', 'nominee'),
                'dependency'  => Array(
	                'element' => 'gallery_type',
	                'value'   => array( 'video-gallery' )
	            ),
                'params' => array(
                    array(
						'type' => 'attach_image',
						'heading' => esc_html__( 'Video Cover', 'nominee'),
						'param_name' => 'video_cover',
						'description' => esc_html__( 'Select images from media library.', 'nominee' )
					),

					array(
		                "type"        => "textarea_safe",
		                "heading"     => esc_html__( "Embed iframe", 'nominee' ),
		                "param_name"  => "embed_iframe",
		                "description" => esc_html__( "Give your emded iframe code here, recommended size is: 1140x640.", 'nominee' )
		            ),
                ),
            ),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'nominee' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'nominee' ),
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'nominee' ),
                'param_name'  => 'el_class',
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
            )
        )
    ));

	if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Gallery extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )