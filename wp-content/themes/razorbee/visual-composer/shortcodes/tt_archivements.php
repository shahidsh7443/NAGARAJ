<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start(); 

    ?>

    <div class="archivement-carousel text-center <?php echo esc_attr($tt_atts['el_class']);?>">
        <?php echo wpb_js_remove_wpautop( $content ); ?>
    </div>

    <?php 

    echo ob_get_clean();