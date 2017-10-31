<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Spotlight Blok element
    vc_map( array(
        'name'        => esc_html__( 'Spotlight Block', 'nominee' ),
        'base'        => 'tt_spotlight_block',
        'icon'        => 'fa fa-ellipsis-h',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Show off spotlight block', 'nominee' ),
        'params'      => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Spotlight style', 'nominee' ),
                'param_name'  => 'spotlight_style',
                'admin_label' => true,
                'value'       => array(
                    esc_html__('Select an style', 'nominee') => '',
                    esc_html__('Simple Style', 'nominee') => 'spotlight-default',
                    esc_html__('Card Style', 'nominee') => 'spotlight-card'
                ),
                'std'         => 'spotlight-card',
                'description' => esc_html__( 'If you want to show button then select yes', 'nominee')
            ),

            array(
                'type'        => 'attach_image',
                'heading'     => esc_html__( 'Image', 'nominee' ),
                'param_name'  => 'image',
                'description' => esc_html__( 'Select image form media library, upload min 360x250 size image for better view.', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'nominee' ),
                'param_name'  => 'title',
                'holder'      => 'h2',
                'description' => esc_html__( 'Enter title here', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Subtitle', 'nominee' ),
                'param_name'  => 'subtitle',
                'holder'      => 'p',
                'description' => esc_html__( 'Enter subtitle here', 'nominee' ),
                'dependency' => Array(
                    'element' => 'spotlight_style', 
                    'value' => array('spotlight-card')
                )
            ),

            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Short description', 'nominee' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter features short description', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Show button ?', 'nominee' ),
                'param_name'  => 'show_button',
                'admin_label' => true,
                'value'       => array(
                    esc_html__('Select an option', 'nominee') => '',
                    esc_html__('Yes', 'nominee') => 'yes',
                    esc_html__('No', 'nominee') => 'no'
                    
                ),
                'admin_label' => true,
                'description' => esc_html__( 'If you want to show button then select yes', 'nominee')
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Button text', 'nominee' ),
                'param_name'  => 'button_text',
                'value'       => esc_html__('Learn More', 'nominee' ),
                'admin_label' => true,
                'description' => esc_html__( 'Change button text', 'nominee' ),
                'dependency' => Array(
                    'element' => 'show_button', 
                    'value' => array('yes')
                )
            ),

            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'Button link', 'nominee' ),
                'param_name'  => 'custom_link',
                'description' => esc_html__( 'Enter custom link or select existing page as link', 'nominee' ),
                'dependency' => Array(
                    'element' => 'show_button',
                    'value' => array('yes')
                )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Button class', 'nominee' ),
                'param_name'  => 'button_class',
                'admin_label' => true,
                'description' => esc_html__( 'Use button class field to style particularly', 'nominee' ),
                'dependency' => Array(
                    'element' => 'show_button', 
                    'value' => array('yes')
                )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'nominee' ),
                'param_name'  => 'el_class',
                'admin_label' => true,
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
            ),
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Spotlight_Block extends WPBakeryShortCode {
        }
    }
endif;
