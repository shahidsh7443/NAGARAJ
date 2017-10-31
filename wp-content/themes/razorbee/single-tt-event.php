<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); 

    if (function_exists('rwmb_meta')) :
        $event_start_time = rwmb_meta('nominee_event_start_time');
        $event_end_time = rwmb_meta('nominee_event_end_time');
    endif;
?>
<div class="page-wrapper single-event-content">
    <div id="main" class="posts-content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="single-event-header">
                    <?php the_post_thumbnail('nominee-single-event-thumb', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                    <div class="gradient-bg"></div>
                    <div class="campaign-scoop">
                        <h2 class="title"><?php the_title(); ?></h2>

                        <span class="start-date"><?php echo esc_html(nominee_option('event-start-date-prefix', false, true));?> <span class="colored"><?php nominee_event_date(); ?></span></span>

                        <?php if (nominee_option('event-date-counting', false, true)): ?>
                            <div class="countdown-wrapper">
                                <?php if (function_exists('rwmb_meta')) :
                                    $event_date = rwmb_meta('nominee_event_date');
                                    if ($event_date) : ?>
                                        <ul class="countdown list-inline" data-countdown="<?php echo esc_attr($event_date.' '.$event_start_time); ?> "></ul>
                                    <?php endif; 
                                endif; ?>
                            </div>
                        <?php endif ?>
                        
                        <address>
                            <i class="fa fa-map-marker"></i>
                            <?php if (function_exists('rwmb_meta')) :
                                echo esc_html(rwmb_meta('event-location'));
                            endif;
                            ?>
                        </address>
                        <span class="event-duration colored"><i class="fa fa-clock-o"></i><?php echo esc_html($event_start_time.' - '.$event_end_time); ?></span>
                        
                    </div><!-- .campaign-scoop -->
                </div> <!-- .single-event-header -->

                <div class="container">
                    
                    <div class="event-location-map">
                        <?php if (nominee_option('event-map-visibility', false, true)): ?>
                            <?php if (function_exists('rwmb_meta')) :
                                $args = apply_filters('nominee_single_event_map', array(
                                    'type'         => 'map',
                                    'width'        => '1140px', 
                                    'height'       => '300px', 
                                    'zoom'         => 14,  
                                    'marker'       => true, 
                                    'marker_title' => '', 
                                    'info_window'  => rwmb_meta('event-location')
                                ));

                                echo rwmb_meta('nominee_event_location_map', $args);
                            endif; ?>
                        <?php endif ?>
                        
                        <!-- Event passed notice -->
                        <?php if (function_exists('rwmb_meta')) :
                            $current_date = current_time('Y/m/d');
                            $tt_event_date =  rwmb_meta('nominee_event_date');
                            $tt_date = strtotime($tt_event_date);
                            $contest_tart = date('Y/m/d', $tt_date);

                            if ($current_date > $contest_tart) : ?>
                                <div class="event-passed-message">
                                    <div class="alert-warning">
                                        <i class="fa fa-exclamation-triangle"></i><?php esc_html_e('This event is passed', 'nominee')?>
                                    </div>
                                </div>
                            <?php endif;
                        endif; ?>

                    </div> <!-- .event-location-map -->
                    
                </div> <!-- .container -->

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

            </div> <!-- #post-## -->

        <?php endwhile; // End of the loop. ?>

    </div> <!-- .posts-content -->
</div> <!-- .content-wrapper -->
<?php get_footer(); ?>