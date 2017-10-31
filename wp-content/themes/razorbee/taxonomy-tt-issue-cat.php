<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>
<div class="issue-wrapper content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div id="main" class="row" role="main">

                    <?php
                    // grid post $args
                    $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                    $args  = array(
                        'post_type'      => 'tt-issue',
                        'posts_per_page' => nominee_option('category-issue-limit', false, true),
                        'tt-issue-cat'   => $term->slug,
                        'post_status'    => 'publish',
                        'paged'          => $paged
                    );

                    $query = new WP_Query( $args );
                    ?>
                    <?php if ( $query->have_posts() ) : ?>

                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class('posts-content'); ?>>
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="col-md-4">
                                        <div class="post-thumbnail">
                                            <?php the_post_thumbnail('nominee-issue-thumbnail', array('alt' => get_the_title(), 'class' => 'img-responsive')); ?>
                                        </div><!-- .post-thumbnail -->
                                    </div> <!-- .col-# -->
                                <?php endif; ?>

                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="col-md-8">
                                <?php else : ?>
                                    <div class="col-md-12">
                                <?php endif; ?>
                                    <div class="entry-content">
                                        <div class="issue-category">
                                            <span><?php esc_html_e('In', 'nominee');?></span>
                                            <?php $issue_terms = wp_get_post_terms( get_the_ID(), 'tt-issue-cat');
                                                $count = count($issue_terms);
                                                $increament = 0;

                                                foreach ( $issue_terms as $term ) :
                                                    $increament++;
                                                    echo '<a href="' . esc_url( get_term_link( $term, 'tt-issue-cat' ) ) . '" title="' . sprintf( __( 'View all posts in %s', 'nominee' ), $term->name ) . '" ' . '>' . $term->name . '</a>';
                                                    
                                                    if ($increament < $count) :
                                                        echo ' , ';
                                                    endif;

                                                endforeach; ?>
                                        </div>
                                        <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                                        <?php the_content( '<span class="readmore">' . esc_html__( 'Read More', 'nominee' ) . '</span>' ); ?>
                                    </div><!-- .entry-content -->
                                </div>
                            </div><!-- #post-## -->

                        <?php endwhile; ?>

                        <div class="col-md-12 text-center">
                            <?php nominee_list_posts_pagination(); ?>
                        </div>

                        <?php
                    else : ?>
                        <p><?php esc_html_e('Issue not found !', 'nominee');?></p>
                    <?php endif;
                        wp_reset_postdata();
                    ?>
                </div><!-- .posts-content -->
            </div> <!-- .col -->

            <!-- Right sidebar -->
            <div class="col-md-4 col-sm-4">
                <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
                    <?php dynamic_sidebar('nominee-issue-sidebar'); ?>
                </div>
            </div>

        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .blog-wrapper -->
<?php get_footer();