<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$blog_sidebar = nominee_option('blog-sidebar', false, 'right-sidebar');
if ( $blog_sidebar == 'right-sidebar' and is_active_sidebar('nominee-blog-sidebar')) : ?>
    <div class="col-md-4 col-sm-4">
        <div class="tt-sidebar-wrapper right-sidebar" role="complementary">
            <?php dynamic_sidebar('nominee-blog-sidebar'); ?>
        </div>
    </div>
<?php elseif ( $blog_sidebar == 'left-sidebar' and is_active_sidebar('nominee-blog-sidebar')) : ?>
    <div class="col-md-4 col-md-pull-8 col-sm-4 col-sm-pull-8">
        <div class="tt-sidebar-wrapper left-sidebar" role="complementary">
            <?php dynamic_sidebar('nominee-blog-sidebar'); ?>
        </div>
    </div>
<?php endif;