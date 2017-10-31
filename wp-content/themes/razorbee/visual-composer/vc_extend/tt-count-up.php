<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// Counting element
	vc_map( array(
		'name'              => esc_html__( 'TT Counting', 'nominee' ),
		'base'              => 'tt_counts',
		'controls'          => 'full',
		'icon'              => 'fa fa-history',
		'show_settings_on_create'   => FALSE,
		'description'       => esc_html__( 'Display Counting', 'nominee' ),
		'as_parent'         => array( 'only' => 'tt_count' ),
		'content_element'   => TRUE,
		'category'          => esc_html__( 'TT Elements', 'nominee' ),
		'default_content'   => "[tt_count counted_number='' subtitle=''/]",
		'params'            => array(
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
		'name'                      => esc_html__( 'Single counting', 'nominee' ),
		'base'                      => 'tt_count',
		'content_element'           => true,
		'show_settings_on_create'   => TRUE,
		'as_child'                  => array( 'only' => 'tt_counts' ),
		'is_container'              => TRUE,
		'params'                    => array(

			array(
                'type'       	=> 'iconpicker',
                'heading'    	=> esc_html__('Select Icon', 'nominee'),
                'param_name' 	=> 'flaticon_list',
                'settings'   	=> array(
                    'type' 	=> 'flaticon'
                ),
                'description' 	=> esc_html__( 'Flaticon list, pickup your choice.', 'nominee' )
            ),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Counted Number', 'nominee' ),
				'param_name'  	=> 'counted_number',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Put your counted number', 'nominee' )
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Subtitle', 'nominee' ),
				'param_name'  => 'subtitle',
				'admin_label' => true,
				'description' => esc_html__( 'Enter subtitle', 'nominee' )
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Grid Class', 'nominee' ),
				'param_name'  => 'grid_class',
				'description' => esc_html__( 'Enter bootstrap grid class', 'nominee' ),
				'value' => 'col-sm-3',
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'nominee' ),
				'param_name'  => 'el_class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
			)
		)
	));


	//Your 'container' content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_Tt_Counts extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Tt_Count extends WPBakeryShortCode {
		}
	}
endif;