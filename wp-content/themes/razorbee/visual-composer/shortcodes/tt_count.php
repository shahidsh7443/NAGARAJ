<?php
	if ( ! defined( 'ABSPATH' ) ) :
	    exit; // Exit if accessed directly
	endif;
	
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

	ob_start();
	?>
	
	<div class="counter-wrapper <?php echo esc_attr($tt_atts['grid_class'] .' '. $tt_atts['el_class']); ?>">
		
		<?php if ($tt_atts['flaticon_list']) : ?>
			<span class="icon"><i class="<?php echo esc_attr($tt_atts['flaticon_list']); ?>"></i></span>
		<?php endif; ?>

		<span class="timer"><?php echo intval($tt_atts['counted_number']); ?></span>
		
		<?php if ($tt_atts['subtitle']) : ?>
			<span class="description"><?php echo esc_html($tt_atts['subtitle']); ?></span>
		<?php endif; ?>
		
	</div>

	<?php
	echo ob_get_clean();