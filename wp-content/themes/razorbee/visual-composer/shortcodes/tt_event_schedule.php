<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

?>

    <div class="schedule-wrap <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <div class="schedule-content">
            <div class="schedule-meta">
                <ul class="list-inline">
                    <?php if ($tt_atts['speech_time']) : ?>
                        <li><i class="fa fa-clock-o"></i> <?php echo esc_html($tt_atts['speech_time']); ?></li>
                    <?php endif; 
                    if ($tt_atts['speaker_name']) : ?>
                        <li><i class="fa fa-microphone"></i> <?php echo esc_html($tt_atts['speaker_name']); ?></li>
                    <?php endif;
                    ?>
                </ul>
            </div>

            <h3><?php echo esc_html($tt_atts['speech_subject']); ?></h3>

            <?php echo wpb_js_remove_wpautop($content, true); ?>

        </div> <!-- /.schedule-content -->

        <div class="speaker-thumb-wrap">
            <div class="img-shape">
                <div class="shape-inner">
                    <?php $tt_image_src = wp_get_attachment_image_src( $tt_atts['speaker_photo'], 'nominee-schedule-member' ); ?>
                    <img src="<?php echo esc_url($tt_image_src[0]); ?>" alt="<?php echo esc_attr($tt_atts['speaker_name']); ?>"/>
                </div>
            </div>
        </div> <!-- /.speaker-thumb -->
    </div> <!-- /.schedule-wrap -->

<?php echo ob_get_clean();