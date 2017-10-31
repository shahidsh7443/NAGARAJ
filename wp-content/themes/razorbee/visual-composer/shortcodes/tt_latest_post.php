<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();

    $link     = vc_build_link($tt_atts['custom_link']);
    $a_href   = $link['url'];
    $a_title  = $link['title'];
    $a_target = trim($link['target']);

    $args = array(
       'post_type'      => 'post',
       'post_status'    => 'publish',
       'posts_per_page' => $tt_atts['post_limit'],
       'post__not_in'   => get_option( 'sticky_posts' ),
       'orderby'        => 'date'
    ); ?>

    <div class="press-release-wrapper <?php echo esc_attr($tt_atts['el_class']); ?>">
        <div class="row">

            <?php $query = new WP_Query( $args ); ?>

            <?php if ( $query->have_posts() ) : ?>

                <!-- the loop -->
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                   <div class="col-md-<?php echo esc_attr($tt_atts['grid_column']); ?> col-sm-6">
                        <article class="blog-wrap">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('nominee-latest-press', array('class' => 'img-responsive', 'alt' => get_the_title())); ?></a>
                            </div><!-- /.post-thumbnail -->
                        <?php } ?>
                            <div class="blog-content">
                                <header class="entry-header">
                                    <div class="entry-meta">
                                        <ul class="list-inline clearfix">
                                            <li><span class="the-time"><?php the_time('j M, Y') ?></span></li>
                                            
                                            <?php if (function_exists('zilla_likes')) { ?>
                                                <li>
                                                    <span class="likes">
                                                        <?php zilla_likes(); ?>
                                                    </span>
                                                </li>
                                            <?php } ?>
                                            
                                        </ul>
                                    </div><!-- /.entry-meta -->

                                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </header><!-- /.entry-header -->

                                <div class="entry-content">
                                    <p>
                                        <?php
                                            $tt_trim_word = $tt_atts['word_limit'];
                                            $content = get_the_content();
                                            echo wp_trim_words( $content, $tt_trim_word);
                                        ?>
                                    </p>
                                </div><!-- /.entry-content -->

                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="readmore"><?php echo esc_html($tt_atts['readmore_text']); ?> <i class="fa fa-long-arrow-right"></i></a>
                                </footer><!-- /.entry-footer -->
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'nominee' ); ?></p>
            <?php endif; ?>

        </div> <!-- .row -->
        
        <?php if ($tt_atts['show_all_button'] == 'yes') : ?>
            <div class="text-center lodemore">
                <a href="<?php echo esc_url($a_href); ?>" class="btn btn-primary btn-xl"><?php echo esc_html($tt_atts['button_text']);?></a>
            </div>
        <?php endif; ?>
        
    </div> <!-- .press-release-wrapper -->

<?php echo ob_get_clean();