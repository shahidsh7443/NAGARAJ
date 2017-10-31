<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Member element
    vc_map( array(
        'name'                    => esc_html__( 'Members', 'nominee' ),
        'base'                    => 'tt_member',
        'icon'                    => 'fa fa-user',
        'category'                => esc_html__( 'TT Elements', 'nominee' ),
        'description'             => esc_html__( 'Show off member', 'nominee' ),
        'params'                  => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Member Limit', 'nominee' ),
                'param_name'  => 'post_limit',
                'value'       => -1,
                'admin_label' => true,
                'description' => esc_html__( 'Enter member post number to display member, -1 for no limit', 'nominee' )
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
                'heading'     => esc_html__( 'Member Order', 'nominee' ),
                'param_name'  => 'member_order',
                'value'       => array(
                    esc_html__('Select an option', 'nominee') => '',
                    esc_html__('ASC', 'nominee') => 'ASC',
                    esc_html__('DESC', 'nominee')  =>'DESC'
                    ),
                'admin_label' => true,
                'description' => esc_html__( 'You can change default order, Default is DESC', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Member designation visibility', 'nominee' ),
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
        class WPBakeryShortCode_TT_Member extends WPBakeryShortCode {
        }
    }

endif;