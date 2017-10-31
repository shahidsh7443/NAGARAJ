<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // fund raise
    vc_map( array(
        'name'        => esc_html__( 'TT Fund Raise counting', 'nominee' ),
        'base'        => 'tt_fund_raise_counting',
        'icon'        => 'fa fa-history',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Showing fund raise amount with counting', 'nominee' ),
        'params'      => array(
            
            array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Counted Number', 'nominee' ),
				'param_name'  	=> 'counted_number',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Put your counted number', 'nominee' )
			),

            array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Counted number prefix', 'nominee' ),
				'param_name'  	=> 'counted_number_prefix',
				'description' 	=> esc_html__( 'Put your counted number prefix, e.g: $', 'nominee' )
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Subtitle', 'nominee' ),
				'param_name'  => 'subtitle',
				'admin_label' => true,
				'description' => esc_html__( 'Enter subtitle', 'nominee' )
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
        class WPBakeryShortCode_tt_Fund_Raise_Counting extends WPBakeryShortCode {
        }
    }
endif;