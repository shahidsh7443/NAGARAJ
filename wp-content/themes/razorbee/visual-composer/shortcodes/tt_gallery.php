<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );

    ob_start();


    $video_contents = (array) vc_param_group_parse_atts( $tt_atts['video_content'] );
    $videos = array();

    foreach ( $video_contents as $data ) :
        $video_data = $data;
        $video_data['video_cover'] = isset( $data['video_cover'] ) ? $data['video_cover'] : '';
        $video_data['embed_iframe'] = isset( $data['embed_iframe'] ) ? $data['embed_iframe'] : '';

        $videos[] = $video_data;
    endforeach;

    ?>

    <div class="tt-gallery-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
        <div class="gallery-wrapper">
            <div class="tt-gallery">
                <ul class="slides">
                    
                    <!-- image galery -->
                    <?php if ($tt_atts['gallery_type'] == 'image-gallery') :
                        $large_images = explode( ',', $tt_atts['images'] );
                        foreach ( $large_images as $image_id ) :
                            $img_src = wp_get_attachment_image_src( $image_id, 'nominee-carousel-post' ); ?>
                            <li>
                                <img class="img-responsive" src="<?php echo esc_url( $img_src[ 0 ] ); ?>" alt="<?php echo wp_kses( get_the_title(), array() ); ?>">
                            </li>
                        <?php endforeach;
                    endif; ?>

                    <!-- video gallery -->
                    <?php if ($tt_atts['gallery_type'] == 'video-gallery') :
                        foreach ( $videos as $video ) : ?>
                            <li>
                               <?php $embed_video = trim( vc_value_from_safe( $video[ 'embed_iframe' ] ) ); 

                                if ( preg_match( '/^\<iframe/', $embed_video ) )
                                echo $embed_video;
                               ?>
                            </li>
                        <?php endforeach;
                    endif; ?>

                    
                </ul>
            </div>
            <div class="tt-gallery-nav">
                <a class="gallery-control prev"><i class="fa fa-angle-left"></i></a>
                <a class="gallery-control next"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>

        <div class="tt-gallery-thumb flexslider">
            <ul class="slides">
                <!-- image thumb -->
                <?php if ($tt_atts['gallery_type'] == 'image-gallery') :
                    $thumbs = explode( ',', $tt_atts['images'] );
                    foreach ( $thumbs as $thumb_id ) :
                        $img_src = wp_get_attachment_image_src( $thumb_id, 'nominee-gallery-thumb' ); ?>
                        <li>
                            <img class="img-responsive" src="<?php echo esc_url( $img_src[ 0 ] ); ?>"
                                 alt="<?php echo wp_kses( get_the_title(), array() ); ?>">
                        </li>
                    <?php endforeach; 
                endif; ?>

                <!-- video thumb -->

                <!-- video gallery -->
                <?php if ($tt_atts['gallery_type'] == 'video-gallery') :
                    foreach ( $videos as $thumb_id ) : ?>
                        <li>
                           <?php $img_src = wp_get_attachment_image_src( $thumb_id['video_cover'], 'nominee-gallery-thumb' ); ?>
                                <img src="<?php echo esc_url( $img_src[ 0 ] ); ?>" alt="<?php echo wp_kses( get_the_title(), array() ); ?>">
                                <div class="tt-overlay"></div>
                                <i class="fa fa-play"></i>
                        </li>
                    <?php endforeach;
                endif; ?>

            </ul>
        </div>

    </div> <!-- .tt-gallery-wrapper -->