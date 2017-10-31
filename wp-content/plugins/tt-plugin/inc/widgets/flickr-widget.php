<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

    //---------------------------------------------------------------------------
    // Flickr widget
    //---------------------------------------------------------------------------

    class TT_Flickr_Photo_Widget extends WP_Widget {

        public function __construct() {
            parent::__construct(
                'fivegrid_flickr_widget', // Base ID
                __('Nominee Flickr Photo Widget', 'tt-pl-textdomain'), // Name
                array('description' => esc_html__('Displays flickr photo', 'tt-pl-textdomain'),) // Args
            );
        }

        public function form($instance) {
            $defaults = array(
                'title'       => '',
                'photo_limit' => '9',
                'flickr_id'   => '52617155@N08'
            );

            $instance = wp_parse_args( (array) $instance, $defaults ); ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title: ', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>">
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('flickr_id'); ?>"><?php esc_html_e('Flickr ID: ', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('flickr_id'); ?>"
                       name="<?php echo $this->get_field_name('flickr_id'); ?>" type="text"
                       value="<?php echo esc_attr($instance['flickr_id']); ?>">
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('photo_limit'); ?>"><?php esc_html_e('Photo Limit: ', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('photo_limit'); ?>"
                       name="<?php echo $this->get_field_name('photo_limit'); ?>" type="text"
                       value="<?php echo esc_attr($instance['photo_limit']); ?>">
            </p>

        <?php }

        public function update($new_instance, $old_instance) {

            $instance = $old_instance;

            $instance[ 'title' ] = (!empty($new_instance[ 'title' ])) ? strip_tags($new_instance[ 'title' ]) : '';
            $instance[ 'photo_limit' ] = (!empty($new_instance[ 'photo_limit' ])) ? strip_tags($new_instance[ 'photo_limit' ]) : '9';
            $instance[ 'flickr_id' ] = (!empty($new_instance[ 'flickr_id' ])) ? strip_tags($new_instance[ 'flickr_id' ]) : '52617155@N08';

            return $instance;
        }

        public function widget($args, $instance) {

            echo $args[ 'before_widget' ];
            $title = apply_filters('widget_title', $instance[ 'title' ]);
            if (!empty($title)) {
                echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
            }
            ?>

            <ul class="tt-flickr-photo" data-flickr-id="<?php echo esc_attr($instance[ 'flickr_id' ]); ?>"
                data-photo-limit="<?php echo esc_attr($instance[ 'photo_limit' ]); ?>"></ul>

            <?php
            echo $args[ 'after_widget' ];
        }
    }


    // register widgets
    if (!function_exists('tt_flickr_photo_widget')) {
        function tt_flickr_photo_widget()
        {
            register_widget('TT_Flickr_Photo_Widget');
        }

        add_action('widgets_init', 'tt_flickr_photo_widget');
    }