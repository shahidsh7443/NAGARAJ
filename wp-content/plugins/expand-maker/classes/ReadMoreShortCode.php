<?php
class ReadMoreShortCode {
	
	public function __construct() {
		add_shortcode('expander_maker', array($this, 'doShortCode'));
	}

	public function doShortCode($args, $content) {

		$id = 1;
		$content = do_shortcode($content);
		$moreName = 'Read more';
		$lessName = 'Read less';

		if(isset($args['id'])) {
			$id = $args['id'];
		}
		if(!empty($args['more'])) {
			$moreName = $args['more'];
		}
		if(!empty($args['less'])) {
			$lessName = $args['less'];
		}


		$dataObj = new ReadMoreData();
		$dataObj->setId($id);
		$savedData = $dataObj->getSavedOptions();

		if(empty($savedData)) {
			return $content;
		}
		$savedData['moreName'] = $moreName;
		$savedData['lessName'] = $lessName;

		$includeManagerObj = new ReadMoreIncludeManager();
		$includeManagerObj->setId($id);
		$includeManagerObj->setData($savedData);
		$includeManagerObj->setDataObj($dataObj);
		$includeManagerObj->setToggleContent($content);
		return $includeManagerObj->render();
	}
}