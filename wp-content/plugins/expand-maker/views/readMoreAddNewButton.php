<?php
$params = $dataObj::params();
$type = $_GET['type'];
if(!isset($type)) {
	$type = "button";
}
?>
<?php if(!empty($_GET['saved'])) : ?>
	<div id="default-message" class="updated notice notice-success is-dismissible">
		<p>Read more updated.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
	</div>
<?php endif; ?>
<div class="ycf-bootstrap-wrapper">
<form method="POST" action="<?php echo admin_url();?>admin-post.php?action=save_data">
	<?php
		if(function_exists('wp_nonce_field')) {
			wp_nonce_field('read_more_save');
		}
	?>
<input type="hidden" name="read-more-type" value="<?php echo esc_attr($type); ?>">
<input type="hidden" name="read-more-id" value="<?php echo esc_attr($id); ?>">
<div class="expm-wrapper">
	<div class="titles-wrapper">
		<h2 class="expander-page-title">Change settings</h2>
		<div class="button-wrapper">
			<p class="submit">
				<?php if(YRM_PKG == YRM_FREE_PKG): ?>
					<input type="button" class="expm-update-to-pro" value="Upgrade to PRO version" onclick="window.open('<?php echo YRM_PRO_URL; ?>');">
				<?php endif;?>
				<input type="submit" class="button-primary" value="<?php echo 'Save Changes'; ?>">
			</p>
		</div>
	</div>
	<div class="clear"></div>
	<div class="row">
		<div class="col-xs-12">
			<input type="text" name="expm-title" class="form-control input-md" placeholder="Read more title" value="<?php echo $readMoreTitle; ?>">
		</div>
	</div>
	<div class="options-wrapper">
		<div class="panel panel-default">
			<div class="panel-heading">General options</div>
			<div class="panel-body">
				<?php if(!ReadMore::RemoveOption('button-width')): ?>
				<div class="row">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Button width', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="text" class="form-control input-md expm-options-margin expm-btn-width" name="button-width" value="<?php echo esc_attr($buttonWidth);?>"><br>
					</div>
					<div class="col-md-2 expm-option-info">(in pixels)</div>
				</div>
				<?php endif; ?>
				<?php if(!ReadMore::RemoveOption('button-height')): ?>
				<div class="row">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Button height', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="text" class="form-control input-md expm-options-margin expm-btn-height" name="button-height" value="<?php echo esc_attr($buttonHeight);?>"><br>
					</div>
					<div class="col-md-2 expm-option-info">(in pixels)</div>
				</div>
				<?php endif; ?>
				<div class="row">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Font size', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type='text' class="form-control input-md expm-option-font-size" name="font-size" value="<?php echo esc_attr($fontSize)?>"><br>
					</div>
					<div class="col-md-2 expm-option-info">(in pixels)</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Font weight', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<?php echo $functions::createSelectBox($params['btnFontWeight'],'yrm-btn-font-weight', esc_attr($yrmBtnFontWeight));?><br>
					</div>
				</div>
				<?php if(!ReadMore::RemoveOption('animation-duration')): ?>
				<div class="row">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Set animation speed', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
					<input type="text" class="form-control input-md  expm-options-margin" name="animation-duration" value="<?php echo esc_attr($animationDuration)?>"><br>
					</div>
					<div class="col-md-2 expm-option-info"></div>
				</div>
				<?php endif; ?>
				<div class="row">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Button hover effect', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<?php echo $functions::createSelectBox($params['hoverEffect'],"yrm-btn-hover-animate", esc_attr($yrmBtnHoverAnimate));?><br>
					</div>
					<div class="col-md-2 expm-option-info"></div>
				</div>
			</div>
		</div>
		<div class="panel panel-default yrm-pro-options-wrapper">
			<div class="panel-heading"><?php _e('Advanced options', YRM_LANG);?></div>
			<div class="panel-body">
				<?php if(!ReadMore::RemoveOption('btn-background-color')): ?>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Button Background Color', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="text" class="input-md background-color" name="btn-background-color" value="<?php echo $btnBackgroundColor ?>"><br>
					</div>
				</div>
				<?php endif; ?>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Button Text Color', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="text" class="input-md btn-text-color" name="btn-text-color" value="<?php echo esc_attr($btnTextColor)?>"><br>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Button Font Family', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<?php echo $functions::createSelectBox($params['googleFonts'],"expander-font-family", esc_attr($expanderFontFamily));?><br>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Button Border Radius', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="text" class="form-control input-md btn-border-radius" name="btn-border-radius" value="<?php echo esc_attr($btnBorderRadius)?>"><br>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Button Horizontal alignment', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<?php echo $functions::createSelectBox($params['horizontalAlign'],"horizontal", esc_attr($horizontal));?><br>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Button Vertical alignment', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<?php echo $functions::createSelectBox($params['vertical'],"vertical", esc_attr($vertical));?><br>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Hidden Content Background color', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="text" class="input-md hidden-content-bg-color" name="hidden-content-bg-color" value="<?php echo esc_attr($hiddenContentBgColor)?>"><br>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Hidden Content Text color', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="text" class="input-md hidden-content-text-color" name="hidden-content-text-color" value="<?php echo esc_attr($hiddenContentTextColor)?>"><br>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Show only mobile devices', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="checkbox" name="show-only-mobile" <?php echo $showOnlyMobile;?>>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Button Hover effect', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="checkbox" name="hover-effect" class="yrm-accordion-checkbox" <?php echo $hoverEffect;?>>
					</div>
				</div>
				<div class="row yrm-accordion-content yrm-hide-content">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('button color', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-5">
						<input type="text" class="input-md btn-hover-color" name="btn-hover-text-color" value="<?php echo esc_attr($btnHoverTextColor)?>" >
					</div>
				</div>
				<div class="row yrm-accordion-content yrm-hide-content">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('button bg color', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-5">
						<input type="text" class="input-md btn-hover-color" name="btn-hover-bg-color" value="<?php echo esc_attr($btnHoverBgColor)?>" >
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Add button for posts', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="checkbox" name="button-for-post" class="yrm-accordion-checkbox" <?php echo @$buttonForPost;?>>
					</div>
				</div>
				<div class="row yrm-accordion-content yrm-hide-content">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Selected post', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-5">
						<?php echo $functions::yrmSelectBox($params['selectedPost'],$yrmSelectedPost, array('name'=>"yrm-selected-post[]", 'multiple'=>'multiple','size'=>10));?>
					</div>
				</div>
				<div class="row yrm-accordion-content yrm-hide-content">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Hide after word count', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-5">
						<input type="text" class="form-control input-md btn-border-radius" name="hide-after-word-count" value="<?php echo esc_attr($hideAfterWordCount)?>"><br>
					</div>
				</div>
			</div>
			<?php if(YRM_PKG == YRM_FREE_PKG) :?>
				<div class="yrm-pro-options">
					<p class="yrm-pro-options-title">PRO Features</p>
				</div>
			<?php endif;?>
		</div>
	</div>
	<div class="right-side">
		<div class="panel panel-default">
			<div class="panel-heading">Live preview</div>
			<div class="panel-body">
				<?php require_once(YRM_VIEWS."livePreview/buttonPreview.php");?>
			</div>
		</div>
		<?php $shortCode = '[expander_maker id="'.$id.'" more="Read more" less="Read less"]Read more hidden text[/expander_maker]'; ?>
		<?php if($id != 0): ?>
			<input type="text" id="expm-shortcode-info-div" class="widefat" readonly="readonly" value='<?php echo $shortCode; ?>'>
		<?php endif; ?>
		<?php if($id == 0): ?>
			<div class="no-shortcode">
				<span>Please do save read more for getting shortcode.</span>
			</div>
		<?php endif; ?>
		<?php $typeObj->includeOptionsBlock($dataObj); ?>
	</div>
</div>
</form>
	<?php echo ReadMoreFunctions::getFooterReviewBlock();?>
</div>
