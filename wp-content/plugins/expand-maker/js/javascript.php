<?php
Class ExpmJs {

	public function __construct() {
		add_action('admin_enqueue_scripts', array($this,'registerScripts'));
	}

	public function registerScripts($hook) {
		wp_register_script('bootstrap.min', YRM_JAVASCRIPT.'bootstrap.min.js', array('wp-color-picker'));
		wp_register_script('yrmGoogleFonts', YRM_JAVASCRIPT.'yrmGoogleFonts.js');
		wp_register_script('readMoreJs', YRM_JAVASCRIPT.'yrmMore.js');
		wp_register_script('yrmMorePro', YRM_JAVASCRIPT.'yrmMorePro.js', array('readMoreJs'));
		wp_register_script('yrmBackend', YRM_JAVASCRIPT.'yrmBackend.js', array());

		if($hook == 'toplevel_page_readMore' || $hook == 'read-more_page_addNew'|| $hook == 'read-more_page_button') {
			wp_enqueue_script('jquery');
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_script('bootstrap.min');
			wp_enqueue_script('yrmBackend');
			$ajaxNonce = wp_create_nonce("YrmNonce");
			wp_localize_script('yrmBackend', 'yrmBackendData', array('nonce' => $ajaxNonce));
			if(YRM_PKG > YRM_FREE_PKG) {
				wp_enqueue_script('yrmGoogleFonts');
				wp_enqueue_script('yrmMorePro');
			}
			wp_enqueue_script('readMoreJs');
		}
	}

}

$jsObj = new ExpmJs();