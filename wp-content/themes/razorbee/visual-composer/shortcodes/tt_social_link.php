<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    // color
    $icon_color = "";

    if ($tt_atts['icon_color_option'] == 'custom-color') :
        $icon_color = 'color:'.$tt_atts['icon_color'].'';
    endif;

    // link
    $link     = vc_build_link($tt_atts['link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);

?>

    
    <li class="<?php echo esc_attr($tt_atts['el_class']); ?>">
        <a href="<?php echo esc_attr($a_href); ?>" target="<?php echo esc_attr($a_target); ?>" title="<?php echo esc_attr($a_title); ?>"><i class="<?php echo esc_attr($tt_atts['fontawesome_icon']);?>" style="<?php echo esc_attr($icon_color)?>"></i></a>
    </li>


<?php echo ob_get_clean();