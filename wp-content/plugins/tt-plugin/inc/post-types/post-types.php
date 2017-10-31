<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register reformation post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_reformation_post_type() {

        $labels = array(
            'name'               => _x('Reformation', 'tt-pl-textdomain'),
            'singular_name'      => _x('Reformation', 'tt-pl-textdomain'),
            'menu_name'          => __('Reformation', 'tt-pl-textdomain'),
            'parent_item_colon'  => __('Parent Reformation:', 'tt-pl-textdomain'),
            'all_items'          => __('All Reformation', 'tt-pl-textdomain'),
            'view_item'          => __('View Reformation', 'tt-pl-textdomain'),
            'add_new_item'       => __('Add New Reformation', 'tt-pl-textdomain'),
            'add_new'            => __('Add New', 'tt-pl-textdomain'),
            'edit_item'          => __('Edit Reformation', 'tt-pl-textdomain'),
            'update_item'        => __('Update Reformation', 'tt-pl-textdomain'),
            'search_items'       => __('Search Reformation', 'tt-pl-textdomain'),
            'not_found'          => __('No Reformation found', 'tt-pl-textdomain'),
            'not_found_in_trash' => __('No Reformation found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => __('Reformation', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array('tt-reformation-cat'),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-schedule',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'reformation' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-reformation', $args);
    }

    add_action('init', 'tt_reformation_post_type');



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register taxonomy for reformation 
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_register_taxonomy_reformation_cat() {

        $labels = array(
            'name'                          => _x( 'Category', 'tt-pl-textdomain' ),
            'singular_name'                 => _x( 'Category', 'tt-pl-textdomain' ),
            'search_items'                  => _x( 'Search Category', 'tt-pl-textdomain' ),
            'popular_items'                 => _x( 'Popular Category', 'tt-pl-textdomain' ),
            'all_items'                     => _x( 'All Categories', 'tt-pl-textdomain' ),
            'parent_item'                   => _x( 'Parent Category', 'tt-pl-textdomain' ),
            'parent_item_colon'             => _x( 'Parent Category:', 'tt-pl-textdomain' ),
            'edit_item'                     => _x( 'Edit Category', 'tt-pl-textdomain' ),
            'update_item'                   => _x( 'Update Category', 'tt-pl-textdomain' ),
            'add_new_item'                  => _x( 'Add New Category', 'tt-pl-textdomain' ),
            'new_item_name'                 => _x( 'New Category', 'tt-pl-textdomain' ),
            'separate_items_with_commas'    => _x( 'Separate categories with commas', 'tt-pl-textdomain' ),
            'add_or_remove_items'           => _x( 'Add or remove categories', 'tt-pl-textdomain' ),
            'choose_from_most_used'         => _x( 'Choose from most used categories', 'tt-pl-textdomain' ),
            'menu_name'                     => _x( 'Categories', 'tt-pl-textdomain' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_ui'           => true,
            'show_tagcloud'     => false,
            'show_admin_column' => true,
            'hierarchical'      => true,
            //'rewrite'           => true,
            'rewrite'           => array( 'slug' => 'reformation-category' ),
            'query_var'         => true
        );

        register_taxonomy( 'tt-reformation-cat', array('tt-reformation'), $args );
    }

    add_action( 'init', 'tt_register_taxonomy_reformation_cat' );


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register Issue post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_issue_post_type() {

        $labels = array(
            'name'               => _x('Issue', 'tt-pl-textdomain'),
            'singular_name'      => _x('Issue', 'tt-pl-textdomain'),
            'menu_name'          => __('Issue', 'tt-pl-textdomain'),
            'parent_item_colon'  => __('Parent Issue:', 'tt-pl-textdomain'),
            'all_items'          => __('All Issue', 'tt-pl-textdomain'),
            'view_item'          => __('View Issue', 'tt-pl-textdomain'),
            'add_new_item'       => __('Add New Issue', 'tt-pl-textdomain'),
            'add_new'            => __('Add New', 'tt-pl-textdomain'),
            'edit_item'          => __('Edit Issue', 'tt-pl-textdomain'),
            'update_item'        => __('Update Issue', 'tt-pl-textdomain'),
            'search_items'       => __('Search Issue', 'tt-pl-textdomain'),
            'not_found'          => __('No Issue found', 'tt-pl-textdomain'),
            'not_found_in_trash' => __('No Issue found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => __('Issue', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array('tt-issue-cat'),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-megaphone',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'issue' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-issue', $args);
    }

    add_action('init', 'tt_issue_post_type');


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register taxonomy for issue
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_register_taxonomy_issue_cat() {

        $labels = array(
            'name'                          => _x( 'Category', 'tt-pl-textdomain' ),
            'singular_name'                 => _x( 'Category', 'tt-pl-textdomain' ),
            'search_items'                  => _x( 'Search Category', 'tt-pl-textdomain' ),
            'popular_items'                 => _x( 'Popular Category', 'tt-pl-textdomain' ),
            'all_items'                     => _x( 'All Categories', 'tt-pl-textdomain' ),
            'parent_item'                   => _x( 'Parent Category', 'tt-pl-textdomain' ),
            'parent_item_colon'             => _x( 'Parent Category:', 'tt-pl-textdomain' ),
            'edit_item'                     => _x( 'Edit Category', 'tt-pl-textdomain' ),
            'update_item'                   => _x( 'Update Category', 'tt-pl-textdomain' ),
            'add_new_item'                  => _x( 'Add New Category', 'tt-pl-textdomain' ),
            'new_item_name'                 => _x( 'New Category', 'tt-pl-textdomain' ),
            'separate_items_with_commas'    => _x( 'Separate categories with commas', 'tt-pl-textdomain' ),
            'add_or_remove_items'           => _x( 'Add or remove categories', 'tt-pl-textdomain' ),
            'choose_from_most_used'         => _x( 'Choose from most used categories', 'tt-pl-textdomain' ),
            'menu_name'                     => _x( 'Categories', 'tt-pl-textdomain' ),
        );

        $args = array(
            'labels'            => $labels,
            'public'            => true,
            'show_in_nav_menus' => true,
            'show_ui'           => true,
            'show_tagcloud'     => false,
            'show_admin_column' => true,
            'hierarchical'      => true,
            'rewrite'           => array('slug' => 'issue-category'),
            'query_var'         => true
        );

        register_taxonomy( 'tt-issue-cat', array('tt-issue'), $args );
    }

    add_action( 'init', 'tt_register_taxonomy_issue_cat' );



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register event post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_event_post_type() {

        $labels = array(
            'name'               => _x('Event', 'tt-pl-textdomain'),
            'singular_name'      => _x('Event', 'tt-pl-textdomain'),
            'menu_name'          => __('Events', 'tt-pl-textdomain'),
            'parent_item_colon'  => __('Parent Event:', 'tt-pl-textdomain'),
            'all_items'          => __('All Events', 'tt-pl-textdomain'),
            'view_item'          => __('View Event', 'tt-pl-textdomain'),
            'add_new_item'       => __('Add New Event', 'tt-pl-textdomain'),
            'add_new'            => __('Add New', 'tt-pl-textdomain'),
            'edit_item'          => __('Edit Event', 'tt-pl-textdomain'),
            'update_item'        => __('Update Event', 'tt-pl-textdomain'),
            'search_items'       => __('Search Event', 'tt-pl-textdomain'),
            'not_found'          => __('No Event found', 'tt-pl-textdomain'),
            'not_found_in_trash' => __('No Event found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => __('Event', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array(),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-calendar-alt',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'event' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-event', $args);
    }

    add_action('init', 'tt_event_post_type');



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register story post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_story_post_type() {

        $labels = array(
            'name'               => _x('Story', 'tt-pl-textdomain'),
            'singular_name'      => _x('Story', 'tt-pl-textdomain'),
            'menu_name'          => __('Stories', 'tt-pl-textdomain'),
            'parent_item_colon'  => __('Parent Story:', 'tt-pl-textdomain'),
            'all_items'          => __('All Stories', 'tt-pl-textdomain'),
            'view_item'          => __('View Story', 'tt-pl-textdomain'),
            'add_new_item'       => __('Add New Story', 'tt-pl-textdomain'),
            'add_new'            => __('Add New', 'tt-pl-textdomain'),
            'edit_item'          => __('Edit Story', 'tt-pl-textdomain'),
            'update_item'        => __('Update Story', 'tt-pl-textdomain'),
            'search_items'       => __('Search Story', 'tt-pl-textdomain'),
            'not_found'          => __('No Story found', 'tt-pl-textdomain'),
            'not_found_in_trash' => __('No Story found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => __('Story', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array(),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-editor-ol',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'story' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-story', $args);
    }

    add_action('init', 'tt_story_post_type');



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// Register member post type
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    function tt_member_post_type() {

        $labels = array(
            'name'               => _x('Member', 'tt-pl-textdomain'),
            'singular_name'      => _x('Member', 'tt-pl-textdomain'),
            'menu_name'          => __('Members', 'tt-pl-textdomain'),
            'parent_item_colon'  => __('Parent Member:', 'tt-pl-textdomain'),
            'all_items'          => __('All Members', 'tt-pl-textdomain'),
            'view_item'          => __('View Member', 'tt-pl-textdomain'),
            'add_new_item'       => __('Add New Member', 'tt-pl-textdomain'),
            'add_new'            => __('Add New', 'tt-pl-textdomain'),
            'edit_item'          => __('Edit Member', 'tt-pl-textdomain'),
            'update_item'        => __('Update Member', 'tt-pl-textdomain'),
            'search_items'       => __('Search Member', 'tt-pl-textdomain'),
            'not_found'          => __('No Member found', 'tt-pl-textdomain'),
            'not_found_in_trash' => __('No Member found in Trash', 'tt-pl-textdomain'),
        );
        $args = array(
            'description'         => __('Member', 'tt-pl-textdomain'),
            'labels'              => $labels,
            'supports'            => array('title', 'editor', 'page-attributes','thumbnail', 'comments'),
            'taxonomies'          => array(),
            'hierarchical'        => FALSE,
            'public'              => TRUE,
            'show_ui'             => TRUE,
            'show_in_menu'        => TRUE,
            'show_in_nav_menus'   => TRUE,
            'show_in_admin_bar'   => TRUE,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-admin-users',
            'can_export'          => TRUE,
            'has_archive'         => FALSE,
            'exclude_from_search' => TRUE,
            'publicly_queryable'  => TRUE,
            'rewrite'             => array( 'slug' => 'member' ),
            'capability_type'     => 'post',
        );

        register_post_type('tt-member', $args);
    }

    add_action('init', 'tt_member_post_type');