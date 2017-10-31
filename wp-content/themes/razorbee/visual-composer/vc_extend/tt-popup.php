<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Section title style element
    vc_map( array(
        'name'        => esc_html__( 'TT Popup', 'nominee' ),
        'base'        => 'tt_popup',
        'icon'        => 'fa fa-expand',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Showing youtube video or vimeo video with popup', 'nominee' ),
        'params'      => array(
            array(
                'type'        => 'attach_image',
                'heading'     => esc_html__( 'Cover Image', 'nominee' ),
                'param_name'  => 'cover_image',
                'description' => esc_html__( 'Upload cover image from media library', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Enter URL', 'nominee' ),
                'param_name'  => 'source_url',
                'admin_label' => true,
                'description' => esc_html__( 'Enter youtube, vimeo or map url', 'nominee' )
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
        class WPBakeryShortCode_tt_Popup extends WPBakeryShortCode {
        }
    }
endif;
