<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<?php $page_template = get_post_meta(get_queried_object_id(), '_wp_page_template', true); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if (function_exists('rwmb_meta')) :
            $video_mp4 = rwmb_meta( 'nominee_featured_mp4', 'type=file_input' );
            $video_webm = rwmb_meta( 'nominee_featured_webm', 'type=file_input' );
            $video_ogv = rwmb_meta( 'nominee_featured_ogv', 'type=file_input' );
            // $embed_video = rwmb_meta( 'nominee_embed_video', 'type=oembed' );
            $embed_video = rwmb_meta( 'nominee_embed_video');
                    
            if ( !empty($embed_video) or !empty($video_mp4) or !empty($video_webm) or !empty($video_ogv) ) : ?>
                <div class="post-thumbnail blog-video">
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php
                            if ($embed_video and (empty($video_mp4) or empty($video_webm) or empty($video_ogv))) :

                                echo rwmb_meta( 'nominee_embed_video');

                            elseif (!empty($video_mp4) or !empty($video_webm) or !empty($video_ogv)) : ?>
                                <video preload="auto" controls="controls">
                                    <?php if (!empty($video_mp4)) : ?>
                                        <source src="<?php echo esc_url($video_mp4); ?>" type="video/mp4"/>
                                    <?php endif; ?>

                                    <?php if (!empty($video_webm)) : ?>
                                        <source src="<?php echo esc_url($video_webm); ?>" type="video/webm"/>
                                    <?php endif; ?>

                                    <?php if (!empty($video_ogv)) : ?>
                                        <source src="<?php echo esc_url($video_ogv); ?>" type="video/ogv"/>
                                    <?php endif; ?>
                                </video>
                            <?php 
                            endif; 
                        ?>
                    </div>
                </div>
            <?php endif; 
        endif;
        ?>

        <?php
            if ( is_single() ) :
                the_title( '<h2 class="entry-title">', '</h2>' );
            else :
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            endif;
        ?>
        
        <div class="entry-meta">
            <?php if ($page_template == 'page-templates/blog-grid.php' || $page_template == 'page-templates/blog-grid-left-sidebar.php' || $page_template == 'page-templates/blog-grid-right-sidebar.php') :
                nominee_grid_posted_on();
            else :
                nominee_posted_on();
            endif; ?>
        </div><!-- .entry-meta -->
        
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php 
            if (is_single() || !has_excerpt()) :
                the_content( '<span class="readmore">' . esc_html__( 'Read More', 'nominee' ) . '</span>' );
            else :
                the_excerpt();
            endif;

            wp_link_pages(array(
                'before'      => '<div class="page-pagination"><span class="page-links-title">' . esc_html__('Pages:', 'nominee') . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ));
        ?>
    </div><!-- .entry-content -->

    <?php if (is_single()): ?>

        <footer class="entry-footer">
            <div class="post-tags">
                <?php $tags_list = get_the_tag_list('', esc_html__(', ', 'nominee'));
                    if ($tags_list) : ?>
                        <span class="tags-links">
                            <i class="fa fa-tags"></i><?php printf(esc_html__('%1$s', 'nominee'), $tags_list); ?>
                        </span>
                    <?php endif; 
                ?>
            </div> <!-- .post-tags -->

            <?php get_template_part( 'template-parts/post', 'share'); ?>
        </footer>
        
        <?php
            if (get_the_author_meta( 'description' )) :
                get_template_part( 'author-bio' ); 
            endif;
        ?>
        
    <?php endif; ?>
</article><!-- #post-## -->