function YrmInline() {

	this.id;
}

YrmInline.prototype = new YrmMore();
YrmInline.constructor = YrmInline;

YrmInline.prototype.init = function () {

	var id = this.id;
	if(typeof readMoreArgs[id] == 'undefined') {
		console.log('Invalid Data');
		return;
	}

	var data = readMoreArgs[id];
	data['button-width'] = '100%';
	this.setData('readMoreData', data);
	this.setData('id', id);
	this.setStyles();
	this.buttonDimensions();
	this.livePreview();

	var duration = parseInt(data['animation-duration']);

	jQuery('.yrm-toggle-expand-'+id).each(function () {

		jQuery(this).toggle(function() {
			var toggleContentId = jQuery(this).attr('data-rel');
			var mustDisplay = jQuery("#"+toggleContentId).attr('data-show-status');

			if(mustDisplay == 'false') {
				jQuery("#"+toggleContentId).attr('data-show-status', true);
				jQuery("#"+toggleContentId).slideToggle(duration, 'swing', function () {

				});
			}
			var lessName = jQuery(this).find(".yrm-button-text").attr('data-less');
			jQuery(this).find(".yrm-button-text").text(data['lessName']);
			jQuery(window).trigger('YrmOpen', {'id': id});
		}, function() {
			var toggleContentId = jQuery(this).attr('data-rel');
			var mustDisplay = jQuery("#"+toggleContentId).attr('data-show-status');

			if(mustDisplay == "true") {
				jQuery("#"+toggleContentId).attr('data-show-status', false);
				jQuery("#" + toggleContentId).slideToggle(duration, 'swing', function () {

				});
			}

			var moreName = jQuery(this).find(".yrm-button-text").attr('data-more');
			jQuery(this).find(".yrm-button-text").text(data['moreName']);
			jQuery(window).trigger('YrmClose', {'id': id});
		});
	});
};