<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<div class="post-author">
    <div class="media">
        <div class="media-left">
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="media-object">
                <?php
                echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'nominee_author_bio_avatar_size', 100 ) ); 
                ?>
            </a>
        </div>
        
        <div class="media-body">
            <div class="author-info">
                <h3><?php echo get_the_author() ?></h3>
                <p><?php echo esc_html(get_the_author_meta('description')); ?></p>
            </div>
        </div>
    </div> <!-- .media -->
</div> <!-- .post-author -->