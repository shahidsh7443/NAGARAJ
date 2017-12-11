<?php
class ReadMoreData {

	private $id;

	public function __call($name, $args) {

		$methodPrefix = substr($name, 0, 3);
		$methodProperty = lcfirst(substr($name,3));

		if ($methodPrefix=='get') {
			return $this->$methodProperty;
		}
		else if ($methodPrefix=='set') {
			$this->$methodProperty = $args[0];
		}
	}

	public function getSavedOptions() {

		$data = array();
		$id = $this->getId();

		if(!isset($id)) {
			return $data;
		}
		global $wpdb;

		$getSavedSql = $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."expm_maker WHERE id = %d", $id);
		$result = $wpdb->get_row($getSavedSql, ARRAY_A);

		if(empty($result)) {
			return $data;
		}

		$data['type'] = $result['type'];
		$data['expm-title'] = $result['expm-title'];
		$data['button-width'] = $result['button-width'];
		$data['button-height'] = $result['button-height'];
		$data['animation-duration'] = $result['animation-duration'];
		$options = json_decode($result['options'], true);

		return $data+$options;
	}

	public static function params() {

		$horizontalAlign = array(
			"left"=>"Left",
			"center"=>"Center",
			"right"=>"Right"
		);

		$hoverEffect = array(
			'' => 'No effect',
			'flash' => 'Flash',
			'pulse' => 'Pulse',
			'rubberBand' => 'RubberBand',
			'shake' => 'Shake',
			'tada' => 'Tada',
			'jello' => 'Jello'
		);

		$vertical = array(
			"top"=>"Top",
			"bottom"=>"Bottom"
		);

		$googleFonts = array(
			'Diplomata SC' => 'Diplomata SC',
			'flavors'=>'Flavors',
			'Open Sans'=> 'Open Sans',
			'Droid Sans'=>'Droid Sans',
			'Droid Serif'=>'Droid Serif',
			'chewy'=>'Chewy',
			'oswald' => 'Oswald',
			'Dancing Script'=> 'Dancing Script',
			'Merriweather'=>'Merriweather',
			'Roboto Condensed'=>'Roboto Condensed',
			'Oswald'=>'Oswald',
			'PT Sans'=>'PT Sans',
			'Montserrat'=>'Montserrat'
		);

		$btnFontWeight = array(
			'normal' => 'Normal',
			'bold' => 'Bold',
			'bolder' => 'Bolder',
			'900' => '900',
			'800' => '800',
			'700' => '700',
			'600' => '600',
			'500' => '500',
			'400' => '400',
			'300' => '300',
			'200' => '200',
			'100' => '100',
			'initial' => 'Initial',
			'inherit' => 'Inherit',
		);
		$selectedPost = self::getSelectedPost();

		$arrays = array(
			"horizontalAlign"=>$horizontalAlign,
			"vertical"=>$vertical,
			'googleFonts'=>$googleFonts,
			'hoverEffect'=>$hoverEffect,
			'selectedPost'=>$selectedPost,
			'btnFontWeight'=>$btnFontWeight
		);
		return $arrays;
	}

	public function defaultData() {

		$dataDefault = array(
			'button-width' => '100px',
			'button-height' => '32px',
			'animation-duration' => '1000',
			'font-size' => '14px',
			'btn-background-color' => '#81d742',
			'btn-text-color' => '',
			'btn-border-radius' => '20px',
			'horizontal' => 'center',
			'vertical' => 'bottom',
			'hidden-content-bg-color' => '',
			'hidden-content-text-color' => '',
			'show-only-mobile' => '',
			'type' => 'button',
			'expander-font-family' => 'Diplomata SC',
			'hover-effect' => '',
			'btn-hover-text-color' => 'btn-hover-text-color',
			'btn-hover-bg-color' => 'btn-hover-bg-color',
			'yrm-selected-post' => ''
		);


		/*popup default values*/
		$dataDefault['yrm-popup-theme'] = 'colorbox1';
		$dataDefault['yrm-popup-width'] = '';
		$dataDefault['yrm-popup-height'] = '';
		$dataDefault['yrm-popup-max-width'] = '';
		$dataDefault['yrm-popup-max-height'] = '';
		$dataDefault['yrm-popup-initial-width'] = '300';
		$dataDefault['yrm-popup-initial-height'] = '100';
		$dataDefault['yrm-popup-esc-key'] = true;
		$dataDefault['yrm-popup-close-button'] = true;
		$dataDefault['yrm-popup-overlay-click'] = true;
		$dataDefault['yrm-popup-overlay-color'] = '';
		$dataDefault['yrm-popup-content-color'] = '';
		$dataDefault['yrm-popup-content-padding'] = 0;
		$dataDefault['yrm-btn-font-weight'] = 'normal';
		return $dataDefault;
	}

	public static function getAllData() {

		global $wpdb;

		$results = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."expm_maker ORDER BY ID DESC", ARRAY_A);

		return $results;
	}

	public static function getDataArrayFormDb() {

		$dbData = self::getAllData();
		$data['id'] = $dbData['id'];
		$data['type'] = $dbData['type'];
		$data['title'] = $dbData['title'];
		$data['width'] = $dbData['width'];
		$data['height'] = $dbData['height'];
		$data['duration'] = $dbData['duration'];

		return array_merge($data, $dbData);
	}

	public function getOptionsData() {

		$id = $this->getId();

		if(isset($id)) {
			return $this->getSavedOptions();
		}
		else {
			return $this->defaultData();
		}
	}

	public function getOptionValue($optionKey, $isBool = false) {

		$savedOptions = $this->getSavedOptions();

		$defaultOptions = $this->defaultData();

		if (isset($savedOptions[$optionKey])) {
			$elementValue = $savedOptions[$optionKey];
		}
		else if(!empty($savedOptions) && $isBool) {
			/*for checkbox elements when they does not exist in the saved data*/
			$elementValue = @$defaultOptions[$optionKey];
		}
		else if(isset($defaultOptions[$optionKey])){
			$elementValue =  $defaultOptions[$optionKey];
		}
		else {
			$elementValue = '';
		}

		if($isBool) {
			$elementValue = $this->boolToChecked($elementValue);
		}

		return $elementValue;
	}

	public function boolToChecked($var) {
		return ($var?'checked':'');
	}

	public function delete() {

		global $wpdb;
		$id = $this->getId();
		$wpdb->delete($wpdb->prefix.'expm_maker', array('id'=>$id), array('%d'));
	}

	public static function getSelectedPost() {

		$args = array(
			'offset'           => 0,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_status'      => 'publish',
			'suppress_filters' => true
		);

		$args["post_type"] = 'post';
		$args["posts_per_page"] = 1000;
		$pages = get_posts($args);
		$postData = array();

		if(!empty($pages)) {
			foreach ($pages as $page) {
				$postData[$page->ID] = $page->post_name;
			}
		}
	
		return $postData;
	}
}