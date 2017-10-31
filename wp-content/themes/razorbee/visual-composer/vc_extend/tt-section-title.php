<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Section title style element
    vc_map( array(
        'name'        => esc_html__( 'Section Title Style', 'nominee' ),
        'base'        => 'tt_section_title',
        'icon'        => 'fa fa-align-center',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'To customize section title style', 'nominee' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Title', 'nominee' ),
                'param_name'  => 'title',
                'holder'      => 'h3',
                'description' => esc_html__( 'Enter title here', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title alignment', 'nominee' ),
                'param_name'  => 'title_alignment',
                'value'       => array(
                    esc_html__('Select title alignment', 'nominee') => '',
                    esc_html__('Left', 'nominee') => 'text-left',
                    esc_html__('Center', 'nominee')  =>'text-center',
                    esc_html__('Right', 'nominee')  =>'text-right' 
                ),
                'description' => esc_html__( 'Select title alignment', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Title color option', 'nominee' ),
                'param_name'  => 'title_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default title color then select custom color', 'nominee' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'nominee' ),
                'param_name'  => 'title_color',
                'description' => esc_html__( 'Change title color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'title_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),

            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Sub title description', 'nominee' ),
                'param_name'  => 'content',
                'holder'      => 'span',
                'description' => esc_html__( 'Description will appear on after title bottom separator', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Description color option', 'nominee' ),
                'param_name'  => 'description_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default description text color then select custom color', 'nominee' )
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'nominee' ),
                'param_name'  => 'description_color',
                'description' => esc_html__( 'Change description text color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'description_color_option',
                    'value'   => array( 'custom-color' )
                ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Separator show/hide', 'nominee' ),
                'param_name'  => 'section_separator',
                'value'       => array(
                    esc_html__('Select an option', 'nominee') => '',
                    esc_html__('Show', 'nominee') => 'yes',
                    esc_html__('Hide', 'nominee')  =>'no' ,
                    ),
                'description' => esc_html__( 'If you want to hide section separator then select hide', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Separator position', 'nominee' ),
                'param_name'  => 'separator_position',
                'value'       => array(
                    esc_html__('Select separator position', 'nominee') => '',
                    esc_html__('Between the title and description', 'nominee') => 'after_title',
                    esc_html__('Bottom of the description', 'nominee')  =>'after_description',
                ),
                'description' => esc_html__( 'You can change separator postion from here', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'section_separator',
                    'value'   => array( 'yes' )
                ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Separator color', 'nominee' ),
                'param_name'  => 'separator_color_option',
                'value'       => array(
                    esc_html__('Default color', 'nominee') => '',
                    esc_html__('Custom color', 'nominee')  =>'custom-color',
                ),
                'description' => esc_html__( 'If you change default separator color then select custom color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'section_separator',
                    'value'   => array( 'yes' )
                ),
            ),

            array(
                'type'        => 'colorpicker',
                'heading'     => esc_html__( 'Custom color', 'nominee' ),
                'param_name'  => 'separator_color',
                'description' => esc_html__( 'change border color', 'nominee' ),
                'dependency'  => Array(
                    'element' => 'separator_color_option',
                    'value'   => array( 'custom-color' )
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
        class WPBakeryShortCode_tt_Section_Title extends WPBakeryShortCode {
        }
    }
endif;
