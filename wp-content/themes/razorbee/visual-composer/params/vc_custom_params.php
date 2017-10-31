<?php

	if ( ! defined( 'ABSPATH' ) ) :
	    exit; // Exit if accessed directly
	endif;

	// remove vc element
	//vc_remove_element( 'vc_tta_tour' );


	// vc remove param
	vc_remove_param( 'vc_row', 'el_class' );
	vc_remove_param( 'vc_row', 'full_width' );


	// add param on row
	$attributes = array(

		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Content Width', 'nominee'),
			'param_name' 	=> 'section_content_width',
			'value' 		=> array(
				esc_html__( 'Fixed Width', 'nominee' ) => 'container',
				esc_html__( 'Full Width', 'nominee' ) => 'container-fullwidth',
			),
			'description' 	=> esc_html__( 'Select content width', 'nominee' ),
			'weight'		=> 1
		),

		array(
			'type' 			=> 'dropdown',
			'heading' 		=> esc_html__( 'Apply overlay ?', 'nominee'),
			'param_name' 	=> 'overlay_color',
			'value' 		=> array(
				esc_html__( '-- Select --', 'nominee' )  => '',
				esc_html__( 'Yes', 'nominee' ) => 'yes',
				esc_html__( 'No', 'nominee' ) => 'no'
			),
			'description' => esc_html__( 'If you want to apply overlay color on background image then select yes', 'nominee' )
		),

		array(
	        'type'        =>'colorpicker',
	        'heading'     => esc_html__( 'Select color', 'nominee' ),
	        'param_name'  => 'overlay_color_picker',
	        'description' => esc_html__( 'Select section overlay color', 'nominee' ),
	        'dependency'  => array(
	            'element'   => 'overlay_color',
	            'value' 	=> 'yes'
	        )
	    ),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Extra class name', 'nominee' ),
			'param_name' => 'el_class',
			'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'nominee' ),
		)
	);
	vc_add_params( 'vc_row', $attributes );

	

	// add param on vc tab
	vc_add_param('vc_tta_tabs', array(
			'type' => 'dropdown',
			'param_name' => 'style',
			'value' => array(
				esc_html__( 'Classic', 'nominee' ) => 'classic',
				esc_html__( 'Ultra Classic', 'nominee' ) => 'ultra-classic',
				esc_html__( 'Modern', 'nominee' ) => 'modern',
				esc_html__( 'Flat', 'nominee' ) => 'flat',
				esc_html__( 'Outline', 'nominee' ) => 'outline'
			),
			'heading' => esc_html__( 'Style', 'nominee' ),
			'description' => esc_html__( 'Select tabs display style.', 'nominee' ),
		)
	);