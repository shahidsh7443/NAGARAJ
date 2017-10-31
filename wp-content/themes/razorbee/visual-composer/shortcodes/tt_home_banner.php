<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

?>

    <div  class="home-section">
        <div class="intro <?php echo esc_attr($tt_atts['title_alignment']); ?>">
      
            <?php echo wpb_js_remove_wpautop($content, true)?>

        </div>
    </div>

<?php echo ob_get_clean();