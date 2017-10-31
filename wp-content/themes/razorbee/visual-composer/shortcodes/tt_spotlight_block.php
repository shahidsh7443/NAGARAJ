<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $tt_link     = vc_build_link($tt_atts['custom_link']);
    $tt_a_href   = $tt_link['url'];
    $tt_a_title  = $tt_link['title'];
    //$tt_a_target = trim($tt_link['target']);

    $image_size = "";

    if ($tt_atts['spotlight_style'] == 'spotlight-card') :
        $image_size = 'nominee-spotlight-thumbnail';
    else :
        $image_size = 'nominee-spotlight-default';
    endif;

?>
    
    <div class="spotlight-wrap <?php echo esc_attr($tt_atts['spotlight_style'].' '.$tt_atts['el_class']); ?>">
        
        <figure class="tt-effect">

            <?php $image_attributes = wp_get_attachment_image_src( $tt_atts['image'], $image_size ); ?>
            <img src="<?php echo esc_url($image_attributes[0]); ?>" alt="<?php echo esc_attr($tt_atts['title']); ?>">

            <figcaption>
                <?php if ($tt_atts['title']) : ?>
                  <h2><?php echo esc_html($tt_atts['title']); ?></h2>
                <?php endif; ?>
                
                <div class="content">
                    <?php echo wpb_js_remove_wpautop($content, true);?>

                    <?php if ($tt_atts['show_button'] == 'yes') : ?>
                        <a class="btn btn-outline <?php echo esc_attr($tt_atts['button_class']); ?>" href="<?php echo esc_url($tt_a_href);?>" title="<?php echo esc_attr($tt_a_title);?>"><?php echo esc_html($tt_atts['button_text']); ?></a>
                    <?php endif; ?>
                </div>
            </figcaption>

            <?php if ($tt_atts['spotlight_style'] == 'spotlight-card'): ?>
                <div class="card-footer">
                    <?php if ($tt_atts['title']) : ?>
                      <h3><?php echo esc_html($tt_atts['title']); ?></h3>
                    <?php endif; ?>

                    <?php if ($tt_atts['subtitle']) : ?>
                      <span><?php echo esc_html($tt_atts['subtitle']); ?></span>
                    <?php endif; ?>
                </div>
            <?php endif ?>

        </figure>

    </div> <!-- spotlight-wrap -->
<?php echo ob_get_clean();