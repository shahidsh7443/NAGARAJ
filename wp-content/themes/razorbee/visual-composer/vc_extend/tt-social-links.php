<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// Counting element
	vc_map( array(
		'name'              => esc_html__( 'TT Social Links', 'nominee' ),
		'base'              => 'tt_social_links',
		'controls'          => 'full',
		'icon'              => 'fa fa-share',
		'show_settings_on_create'   => FALSE,
		'description'       => esc_html__( 'Display social share links', 'nominee' ),
		'as_parent'         => array( 'only' => 'tt_social_link' ),
		'content_element'   => TRUE,
		'category'          => esc_html__( 'TT Elements', 'nominee' ),
		'default_content'   => "[tt_social_link /]",
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
		'name'                      => esc_html__( 'TT Social Link', 'nominee' ),
		'base'                      => 'tt_social_link',
		'content_element'           => true,
		'show_settings_on_create'   => TRUE,
		'as_child'                  => array( 'only' => 'tt_social_links' ),
		'is_container'              => TRUE,
		'params'                    => array(
			array(
                'type'       => 'iconpicker',
                'heading'    => esc_html__('Select Icon', 'nominee'),
                'param_name' => 'fontawesome_icon',
                'settings'   => array(
                    'type' => 'fontawesome'
                ),
                'admin_label'=> true,
                'description' => esc_html__( 'Fontawesome icon list, Pickup your choice.', 'nominee'
                )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Icon color', 'nominee' ),
                'param_name'  => 'icon_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default icon color then select custom color', 'nominee' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Select color', 'nominee' ),
                'param_name'  => 'icon_color',
                'description' => esc_html__( 'change icon color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'icon_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),

			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'nominee' ),
				'param_name'  => 'link',
				'description' => esc_html__( 'Enter social profile/page url', 'nominee' )
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
		class WPBakeryShortCode_Tt_social_links extends WPBakeryShortCodesContainer {
		}
	}


	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_Tt_social_link extends WPBakeryShortCode {
		}
	}
endif;