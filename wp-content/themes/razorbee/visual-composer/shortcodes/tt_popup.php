<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

?>

    <div class="tt-popup-wrapper">
        <?php $tt_image_src = wp_get_attachment_image_src( $tt_atts['cover_image'], 'full' ); ?>
        <img class="img-responsive" src="<?php echo esc_url($tt_image_src[0]); ?>" alt/>
        <?php 
            $source_url = $tt_atts['source_url'];

            if ($source_url) : ?>
                <a class="tt-popup" href="<?php echo esc_url($source_url); ?>"><i class="fa fa-play"></i></a>
            <?php endif;
        ?>
    </div> <!-- .tt-popup-wrapper -->

<?php echo ob_get_clean();