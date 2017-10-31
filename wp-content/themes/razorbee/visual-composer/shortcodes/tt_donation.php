<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

?>

    <div class="donate-button <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#paypal-donate">
            <?php echo esc_html($tt_atts['button_text']); ?>
        </button>
    </div>

<?php echo ob_get_clean();