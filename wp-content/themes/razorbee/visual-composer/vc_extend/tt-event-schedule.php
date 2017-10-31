<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

    // Event schedule element
    vc_map( array(
        'name'        => esc_html__( 'Event Schedule', 'nominee' ),
        'base'        => 'tt_event_schedule',
        'icon'        => 'fa fa-clock-o',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Show off event agenda and schedule with speaker', 'nominee' ),
        'params'      => array(

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Speaker Name', 'nominee' ),
                'param_name'  => 'speaker_name',
                'holder'	  => 'h3',
                'description' => esc_html__( 'Enter speaker name', 'nominee' )
            ),

            array(
                'type'        => 'attach_image',
                'heading'     => esc_html__( 'Speaker photo', 'nominee' ),
                'param_name'  => 'speaker_photo',
                'description' => esc_html__( 'Select speaker photo from media library, dimansion: width 115px, height 115px', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Subject of Speech', 'nominee' ),
                'param_name'  => 'speech_subject',
                'admin_label' => true,
                'description' => esc_html__( 'Enter subject of speech', 'nominee' )
            ),

            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Desciption about speech', 'nominee' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter short description about speech', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Speech time', 'nominee' ),
                'param_name'  => 'speech_time',
                'admin_label' => true,
                'description' => esc_html__( 'Enter speech of time, e.g: 10:00AM - 11:00AM', 'nominee' )
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
        class WPBakeryShortCode_tt_event_schedule extends WPBakeryShortCode {
        }
    }
endif;