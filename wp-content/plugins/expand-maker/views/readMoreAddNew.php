<?php if(YRM_PKG == YRM_FREE_PKG): ?>
	<input type="button" class="expm-update-to-pro" value="Upgrade to PRO version" onclick="window.open('<?php echo YRM_PRO_URL; ?>');">
<?php endif;?>
<div class="ycf-bootstrap-wrapper">
	<h2>Add New Read More Type</h2>
	<div class="product-banner" onclick="location.href = '<?php echo admin_url();?>admin.php?page=button&type=button'">
		<div class="yrm-types yrm-button">

		</div>
	</div>
	<div class="product-banner" onclick="location.href = '<?php echo admin_url();?>admin.php?page=button&type=inline'">
		<div class="yrm-types yrm-inline">

		</div>
	</div>
	<?php if(YRM_PKG > YRM_SILVER_PKG): ?>
		<div class="product-banner" onclick="location.href = '<?php echo admin_url();?>admin.php?page=button&type=popup'">
			<div class="yrm-types yrm-popup">

			</div>
		</div>
	<?php endif?>
	<?php if(YRM_PKG == YRM_FREE_PKG): ?>
		<a class="product-banner" href="http://edmion.esy.es/" target="_blank">
			<div class="yrm-types yrm-popup type-banner-pro">
				<p class="yrm-type-title-pro">PRO Features</p>
			</div>
		</a>
	<?php endif?>
</div>
<?php

$isAnalyticsExist = get_option('YrmAnalytics');
if(!$isAnalyticsExist) : ?>
<div class="yrm-add-new-extensions-wrapper">
	<span class="yrm-add-new-extensions">
		Extension
	</span>
</div>
<a class="product-banner yrm-alaytics" href="http://edmion.esy.es#yrm-analytics" target="_blank">
	<div class="yrm-types type-banner-pro">
		<p class="yrm-ext-title-pro">PRO EXTENSION</p>
	</div>
</a>
<?php endif; ?>
