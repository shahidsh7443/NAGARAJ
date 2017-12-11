<?php
class InlineTypeReadMore extends ReadMore {

	public function getRemoveOptions() {

		return array('button-width' => 1,'button-height' => 1, 'btn-background-color' => 1);
	}

	public static function params() {

		$data = array();

		return $data;
	}

	public function includeOptionsBlock($dataObj) {

	}
}