<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  // if direct access

/**
 * Scripts and styles
 */
class SP_WCF_Scripts_AND_Style{

	/**
	 * Script version number
	 */
	protected $version;

	/**
	 * Initialize the class
	 */
	public function __construct() {
		$this->version = '20170501';

		add_action( 'wp_enqueue_scripts', array( $this, 'sp_wp_carousel_free_script' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	/**
	 * Front Scripts
	 */
	public function sp_wp_carousel_free_script() {
		// CSS Files
		wp_enqueue_style( 'slick', SP_WP_CAROUSEL_FREE_URL . 'assets/css/slick.css', false, $this->version );
		wp_enqueue_style( 'font-awesome', SP_WP_CAROUSEL_FREE_URL . 'assets/css/font-awesome.min.css', false, $this->version );
		wp_enqueue_style( 'wp-carousel-free-style', SP_WP_CAROUSEL_FREE_URL . 'assets/css/style.css', false, $this->version );

		//JS Files
		wp_enqueue_script( 'slick-main', SP_WP_CAROUSEL_FREE_URL . 'assets/js/slick.min.js', array( 'jquery' ), $this->version, true );
	}

	/**
	 * Admin Scripts
	 */
	public function admin_scripts() {

		if ( 'options-general.php?page=about-wp-carousel'  ) {
			//CSS Files
			wp_enqueue_style( 'font-awesome', SP_WP_CAROUSEL_FREE_URL . 'assets/css/font-awesome.min.css', false, $this->version );
			wp_enqueue_style( 'sp-wp-carousel-admin-style', SP_WP_CAROUSEL_FREE_URL . 'assets/css/admin.css', false, $this->version );

			//JS Files
			wp_enqueue_script( 'jquery-masonry');
			wp_enqueue_script( 'sp-wp-carousel-admin-js', SP_WP_CAROUSEL_FREE_URL . 'assets/js/admin.js', array( 'jquery'	), $this->version, true );
		}
	}


}
new SP_WCF_Scripts_AND_Style();