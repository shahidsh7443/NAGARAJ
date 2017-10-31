<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start(); 

?>
    
    <div class="tt-text-rotator <?php echo esc_attr($tt_atts['el_class']); ?>">
        <div class="intro">
            <?php if (wpb_js_remove_wpautop($content, true)) : ?>
                <div class="intro-sub"><?php echo wpb_js_remove_wpautop($content, true); ?></div>
            <?php endif; ?>
            
            <span class="separator"><span></span></span>

            <?php if ($tt_atts['title']) : ?>
                <h1><span class="rotate" data-animation="<?php echo esc_attr($tt_atts['animation'])?>" data-speed="<?php echo esc_attr($tt_atts['animation_speed']); ?>"><?php echo esc_html($tt_atts['title']);?></span></h1>
            <?php endif; ?>
        </div> <!-- .intro -->
    </div> <!-- .tt-text-rotator -->

<?php echo ob_get_clean();