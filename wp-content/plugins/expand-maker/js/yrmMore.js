function YrmMore() {

	this.data = [];
}

YrmMore.prototype.setData = function (dataName, value) {

	this.data[dataName] = value;
};

YrmMore.prototype.getData = function(dataName) {

	return this.data[dataName];
};

YrmMore.prototype.binding = function() {
	var thaT = this;

	this.styles();

};

YrmMore.prototype.setStyles = function () {

	var data = this.getData('readMoreData');
	var id = this.getData('id');

	this.setChengHorizontalAlign(".yrm-btn-wrapper-"+id,data['horizontal']);

	this.setFontSize(".yrm-button-text-"+id, data['font-size']);
	this.setFontWeight(".yrm-button-text-"+id, data['yrm-btn-font-weight']);
	if(typeof this.proInit == 'function') {
		this.proInit();
	}
	if(data['yrm-btn-hover-animate']) {
		jQuery('.yrm-btn-wrapper-'+id).attr('data-animate', 'animated '+data['yrm-btn-hover-animate']);
	}
	
	this.buttonHoverEffect();
};

YrmMore.prototype.buttonHoverEffect = function() {
	var id = this.getData('id');
	jQuery('.yrm-btn-wrapper-'+id).hover(function() {
		var effect = jQuery(this).attr('data-animate');
		jQuery(this).addClass(effect);
	}, function() {
		var effect = jQuery(this).attr('data-animate');
		jQuery(this).removeClass(effect);
	})
};

YrmMore.prototype.buttonDimensions = function() {

	var data = this.getData('readMoreData');
	var id = this.getData('id');

	var width = data['button-width'];
	var height = data['button-height'];

	jQuery(".yrm-toggle-expand-"+id).css({
		'width': width,
		'height': height
	});
};

YrmMore.prototype.styles = function() {
	
	var data = this.getData('readMoreData');
	var fontSize = data['font-size'];

	this.setFontSize(".yrm-button-text", fontSize);
};

YrmMore.prototype.setFontSize = function (element, fontSize) {

	jQuery(element).css({
		'font-size': fontSize
	})
};

YrmMore.prototype.setFontWeight = function (element, fontWeight) {

	jQuery(element).css({
		'font-weight': fontWeight
	})
};

YrmMore.prototype.setChengHorizontalAlign = function(element, val) {

	jQuery(element).css({"text-align": val});
};

YrmMore.prototype.livePreview = function() {
	
	this.changeButtonWidth();
	this.changeButtonHeight();
	this.changeButtonFontSize();
	this.changeButtonFontWeight();
	this.changeBtnBackgroundColor();
	this.changeBtnTextColor();
	this.changeBorderRadius();
	this.changeHorizontalAligment();
	this.addFontFamilyOptionsView();
	this.changeButtonFontFamily();
	this.changeHoverEffect();
	this.changeHiddenContentBgColor();
	this.changeHiddenContentTextColor();
};

YrmMore.prototype.changeHoverEffect = function() {

	var id = this.getData('id');
	jQuery('[name="yrm-btn-hover-animate"]').change(function() {
		val = jQuery(this).val();
		jQuery('.yrm-btn-wrapper-'+id).attr('data-animate', 'animated '+val);
	});
}

YrmMore.prototype.changeButtonFontFamily = function() {

	var that = this;
	jQuery('[name="expander-font-family"]').bind("change", function() {
		var val = jQuery(this).find('option:selected').text();
		var element = ".yrm-toggle-expand";
		that.setButyonFontFamily(element, val);
	});
};

YrmMore.prototype.addFontFamilyOptionsView = function() {

	jQuery('[name="expander-font-family"]').find('option').each(function() {
		var family = jQuery(this).text();
		jQuery(this).css({'font-family': family})
	})
};

YrmMore.prototype.changeButtonWidth = function() {
	jQuery('.expm-btn-width').change(function() {
		var width = jQuery(this).val();
		jQuery(".yrm-toggle-expand").css({
			"width": width
		});
	});
};

YrmMore.prototype.changeButtonHeight = function() {
	jQuery(".expm-btn-height").change(function() {
		var height = jQuery(this).val();
		jQuery(".yrm-toggle-expand").css({
			"height": height
		});
	});
};

YrmMore.prototype.changeButtonFontSize = function() {
	jQuery('.expm-option-font-size').change(function() {
		var size = jQuery(this).val();
		jQuery(".yrm-button-text").css({
			'font-size': size
		})
	});
};

YrmMore.prototype.changeButtonFontWeight = function() {
	jQuery('[name="yrm-btn-font-weight"]').change(function() {
		var fontWeight = jQuery(this).val();
		jQuery(".yrm-button-text").css({
			'font-weight': fontWeight
		})
	});
};

YrmMore.prototype.changeBtnBackgroundColor = function() {
	var that = this;
	if(typeof jQuery.fn.wpColorPicker != 'undefined') {
		jQuery('.background-color').wpColorPicker({
			change: function() {
				var val = jQuery(this).val();
				var element = ".yrm-toggle-expand";
				that.setBackgroundColor(element, val);
			}
		});
	}
};

YrmMore.prototype.changeBorderRadius = function() {

	var that = this;
	jQuery(".btn-border-radius").change(function() {
		
		var value = jQuery(this).val();
		var element = ".yrm-toggle-expand";
		that.setBorderRadius(element, value);
	});
};

YrmMore.prototype.changeBtnTextColor = function() {
	var that = this;
	if(typeof jQuery.fn.wpColorPicker != 'undefined') {
		jQuery(".btn-text-color").wpColorPicker({
			change: function () {
				var val = jQuery(this).val();
				var elemnt = ".yrm-toggle-expand";
				that.setTextColor(elemnt, val);
			}
		});
		jQuery(".btn-hover-color").wpColorPicker({});
	}
};

YrmMore.prototype.changeHorizontalAligment = function() {

	var that = this;
	jQuery("[name='horizontal']").change(function() {
		var val = jQuery(this).val();
		var element = ".expand-btn-wrappper";
		that.setChengHorizontalAlign(element, val);
	});
};

YrmMore.prototype.changeHiddenContentBgColor = function () {

	if(!jQuery('.hidden-content-bg-color').length || typeof jQuery.fn.wpColorPicker == 'undefined') {
		return;
	}
	var that = this;

	jQuery('.hidden-content-bg-color').wpColorPicker({
		change: function () {
			var val = jQuery(this).val();
			var elemnt = ".yrm-inner-content-wrapper";
			that.setContentBgColor(elemnt, val);
		}
	});
};

YrmMore.prototype.changeHiddenContentTextColor = function () {

	if(!jQuery('.hidden-content-text-color').length || typeof jQuery.fn.wpColorPicker == 'undefined') {
		return;
	}

	var that = this;

	jQuery('.hidden-content-text-color').wpColorPicker({
		change: function () {
			var val = jQuery(this).val();
			var elemnt = ".yrm-inner-content-wrapper";
			that.setContentTextColor(elemnt, val);
		}
	});
};
