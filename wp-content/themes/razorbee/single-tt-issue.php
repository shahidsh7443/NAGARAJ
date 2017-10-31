<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>
<div class="issue-wrapper content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div id="main" role="main">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class('posts-content'); ?>>
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
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </div><!-- .entry-content -->
                        </div> <!-- #post-## -->
                    <?php endwhile; // End of the loop. ?>
                </div> <!-- .posts-content -->
            </div> <!-- col-## -->

            <!-- Right sidebar -->
            <div class="col-md-4 col-sm-4">
                <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
                    <?php dynamic_sidebar('nominee-issue-sidebar'); ?>
                </div>
            </div>

        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .content-wrapper -->
<?php get_footer(); ?>