<?php
class RadMoreAjax {
	
	public function init() {
		
		add_action('wp_ajax_delete_rm', array($this, 'deleteRm'));
		add_action('wp_ajax_yrmDiscountDays', array($this, 'yrmDiscountDays'));
	}

	public function yrmDiscountDays() {
		check_ajax_referer('yrmBalckFriday', 'nonce');
		echo update_option('yrmBlackfriday', 1);
		die();
	}
	
	public function deleteRm() {

		check_ajax_referer('YrmNonce', 'ajaxNonce');
		$id  = (int)$_POST['readMoreId'];

		$dataObj = new ReadMoreData();
		$dataObj->setId($id);
		$dataObj->delete();

		echo '';
		die();
	}
}