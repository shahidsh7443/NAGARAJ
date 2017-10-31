<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );


    $featured_image = 'nominee-event-featured';

    if($tt_atts['featured_event_style'] == 'style_two') :
        $featured_image = 'full';
    endif;

?>

    <div class="event-wrapper featured-event <?php echo esc_attr($tt_atts['el_class'].' '.$css_class.' '.$tt_atts['featured_event_style']); ?>">

        <?php $args = array(
           'p'              => $tt_atts['event_lists'],
           'post_type'      => 'tt-event',
           'post_status'    => 'publish',
        );

        $query = new WP_Query($args);

        if ( $query->have_posts() ) : ?>
            <!-- the loop -->
            <?php while ( $query->have_posts() ) : $query->the_post(); 

            if (function_exists('rwmb_meta')) :
                $event_start_time = rwmb_meta('nominee_event_start_time');
                $event_end_time = rwmb_meta('nominee_event_end_time');
            endif;

            ?>
                
                <div class="upcoming-campaign">
                    <?php the_post_thumbnail($featured_image, array('alt' => get_the_title(), 'class' => 'img-responsive'));?>

                    <div class="campaign-scoop">
                        <?php if ($tt_atts['featured_event_style'] == 'style_two'): ?>
                            <?php if ($tt_atts['event_link'] == 'yes'): ?>
                                <h2 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                            <?php else : ?>
                                <h2 class="title"><?php the_title(); ?></h2>
                            <?php endif ?>
                        <?php else : ?>
                            <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                        <?php endif ?>

                        <span class="start-date">
                        <?php if ($tt_atts['featured_event_style'] == 'style_two' && $tt_atts['date_label_text']): 
                            echo esc_html($tt_atts['date_label_text']);
                        else : 
                            echo esc_html(nominee_option('event-start-date-prefix', false, true));
                        endif ?> <span class="colored"><?php nominee_event_date(); ?></span>
                        </span>

                        <div class="countdown-wrapper">
                            <?php if (function_exists('rwmb_meta')) :
                            
                                $event_date = rwmb_meta('nominee_event_date');
                                if ($event_date) : ?>
                                    <ul class="countdown list-inline" data-countdown="<?php echo esc_attr($event_date.' '.$event_start_time); ?>"></ul>
                                <?php endif;

                            endif; ?>
                        </div>
                        
                        <?php if (function_exists('rwmb_meta')) : 
                        $event_location = rwmb_meta('event-location');
                        ?>
                            <?php if ($event_location): ?>
                                <address>
                                    <i class="fa fa-map-marker"></i><?php echo esc_html(rwmb_meta('event-location')); ?>
                                </address>
                            <?php endif ?>
                        <?php endif; ?>
                        
                        <?php if ($event_start_time): ?>
                            <span class="event-duration colored"><i class="fa fa-clock-o"></i><?php echo esc_html($event_start_time.' - '.$event_end_time); ?></span>
                        <?php endif; ?>
                            
                    </div><!-- .campaign-scoop -->
                </div> <!-- .upcoming-campaign -->

            <?php endwhile; ?>
            <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php esc_html_e( 'Event not found !', 'nominee' ); ?></p>
        <?php endif; ?>
    </div>

<?php echo ob_get_clean();