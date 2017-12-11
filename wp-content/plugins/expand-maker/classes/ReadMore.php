<?php
abstract class ReadMore {

	public function getRemoveOptions() {

		return array();
	}

	public function includeOptionsBlock($dataObj) {

	}

	public static function RemoveOption($option) {

		global $YrmRemoveOptions;
		return isset($YrmRemoveOptions[$option]);
	}
}