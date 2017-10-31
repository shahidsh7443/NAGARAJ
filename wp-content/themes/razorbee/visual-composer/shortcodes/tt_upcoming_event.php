<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $start_month = $tt_atts['start_event_month'];
    $end_month = $tt_atts['end_event_month'];
    $year = $tt_atts['event_year'];

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $tt_atts['css'], ' ' ), $this->settings['base'], $atts );
?>

    <div class="event-wrapper <?php echo esc_attr($tt_atts['el_class'].' '.$css_class); ?>">
    	<div class="row">

            <?php 
            $args = array(
                'post_type'     => 'tt-event',
                'posts_per_page'=> $tt_atts['event_limit'],
                'post_status'   => 'publish',
                'meta_key'      => 'nominee_event_date',
                'orderby'       => array('meta_value' => 'ASC'),
                'meta_query'    => array(
                    'relation' => 'OR',
                    array(
                        'key'       => 'nominee_event_date',
                        'value'     => array($year.'-'.$start_month.'-01', $year.'-'.$end_month.'-31'),
                        'compare'   => 'BETWEEN'
                    )
                ),
            );

            $query = new WP_Query( $args ); ?>

            <?php if ( $query->have_posts() ) : ?>

                <!-- the loop -->
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-md-<?php echo esc_attr($tt_atts['grid_column']); ?>">
                        <div class="upcoming-campaign">
                            <?php the_post_thumbnail('nominee-upcoming-event', array('alt' => get_the_title(), 'class' => 'img-responsive'));?>

                            <div class="event-info">
                                <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                                
                                <?php if (function_exists('rwmb_meta')): ?>
                                    <address>
                                        <i class="fa fa-map-marker"></i><?php echo esc_html(rwmb_meta('event-location')); ?>
                                    </address>
                                <?php endif ?>
                                
                                <?php if (function_exists('rwmb_meta')):
                                        $event_start_time = rwmb_meta('nominee_event_start_time');
                                        $event_end_time = rwmb_meta('nominee_event_end_time');
                                        ?>
                                    <span class="event-meta colored">
                                        <span><i class="fa fa-calendar"></i><?php nominee_event_date(); ?></span>
                                        <span><i class="fa fa-clock-o"></i><?php echo esc_html($event_start_time.' - '.$event_end_time); ?></span>
                                    </span>

                                <?php endif; ?>
                            </div><!-- .event-info -->
                        </div> <!-- .upcoming-campaign -->
                    </div> <!-- .col -->
                <?php endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e('Event not found !', 'nominee'); ?></p>
            <?php endif; ?>

        </div> <!-- .row -->
    </div> <!-- .event-wrapper -->

<?php echo ob_get_clean();