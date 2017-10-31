<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// Fade Animation for title and subtitle
	$tt_css_animation = array(
		esc_html__('Select animation', 'nominee') 	=> '',
		esc_html__('fadeIn', 'nominee') 			=> 'fadeIn',
		esc_html__('fadeInDown', 'nominee') 		=> 'fadeInDown',
		esc_html__('fadeInDownBig', 'nominee') 		=> 'fadeInDownBig',
		esc_html__('fadeInLeft', 'nominee') 		=> 'fadeInLeft',
		esc_html__('fadeInLeftBig', 'nominee') 		=> 'fadeInLeftBig',
		esc_html__('fadeInRight', 'nominee') 		=> 'fadeInRight',
		esc_html__('fadeInRightBig', 'nominee') 	=> 'fadeInRightBig',
		esc_html__('fadeInUp', 'nominee') 			=> 'fadeInUp',
		esc_html__('fadeInUpBig', 'nominee') 		=> 'fadeInUpBig'
	);

	// animation delay
	$tt_animation_delay = array(
		esc_html__('Select delay option', 'nominee') 	=> '',
		esc_html__('Delay 300ms', 'nominee') 			=> 'delay-1',
		esc_html__('Delay 600ms', 'nominee') 			=> 'delay-2',
		esc_html__('Delay 1200ms', 'nominee') 			=> 'delay-3',
		esc_html__('Delay 1500ms', 'nominee') 			=> 'delay-4',
		esc_html__('Delay 1800ms', 'nominee') 			=> 'delay-5'
	);

	// TT home slider element
	vc_map( array(
		'name'                    => esc_html__( 'Home Slider', 'nominee' ),
		'base'                    => 'tt_home_slides',
		'icon'                    => 'fa fa-picture-o',
		'description'             => esc_html__( 'Slider for home page, but you can use it any where in the page', 'nominee' ),
		'as_parent'               => array( 'only' => 'tt_home_slide' ),
		'content_element' 		  => true,
    	'show_settings_on_create' => false,
		'category'                => esc_html__( 'TT Elements', 'nominee' ),
		// 'default_content'         => '[home_slide /]',
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
		'name'            => esc_html__( 'Slide', 'nominee' ),
		'base'            => 'tt_home_slide',
		'as_child'        => array( 'only' => 'tt_home_slides' ),
		'content_element' => true,
		'icon'            => 'fa fa-picture-o',
		'class'			  => 'repeatable-content-wrap',
		'params'          => array(
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'nominee' ),
				'param_name'  => 'slider_image',
				'description' => esc_html__( 'Select images from media library, dimension: min 1700x900', 'nominee' )
			),

			array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Content alignment', 'nominee' ),
                'param_name'  => 'content_alignment',
                'value'       => array(
                    esc_html__('Select content alignment', 'nominee') => '',
                    esc_html__('Left', 'nominee') => 'text-left',
                    esc_html__('Center', 'nominee')  =>'text-center',
                    esc_html__('Right', 'nominee')  =>'text-right' 
                ),
                'std'		  => 'text-left',
                'description' => esc_html__( 'Select content alignment', 'nominee' )
            ),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Intro title', 'nominee' ),
				'param_name'  	=> 'intro-title',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter intro title', 'nominee' ),
				'group' 		=> esc_html__( 'Intro Title', 'nominee' )
			),
			
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Font size', 'nominee' ),
				'param_name'  	=> 'intro-font-size',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter intro font size in px, e.g: 24px', 'nominee' ),
				'group' 		=> esc_html__( 'Intro Title', 'nominee' )
			),
			
			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Intro title animation', 'nominee' ),
				'param_name'  	=> 'intro_title_animation',
				'admin_label'	=> true,
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for intro title, e.g: fadeInDown', 'nominee' ),
				'group' 		=> esc_html__( 'Intro Title', 'nominee' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'nominee' ),
				'param_name'  	=> 'intro_title_ani_delay',
				'admin_label'	=> true,
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for intro title, e.g: Delay 300ms', 'nominee' ),
				'group' 		=> esc_html__( 'Intro Title', 'nominee' )
			),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Title (Part one)', 'nominee' ),
				'param_name'  	=> 'title_part1',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter banner title part one', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Title (Part one) animation', 'nominee' ),
				'param_name'  	=> 'title_part1_animation',
				'admin_label'	=> true,
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for title part1, e.g: fadeInUp', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
			),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Font size', 'nominee' ),
				'param_name'  	=> 'title-font-size',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter title font size in px, e.g: 60px', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'nominee' ),
				'param_name'  	=> 'title_part1_ani_delay',
				'admin_label'	=> true,
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for title part1, e.g: Delay 1200ms', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
			),

			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__( 'Title (Part two)', 'nominee' ),
				'param_name'  	=> 'title_part2',
				'admin_label'	=> true,
				'description' 	=> esc_html__( 'Enter banner title part two', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Title (Part two) animation', 'nominee' ),
				'param_name'  	=> 'title_part2_animation',
				'admin_label'	=> true,
				'value'			=> $tt_css_animation,
				'description' 	=> esc_html__( 'Select animation for title part2, e.g: fadeInUp', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
			),

			array(
				'type'        	=> 'dropdown',
				'heading'     	=> esc_html__( 'Animation delay', 'nominee' ),
				'param_name'  	=> 'title_part2_ani_delay',
				'admin_label'	=> true,
				'value'			=> $tt_animation_delay,
				'description' 	=> esc_html__( 'Select animation delay for title part2, e.g: Delay 1500ms', 'nominee' ),
				'group' 		=> esc_html__( 'Large title', 'nominee' )
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

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_tt_Home_Slides extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_Home_Slide extends WPBakeryShortCode {
		}
	}
endif;