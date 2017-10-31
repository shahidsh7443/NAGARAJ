<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

	if ( function_exists( 'vc_map' ) ) :

		$category_list = array();

		$category_list[ esc_html__( 'Select a post category', 'nominee' ) ] = '';

		foreach ( get_terms( 'category' ) as $term ) :
			$category_list [ $term->name ] = $term->term_id;
		endforeach;

		// TT Category post element
	    vc_map( array(
	        'name'        => esc_html__( 'TT Post Category', 'nominee' ),
	        'base'        => 'tt_post_category',
	        'icon'        => 'fa fa-folder',
	        'category'    => esc_html__( 'TT Elements', 'nominee' ),
	        'description' => esc_html__( 'Show off category post', 'nominee' ),
	        'params'      => array(
	            array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Select Category', 'nominee' ),
					'param_name'  => 'category_id',
					'value'       => $category_list,
					'admin_label' => true,
					'description' => esc_html__( 'Select category to show category post', 'nominee' )
				),

				array(
	                'type'        => 'dropdown',
	                'heading'     => esc_html__( 'Featured image visibility', 'nominee' ),
	                'param_name'  => 'thumbnail_visibility',
	                'value'       => array(
	                    esc_html__('Select visibility option', 'nominee') => '',
	                    esc_html__('Visible', 'nominee') => 'visible',
	                    esc_html__('Hidden', 'nominee')  => 'hidden'
	                ),
	                'std'		  => 'visible',
	                'description' => esc_html__( 'If do not like to show featured image then select hidden to hide image', 'nominee' )
	            ),

	           	array(
	                'type'        => 'dropdown',
	                'heading'     => esc_html__( 'Category name visibility', 'nominee' ),
	                'param_name'  => 'title_visibility',
	                'value'       => array(
	                    esc_html__('Select visibility option', 'nominee') => '',
	                    esc_html__('Visible', 'nominee') => 'visible',
	                    esc_html__('Hidden', 'nominee')  => 'hidden'
	                ),
	                'std'		  => 'visible',
	                'description' => esc_html__( 'If do not like to show default category name then select hidden to hide category name', 'nominee' )
	            ),

				array(
	                'type'          => 'textfield',
	                'heading'       => esc_html__( 'Post limit', 'nominee' ),
	                'param_name'    => 'post_limit',
	                'description'   => esc_html__( 'Enter post number to show', 'nominee' ),
	                'admin_label' 	=> true,
	                'value'			=> 3
	            ),

	            array(
	                'type'        => 'dropdown',
	                'heading'     => esc_html__( 'View All link visibility', 'nominee' ),
	                'param_name'  => 'view_all_visibility',
	                'value'       => array(
	                    esc_html__('Select visibility option', 'nominee') => '',
	                    esc_html__('Visible', 'nominee') => 'visible',
	                    esc_html__('Hidden', 'nominee')  => 'hidden'
	                ),
	                'std'		  => 'visible',
	                'description' => esc_html__( 'If do not like to show view all link then select hidden to hide link', 'nominee' )
	            ),

	            array(
	                'type'          => 'css_editor',
	                'heading'       => esc_html__( 'Css', 'nominee' ),
	                'param_name'    => 'css',
	                'group'         => esc_html__( 'Design options', 'nominee' ),
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
        class WPBakeryShortCode_tt_Post_Category extends WPBakeryShortCode{
        }
    }
endif;