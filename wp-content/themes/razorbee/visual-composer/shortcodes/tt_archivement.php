<?php

    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    ?>

    <div class="item">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <?php if ($tt_atts['show_icon'] == 'yes') :

                    if ($tt_atts['icon_option'] == 'thumbicon') : ?>
                        <?php $image_attributes = wp_get_attachment_image_src( $tt_atts['thumb_icon'], 'nominee-testimonial-thumb' ); ?>
                            <img src="<?php echo esc_url($image_attributes[0]); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>"/>
                   <?php else : ?>
                        <i class="<?php echo esc_attr($tt_atts['font_icon']);?>"></i>
                    <?php endif;

                endif;
                ?>
                
                <?php if ($tt_atts['title']) : ?>
                    <h3><?php echo esc_html($tt_atts['title']);?></h3>
                <?php endif; ?>
                
                <?php echo wpb_js_remove_wpautop($content, true); ?>

            </div>
        </div>
    </div>

    <?php 
    echo ob_get_clean();