<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

    //---------------------------------------------------------------------------
    // Author widget
    //---------------------------------------------------------------------------

    class TT_Author_Widget extends WP_Widget {
        public function __construct() {
            parent::__construct(
                'tt_author_widget', // Base ID
                __('Nominee Author Widget', 'tt-pl-textdomain'), // Name
                array('description' => __('Displays author/user info', 'tt-pl-textdomain')) // Args
            );
        }

        public function form($instance) {
            $defaults = array(
                'title'                 => '',
                'authors'               => '',
                'authors_description'   => '',
                'authors_social'        => ''
            );

            $instance = wp_parse_args( (array) $instance, $defaults ); ?>

            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title: ', 'tt-pl-textdomain'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>">
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('authors'); ?>"><?php esc_html_e('Select Author', 'tt-pl-textdomain'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('authors'); ?>" name="<?php echo $this->get_field_name('authors'); ?>" style="width:100%;">
                    
                    <?php 
                        $args = array(
                            'blog_id'      => $GLOBALS['blog_id'],
                            'orderby'      => 'nicename'
                        );
                        $blogusers = get_users($args);

                        foreach ( $blogusers as $user ) { ?>
                            <option value="<?php echo esc_attr( $user->ID) ?>" <?php selected($instance['authors'], $user->ID); ?>><?php echo esc_html( $user->user_nicename ) ?></option>
                       <?php } 
                    ?>

                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('authors_description'); ?>"><?php esc_html_e('Show author description ? ', 'tt-pl-textdomain'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('authors_description'); ?>" name="<?php echo $this->get_field_name('authors_description'); ?>" style="width:100%;">
                    <option value="yes" <?php selected($instance['authors_description'], 'yes'); ?>><?php esc_html_e('Yes', 'tt-pl-textdomain') ?></option>
                    <option value="no" <?php selected($instance['authors_description'], 'no'); ?>><?php esc_html_e('No', 'tt-pl-textdomain') ?></option>
                </select>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('authors_social'); ?>"><?php esc_html_e('Show author social ? ', 'tt-pl-textdomain'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('authors_social'); ?>" name="<?php echo $this->get_field_name('authors_social'); ?>" style="width:100%;">
                    <option value="yes" <?php selected($instance['authors_social'], 'yes'); ?>><?php esc_html_e('Yes', 'tt-pl-textdomain') ?></option>
                    <option value="no" <?php selected($instance['authors_social'], 'no'); ?>><?php esc_html_e('No', 'tt-pl-textdomain') ?></option>
                </select>
            </p>


        <?php }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance[ 'title' ] = (!empty($new_instance[ 'title' ])) ? strip_tags($new_instance[ 'title' ]) : '';
            $instance[ 'authors' ] = (!empty($new_instance[ 'authors' ])) ? strip_tags($new_instance[ 'authors' ]) : '';
            $instance[ 'authors_description' ] = (!empty($new_instance[ 'authors_description' ])) ? strip_tags($new_instance[ 'authors_description' ]) : '';
            $instance[ 'authors_social' ] = (!empty($new_instance[ 'authors_social' ])) ? strip_tags($new_instance[ 'authors_social' ]) : '';

            return $instance;
        }

        public function widget($args, $instance) {

            echo $args[ 'before_widget' ];
            $title = apply_filters('widget_title', $instance[ 'title' ]);
            if (!empty($title)) {
                echo $args[ 'before_title' ] . $title . $args[ 'after_title' ];
            }
            ?>

            <div class="author-info-wrapper">
                <div class="author-avatar">
                    <?php echo get_avatar( get_the_author_meta( 'user_email', $instance[ 'authors' ] ), apply_filters( 'fivegrid_widget_author_bio_avatar_size', 170 ) ); 
                    ?>
                </div>

                <?php 

                // author display name or nicename
                $display_name = get_the_author_meta( 'display_name', $instance[ 'authors' ] );

                if ($display_name) { 
                    echo '<h4>'.get_the_author_meta( 'display_name', $instance[ 'authors' ] ). '</h4>';
                } else {
                    echo '<h4>'.get_the_author_meta( 'user_nicename', $instance[ 'authors' ] ). '</h4>';
                } 

                // author description
                if (isset($instance[ 'authors_description' ])  && $instance[ 'authors_description' ] == 'yes') {
                    echo '<p>'.get_the_author_meta( 'description', $instance[ 'authors' ] ).'</p>';
                }
                ?>


                <?php if (isset($instance[ 'authors_social' ]) && $instance[ 'authors_social' ] == 'yes') { ?>
                    <div class="social-links author-social-links">
                        <ul class="list-inline">
                            <?php 
                                $facebook_profile = get_the_author_meta( 'facebook_profile' );
                                if ( $facebook_profile && $facebook_profile != '' ) {
                                    echo '<li class="facebook"><a href="' . esc_url($facebook_profile) . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
                                }

                                $twitter_profile = get_the_author_meta( 'twitter_profile' );
                                if ( $twitter_profile && $twitter_profile != '' ) {
                                    echo '<li class="twitter"><a href="' . esc_url($twitter_profile) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
                                }

                                $google_profile = get_the_author_meta( 'google_profile' );
                                if ( $google_profile && $google_profile != '' ) {
                                    echo '<li class="google"><a href="' . esc_url($google_profile) . '" rel="author" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
                                }

                                $linkedin_profile = get_the_author_meta( 'linkedin_profile' );
                                if ( $linkedin_profile && $linkedin_profile != '' ) {
                                    echo '<li class="linkedin"><a href="' . esc_url($linkedin_profile) . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
                                }

                                $instagram_profile = get_the_author_meta( 'instagram_profile' );
                                if ( $instagram_profile && $instagram_profile != '' ) {
                                    echo '<li class="instagram"><a href="' . esc_url($instagram_profile) . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                <?php } ?>
            </div> <!-- /author-info-wrapper -->

            <?php
            echo $args[ 'after_widget' ];
        }
    }


    // register widgets
    if (!function_exists('tt_author_widget_register')) {
        function tt_author_widget_register() {
            register_widget('TT_Author_Widget');
        }

        add_action('widgets_init', 'tt_author_widget_register');
    }