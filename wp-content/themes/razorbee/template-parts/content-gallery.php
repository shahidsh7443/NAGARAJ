<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<?php $page_template = get_post_meta(get_queried_object_id(), '_wp_page_template', true); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if (function_exists('rwmb_meta')) :
           
            $tt_slides = rwmb_meta('nominee_post_gallery','type=image_advanced');

            if ($tt_slides) : ?>
                <div class="post-thumbnail blog-gallery">
                    <?php 
                    if(count($tt_slides) > 0) : ?>
                        
                        <div class="carousel slide blog-carousel">
                            <div class="carousel-inner">
                                <?php 
                                    $carousel_count = 1; 
                                    foreach( $tt_slides as $slide ) : ?>
                                        <div class="item <?php if($carousel_count == 1) echo 'active'; ?>">
                                            <?php $images_src = wp_get_attachment_image_src( $slide['ID'], 'nominee-blog-thumbnail'); ?>
                                            <img class="img-responsive" src="<?php echo esc_url($images_src[0]); ?>" alt="<?php get_the_title();?>">
                                        </div>
                                    <?php
                                    $carousel_count++;
                                    endforeach;
                                ?>
                            </div> <!-- .carousel-inner -->
                            
                            <!-- Controls -->
                            <a class="left carousel-control" href=".blog-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                            <a class="right carousel-control" href=".blog-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
                        </div> <!-- .blog-carousel -->

                    <?php endif; ?>

                </div> <!-- .blog-gallery -->
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