<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    $intro_font_size = $tt_atts['intro-font-size'];
    $title_font_size = $tt_atts['title-font-size'];
    if ($intro_font_size) :
        $intro_font_size = 'font-size: '.$tt_atts['intro-font-size'].'';
    endif;
    if ($title_font_size) :
        $title_font_size = 'font-size: '.$tt_atts['title-font-size'].'';
    endif;

    ob_start();
    ?>

    <li class="<?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <?php $tt_image_src = wp_get_attachment_image_src( $tt_atts['slider_image'], 'full' ); ?>
        <img src="<?php echo esc_url($tt_image_src[0]); ?>" alt="<?php echo esc_attr($tt_atts['title_part1'].' '.$tt_atts['title_part2']); ?>"/>
        <div class="intro <?php echo esc_attr($tt_atts['content_alignment'])?>">
            <div class="container">
                <?php if ($tt_atts['intro-title']) : ?>
                    <span class="intro-sub animated <?php echo esc_attr($tt_atts['intro_title_animation'] .' '. $tt_atts['intro_title_ani_delay'] ); ?>" style="<?php echo esc_attr($intro_font_size);?>"><?php echo esc_html($tt_atts['intro-title']);?></span>
                <?php endif; ?>
                
                <?php if ($tt_atts['title_part1']) : ?>
                    <span class="tt-title animated <?php echo esc_attr($tt_atts['title_part1_animation'] .' '. $tt_atts['title_part1_ani_delay'] ); ?>" style="<?php echo esc_attr($title_font_size);?>"><?php echo esc_html($tt_atts['title_part1']);?></span>
                <?php endif; ?>

                <?php if ($tt_atts['title_part2']) : ?>
                    <span class="tt-title animated <?php echo esc_attr($tt_atts['title_part2_animation'] .' '. $tt_atts['title_part2_ani_delay'] ); ?>" style="<?php echo esc_attr($title_font_size);?>"><?php echo esc_html($tt_atts['title_part2']);?></span>
                <?php endif; ?>
            </div>
        </div> <!-- .intro -->
    </li>

    <?php 
    echo ob_get_clean();