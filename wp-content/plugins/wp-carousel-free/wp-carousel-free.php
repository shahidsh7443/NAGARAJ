<?php
/*
Plugin Name: WordPress Carousel
Plugin URI: https://shapedplugin.com/plugin/wordpress-carousel-pro
Description: A Powerful Carousel plugin for WordPress that enables you to create beautiful carousel by using regular media uploader.
Author: ShapedPlugin
Author URI: http://shapedplugin.com/
Version: 1.4.6
*/


/**
 * Directory Constant
 */
define( 'SP_WP_CAROUSEL_FREE_URL', plugins_url( '/' ) . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'SP_WP_CAROUSEL_FREE_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Include files
 */
require_once( SP_WP_CAROUSEL_FREE_DIR . 'inc/functions.php' );

/* Plugin Action Links */
function sp_wp_carousel_free_action_links( $links ) {
	$links[] = '<a target="_blank" href="https://shapedplugin.com/plugin/wordpress-carousel-pro" style="color: red; font-weight: 600;">Go
Pro!</a>';

	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'sp_wp_carousel_free_action_links' );

// Redirect after active
function sp_wp_carousel_free_active_redirect( $plugin ) {
	if ( $plugin == plugin_basename( __FILE__ ) ) {
		exit( wp_redirect( admin_url( 'options-general.php' ) ) );
	}
}
add_action( 'activated_plugin', 'sp_wp_carousel_free_active_redirect' );


function add_wcffree_options_framwrork() {
	add_options_page( 'About WordPress Carousel', 'About WP Carousel', 'manage_options', 'about-wp-carousel', 'about_wp_carousel_content' );
}
add_action( 'admin_menu', 'add_wcffree_options_framwrork' );

if ( is_admin() ) : // Load only if we are viewing an admin page

// Function to generate options page
	function about_wp_carousel_content() { ?>

        <div class="wrap about-wrap sp-wpc-help">
            <h1><?php _e( 'Welcome to WordPress Carousel!', 'wp-carousel' ); ?></h1>
            <p class="about-text"><?php _e( 'Thank you for installing WordPress Carousel! You\'re now running the most popular WordPress Carousel plugin.
This video will help you get started with the plugin.', 'wp-carousel' ); ?></p>

            <hr>

            <div class="headline-feature feature-video">
                <iframe width="940" height="528" src="https://www.youtube.com/embed/hX84VfMKOBA" frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="sp-wpc-shortcode">
                <table class="table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                    <tr>
                        <th>Attribute</th>
                        <th>Default value</th>
                        <th>Options</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>ids</td>
                        <td></td>
                        <td></td>
                        <td>"ids" will be generated automatically when we create gallery.</td>
                    </tr>
                    <tr>
                        <td>items</td>
                        <td>5</td>
                        <td>Numeric value only e.g. 4</td>
                        <td>Number of columns to show for the carousel. Screen larger than 1200px.</td>
                    </tr>
                    <tr>
                        <td>items_desktop</td>
                        <td>4</td>
                        <td>Numeric value only e.g. 3</td>
                        <td>Number of columns to show on Desktop. Screen smaller than 1200px.</td>
                    </tr>
                    <tr>
                        <td>items_desktop_small</td>
                        <td>3</td>
                        <td>Numeric value only e.g. 2</td>
                        <td>Number of columns to show on Small Desktop. Screen smaller than 980px.</td>
                    </tr>
                    <tr>
                        <td>items_tablet</td>
                        <td>2</td>
                        <td>Numeric value only e.g. 1</td>
                        <td>Number of columns to show on Tablet. Screen smaller than 768px.</td>
                    </tr>
                    <tr>
                        <td>items_mobile</td>
                        <td>1</td>
                        <td>Numeric value only e.g. 1</td>
                        <td>Number of columns to show on Mobile. Screen smaller than 4780px.</td>
                    </tr>
                    <tr>
                        <td>bullets</td>
                        <td>false</td>
                        <td>true / false</td>
                        <td>Show / Hide pagination dots.</td>
                    </tr>
                    <tr>
                        <td>nav</td>
                        <td>true</td>
                        <td>true / false</td>
                        <td>Show / Hide navigation arrows.</td>
                    </tr>
                    <tr>
                        <td>auto_play</td>
                        <td>true</td>
                        <td>true / false</td>
                        <td>On / Off carousel AutoPlay</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <br>
            <br>

            <hr>

            <div class="feature-section three-col">
                <div class="col">
                    <div class="sp-wpc-feature sp-wpc-text-center">
                        <i class="fa fa-life-bouy" aria-hidden="true"></i>
                        <h3>Need any Support?</h3>
                        <p>Our Expert Support Team is always ready to help you out promptly.</p>
                        <a href="https://wordpress.org/support/plugin/wp-carousel-free" target="_blank" class="button
                        button-primary">Support Forum</a>
                    </div>
                </div>
                <div class="col">
                    <div class="sp-wpc-feature sp-wpc-text-center">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        <h3>Looking for Documentation?</h3>
                        <p>We have detailed documentation on every aspects of WordPress Carousel.</p>
                        <a href="https://shapedplugin.com/docs/wordpress-carousel/" target="_blank" class="button
                        button-primary">Documentation</a>
                    </div>
                </div>
                <div class="col">
                    <div class="sp-wpc-feature sp-wpc-text-center">
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                        <h3>Like This Plugin?</h3>
                        <p>If you like WordPress Carousel please leave us a 5 star rating. It helps us much.</p>
                        <a href="https://wordpress.org/support/plugin/wp-carousel-free/reviews/?filter=5#new-post" target="_blank" class="button button-primary">Rate the Plugin</a>
                    </div>
                </div>
            </div>

            <hr>

            <div class="sp-wpc-pro-features">
                <h2 class="sp-wpc-text-center">Upgrade to WordPress Carousel Pro!</h2>
                <p class="sp-wpc-text-center sp-wpc-pro-subtitle">We've added 100+ extra features in our Premium Version of this plugin. Let’s see some amazing features.</p>
                <div class="feature-section three-col">
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Slide any Post Type</h3>
                            <p>You can display posts from multiple post types (posts, pages, products, portfolio etc.). With WordPress Carousel Pro, you will be able to add unlimited carousels into a page, post, widget or anywhere you want easily.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Display any Taxonomy</h3>
                            <p>Do you want to display some featured category to your visitors? WordPress Carousel Pro will help you to show any category, tag or custom taxonomy in output using just a shortcode attribute.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Image Carousel with Caption</h3>
                            <p>You can easily create Image Carousel using your regular media uploader. This plugin has a nice combination in WordPress regular gallery. You can add image caption, description, alternative text, URL etc.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Lightbox for Images</h3>
                            <p>We've added Lightbox features in Premium Version of this plugin. You only have to turn on Lightbox option via shortcode. It can help you to zoom smoothly your images with a bottom title. It's fully responsive and super easy to use!</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Link to Carousel Items</h3>
                            <p>You can link to each carousel item easily even, external link opening with new tab option. You can add a link to each carousel in media manager. Just add your link there, your carousel items will line to that URL.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Ticker Carousel</h3>
                            <p>This is an another amazing feature of WordPress Carousel Pro. It slides with the infinite loop, with no Pause. You can set the speed and if the carousel pauses on hover.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Image Re-Size Options</h3>
                            <p>You can change the default size of your carousel images via an attribute. New uploaded image will be resized to the specified dimensions what you set.
                                Your images will be hard cropped equally.  </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>7+ Different Testimonial Styles</h3>
                            <p>Different Testimonial styles have been added to Premium Version which can help to show amazingly your clients' testimonials. Hence you need to define an attribute in carousel shortcode.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>One Page Slider</h3>
                            <p>You are able to build image slider by using image width and height size attribute. It's like image slider. You can add slider title & description too. You can change slider colors with your dream color!</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Unlimited Colors & Styling</h3>
                            <p>Premium version of this plugin supports unlimited colors & styling options! You can add any color that matches your current theme or website. You can use the color name or color HEX code.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Post Carousel with Excerpt</h3>
                            <p>With Pro version of this plugin, You can create post excerpt carousel slider as well. This will show a featured image, some amount of post content & a read more button. This is cool for a large type of post!</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Carousel from WooCommerce Product Category</h3>
                            <p>Using Premium Version of this plugin, you can add WooCommerce product carousel slider in anywhere. This will show product image, product description & read more button.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Essential Carousel Settings</h3>
                            <p>You can set how many posts to scroll at a time in the carousel or show, the transition speed, autoplay, swipe, pause on hover, infinite loop, mouse draggable, and many other settings.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>Responsive Mobile Friendly</h3>
                            <p>WordPress Carousel Pro is 100% responsive and with the premium version of the plugin, you can set the number of post columns to show simultaneously in the carousel according to the specific device resolution.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sp-wpc-feature">
                            <h3><span class="dashicons dashicons-yes"></span>24/7 Fast & Friendly Support</h3>
                            <p>A fully dedicated 24/7 Support Forum is ready to help you instantly whenever you face with any issues to configure or use the plugin. They will help you until you become happy.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="sp-wpc-upgrade-sticky-footer sp-wpc-text-center">
                <p><a href="https://shapedplugin.com/demo/wordpress-carousel-pro/" target="_blank" class="button
                button-primary">Live Demo</a> <a href="https://shapedplugin.com/plugin/wordpress-carousel-pro/" target="_blank" class="button button-primary">Upgrade Now</a></p>
            </div>

        </div>

		<?php
	}

endif;  // EndIf is_admin()


register_activation_hook( __FILE__, 'sp_wp_carousel_free_plugin_activate' );
add_action( 'admin_init', 'sp_wp_carousel_free_plugin_redirect' );

function sp_wp_carousel_free_plugin_activate() {
	add_option( 'sp_wp_carousel_free_do_activation_redirect', true );
}

function sp_wp_carousel_free_plugin_redirect() {
	if ( get_option( 'sp_wp_carousel_free_do_activation_redirect', false ) ) {
		delete_option( 'sp_wp_carousel_free_do_activation_redirect' );
		if ( ! isset( $_GET['activate-multi'] ) ) {
			wp_redirect( "options-general.php?page=about-wp-carousel" );
		}
	}
}