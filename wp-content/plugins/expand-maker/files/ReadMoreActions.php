<?php
CLass ReadMoreActions {

	public function __construct() {

		$ajaxObj = new RadMoreAjax();
		$ajaxObj->init();
		add_action('admin_enqueue_scripts', array(new ReadMoreStyles(),'registerStyles'));
		add_action('wp_head', array($this, 'readMoreWpHead'));
		if(YRM_PKG > YRM_FREE_PKG) {
			add_action('the_content', array($this, 'postContentFiler'));
		}
		add_action('admin_notices', array($this, 'readMoreNotice'));
		add_action('network_admin_notices', array($this, 'readMoreNotice'));
		add_action('user_admin_notices', array($this, 'readMoreNotice'));
	}

	public function readMoreNotice() {

		$content = '';

		$content .= $this->blackFriday();

		echo $content;
	}

	public function blackFriday() {		

		$timeDate = new DateTime('now', new DateTimeZone('Europe/Moscow'));
		$timeNow = strtotime($timeDate->format('Y-m-d H:i:s'));
 		$startTime = '1511308500';
 		$endData = '1511826900';
 		$discountDay = get_option('yrmBlackfriday');
 		
 		if(!($timeNow > $startTime && $timeNow < $endData) || $discountDay) {
 			return '';
 		}
 		wp_register_style('yrmblackFridayCss', YRM_CSS_URL . '/blackFriday.css');
		wp_enqueue_style('yrmblackFridayCss');
		wp_register_script('yrmblackFridayJs', YRM_JAVASCRIPT . '/blackFriday.js', array());
		wp_enqueue_script('yrmblackFridayJs');
		$ajaxNonce = wp_create_nonce("yrmBalckFriday");
		ob_start();
		?>
		<div class="yrm-black-friday-wrapper">
			<div style="width: 100%; height: 100%; position: absolute;z-index: 1'" onclick="window.open('http://edmion.esy.es#saleBlackFriday')">

			</div>
			<a href="http://edmion.esy.es#saleBlackFriday" target="_blank" class="yrm-wisit-web-site" style="
			    position: absolute;
			    right: 133px;
			    bottom: 7px;
			    color: white;
			    z-index: 999;
			">Visit our website</a>
			<span class="yrm-dont-show-again" data-ajaxnonce="<?php echo $ajaxNonce;?>">Don’t show again.</span>
		</div>
		<?php
		$content = ob_get_contents();
		ob_get_clean();

		return $content;
	}

	public function readMoreWpHead() {

		echo '<script>readMoreArgs = []</script>';
	}

	public function postContentFiler($cotent) {
		global $post;
		$postId = $post->ID;
		global $wpdb;
		$getSavedSql = $wpdb->prepare("SELECT * FROM ".$wpdb->prefix."expm_maker_pages WHERE post_id = %d", $postId);
		$result = $wpdb->get_row($getSavedSql, ARRAY_A);
		
		if(!empty($result)) {
			return ReadMoreContentManager::doFilterContent($cotent, $post, $result);
		}

		return $cotent;
	}
}