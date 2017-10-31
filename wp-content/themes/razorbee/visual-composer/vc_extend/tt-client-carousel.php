<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Client carousel element
    vc_map( array(
        'name'        => esc_html__( 'Client carousel', 'nominee' ),
        'base'        => 'tt_client_carousel',
        'icon'        => 'fa fa-users',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Show off client logo with carousel', 'nominee' ),
        'params'      => array(

            array(
                'type'          => 'attach_images',
                'heading'       => esc_html__( 'Images', 'nominee'),
                'param_name'    => 'images',
                'description'   => esc_html__( 'Select images from media library.', 'nominee' )
            ),

            array(
                'type'          => 'dropdown',
                'heading'       => esc_html__( 'On click action', 'nominee' ),
                'param_name'    => 'on_click_action',
                'value'         => array(
                    esc_html__( 'Do nothing', 'nominee' ) => '',
                    esc_html__( 'Open custom link', 'nominee' ) => 'custom_link'
                ),
                'admin_label'   => true,
                'description'   => esc_html__( 'Define action for onclick event if needed.', 'nominee' )
            ),

            array(
                'type'          => 'exploded_textarea',
                'heading'       => esc_html__( 'Custom links', 'nominee'),
                'param_name'    => 'links',
                'description'   => esc_html__( 'Enter links for each logo here. Divide links with linebreaks (Enter)', 'nominee' ),
                'dependency'    => array(
                    'element'   => 'on_click_action', 
                    'value'     => array( 'custom_link' )
                )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Item Desktop', 'nominee' ),
                'param_name'    => 'item_desktop',
                'value'         => 6,
                'description'   => esc_html__( 'Enter item number for desktop', 'nominee' ),
                'group'         => esc_html__( 'Responsive Settings', 'nominee' )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Item Tablet', 'nominee' ),
                'param_name'    => 'item_tablet',
                'value'         => 3,
                'description'   => esc_html__( 'Enter item number for tablet', 'nominee' ),
                'group'         => esc_html__( 'Responsive Settings', 'nominee' )
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Item Mobile', 'nominee' ),
                'param_name'    => 'item_mobile',
                'value'         => 1,
                'description'   => esc_html__( 'Enter item number for mobile', 'nominee' ),
                'group'         => esc_html__( 'Responsive Settings', 'nominee' )
            ),

            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'Css', 'nominee' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design options', 'nominee' ),
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
        class WPBakeryShortCode_tt_Client_Carousel extends WPBakeryShortCode {
        }
    }
endif;