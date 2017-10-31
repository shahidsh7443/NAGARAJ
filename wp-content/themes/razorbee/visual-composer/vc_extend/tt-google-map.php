<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // TT Google mp element
    vc_map( array(
        'name'        => esc_html__( 'TT Google map', 'nominee' ),
        'base'        => 'tt_google_map',
        'icon'        => 'fa fa-map-marker',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Custom google map', 'nominee' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Address latitude', 'nominee' ),
                'param_name'  => 'tt_latitude',
                'admin_label' => true,
                'description' => esc_html__( 'Enter address latitude number, If you unable to find latitude and longitude of your address. Please visit http://www.latlong.net/convert-address-to-lat-long.html you can easily generate.', 'nominee' )
            ),
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Address longitude', 'nominee' ),
                'param_name'  => 'tt_longitude',
                'admin_label' => true,
                'description' => esc_html__( 'Enter address longitude number', 'nominee' )
            ),

            array(
                'type'        => 'attach_image',
                'heading'     => esc_html__( 'Map marker', 'nominee' ),
                'param_name'  => 'map_marker',
                'description' => esc_html__( 'Upload map marker from media library', 'nominee' )
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
        class WPBakeryShortCode_tt_Google_Map extends WPBakeryShortCode {
        }
    }
endif;