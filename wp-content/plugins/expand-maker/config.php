<?php
if(!class_exists('YrmConfig')) {

	class YrmConfig {

		public function __construct() {

			$this->init();
		}

		public function getDirectoryName() {

			$baseName = plugin_basename(__FILE__);
			$readMoreDirectoryName = explode('/', $baseName);

			if(isset($readMoreDirectoryName[0])) {
				return $readMoreDirectoryName[0];
			}
			else {
				return '';
			}
		}

		private function init() {

			if(!defined('ABSPATH')) {
				exit();
			}

			$readMoreDirectoryName = $this->getDirectoryName();

			if(!defined('YRM_PLUGIN_PREFIX')) {
				define("YRM_PLUGIN_PREFIX", $readMoreDirectoryName);
			}

			if(!defined('YRM_MAIN_FILE')) {
				define("YRM_MAIN_FILE", $readMoreDirectoryName . '.php');
			}

			if(!defined('YRM_PATH')) {
				define("YRM_PATH", dirname(__FILE__) . '/');
			}
			
			if(!defined('YRM_CLASSES')) {
				define("YRM_CLASSES", YRM_PATH . 'classes/');
			}

			if(!defined('YRM_FILES')) {
				define("YRM_FILES", YRM_PATH . 'files/');
			}

			if(!defined('YRM_CSS')) {
				define("YRM_CSS", YRM_PATH . 'css/');
			}

			if(!defined('YRM_VIEWS')) {
				define("YRM_VIEWS", YRM_PATH . 'views/');
			}

			if(!defined('YRM_JAVASCRIPT_PATH')) {
				define("YRM_JAVASCRIPT_PATH", YRM_PATH . 'js/');
			}

			if(!defined('YRM_URL')) {
				define("YRM_URL", plugins_url('', __FILE__) . '/');
			}

			if(!defined('YRM_JAVASCRIPT')) {
				define("YRM_JAVASCRIPT", YRM_URL . 'js/');
			}

			if(!defined('YRM_CSS_URL')) {
				define("YRM_CSS_URL", YRM_URL . 'css/');
			}

			if(!defined('YRM_LANG')) {
				define("YRM_LANG", 'yrm_lang');
			}

			if(!defined('YRM_VERSION')) {
				define("EXPM_VERSION", 2.091);
			}

			if(!defined('YRM_VERSION_TEXT')) {
				define("YRM_VERSION_TEXT", '2.0.9');
			}

			if(!defined('EXPM_VERSION_PRO')) {
				define("EXPM_VERSION_PRO", 1.15);
			}

			if(!defined('YRM_FREE_PKG')) {
				define("YRM_FREE_PKG", 1);
			}

			if(!defined('YRM_SILVER_PKG')) {
			 	define("YRM_SILVER_PKG", 2);
			}

			if(!defined('YRM_GOLD_PKG')) {
			 	define("YRM_GOLD_PKG", 3);
			}

			require_once(dirname(__FILE__).'/config-pkg.php');

			if(!defined('YRM_PRO_URL')) {
				define("YRM_PRO_URL", 'http://edmion.esy.es/');
			}
		}

		public static function readMoreHeaderScript() {

			$headerScript = "EXPM_VERSION=" . EXPM_VERSION;
			if(YRM_PKG > YRM_FREE_PKG) {
				$headerScript = "EXPM_VERSION_PRO=" . EXPM_VERSION_PRO.";";
				$headerScript .= "EXPM_AJAX_URL='" . admin_url( 'admin-ajax.php' )."'";
			}
			$headerScript .= "
			function yrmAddEvent(element, eventName, fn) {
                if (element.addEventListener)
                    element.addEventListener(eventName, fn, false);
                else if (element.attachEvent)
                    element.attachEvent('on' + eventName, fn);
	        }";
			return "<script type=\"text/javascript\">
			$headerScript
		</script>";
		}
	}

	$configInit = new YrmConfig();
}