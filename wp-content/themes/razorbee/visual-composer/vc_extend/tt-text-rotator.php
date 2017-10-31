<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    //Text Rotator element
    vc_map( array(
        'name'        => esc_html__( 'Text Rotator', 'nominee' ),
        'base'        => 'tt_text_rotator',
        'icon'        => 'fa fa-cube',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Show off text rotator effect in your page', 'nominee' ),
        'params'      => array(

            array(
                'type'          => 'textarea_html',
                'heading'       => esc_html__( 'Intro title', 'nominee' ),
                'param_name'    => 'content',
                'admin_label'   => true,
                'description'   => esc_html__( 'Enter intro title', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Rotator text', 'nominee' ),
                'param_name'  => 'title',
                'admin_label' => true,
                'description' => esc_html__( 'Enter rotator text, separate text with "|", e.g: Creating a country  | for every citizen | leading people | to better quality life', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Animation', 'nominee' ),
                'param_name'  => 'animation',
                'admin_label' => true,
                'value'       => array(
                    esc_html__('select animation', 'nominee')   => '',
                    esc_html__('dissolve', 'nominee')   => 'dissolve',
                    esc_html__('fade', 'nominee')       => 'fade',
                    esc_html__('flip', 'nominee')       => 'flip',
                    esc_html__('flipUp', 'nominee')     => 'flipUp',
                    esc_html__('flipCube', 'nominee')   => 'flipCube',
                    esc_html__('flipCubeUp', 'nominee') => 'flipCubeUp',
                    esc_html__('spin', 'nominee')       => 'spin'
                ),
                'description' => esc_html__( 'You can pick the way it animates when rotating through words, default: dissolve', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Animation speed', 'nominee' ),
                'param_name'  => 'animation_speed',
                'admin_label' => true,
                'value'       => 3000,
                'description' => esc_html__( 'How many milliseconds until the next word show.', 'nominee' )
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
        class WPBakeryShortCode_tt_Text_Rotator extends WPBakeryShortCode {
        }
    }
endif;