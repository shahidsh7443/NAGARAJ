<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Donation element
    vc_map( array(
        'name'        => esc_html__( 'TT Donation Modal', 'nominee' ),
        'base'        => 'tt_donation',
        'icon'        => 'fa fa-money',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'PayPal donation button to show donate form with modal', 'nominee' ),
        'params'      => array(

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Button text', 'nominee' ),
                'param_name'    => 'button_text',
                'admin_label'   => true,
                'value'         => esc_html__('Donate Today!', 'nominee'),
                'description'   => esc_html__( 'Change Button Text', 'nominee' )
            ),

            array(
                'type'          => 'css_editor',
                'heading'       => esc_html__( 'Css', 'nominee' ),
                'param_name'    => 'css',
                'group'         => esc_html__( 'Design options', 'nominee' ),
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Extra class name', 'nominee' ),
                'param_name'    => 'el_class',
                'description'   => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
            )
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Donation extends WPBakeryShortCode {
        }
    }
endif;