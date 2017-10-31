<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start(); 

    $image_id = $tt_atts['map_marker'];
    $image_src = wp_get_attachment_image_src($image_id, 'full');
    $map_marker = $image_src[0];
?>
    
    <div class="tt-map-wrapper <?php echo esc_attr($tt_atts['el_class']);?>">
        <div id="ttmap" data-map-latitude="<?php echo esc_attr($tt_atts[ 'tt_latitude' ]); ?>"
                            data-map-longitude="<?php echo esc_attr($tt_atts[ 'tt_longitude' ]); ?>"
                            data-map-marker="<?php echo esc_url($map_marker); ?>"></div>

    </div> <!-- .tt-map-wrapper -->

<?php echo ob_get_clean();