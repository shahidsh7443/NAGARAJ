<?php
class ReadMoreIncludeManager {

	private $data;
	private $id;
	private $toggleContent;
	private $rel;
	private $dataObj;

	public function __call($name, $args) {

		$methodPrefix = substr($name, 0, 3);
		$methodProperty = lcfirst(substr($name,3));

		if ($methodPrefix == 'get') {
			return $this->$methodProperty;
		}
		else if ($methodPrefix == 'set') {
			$this->$methodProperty = $args[0];
		}
	}

	private function randomName($length = 10) {

		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}

	public function render() {

		$rel = 'yrm-'.$this->randomName(5);
		$this->setRel($rel);

		$data = $this->includeData();
		$data .= $this->includeScripts();
		$loadDataAction = array(
			'isAdmin' => is_admin()
		);
		
		do_action('readMoreLoaded', $loadDataAction);
		return $data;
	}

	private function includeData(){

		$allContent = '';
		$data = $this->getData();
		$buttonData = $this->buttonContent();
		$accordionContent = $this->accordionContent();

		if(isset($data['vertical']) && $data['vertical'] == 'top') {
			$allContent = $buttonData.$accordionContent;
			return $allContent;
		}

		$allContent = $accordionContent.$buttonData;

		return $allContent;
	}

	private function accordionContent() {

		$rel = $this->getRel();
		$id = $this->getId();

		$content = $this->getToggleContent();
		return "<div class=\"yrm-content yrm-content-$id\" id='".$rel."' data-show-status='false'>
			<div id='yrm-cntent-$id' class='yrm-inner-content-wrapper'>$content</div>
		</div>";
	}

	private function buttonContent() {

		$data = $this->getData();
		$id = $this->getId();
		$rel = $this->getRel();
		$more = $data['moreName'];
		$type = $data['type'];

		$button = "<div class='yrm-btn-wrapper yrm-btn-wrapper-".$id."'>
			<span class='yrm-toggle-expand  yrm-toggle-expand-$id' data-rel='".$rel."'>
				<span class=\"yrm-button-text-$id yrm-button-text\">$more</span>
			</span>
		</div>";

		if($type == 'inline') {
			$button = "<div class='yrm-btn-wrapper yrm-btn-wrapper-".$id."'>
				<span class='yrm-toggle-expand  yrm-toggle-expand-$id' data-rel='".$rel."' style='border: none; width: 100%;'>
					<span class=\"yrm-button-text-$id yrm-button-text\">$more</span>
				</span>
			</div>";
		}
		return $button;
	}

	private function includeScripts() {

		$id = $this->getId();
		$savedData = $this->getData();
		$type = $savedData['type'];

		echo "<script>
			readMoreArgs[$id] = ".json_encode($savedData).";
		</script>";
		
		wp_enqueue_script('jquery');
		wp_register_script('readMoreJs', YRM_JAVASCRIPT.'yrmMore.js', array(), EXPM_VERSION);
		wp_register_script('yrmMorePro', YRM_JAVASCRIPT.'yrmMorePro.js', array(), EXPM_VERSION);
		wp_enqueue_script('readMoreJs');
		if(YRM_PKG > 1) {
			wp_register_script('yrmGoogleFonts', YRM_JAVASCRIPT.'yrmGoogleFonts.js');
			wp_enqueue_script('yrmGoogleFonts');
			wp_enqueue_script('yrmMorePro');
		}
		wp_register_style('readMoreStyles', YRM_CSS_URL."readMoreStyles.css");
		wp_enqueue_style('readMoreStyles');
		wp_register_style('yrmanimate', YRM_CSS_URL."animate.css");
		wp_enqueue_style('yrmanimate');

		if($type == 'popup') {
			wp_register_script('YrmPopup', YRM_JAVASCRIPT.'YrmPopup.js', array('readMoreJs'), EXPM_VERSION);
			wp_enqueue_script('YrmPopup');
			wp_register_script('jquery.colorbox', YRM_JAVASCRIPT.'jquery.colorbox.js', array('YrmPopup'), EXPM_VERSION);
			wp_enqueue_script('jquery.colorbox');
			wp_register_style('colorbox.css', YRM_CSS_URL."colorbox/colorbox.css");
			wp_enqueue_style('colorbox.css');

			echo "<script>
				yrmAddEvent(window,'load',function(){	
					var obj = new YrmPopup();
					obj.id = $id;
					obj.init();
				});
			</script>";
		}
		if($type == 'button') {
			wp_register_script('YrmClassic', YRM_JAVASCRIPT.'YrmClassic.js', array('readMoreJs'), EXPM_VERSION);
			wp_enqueue_script('YrmClassic');
			echo "<script>
				yrmAddEvent(window,'load',function(){	
					var obj = new YrmClassic();
					obj.id = $id;
					obj.init();
				});
			</script>";
		}
		if($type == 'inline') {
			wp_register_script('YrmInline', YRM_JAVASCRIPT.'YrmInline.js', array('readMoreJs'), EXPM_VERSION);
			wp_enqueue_script('YrmInline');
			echo "<script>
				yrmAddEvent(window,'load',function(){	
					var obj = new YrmInline();
					obj.id = $id;
					obj.init();
				});
			</script>";
		}
		$this->includeCustomStyle();
	}

	public function includeCustomStyle() {

		$id = $this->getId();
		$savedData = $this->getData();
		$type = $savedData['type'];
		$dataObj = $this->getDataObj();
	
		if($type == 'button') {
			$hoverBgColor = $dataObj->getOptionValue('btn-hover-bg-color');
			$hoverTextColor = $dataObj->getOptionValue('btn-hover-text-color');

			if($dataObj->getOptionValue('hover-effect')) {
				echo "<style>
					.yrm-toggle-expand-$id:hover {
						background-color: $hoverBgColor !important;
						color: $hoverTextColor !important;
					}
				</style>";
			}
		}
	}

}