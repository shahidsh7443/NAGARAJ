<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $text_color = "";
    $description_color = "";
    $separator_color = "";

    if ($tt_atts['text_color_option'] == 'custom-color') :
        $text_color = 'color:'.$tt_atts['text_color'].'';
    endif;

    ob_start();
?>

    <div class="item">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <blockquote>
                    <?php if ($tt_atts['photo_option'] == 'yes') : ?>
                        <div class="client-thumb">
                            <i class="fa fa-quote-left"></i>
                            <?php $image_attributes = wp_get_attachment_image_src( $tt_atts['client_image'], 'nominee-testimonial-thumb' ); ?>
                            <img src="<?php echo esc_url($image_attributes[0]); ?>" alt="<?php echo esc_attr($tt_atts['client_name']); ?>"/>
                        </div>
                    <?php else : ?>
                        <i class="fa fa-quote-left"></i>
                    <?php endif; ?>
                    
                    <div class="quote-description" style="<?php echo esc_attr($text_color); ?>">
                        <?php echo wpb_js_remove_wpautop($content, true); ?>
                    </div>
                    
                    <footer style="<?php echo esc_attr($text_color); ?>"><?php echo esc_html($tt_atts['client_name']); ?> <cite><?php echo esc_html($tt_atts['client_org']); ?></cite></footer>
                </blockquote>
            </div> <!-- .col-## -->
        </div> <!-- .row -->
    </div> <!-- .item -->

    <?php 
    echo ob_get_clean();