<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<?php $page_template = get_post_meta(get_queried_object_id(), '_wp_page_template', true); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if (function_exists('rwmb_meta')) :
            $audio_mp3 = rwmb_meta( 'nominee_featured_mp3', 'type=file_input' );
            $audio_ogg = rwmb_meta( 'nominee_featured_ogg', 'type=file_input' );
            $audio_wav = rwmb_meta( 'nominee_featured_wav', 'type=file_input' );
            $embed_audio = rwmb_meta( 'nominee_embed_audio', 'type=oembed' );
                    
            if ( !empty($embed_audio) or !empty($audio_mp3) or !empty($audio_ogg) or !empty($audio_wav) ) : ?>
                <div class="post-thumbnail blog-audio">
                    <?php

                       // print_r($embed_audio);

                        if ($embed_audio and (empty($audio_mp3) or empty($audio_ogg) or empty($audio_wav))) :

                            echo rwmb_meta( 'nominee_embed_audio', 'type=oembed' );

                        elseif (!empty($audio_mp3) or !empty($audio_ogg) or !empty($audio_wav)) : ?>

                        <audio preload="auto" controls="controls">

                            <?php if (!empty($audio_mp3)) : ?>
                                <source src="<?php echo esc_url($audio_mp3); ?>" type="audio/mpeg"/>
                            <?php endif; ?>

                            <?php if (!empty($audio_ogg)) : ?>
                                <source src="<?php echo esc_url($audio_ogg); ?>" type="audio/ogg"/>
                            <?php endif; ?>

                            <?php if (!empty($audio_wav)) : ?>
                                <source src="<?php echo esc_url($audio_wav); ?>" type="audio/wav"/>
                            <?php endif; ?>
                            
                        </audio>

                    <?php endif; ?>
                </div> <!-- .blog-audio -->
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