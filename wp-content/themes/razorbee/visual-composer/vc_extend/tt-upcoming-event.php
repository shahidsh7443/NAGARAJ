<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Upcoming event element
    vc_map( array(
        'name'        => esc_html__( 'Upcoming Event', 'nominee' ),
        'base'        => 'tt_upcoming_event',
        'icon'        => 'fa fa-calendar',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Display upcoming event', 'nominee' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Event Limit', 'nominee' ),
                'param_name'  => 'event_limit',
                'value'       => 6,
                'admin_label' => true,
                'description' => esc_html__( 'Events show at most 6 posts, you can change the value', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'From', 'nominee' ),
                'param_name'  => 'start_event_month',
                'value'       => array(
                    esc_html__('Select month', 'nominee')   => '',
                    esc_html__('January', 'nominee')    => '01',
                    esc_html__('February', 'nominee')   => '02',
                    esc_html__('March', 'nominee')      => '03',
                    esc_html__('April', 'nominee')      => '04',
                    esc_html__('May', 'nominee')        => '05',
                    esc_html__('June', 'nominee')       => '06',
                    esc_html__('July', 'nominee')       => '07',
                    esc_html__('August', 'nominee')     => '08',
                    esc_html__('September', 'nominee')  => '09',
                    esc_html__('October', 'nominee')    => '10',
                    esc_html__('November', 'nominee')   => '11',
                    esc_html__('December', 'nominee')   => '12',
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Start month to show upcoming event', 'nominee' )
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'To', 'nominee' ),
                'param_name'  => 'end_event_month',
                'value'       => array(
                    esc_html__('Select month', 'nominee')   => '',
                    esc_html__('January', 'nominee')    => '01',
                    esc_html__('February', 'nominee')   => '02',
                    esc_html__('March', 'nominee')      => '03',
                    esc_html__('April', 'nominee')      => '04',
                    esc_html__('May', 'nominee')        => '05',
                    esc_html__('June', 'nominee')       => '06',
                    esc_html__('July', 'nominee')       => '07',
                    esc_html__('August', 'nominee')     => '08',
                    esc_html__('September', 'nominee')  => '09',
                    esc_html__('October', 'nominee')    => '10',
                    esc_html__('November', 'nominee')   => '11',
                    esc_html__('December', 'nominee')   => '12',
                ),
                'admin_label' => true,
                'description' => esc_html__( 'End month to show upcoming event', 'nominee' )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Year', 'nominee' ),
                'param_name'    => 'event_year',
                'value'         => 2015,
                'admin_label'   => true,
                'description'   => esc_html__( 'Enter event year', 'nominee' ),
            ),

            array(
                'type'        => 'dropdown',
                'heading'     => esc_html__( 'Grid Column', 'nominee' ),
                'param_name'  => 'grid_column',
                'value'       => array(
                    esc_html__('Select grid column', 'nominee')     => '',
                    esc_html__('2 columns', 'nominee')  => '6',
                    esc_html__('3 columns', 'nominee')  => '4',
                    esc_html__('4 columns', 'nominee')  => '3',
                ),
                'admin_label' => true,
                'description' => esc_html__( 'Select upcoming month to show upcoming event ', 'nominee' )
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
        class WPBakeryShortCode_tt_Upcoming_Event extends WPBakeryShortCode {
        }
    }
endif;