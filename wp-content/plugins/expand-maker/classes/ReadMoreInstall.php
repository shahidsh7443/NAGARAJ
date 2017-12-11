<?php
class ReadMoreInstall
{
	public static function createTables($blogId = '') {

		global $wpdb;
		$createTableStr = "CREATE TABLE IF NOT EXISTS ". $wpdb->prefix.$blogId;

		$expanderDataBase = $createTableStr."expm_maker (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`type` varchar(255) NOT NULL,
			`expm-title` varchar(255) NOT NULL,
			`button-width` varchar(255) NOT NULL,
			`button-height` varchar(255) NOT NULL,
			`animation-duration` varchar(255) NOT NULL,
			`options` text NOT NULL,
			PRIMARY KEY (id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";

		$expmPages = $createTableStr."expm_maker_pages (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`post_id` int(11) NOT NULL,
			`button_id` int(11) NOT NULL,
			`options` text NOT NULL,
			PRIMARY KEY (id)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

		$wpdb->query($expanderDataBase);
		$wpdb->query($expmPages);
	}

	public static function install() {

		self::createTables();
		update_option('EXPM_VERSION', EXPM_VERSION);
		if(is_multisite() && get_current_blog_id() == 1) {
			global $wp_version;
			if($wp_version > '4.6.0') {
				$sites = get_sites();
			}
			else {
				$sites = wp_get_sites();
			}
			foreach($sites as $site) {
				if($wp_version > '4.6.0') {
					$blogId = $site->blog_id."_";
				}
				else {
					$blogId = $site['blog_id']."_";
				}
				if($blogId != 1) {
					self::createTables($blogId);
				}
			}
		}
	}

	public static function uninstall() {

		$obj = new self();
		$obj->uninstallTables();
		if (is_multisite() && get_current_blog_id() == 1) {
			global $wp_version;
			if($wp_version > '4.6.0') {
				$sites = get_sites();
			}
			else {
				$sites = wp_get_sites();
			}
			foreach($sites as $site) {
				if($wp_version > '4.6.0') {
					$blogId = $site->blog_id."_";
				}
				else {
					$blogId = $site['blog_id']."_";
				}
				$obj->uninstallTables($blogId);
			}
		}
	}

	public function uninstallTables($blogId = '') {

		if(YRM_PKG == YRM_FREE_PKG) {
			return false;
		}
		global $wpdb;
		$expanderTable = $wpdb->prefix.$blogId."expm_maker";
		$expmSql = "DROP TABLE ". $expanderTable;

		$expanderPagesTable = $wpdb->prefix.$blogId."expm_maker_pages";
		$expmPagesSql = "DROP TABLE ". $expanderPagesTable;
		
		$wpdb->query($expmPagesSql);
		$wpdb->query($expmSql);
		return true;
	}
	
	public static function udateToNewVersion() {
		
		global $wpdb;

		$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."expander_maker ORDER BY ID DESC", ARRAY_A);
		if(!empty($results[0])) {
			$results = $results[0];
		}
		
		$width = '100px';
		$height = '32px';
		$duration = 1000;
		$options = array();
		
 		if(!empty($results['width'])) {
			$width = $results['width'];
		}
		if(!empty($results['height'])) {
			$height = $results['height'];
		}
		if(!empty($results['duration'])) {
			$duration = $results['duration'];
		}
		$options = $results['options'];
		$title = 'read more';

		$width = sanitize_text_field($width);
		$height = sanitize_text_field($height);
		$duration = sanitize_text_field($duration);
	
		$data = array(
			'type' => 'button',
			'expm-title' => $title,
			'button-width' => $width,
			'button-height' => $height,
			'animation-duration' => $duration,
			'options' => $options
		);

		$format = array(
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
		);

	    $wpdb->insert($wpdb->prefix.'expm_maker', $data, $format);
	}
}