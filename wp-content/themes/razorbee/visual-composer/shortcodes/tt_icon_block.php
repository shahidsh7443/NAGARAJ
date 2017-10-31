<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    // icon
    $icon_type = "";
    $icon = "";

    if ($tt_atts['icon_type'] == 'fontawesome-icon') :
        $icon_type = "fontawesome-icon";
        $icon = $tt_atts['fontawesome_icon'];
    elseif ($tt_atts['icon_type'] == 'flat-icon') :
        $icon_type = "flat-icon";
        $icon = $tt_atts['flat_icon'];
    endif;

    // color
    $icon_color = "";
    $title_color = "";

    if ($tt_atts['icon_color_option'] == 'custom-color') :
        $icon_color = 'color:'.$tt_atts['icon_color'].'';
    endif;

    if ($tt_atts['title_color_option'] == 'custom-color') :
        $title_color = 'color:'.$tt_atts['title_color'].'';
    endif;

    // link
    $link     = vc_build_link($tt_atts['link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

?>

    <div class="icon-block <?php echo esc_attr($tt_atts['icon_style'].' '.$tt_atts['el_class'].' '.$tt_atts['icon_position'].' '.$css_class); ?>">
        <?php if ($tt_atts['show_icon'] == 'yes') : ?>
            <div class="tt-icon <?php echo esc_attr($icon_type);?>">
                <?php if ($tt_atts['custom_link'] == 'yes') : ?>
                    <a target="_blank" href="<?php echo esc_attr($a_href)?>"><i class="<?php echo esc_attr($icon);?>" style="<?php echo esc_attr($icon_color)?>"></i></a>
                <?php else : ?>
                    <i class="<?php echo esc_attr($icon);?>" style="<?php echo esc_attr($icon_color)?>"></i>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="tt-content">
            <h3 style="<?php echo esc_attr($title_color)?>">
                <?php if ($tt_atts['custom_link'] == 'yes') : ?>
                    <a href="<?php echo esc_attr($a_href)?>" style="<?php echo esc_attr($title_color)?>"><?php echo esc_html($tt_atts['title'])?></a>
                <?php else : ?>
                    <?php echo esc_html($tt_atts['title'])?>
                <?php endif; ?>
            </h3>
            <?php echo wpb_js_remove_wpautop($content, true);?>
        </div>
    </div>

<?php echo ob_get_clean();
