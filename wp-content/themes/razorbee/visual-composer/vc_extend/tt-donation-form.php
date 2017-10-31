<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Donation element
    vc_map( array(
        'name'        => esc_html__( 'TT Donation Form', 'nominee' ),
        'base'        => 'tt_donation_form',
        'icon'        => 'fa fa-money',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'PayPal donation form', 'nominee' ),
        'params'      => array(
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Extra class name', 'nominee' ),
                'param_name'    => 'el_class',
                'description'   => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
            ),

            array(
                'type'          => 'css_editor',
                'heading'       => esc_html__( 'Css', 'nominee' ),
                'param_name'    => 'css',
                'group'         => esc_html__( 'Design options', 'nominee' ),
            )
        )
    ));

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Donation_Form extends WPBakeryShortCode{
        }
    }
endif;