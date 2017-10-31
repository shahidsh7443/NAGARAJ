<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if( function_exists('vc_map') ) :

	// Story post
    $args = array(
        'post_type'      	=> 'tt-story',
        'posts_per_page' 	=> - 1,
        'post_status' 		=> 'publish'
    );
    
    $story_query = new WP_Query( $args );
    $tt_story_list = array();
    $tt_story_list[esc_html__('Select story', 'nominee')] = "";
    if ( $story_query->have_posts() ) {
        while ( $story_query->have_posts() ) {
            $story_query->the_post();
            $tt_story_list[ get_the_title() ] = get_the_id();
        }
    }

	// TT story element
	vc_map( array(
		'name'                    => esc_html__( 'TT Story timeline', 'nominee' ),
		'base'                    => 'tt_stories',
		'icon'                    => 'fa fa-sort-numeric-desc',
		'description'             => esc_html__( 'Show off story with timeline style', 'nominee' ),
		'as_parent'               => array( 'only' => 'tt_story' ),
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
		'name'            => esc_html__( 'Story', 'nominee' ),
		'base'            => 'tt_story',
		'as_child'        => array( 'only' => 'tt_stories' ),
		'content_element' => true,
		'icon'            => 'fa fa-picture-o',
		'class'			  => 'repeatable-content-wrap',
		'params'          => array(
			
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Stories', 'nominee' ),
                'param_name'  => 'story_lists',
                'value'       => $tt_story_list,
                'admin_label' => true,
                'description' => esc_html__( 'Select a story to show', 'nominee' )
            ),

            array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Word Limit', 'nominee' ),
				'param_name'  => 'word_limit',
				'value'		  => 10,
				'admin_label' => true,
				'description' => esc_html__( 'Enter your desire nunber of content word', 'nominee' )
			),

			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Timeline content position', 'nominee' ),
				'param_name'  => 'content_positon',
				'value' 	  => array(
					esc_html__('Normal (left position)', 'nominee') => '',
					esc_html__('Inverted (right position)', 'nominee') => 'timeline-inverted'
				),
				'admin_label' => true,
				'description' => esc_html__( 'Select timeline position, default position is normal (left position)', 'nominee' )
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Learn More Text', 'nominee' ),
				'param_name'  => 'learn_more_text',
				'value'		  => esc_html__('Learn More', 'nominee'),
				'description' => esc_html__( 'If you need to change learn more text then change or leave blank to hide learn more text', 'nominee' )
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
		class WPBakeryShortCode_tt_Stories extends WPBakeryShortCodesContainer {
		}
	}

	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_tt_Story extends WPBakeryShortCode {
		}
	}
endif;