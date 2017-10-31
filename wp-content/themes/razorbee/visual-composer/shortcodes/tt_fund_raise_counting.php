<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
?>

    <div class="tt-fundraise-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <span class="counting-number"><?php echo esc_html($tt_atts['counted_number_prefix']); ?><span class="timer"><?php echo esc_html($tt_atts['counted_number']); ?></span></span>
        <span class="fundraise-title"><?php echo esc_html($tt_atts['subtitle']); ?></span>
    </div> <!-- .tt-fundraise-wrapper -->

<?php echo ob_get_clean();