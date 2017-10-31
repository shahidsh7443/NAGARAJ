<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// Home banner element
	vc_map( array(
		'name'          => esc_html__( 'Home Banner', 'nominee' ),
		'base'          => 'tt_home_banner',
		'icon'        	=> 'fa fa-align-center',
        'category'    	=> esc_html__( 'TT Elements', 'nominee' ),
        'description' 	=> esc_html__( 'Home page top banner text with bg image, video and parallax', 'nominee' ),
		'params'        => array(
			
			array(
				'type'        	=> 'textarea_html',
				'heading'     	=> esc_html__( 'Intro title', 'nominee' ),
				'param_name'  	=> 'content',
				'holder'		=> 'span',
				'class'			=> 'text-center',
				'description' 	=> esc_html__( 'Enter intro title', 'nominee' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title alignment', 'nominee' ),
                'param_name'  => 'title_alignment',
                'value'       => array(
                    esc_html__('Select title alignment', 'nominee') => '',
                    esc_html__('Left', 'nominee') => 'text-left',
                    esc_html__('Center', 'nominee')  =>'text-center',
                    esc_html__('Right', 'nominee')  =>'text-right' 
                ),
                'description' => esc_html__( 'Select title alignment', 'nominee' )
            ),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'nominee' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
			),
		)
	));


	if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Home_Banner extends WPBakeryShortCode {
        }
    }
endif;