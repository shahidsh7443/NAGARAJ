<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :
    
    // TT event speaker element
    $args = array(
        'post_type'      => 'tt-member',
        'posts_per_page' => - 1,
        'post_status'    => 'publish'
    );
    
    $member_query = new WP_Query( $args );
    $tt_member_list = array();
    if ( $member_query->have_posts() ) {
        while ( $member_query->have_posts() ) {
            $member_query->the_post();
            $tt_member_list[ get_the_title() ] = get_the_id();
        }
    }

    
    vc_map( array(
        'name'                    => esc_html__( 'Speaker', 'nominee' ),
        'base'                    => 'tt_event_speaker',
        'icon'                    => 'fa fa-user',
        'category'                => esc_html__( 'TT Elements', 'nominee' ),
        'description'             => esc_html__( 'Show off event speaker', 'nominee' ),
        'params'                  => array(

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Speaker', 'nominee' ),
                'param_name'  => 'speaker_list',
                'value'       => $tt_member_list,
                'admin_label' => true,
                'description' => esc_html__( 'Select a speaker', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Biography option visibility', 'nominee' ),
                'param_name'  => 'bio_visibility',
                'value'       => array(
                    esc_html__('Visible', 'nominee') => 'visible-bio',
                    esc_html__('Hidden', 'nominee')  =>'hiddden-bio'
                    ),
                'admin_label' => true,
                'description' => esc_html__( 'If do not want to show bio option then select hidden', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Speaker designation visibility', 'nominee' ),
                'param_name'  => 'designation_visibility',
                'value'       => array(
                    esc_html__('Select an option', 'nominee') => '',
                    esc_html__('Visible', 'nominee') => 'visible-designation',
                    esc_html__('Hidden', 'nominee')  =>'hiddden-designation'
                    ),
                'admin_label' => true,
                'description' => esc_html__( 'If do not want to show member designation option then select hidden', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'nominee' ),
                'param_name'  => 'el_class',
                'admin_label' => true,
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
            )
        )
    ));

    if ( class_exists( 'WPBakeryShortCode' ) ) {
        class WPBakeryShortCode_TT_Event_Speaker extends WPBakeryShortCode {
        }
    }

endif;