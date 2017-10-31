<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Icon blog element
    vc_map( array(
        'name'        => esc_html__( 'Icon Block', 'nominee' ),
        'base'        => 'tt_icon_block',
        'icon'        => 'fa fa-align-center',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Show off text with icon', 'nominee' ),
        'params'      => array(
            array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Show icon ?', 'nominee' ),
                'param_name'  => 'show_icon',
                'value' => array(
                    esc_html__('select option', 'nominee') => '',
                    esc_html__('Yes', 'nominee') => 'yes',
                    esc_html__('No', 'nominee') => 'no'
                ),
                'description' => esc_html__( 'If you do not like to show icon then select no', 'nominee' ),
            ),
            array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Style', 'nominee' ),
                'param_name'  => 'icon_style',
                'value' => array(
                    esc_html__('Select style', 'nominee') => '',
                    esc_html__('Simple style', 'nominee') => 'icon-default',
                    esc_html__('With effect', 'nominee') => 'icon-effect'
                ),
                'std'         => 'icon-effect',
                'description' => esc_html__( 'Select an icon style', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'show_icon',
                    'value'   => array( 'yes' )
                )
            ),
            array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Select icon type ?', 'nominee' ),
                'param_name'  => 'icon_type',
                'value' => array(
                    esc_html__('select option', 'nominee') => '',
                    esc_html__('Fontawesome', 'nominee') => 'fontawesome-icon',
                    esc_html__('Flaticon', 'nominee') => 'flat-icon'
                ),
                'description' => esc_html__( 'There are two icon types fontawesome and flaticons, choose your type', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'show_icon',
                    'value'   => array( 'yes' )
                )
            ),
            array(
                'type'       => 'iconpicker',
                'heading'    => esc_html__('Fontawesome', 'nominee'),
                'param_name' => 'fontawesome_icon',
                'settings'   => array(
                    'type' => 'fontawesome'
                ),
                'description' => esc_html__( 'Fontawesome list. Pickup your choice.', 'nominee'
                ),
                'dependency'  => Array(
                    'element' => 'icon_type',
                    'value'   => array( 'fontawesome-icon' )
                ),
            ),
            array(
                'type'       => 'iconpicker',
                'heading'    => esc_html__('Flaticon', 'nominee'),
                'param_name' => 'flat_icon',
                'settings'   => array(
                    'type' => 'flaticon'
                ),
                'description' => esc_html__( 'Flaticon list. Pickup your choice.', 'nominee'
                ),
                'dependency'  => Array(
                    'element' => 'icon_type',
                    'value'   => array( 'flat-icon' )
                ),
            ),
            array(
                'type'        => 'dropdown',
                'class'       => '',
                'heading'     => esc_html__( 'Icon position', 'nominee' ),
                'param_name'  => 'icon_position',
                'value' => array(
                    esc_html__('Select alginment', 'nominee') => '',
                    esc_html__('Left', 'nominee') => 'icon-position-left',
                    esc_html__('Top center', 'nominee') => 'icon-position-center',
                    esc_html__('Right', 'nominee') => 'icon-position-right'
                ),
                'description' => esc_html__( 'Change icon alignment using this option.', 'nominee'),
                'dependency'  => Array(
                    'element' => 'show_icon',
                    'value'   => array( 'yes' )
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
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'nominee' ),
                'param_name'  => 'title',
                'holder' => 'h3',
                'description' => esc_html__( 'Enter title here', 'nominee' )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title color', 'nominee' ),
                'param_name'  => 'title_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default title color then select custom color', 'nominee' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Select color', 'nominee' ),
                'param_name'  => 'title_color',
                'description' => esc_html__( 'change title color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'title_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),
            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Text', 'nominee' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter content here.', 'nominee' )
            ),
            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Set custom link ?', 'nominee' ),
                'param_name'  => 'custom_link',
                'value'       => array(
                    esc_html__('No', 'nominee') => 'no',
                    esc_html__('Yes', 'nominee')  =>'yes',
                ),
                'description' => esc_html__( 'If you want to set custom link then select yes, the link will appear on title', 'nominee' )
            ),
            array(
                'type'        => 'vc_link',
                'heading'     => esc_html__( 'Link', 'nominee' ),
                'param_name'  => 'link',
                'description' => esc_html__( 'Enter link or select page as link', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'custom_link',
                    'value'   => array( 'yes' )
                ),
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
        class WPBakeryShortCode_tt_Icon_Block extends WPBakeryShortCode {
        }
    }
endif;
