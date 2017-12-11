<?php
Class ReadMorePages {

	public $functionsObj;
	public $readMoreDataObj;

	public function __construct() {
		
	}

	public function mainPage() {

		require_once(YRM_VIEWS."readMorePagesView.php");
	}

	public function addNewPage() {

		require_once(YRM_VIEWS."readMoreAddNew.php");
	}

	public function morePlugins() {

		require_once(YRM_VIEWS."morePlugins.php");
	}

	public function addNewButtons() {

		global $YrmRemoveOptions;
		$id = @$_GET['readMoreId'];
		if(!empty($_GET['type'])) {
			$className = ucfirst($_GET['type']).'TypeReadMore';

			if(file_exists(YRM_CLASSES.$className.'.php')) {
				require_once(YRM_CLASSES.$className.'.php');
				$typeObj = new $className();
				$YrmRemoveOptions = $typeObj->getRemoveOptions();
			}
		}
		$dataObj = $this->readMoreDataObj;
		$dataObj->setId($id);
		$buttonWidth = $dataObj->getOptionValue('button-width');
		$buttonHeight = $dataObj->getOptionValue('button-height');
		$fontSize = $dataObj->getOptionValue('font-size');
		$yrmBtnHoverAnimate = $dataObj->getOptionValue('yrm-btn-hover-animate');
		$yrmBtnFontWeight = $dataObj->getOptionValue('yrm-btn-font-weight');
		$animationDuration = $dataObj->getOptionValue('animation-duration');
		$btnBackgroundColor = $dataObj->getOptionValue('btn-background-color');
		$btnTextColor = $dataObj->getOptionValue('btn-text-color');
		$expanderFontFamily = $dataObj->getOptionValue('expander-font-family');
		$btnBorderRadius = $dataObj->getOptionValue('btn-border-radius');
		$horizontal = $dataObj->getOptionValue('horizontal');
		$vertical = $dataObj->getOptionValue('vertical');
		$hiddenContentBgColor = $dataObj->getOptionValue('hidden-content-bg-color');
		$hiddenContentTextColor = $dataObj->getOptionValue('hidden-content-text-color');
		$showOnlyMobile = $dataObj->getOptionValue('show-only-mobile', true);
		$hoverEffect = $dataObj->getOptionValue('hover-effect', true);
		$btnHoverTextColor = $dataObj->getOptionValue('btn-hover-text-color');
		$btnHoverBgColor= $dataObj->getOptionValue('btn-hover-bg-color');
		$buttonForPost = $dataObj->getOptionValue('button-for-post', true);
		$yrmSelectedPost= $dataObj->getOptionValue('yrm-selected-post');
		$hideAfterWordCount= $dataObj->getOptionValue('hide-after-word-count');

		$readMoreTitle = $dataObj->getOptionValue('expm-title');

		$dataParams = $dataObj->getOptionsData();
		$functions = $this->functionsObj;
		require_once(YRM_VIEWS."readMoreAddNewButton.php");
	}
}