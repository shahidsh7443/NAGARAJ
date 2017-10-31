<?php

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Register meta boxes
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (! function_exists('nominee_register_meta_boxes')) :

	function nominee_register_meta_boxes( $meta_boxes ) {
		/**
		 * Prefix of meta keys (optional)
		 */

		$prefix = 'nominee_';

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format quote
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

		$meta_boxes[] = array(
			'id' => 'tt-post-format-quote',

			// Meta box title - Will appear at the drag and drop handle bar. Required.
			'title' => esc_html__( 'Post Quote Settings', 'nominee' ),

			// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
			'pages' => array( 'post'),

			// Where the meta box appear: normal (default), advanced, side. Optional.
			'context' => 'normal',

			// Order of meta box: high (default), low. Optional.
			'priority' => 'high',

			// Auto save: true, false (default). Optional.
			'autosave' => true,

			// List of meta fields
			'fields' => array(
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Qoute Text', 'nominee' ),
					// Field ID, i.e. the meta key
					'id'    => "{$prefix}qoute",
					'desc'  => esc_html__( 'Write Your Qoute Here', 'nominee' ),
					'type'  => 'textarea',
					// Default value (optional)
					'std'   => ''
				),
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Qoute Author/Company', 'nominee' ),
					// Field ID, i.e. the meta key
					'id'    => "{$prefix}qoute_author",
					'desc'  => esc_html__( 'Write Qoute Author or Company name', 'nominee' ),
					'type'  => 'text',
					// Default value (optional)
					'std'   => ''
				),
				array(
					// Field name - Will be used as label
					'name'  => esc_html__( 'Author/Company URL', 'nominee' ),
					// Field ID, i.e. the meta key
					'id'    => "{$prefix}qoute_author_url",
					'desc'  => esc_html__( 'Write Qoute Author or Company URL', 'nominee' ),
					'type'  => 'text',
					// Default value (optional)
					'std'   => ''
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format link
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-link',
			'title' => esc_html__( 'Post Link Settings', 'nominee' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'  => esc_html__( 'Link text', 'nominee' ),
					'id'    => "{$prefix}link_text",
					'desc'  => esc_html__( 'Write Your Link Text, leave blank to show only url', 'nominee' ),
					'type'  => 'text',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Link URL*', 'nominee' ),
					'id'    => "{$prefix}link",
					'desc'  => esc_html__( 'Write Your Link, e.g: http://yourlink.com', 'nominee' ),
					'type'  => 'text',
					'std'   => ''
				),

				array(
					'name'     => esc_html__( 'Link title', 'nominee' ),
					'id'       => "{$prefix}link_title",
					'desc'     => esc_html__( 'Write link title, appear as link title attribute', 'nominee' ),
					'type'     => 'text',
					'std'      => ''
				),

				array(
					'name'     => esc_html__( 'Link target', 'nominee' ),
					'id'       => "{$prefix}link_target",
					'type'     => 'select',
					'options'  => array(
						'_self' => esc_html__( 'Self', 'nominee' ),
						'_blank' => esc_html__( 'New Window', 'nominee' )
					),
					'std'         => 'self'
				)
			)
		);

		
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format audio
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-audio',
			'title' => esc_html__( 'Post Audio Settings', 'nominee' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'  => esc_html__( 'Featured Audio (.mp3)', 'nominee' ),
					'id'    => "{$prefix}featured_mp3",
					'desc'  => esc_html__( 'Upload Audio like: your-file-name.mp3', 'nominee' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Audio (.ogg)', 'nominee' ),
					'id'    => "{$prefix}featured_ogg",
					'desc'  => esc_html__( 'Upload Audio like: your-file-name.ogg', 'nominee' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Audio (.wav)', 'nominee' ),
					'id'    => "{$prefix}featured_wav",
					'desc'  => esc_html__( 'Upload Audio like: your-file-name.wav', 'nominee' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Embed Audio', 'nominee' ),
					'id'    => "{$prefix}embed_audio",
					'desc'  => esc_html__( 'Input URL for sounds, audios from Youtube, Soundcloud and all supported sites by WordPress, Supported list: http://codex.wordpress.org/Embeds', 'nominee' ),
					'type'  => 'oembed',
					'std'   => ''
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format video
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-video',
			'title' => esc_html__( 'Post Video Settings', 'nominee' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'  => esc_html__( 'Featured Video (.mp4)', 'nominee' ),
					'id'    => "{$prefix}featured_mp4",
					'desc'  => esc_html__( 'Upload Video like: your-file-name.mp4', 'nominee' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Video (.webm)', 'nominee' ),
					'id'    => "{$prefix}featured_webm",
					'desc'  => esc_html__( 'Upload Video like: your-file-name.webm', 'nominee' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Featured Video (.ogv)', 'nominee' ),
					'id'    => "{$prefix}featured_ogv",
					'desc'  => esc_html__( 'Upload Video like: your-file-name.ogv', 'nominee' ),
					'type'  => 'file_input',
					'std'   => ''
				),

				array(
					'name'  => esc_html__( 'Embed Video', 'nominee' ),
					'id'    => "{$prefix}embed_video",
					'desc'  => esc_html__( 'Enter embed code here.', 'nominee' ),
					//'type'  => 'oembed',
					'type'  => 'textarea',
					'std'   => ''
				)	
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for post format gallery
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'tt-post-format-gallery',
			'title' => esc_html__( 'Post Gallery Settings', 'nominee' ),
			'pages' => array( 'post'),
			'context' => 'normal',
			'priority' => 'high',
			'autosave' => true,
			'fields' => array(
				array(
					'name'             => esc_html__( 'Upload image from media library', 'nominee' ),
					'id'               => "{$prefix}post_gallery",
					'type'             => 'image_advanced',
					'max_file_uploads' => 6,
				)			
			)
		);



		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for page
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'page-meta-settings',
			'title' => esc_html__( 'Page Settings', 'nominee' ),
			'pages' => array( 'page', 'tt-reformation', 'tt-story', 'tt-issue'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				// header visibility option
				array(
					'name'        => esc_html__( 'Enable/Disable Page Header', 'nominee' ),
					'id'          => "{$prefix}page_header_visibility",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'header-section-show' => esc_html__( 'Header Section Show', 'nominee' ),
						'header-section-hide' => esc_html__( 'Header Section Hide', 'nominee' )
					),
					// Default selected value
					'std'         => 'header-section-show',
					// Placeholder
					'placeholder' => esc_html__( 'Select header visibility option', 'nominee' )
				),
				
				// page title visibility
				array(
					'name'        => esc_html__( 'Enable/Disable Page Title', 'nominee' ),
					'id'          => "{$prefix}page_title_visibility",
					'type'        => 'select_advanced',
					// Array of 'value' => 'Label' pairs for select box
					'options'     => array(
						'page-title-show' => esc_html__( 'Page Title Show', 'nominee' ),
						'page-title-hide' => esc_html__( 'Page Title Hide', 'nominee' )
					),
					// Default selected value
					'std'         => 'page-title-show',
					// Placeholder
					'placeholder' => esc_html__( 'Select page title visibility option', 'nominee' )
				),

				array(
					'name'             => esc_html__( 'Upload page header background', 'nominee' ),
					'id'               => "{$prefix}page_header_image",
					'type'             => 'image_advanced',
					'max_file_uploads' => 1,
					'desc'  => esc_html__( 'Dimension: 1920px x 450px', 'nominee' ),
				),

				// Background overlay option
				array(
					'name'             	=> esc_html__( 'Enable background overlay color', 'nominee' ),
					'id'               	=> "{$prefix}background_overlay",
					'type'             	=> 'radio',
					'options'     		=> array(
						'bg_overlay_enable' => esc_html__( 'Enable', 'nominee' ),
						'bg_overlay_disable' => esc_html__( 'Disable', 'nominee' )
					),
					'std'				=> 'bg_overlay_enable',
					'desc'  => esc_html__( 'Select background overlay option', 'nominee' ),
				)
			)
		);



		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for story post type
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'story-meta-settings',
			'title' => esc_html__( 'Story Settings', 'nominee' ),
			'pages' => array( 'tt-story'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(

				array(
					'name'     => esc_html__( 'Story year', 'nominee' ),
					'id'       => "{$prefix}story_year",
					'desc'     => esc_html__( 'Enter story year', 'nominee' ),
					'type'     => 'text',
					'std'      => ''
				)
			)
		);



		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for member post type
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'member-meta-settings',
			'title' => esc_html__( 'Member Settings', 'nominee' ),
			'pages' => array( 'tt-member'),
			'fields' => array(
				array(
					'name'     => esc_html__( 'Member Designation', 'nominee' ),
					'id'       => "{$prefix}member_designaion",
					'desc'     => esc_html__( 'Enter member designation', 'nominee' ),
					'type'     => 'text'
				),
				
				array(
					'name'     => esc_html__( 'Educational Qualification', 'nominee' ),
					'id'       => "{$prefix}educational_qualification",
					'desc'     => esc_html__( 'Enter educational qualification', 'nominee' ),
					'type'     => 'wysiwyg',
					'options'  => array(
						'editor_height' => 100
					)
				),

				array(
					'name'     => esc_html__( 'Address', 'nominee' ),
					'id'       => "{$prefix}member_address",
					'desc'     => esc_html__( 'Enter member address', 'nominee' ),
					'type'     => 'wysiwyg',
					'options'  => array(
						'editor_height' => 100
					)
				)
			)
		);

		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Member social settings
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'member-social-settings',
			'title' => esc_html__( 'Member Social Settings', 'nominee' ),
			'pages' => array( 'tt-member'),
			'fields' => array(
				array(
					'name'     => esc_html__( 'Facebook Link', 'nominee' ),
					'id'       => "{$prefix}facebook_link",
					'desc'     => esc_html__( 'Enter facebook page or profile link', 'nominee' ),
					'type'     => 'text'
				),
				array(
					'name'     => esc_html__( 'Twitter Link', 'nominee' ),
					'id'       => "{$prefix}twitter_link",
					'desc'     => esc_html__( 'Enter twitter profile link', 'nominee' ),
					'type'     => 'text'
				),
				array(
					'name'     => esc_html__( 'Google Plus Link', 'nominee' ),
					'id'       => "{$prefix}google_plus_link",
					'desc'     => esc_html__( 'Enter google plus profile or page link', 'nominee' ),
					'type'     => 'text'
				),
				array(
					'name'     => esc_html__( 'Linkedin Link', 'nominee' ),
					'id'       => "{$prefix}linkedin_link",
					'desc'     => esc_html__( 'Enter linkedin profile link', 'nominee' ),
					'type'     => 'text'
				),
				array(
					'name'     => esc_html__( 'Flickr Link', 'nominee' ),
					'id'       => "{$prefix}flickr_link",
					'desc'     => esc_html__( 'Enter flickr profile link', 'nominee' ),
					'type'     => 'text'
				),
				array(
					'name'     => esc_html__( 'Youtube Link', 'nominee' ),
					'id'       => "{$prefix}youtube_link",
					'desc'     => esc_html__( 'Enter youtube channel link', 'nominee' ),
					'type'     => 'text'
				)
			)
		);


		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		// Meta for event post type
		//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
		$meta_boxes[] = array(
			'id' => 'event-meta-settings',
			'title' => esc_html__( 'Event Settings', 'nominee' ),
			'pages' => array( 'tt-event'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(

				array(
	                'name'          => esc_html__( 'Event Date', 'nominee' ),
	                'id'       		=> "{$prefix}event_date",
	                'desc'			=> esc_html__('Pick your event date', 'nominee'),
	                'type'          => 'date',
	            ),

	            array(
					'name'     		=> esc_html__( 'Event start time', 'nominee' ),
					'id'       		=> "{$prefix}event_start_time",
					'type'     		=> 'select',
					'placeholder' 	=> esc_html__('Select start time', 'nominee'),
					'options'  		=> array(
						'12:15 AM' => esc_html__('12:15 AM', 'nominee'),
						'12:30 AM' => esc_html__('12:30 AM', 'nominee'),
						'12:45 AM' => esc_html__('12:45 AM', 'nominee'),
						'01:00 AM' => esc_html__('01:00 AM', 'nominee'),
						'01:15 AM' => esc_html__('01:15 AM', 'nominee'),
						'01:30 AM' => esc_html__('01:30 AM', 'nominee'),
						'01:45 AM' => esc_html__('01:45 AM', 'nominee'),
						'02:00 AM' => esc_html__('02:00 AM', 'nominee'),
						'02:15 AM' => esc_html__('02:15 AM', 'nominee'),
						'02:30 AM' => esc_html__('02:30 AM', 'nominee'),
						'02:45 AM' => esc_html__('02:45 AM', 'nominee'),
						'03:00 AM' => esc_html__('03:00 AM', 'nominee'),
						'03:15 AM' => esc_html__('03:15 AM', 'nominee'),
						'03:30 AM' => esc_html__('03:30 AM', 'nominee'),
						'03:45 AM' => esc_html__('03:45 AM', 'nominee'),
						'04:00 AM' => esc_html__('04:00 AM', 'nominee'),
						'04:15 AM' => esc_html__('04:15 AM', 'nominee'),
						'04:30 AM' => esc_html__('04:30 AM', 'nominee'),
						'04:45 AM' => esc_html__('04:45 AM', 'nominee'),
						'05:00 AM' => esc_html__('05:00 AM', 'nominee'),
						'05:15 AM' => esc_html__('05:15 AM', 'nominee'),
						'05:30 AM' => esc_html__('05:30 AM', 'nominee'),
						'05:45 AM' => esc_html__('05:45 AM', 'nominee'),
						'06:00 AM' => esc_html__('06:00 AM', 'nominee'),
						'06:15 AM' => esc_html__('06:15 AM', 'nominee'),
						'06:30 AM' => esc_html__('06:30 AM', 'nominee'),
						'06:45 AM' => esc_html__('06:45 AM', 'nominee'),
						'07:00 AM' => esc_html__('07:00 AM', 'nominee'),
						'07:15 AM' => esc_html__('07:15 AM', 'nominee'),
						'07:30 AM' => esc_html__('07:30 AM', 'nominee'),
						'07:45 AM' => esc_html__('07:45 AM', 'nominee'),
						'08:00 AM' => esc_html__('08:00 AM', 'nominee'),
						'08:15 AM' => esc_html__('08:15 AM', 'nominee'),
						'08:30 AM' => esc_html__('08:30 AM', 'nominee'),
						'08:45 AM' => esc_html__('08:45 AM', 'nominee'),
						'09:00 AM' => esc_html__('09:00 AM', 'nominee'),
						'09:15 AM' => esc_html__('09:15 AM', 'nominee'),
						'09:30 AM' => esc_html__('09:30 AM', 'nominee'),
						'09:45 AM' => esc_html__('09:45 AM', 'nominee'),
						'10:00 AM' => esc_html__('10:00 AM', 'nominee'),
						'10:15 AM' => esc_html__('10:15 AM', 'nominee'),
						'10:30 AM' => esc_html__('10:30 AM', 'nominee'),
						'10:45 AM' => esc_html__('10:45 AM', 'nominee'),
						'11:00 AM' => esc_html__('11:00 AM', 'nominee'),
						'11:15 AM' => esc_html__('11:15 AM', 'nominee'),
						'11:30 AM' => esc_html__('11:30 AM', 'nominee'),
						'11:45 AM' => esc_html__('11:45 AM', 'nominee'),
						'12:00 PM' => esc_html__('12:00 PM', 'nominee'),
						'12:15 PM' => esc_html__('12:15 PM', 'nominee'),
						'12:30 PM' => esc_html__('12:30 PM', 'nominee'),
						'12:45 PM' => esc_html__('12:45 PM', 'nominee'),
						'01:00 PM' => esc_html__('01:00 PM', 'nominee'),
						'01:15 PM' => esc_html__('01:15 PM', 'nominee'),
						'01:30 PM' => esc_html__('01:30 PM', 'nominee'),
						'01:45 PM' => esc_html__('01:45 PM', 'nominee'),
						'02:00 PM' => esc_html__('02:00 PM', 'nominee'),
						'02:15 PM' => esc_html__('02:15 PM', 'nominee'),
						'02:30 PM' => esc_html__('02:30 PM', 'nominee'),
						'02:45 PM' => esc_html__('02:45 PM', 'nominee'),
						'03:00 PM' => esc_html__('03:00 PM', 'nominee'),
						'03:15 PM' => esc_html__('03:15 PM', 'nominee'),
						'03:30 PM' => esc_html__('03:30 PM', 'nominee'),
						'03:45 PM' => esc_html__('03:45 PM', 'nominee'),
						'04:00 PM' => esc_html__('04:00 PM', 'nominee'),
						'04:15 PM' => esc_html__('04:15 PM', 'nominee'),
						'04:30 PM' => esc_html__('04:30 PM', 'nominee'),
						'04:45 PM' => esc_html__('04:45 PM', 'nominee'),
						'05:00 PM' => esc_html__('05:00 PM', 'nominee'),
						'05:15 PM' => esc_html__('05:15 PM', 'nominee'),
						'05:30 PM' => esc_html__('05:30 PM', 'nominee'),
						'05:45 PM' => esc_html__('05:45 PM', 'nominee'),
						'06:00 PM' => esc_html__('06:00 PM', 'nominee'),
						'06:15 PM' => esc_html__('06:15 PM', 'nominee'),
						'06:30 PM' => esc_html__('06:30 PM', 'nominee'),
						'06:45 PM' => esc_html__('06:45 PM', 'nominee'),
						'07:00 PM' => esc_html__('07:00 PM', 'nominee'),
						'07:15 PM' => esc_html__('07:15 PM', 'nominee'),
						'07:30 PM' => esc_html__('07:30 PM', 'nominee'),
						'07:45 PM' => esc_html__('07:45 PM', 'nominee'),
						'08:00 PM' => esc_html__('08:00 PM', 'nominee'),
						'08:15 PM' => esc_html__('08:15 PM', 'nominee'),
						'08:30 PM' => esc_html__('08:30 PM', 'nominee'),
						'08:45 PM' => esc_html__('08:45 PM', 'nominee'),
						'09:00 PM' => esc_html__('09:00 PM', 'nominee'),
						'09:15 PM' => esc_html__('09:15 PM', 'nominee'),
						'09:30 PM' => esc_html__('09:30 PM', 'nominee'),
						'09:45 PM' => esc_html__('09:45 PM', 'nominee'),
						'10:00 PM' => esc_html__('10:00 PM', 'nominee'),
						'10:15 PM' => esc_html__('10:15 PM', 'nominee'),
						'10:30 PM' => esc_html__('10:30 PM', 'nominee'),
						'10:45 PM' => esc_html__('10:45 PM', 'nominee'),
						'11:00 PM' => esc_html__('11:00 PM', 'nominee'),
						'11:15 PM' => esc_html__('11:15 PM', 'nominee'),
						'11:30 PM' => esc_html__('11:30 PM', 'nominee'),
						'11:45 PM' => esc_html__('11:45 PM', 'nominee')
					),
					'multiple'    	=> false,
					'std'         	=> '1'
				),

	            array(
					'name'     		=> esc_html__( 'Event end time', 'nominee' ),
					'id'       		=> "{$prefix}event_end_time",
					'type'     		=> 'select',
					'placeholder' 	=> 'Select end time',
					'options'  		=> array(
						'12:15 AM' => esc_html__('12:15 AM', 'nominee'),
						'12:30 AM' => esc_html__('12:30 AM', 'nominee'),
						'12:45 AM' => esc_html__('12:45 AM', 'nominee'),
						'01:00 AM' => esc_html__('01:00 AM', 'nominee'),
						'01:15 AM' => esc_html__('01:15 AM', 'nominee'),
						'01:30 AM' => esc_html__('01:30 AM', 'nominee'),
						'01:45 AM' => esc_html__('01:45 AM', 'nominee'),
						'02:00 AM' => esc_html__('02:00 AM', 'nominee'),
						'02:15 AM' => esc_html__('02:15 AM', 'nominee'),
						'02:30 AM' => esc_html__('02:30 AM', 'nominee'),
						'02:45 AM' => esc_html__('02:45 AM', 'nominee'),
						'03:00 AM' => esc_html__('03:00 AM', 'nominee'),
						'03:15 AM' => esc_html__('03:15 AM', 'nominee'),
						'03:30 AM' => esc_html__('03:30 AM', 'nominee'),
						'03:45 AM' => esc_html__('03:45 AM', 'nominee'),
						'04:00 AM' => esc_html__('04:00 AM', 'nominee'),
						'04:15 AM' => esc_html__('04:15 AM', 'nominee'),
						'04:30 AM' => esc_html__('04:30 AM', 'nominee'),
						'04:45 AM' => esc_html__('04:45 AM', 'nominee'),
						'05:00 AM' => esc_html__('05:00 AM', 'nominee'),
						'05:15 AM' => esc_html__('05:15 AM', 'nominee'),
						'05:30 AM' => esc_html__('05:30 AM', 'nominee'),
						'05:45 AM' => esc_html__('05:45 AM', 'nominee'),
						'06:00 AM' => esc_html__('06:00 AM', 'nominee'),
						'06:15 AM' => esc_html__('06:15 AM', 'nominee'),
						'06:30 AM' => esc_html__('06:30 AM', 'nominee'),
						'06:45 AM' => esc_html__('06:45 AM', 'nominee'),
						'07:00 AM' => esc_html__('07:00 AM', 'nominee'),
						'07:15 AM' => esc_html__('07:15 AM', 'nominee'),
						'07:30 AM' => esc_html__('07:30 AM', 'nominee'),
						'07:45 AM' => esc_html__('07:45 AM', 'nominee'),
						'08:00 AM' => esc_html__('08:00 AM', 'nominee'),
						'08:15 AM' => esc_html__('08:15 AM', 'nominee'),
						'08:30 AM' => esc_html__('08:30 AM', 'nominee'),
						'08:45 AM' => esc_html__('08:45 AM', 'nominee'),
						'09:00 AM' => esc_html__('09:00 AM', 'nominee'),
						'09:15 AM' => esc_html__('09:15 AM', 'nominee'),
						'09:30 AM' => esc_html__('09:30 AM', 'nominee'),
						'09:45 AM' => esc_html__('09:45 AM', 'nominee'),
						'10:00 AM' => esc_html__('10:00 AM', 'nominee'),
						'10:15 AM' => esc_html__('10:15 AM', 'nominee'),
						'10:30 AM' => esc_html__('10:30 AM', 'nominee'),
						'10:45 AM' => esc_html__('10:45 AM', 'nominee'),
						'11:00 AM' => esc_html__('11:00 AM', 'nominee'),
						'11:15 AM' => esc_html__('11:15 AM', 'nominee'),
						'11:30 AM' => esc_html__('11:30 AM', 'nominee'),
						'11:45 AM' => esc_html__('11:45 AM', 'nominee'),
						'12:00 PM' => esc_html__('12:00 PM', 'nominee'),
						'12:15 PM' => esc_html__('12:15 PM', 'nominee'),
						'12:30 PM' => esc_html__('12:30 PM', 'nominee'),
						'12:45 PM' => esc_html__('12:45 PM', 'nominee'),
						'01:00 PM' => esc_html__('01:00 PM', 'nominee'),
						'01:15 PM' => esc_html__('01:15 PM', 'nominee'),
						'01:30 PM' => esc_html__('01:30 PM', 'nominee'),
						'01:45 PM' => esc_html__('01:45 PM', 'nominee'),
						'02:00 PM' => esc_html__('02:00 PM', 'nominee'),
						'02:15 PM' => esc_html__('02:15 PM', 'nominee'),
						'02:30 PM' => esc_html__('02:30 PM', 'nominee'),
						'02:45 PM' => esc_html__('02:45 PM', 'nominee'),
						'03:00 PM' => esc_html__('03:00 PM', 'nominee'),
						'03:15 PM' => esc_html__('03:15 PM', 'nominee'),
						'03:30 PM' => esc_html__('03:30 PM', 'nominee'),
						'03:45 PM' => esc_html__('03:45 PM', 'nominee'),
						'04:00 PM' => esc_html__('04:00 PM', 'nominee'),
						'04:15 PM' => esc_html__('04:15 PM', 'nominee'),
						'04:30 PM' => esc_html__('04:30 PM', 'nominee'),
						'04:45 PM' => esc_html__('04:45 PM', 'nominee'),
						'05:00 PM' => esc_html__('05:00 PM', 'nominee'),
						'05:15 PM' => esc_html__('05:15 PM', 'nominee'),
						'05:30 PM' => esc_html__('05:30 PM', 'nominee'),
						'05:45 PM' => esc_html__('05:45 PM', 'nominee'),
						'06:00 PM' => esc_html__('06:00 PM', 'nominee'),
						'06:15 PM' => esc_html__('06:15 PM', 'nominee'),
						'06:30 PM' => esc_html__('06:30 PM', 'nominee'),
						'06:45 PM' => esc_html__('06:45 PM', 'nominee'),
						'07:00 PM' => esc_html__('07:00 PM', 'nominee'),
						'07:15 PM' => esc_html__('07:15 PM', 'nominee'),
						'07:30 PM' => esc_html__('07:30 PM', 'nominee'),
						'07:45 PM' => esc_html__('07:45 PM', 'nominee'),
						'08:00 PM' => esc_html__('08:00 PM', 'nominee'),
						'08:15 PM' => esc_html__('08:15 PM', 'nominee'),
						'08:30 PM' => esc_html__('08:30 PM', 'nominee'),
						'08:45 PM' => esc_html__('08:45 PM', 'nominee'),
						'09:00 PM' => esc_html__('09:00 PM', 'nominee'),
						'09:15 PM' => esc_html__('09:15 PM', 'nominee'),
						'09:30 PM' => esc_html__('09:30 PM', 'nominee'),
						'09:45 PM' => esc_html__('09:45 PM', 'nominee'),
						'10:00 PM' => esc_html__('10:00 PM', 'nominee'),
						'10:15 PM' => esc_html__('10:15 PM', 'nominee'),
						'10:30 PM' => esc_html__('10:30 PM', 'nominee'),
						'10:45 PM' => esc_html__('10:45 PM', 'nominee'),
						'11:00 PM' => esc_html__('11:00 PM', 'nominee'),
						'11:15 PM' => esc_html__('11:15 PM', 'nominee'),
						'11:30 PM' => esc_html__('11:30 PM', 'nominee'),
						'11:45 PM' => esc_html__('11:45 PM', 'nominee')
					),
					'multiple'    	=> false,
					'std'         	=> '1'
				),
				
				array(
					'name'          => esc_html__( 'Event Location', 'nominee' ),
	                'id'            => 'event-location',
	                'desc'			=> esc_html__('Enter event location, separated by commas (for ex. city, state)', 'nominee'),
	                'type'          => 'text',
	            ),

				array(
					'name'             	=> esc_html__( 'Location Map', 'nominee' ),
					'id'               	=> "{$prefix}event_location_map",
					'type'             	=> 'map',
					'width'        		=> '1140px', // Map width, default is 640px. You can use '%' or 'px'
				    'height'       		=> '300px', // Map height, default is 480px. You can use '%' or 'px'
				    'address_field' 	=> 'event-location', // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
				)
			)
		);


		return $meta_boxes;
	}

	add_filter( 'rwmb_meta_boxes', 'nominee_register_meta_boxes' );

endif;