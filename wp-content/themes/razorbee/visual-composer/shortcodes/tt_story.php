<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();
?>

    <?php 
    $args = array(
       'p'              => $tt_atts['story_lists'],
       'post_type'      => 'tt-story',
       'post_status'    => 'publish',
    );

    $query = new WP_Query($args);

    if ( $query->have_posts() ) : ?>
        <!-- the loop -->
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <li class="<?php echo esc_attr($tt_atts['content_positon'].' '.$tt_atts['el_class']); ?>">
                <div class="posted-date">
                    <?php if (function_exists('rwmb_meta')) :
                        $story_year = rwmb_meta('nominee_story_year');
                        if ($story_year) : ?>
                            <span class="month"><?php echo intval($story_year)?></span>
                        <?php endif; 
                    endif; ?>
                    
                </div><!-- .posted-date -->

                <div class="timeline-panel">
                    <div class="timeline-content">
                        <div class="timeline-heading">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                        </div><!-- .timeline-heading -->

                        <div class="timeline-body">
                            <p>
                                <?php
                                    $limit_word = $tt_atts['word_limit'];
                                    $content = get_the_content();
                                    $trimmed_content = wp_trim_words( $content, $limit_word);
                                    echo $trimmed_content;
                                ?>
                            </p>

                            <?php if ($tt_atts['learn_more_text']): ?>
                                <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($tt_atts['learn_more_text']); ?> <i class="fa fa-long-arrow-right"></i></a>
                            <?php endif ?>

                        </div><!-- /timeline-body -->
                    </div> <!-- .timeline-content -->
                </div> <!-- .timeline-panel -->
            </li>

        <?php endwhile; ?>
        <!-- end of the loop -->

        <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php esc_html_e( 'Story not found !', 'nominee' ); ?></p>
        <?php endif; ?>
<?php echo ob_get_clean();