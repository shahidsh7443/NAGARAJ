<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start(); 

    $tt_custom_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts ); 

    ?>

    <div class="client-carousel-wrapper <?php echo esc_attr($tt_atts['el_class'].' '. $tt_custom_css );?>">
        <div class="client-carousel" data-item-desktop="<?php echo esc_attr($tt_atts['item_desktop']);?>" data-item-tablet="<?php echo esc_attr($tt_atts['item_tablet']);?>" data-item-mobile="<?php echo esc_attr($tt_atts['item_mobile']);?>" >
            <?php $tt_custom_links = '';
            
            if($tt_atts['on_click_action'] == 'custom_link') :
                $tt_custom_links = explode(',',$tt_atts['links']);
            endif;

            $images = explode( ',', $tt_atts['images'] );
            $i = -1; 
            
            foreach ( $images as $attach_id ) :
                $i++;

                $tt_img_src = wp_get_attachment_image_src($attach_id, 'nominee-client-logo'); ?>

                <div class="item">
                    <?php if($tt_atts['on_click_action'] == 'custom_link' and isset($tt_custom_links[$i])) : ?>
                        <a href="<?php echo esc_url($tt_custom_links[$i]);?>"><img src="<?php echo esc_url($tt_img_src[0]); ?>" alt></a>
                    <?php else : ?>
                        <img src="<?php echo esc_url($tt_img_src[0]); ?>" alt>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php echo ob_get_clean();