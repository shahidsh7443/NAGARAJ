<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Featured event element
    $args = array(
        'post_type'      => 'tt-event',
        'posts_per_page' => - 1,
    );
    
    $event_query = new WP_Query( $args );
    $tt_event_list = array();
    if ( $event_query->have_posts() ) {
        while ( $event_query->have_posts() ) {
            $event_query->the_post();
            $tt_event_list[ get_the_title() ] = get_the_id();
        }
    }

    vc_map( array(
        'name'        => esc_html__( 'Featured Event', 'nominee' ),
        'base'        => 'tt_featured_event',
        'icon'        => 'fa fa-calendar',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Show only one event as featured or upcomming event', 'nominee' ),
        'params'      => array(

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Select style', 'nominee' ),
                'param_name'  => 'featured_event_style',
                'value'       => array(
                    esc_html__('Style one', 'nominee') => 'style_one',
                    esc_html__('Style two (full width image)', 'nominee') => 'style_two'
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Select featured event post style', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Events', 'nominee' ),
                'param_name'  => 'event_lists',
                'value'       => $tt_event_list,
                'admin_label' => true,
                'description' => esc_html__( 'Select a event', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Use event post link?', 'nominee' ),
                'param_name'  => 'event_link',
                'value'       => array(
                    esc_html__('Select an option', 'nominee') => '',
                    esc_html__('Yes', 'nominee') => 'yes',
                    esc_html__('No', 'nominee') => 'no'
                ),
                'admin_label' => true,
                'dependency'  => array(
                    'element' => 'featured_event_style',
                    'value'   => array( 'style_two' )
                ),
                'description' => esc_html__( 'If you want to default event post link then select yes', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Date label text', 'nominee' ),
                'param_name'  => 'date_label_text',
                'description' => esc_html__( 'Add custom date label text if needed', 'nominee' )
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
        class WPBakeryShortCode_tt_Featured_Event extends WPBakeryShortCode {
        }
    }
endif;