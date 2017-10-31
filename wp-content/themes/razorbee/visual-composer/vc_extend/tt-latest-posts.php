<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	// Latest blog element
	vc_map( array(
		'name'        => esc_html__( 'Latest Blog Post', 'nominee'),
		'base'        => 'tt_latest_post',
		'icon'        => 'fa fa-qrcode',
		'category'    => esc_html__( 'Content', 'nominee'),
		'description' => esc_html__( 'Latest blog post', 'nominee'),
		'params'      => array(

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Post Limit', 'nominee'),
				'param_name'  => 'post_limit',
				'value'       => 3,
				'admin_label' => true,
				'description' => esc_html__( 'Enter number of post to show', 'nominee')
			),

			array(
		         'type' => 'dropdown',
		         'heading' => esc_html__('Select gid column', 'nominee'),
		         'param_name' => 'grid_column',
		         'value' => array(
		              'Select grid column' => '',
		              '2 Columns' => '6',
		              '3 Columns' => '4',
		              '4 Columns' => '3',
		          ),
		         'admin_label' => true,
		         'description' => esc_html__('Select grid column', 'nominee'),
		    ),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Word Limit', 'nominee'),
				'param_name'  => 'word_limit',
				'value'       => 15,
				'admin_label' => true,
				'description' => esc_html__( 'How many word would you like to show ?', 'nominee')
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Change readmore text', 'nominee'),
				'param_name'  => 'readmore_text',
				'value'		  => 'Read More',
				'admin_label' => true,
				'description' => esc_html__( 'You can change readmore text', 'nominee')
			),

			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Show all press release button?', 'nominee'),
				'param_name'  => 'show_all_button',
				'value'		 => array(
					esc_html__('Select an option', 'nominee') => '',
					esc_html__('Yes', 'nominee') => 'yes',
					esc_html__('No', 'nominee') => 'no',
					),
				'admin_label' => true,
				'description' => esc_html__( 'You can show or hide all press release button', 'nominee')
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Change button text', 'nominee'),
				'param_name'  => 'button_text',
				'value'		  => 'All Press Release',
				'admin_label' => true,
				'description' => esc_html__( 'You can change button text', 'nominee'),
				'dependency'  => Array(
					'element' => 'show_all_button',
					'value'   => array('yes')
				)
			),

			array(
				'type'        => 'vc_link',
				'heading'     => esc_html__( 'Link', 'nominee'),
				'param_name'  => 'custom_link',
				'description' => esc_html__( 'Enter link or select a page as link', 'nominee'),
				'dependency'  => Array(
					'element' => 'show_all_button',
					'value'   => array('yes')
				)
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Extra class name', 'nominee'),
				'param_name'  => 'el_class',
				'admin_label' => true,
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee')
			),

		)
	));


	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_Latest_Post extends WPBakeryShortCode {
		}
	}
endif;