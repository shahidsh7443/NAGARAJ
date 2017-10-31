<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();
?>

    <div class="tt-social-icon <?php echo esc_attr($tt_atts['el_class']); ?>">
        <ul class="list-inline">
            <?php echo wpb_js_remove_wpautop($content);?>
        </ul>
    </div>

<?php echo ob_get_clean();