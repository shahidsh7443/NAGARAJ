<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

	ob_start();

?>

    <div class="subscribe-form form-inline">
        <?php if (shortcode_exists('mc4wp_form')) :
        	echo do_shortcode('[mc4wp_form]');
        endif; ?>
    </div>

<?php echo ob_get_clean();