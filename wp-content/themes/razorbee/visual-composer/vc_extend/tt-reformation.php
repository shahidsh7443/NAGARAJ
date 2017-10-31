<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Reformation element
    vc_map( array(
        'name'        => esc_html__( 'TT Reformation', 'nominee' ),
        'base'        => 'tt_reformation',
        'icon'        => 'fa fa-th',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'To showing reformation with grid view', 'nominee' ),
        'params'      => array(
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Filter visibility ', 'nominee' ),
                'param_name'  => 'filter_visibility',
                'value'       => array(
                    esc_html__('Select option', 'nominee') => '',
                    esc_html__('Visible', 'nominee') => 'visible',
                    esc_html__('Hidden', 'nominee')  =>'hidden' ,
                ),
                'admin_label' => true,
                'description' => esc_html__( 'If you do not like to show filter then select hidden', 'nominee' )
            ),
            
            array(
                'type' => 'textfield',
                'heading'     => esc_html__('Post Limit', 'nominee'),
                'param_name'  => 'post_limit',
                'admin_label' => true,
                'value'       => -1,
                'description' => esc_html__('Put the number of posts to show, -1 for no limit', 'nominee'),
            ),

            array(
                'type' => 'textfield',
                'heading'     => esc_html__('Word Limit', 'nominee'),
                'param_name'  => 'word_limit',
                'admin_label' => true,
                'value'       => 10,
                'description' => esc_html__('Set your desire word limit, default is 10', 'nominee'),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Grid column', 'nominee' ),
                'param_name'  => 'grid_column',
                'value'       => array(
                    esc_html__('Select column', 'nominee') => '',
                    esc_html__('2 Columns', 'nominee') => 6,
                    esc_html__('3 Columns', 'nominee') => 4,
                    esc_html__('4 Columns', 'nominee') => 3
                ),
                'description' => esc_html__( 'Select post grid column', 'nominee' ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Grid padding', 'nominee' ),
                'param_name'  => 'grid_padding',
                'value'       => array(
                    esc_html__('Yes', 'nominee') => '',
                    esc_html__('No', 'nominee')  =>'no-padding' ,
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Grid padding will appear between item', 'nominee' ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'More reformation button', 'nominee' ),
                'param_name'  => 'reformation_button',
                'value'       => array(
                    esc_html__('Select option', 'nominee') => '',
                    esc_html__('Show', 'nominee') => 'show',
                    esc_html__('Hide', 'nominee')  =>'hide' ,
                ),
                'admin_label' => true,
                'description' => esc_html__( 'You can show or hide more reformation button from here', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Button text', 'nominee' ),
                'param_name'  => 'button_text',
                'value'       => 'More Reformation',
                'description' => esc_html__( 'Change button text', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'reformation_button',
                    'value'   => array( 'show' )
                )
            ),

            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'Button link', 'nominee' ),
                'param_name'  => 'button_link',
                'description' => esc_html__( 'Select existing page or put url of all reformation page', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'reformation_button',
                    'value'   => array( 'show' )
                )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Extra class name', 'nominee' ),
                'param_name'  => 'el_class',
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'nominee' )
            ),

        )
    ));


    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_tt_Reformation extends WPBakeryShortCode {
        }
    }
endif;