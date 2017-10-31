<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// TT testimonial element
	vc_map( array(
		'name'                    => esc_html__( 'Testimonial Carousel', 'nominee' ),
		'base'                    => 'tt_testimonials',
		'icon'                    => 'fa fa-picture-o',
		'description'             => esc_html__( 'Show off testimonial', 'nominee' ),
		'as_parent'               => array( 'only' => 'tt_testimonial' ),
		'content_element' 		  => true,
    	'show_settings_on_create' => false,
		'category'                => esc_html__( 'TT Elements', 'nominee' ),
		'params'                  => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'nominee' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
			)
		),
		'js_view'                 => 'VcColumnView',
	));

	vc_map( array(
		'name'            => esc_html__( 'Testimonial item', 'nominee' ),
		'base'            => 'tt_testimonial',
		'as_child'        => array( 'only' => 'tt_testimonials' ),
		'content_element' => true,
		'icon'            => 'fa fa-picture-o',
		'class'			  => 'repeatable-content-wrap',
		'params'          => array(

			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Use photo?', 'nominee' ),
				'param_name'  => 'photo_option',
				'admin_label' => true,
				'value' 	  => array(
					esc_html__('Select an option', 'nominee') => '',
					esc_html__('No use default quote icon', 'nominee') => 'no',
					esc_html__('Yes want to use photo', 'nominee') => 'yes'
				),
				'admin_label' => true,
				'description' => esc_html__( 'If you want to use photo then select yes', 'nominee' )
			),

			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'nominee' ),
				'param_name'  => 'client_image',
				'description' => esc_html__( 'Select images from media library, dimension: 100x100', 'nominee' ),
				'dependency'  => Array(
					'element' => 'photo_option', 
					'value'   => array('yes')
				)
			),

			array(
				'type'        	=> 'textarea_html',
				'heading'     	=> esc_html__( 'Quote', 'nominee' ),
				'param_name'  	=> 'content',
				'description' 	=> esc_html__( 'Enter testimonial quote', 'nominee' )
			),
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Name', 'nominee' ),
				'param_name'  	=> 'client_name',
				'holder'		=> 'h3',
				'description' 	=> esc_html__( 'Enter name', 'nominee' )
			),
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Organization', 'nominee' ),
				'param_name'  	=> 'client_org',
				'admin_label'   => true,
				'description' 	=> esc_html__( 'Enter Organization name' , 'nominee' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Text color option', 'nominee' ),
                'param_name'  => 'text_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default text color then select custom color', 'nominee' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'nominee' ),
                'param_name'  => 'text_color',
                'description' => esc_html__( 'Change text color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'text_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),
			
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'nominee' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
			)
		)
	));

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_tt_Testimonials extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_Testimonial extends WPBakeryShortCode {
		}
	}
endif;