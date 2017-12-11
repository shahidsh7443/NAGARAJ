function YrmDiscountDays() {

}

YrmDiscountDays.prototype.init = function()
{
	if (!jQuery('.yrm-black-friday-wrapper').length) {
		return false;
	}
	var that = this;

	jQuery('.yrm-dont-show-again').bind('click', function(e) {
		e.preventDefault();
		jQuery('.yrm-black-friday-wrapper').remove();
		var nonce = jQuery(this).attr('data-ajaxnonce');

		var data = {
			action: 'yrmDiscountDays',
			nonce: nonce
		};
		
		jQuery.post(ajaxurl, data, function(responce) {
			
		});
	});
};

jQuery(document).ready(function() {
	var obj = new YrmDiscountDays();
	obj.init();
});