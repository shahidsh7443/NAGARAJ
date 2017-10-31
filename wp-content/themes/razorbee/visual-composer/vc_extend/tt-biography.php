<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

if (function_exists('vc_map')) :

	vc_map( array(
        'name'        => esc_html__( 'TT President Biography', 'nominee' ),
        'base'        => 'tt_biography',
        'icon'        => 'fa fa-user',
        'category'    => esc_html__( 'TT Elements', 'nominee' ),
        'description' => esc_html__( 'Displays Biography', 'nominee' ),
        'params'      => array(
            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Leader photo', 'nominee'),
                'param_name' => 'leader_photo',
                'description' => esc_html__( 'Upload photo from media library', 'nominee' )
            ),

            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Party Leader Name', 'nominee' ),
                'param_name'  => 'party_leader_name',
                'holder'      => 'h4',
                'description' => esc_html__( 'Enter leader/head of party member name', 'nominee' )
            ),
            
            array(
                'type'        => 'textfield',
                'heading'     => esc_html__( 'Designation', 'nominee' ),
                'param_name'  => 'leader_designation',
                'holder'      => 'h5',
                'description' => esc_html__( 'Enter leader/head of party member designation', 'nominee' )
            ),

            array(
                'type'        => 'textarea_html',
                'heading'     => esc_html__( 'Biography details', 'nominee' ),
                'param_name'  => 'content',
                'description' => esc_html__( 'Enter details of biography', 'nominee' )
            ),

            array(
                'type' => 'attach_image',
                'heading' => esc_html__( 'Sign', 'nominee'),
                'param_name' => 'leader_sign',
                'description' => esc_html__( 'Upload scan copy of sign from media library', 'nominee' )
            ),
        	
			array(
                'type'          => 'param_group',
                'heading'       => esc_html__('Biography info', 'nominee'),
                'param_name'    => 'bio_info',
                'description'   => esc_html__('Enter biography info (click toggle row to input data)', 'nominee'),
                'group'         => 'Biography Info',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Info label', 'nominee'),
                        'param_name' => 'label',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter info label', 'nominee' )
                    ),
                    array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Info value', 'nominee'),
						'param_name' => 'value',
                        'admin_label' => true,
						'description' => esc_html__( 'Enter info value', 'nominee' )
					)
                ),
            ),

            
            // social links tab
            array(
                'type'          => 'param_group',
                'heading'       => esc_html__('Social Info', 'nominee'),
                'param_name'    => 'social_icon',
                'description'   => esc_html__('Enter biography info (click toggle row to input data)', 'nominee'),
                'group'         => 'Social links',
                'params' => array(
                    array(
                        'type'       => 'iconpicker',
                        'heading'    => esc_html__('Fontawesome', 'nominee'),
                        'param_name' => 'fontawesome_icon',
                        'settings'   => array(
                            'type' => 'fontawesome'
                        ),
                        'admin_label' => true,
                        'description' => esc_html__( 'Fontawesome icon lists. Pickup your choice.', 'nominee'
                        )
                    ),

                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Link', 'nominee' ),
                        'param_name'  => 'link',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter social profile/page link', 'nominee' )
                    )
                ),
            ),


            // education info tab
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Title Label', 'nominee' ),
                'param_name'    => 'education_label',
                'description'   => esc_html__( 'Enter title of education', 'nominee' ),
                'group'         => 'Education info',
                'value'         => esc_html__('Education', 'nominee')
            ),
            
            array(
                'type'          => 'param_group',
                'heading'       => esc_html__('Education info', 'nominee'),
                'param_name'    => 'education_info',
                'description'   => esc_html__('Enter education info (click toggle row to input data)', 'nominee'),
                'group'         => 'Education info',
                'params' => array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Exam or subject name', 'nominee' ),
                        'param_name'  => 'exam_name',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter exam or subject name', 'nominee' )
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'School or university name', 'nominee' ),
                        'param_name'  => 'organization_name',
                        'description' => esc_html__( 'Enter studied school or university name', 'nominee' )
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Academic Year', 'nominee' ),
                        'param_name'  => 'academic_year',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter exam academic year, e.g: (1992-1995)', 'nominee' )
                    ),
                    array(
                        'type'        => 'textarea',
                        'heading'     => esc_html__( 'Short description', 'nominee' ),
                        'param_name'  => 'education_description',
                        'description' => esc_html__( 'Enter short description about education', 'nominee' )
                    )
                ),
            ),



            // career info tab
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Title Label', 'nominee' ),
                'param_name'    => 'career_label',
                'description'   => esc_html__( 'Enter title of career', 'nominee' ),
                'group'         => 'Career info',
                'value'         => esc_html__('Political Career', 'nominee')
            ),
            
            array(
                'type'          => 'param_group',
                'heading'       => esc_html__('Career info', 'nominee'),
                'param_name'    => 'career_info',
                'description'   => esc_html__('Enter career info (click toggle row to input data)', 'nominee'),
                'group'         => 'Career info',
                'params' => array(
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Career title', 'nominee' ),
                        'param_name'  => 'career_title',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter career title', 'nominee' )
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Designation', 'nominee' ),
                        'param_name'  => 'career_designation',
                        'description' => esc_html__( 'Enter career designation', 'nominee' )
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__( 'Career period', 'nominee' ),
                        'param_name'  => 'career_period',
                        'admin_label' => true,
                        'description' => esc_html__( 'Enter career period, e.g: (1992-1995)', 'nominee' )
                    ),
                    array(
                        'type'        => 'textarea',
                        'heading'     => esc_html__( 'Short description', 'nominee' ),
                        'param_name'  => 'career_description',
                        'description' => esc_html__( 'Enter short description about career', 'nominee' )
                    )
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
        class WPBakeryShortCode_tt_Biography extends WPBakeryShortCode {
        }
    }

endif; // function_exists( 'vc_map' )