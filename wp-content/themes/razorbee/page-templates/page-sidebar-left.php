<?php
/*
Template Name: Page Sidebar Left
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

<div class="page-wrapper content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-push-4 col-sm-8 col-sm-push-4">
				<div id="main" class="posts-content" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php if ( nominee_option( 'page-comment-visibility', false, comments_open() ) ) : 
							
							// If comments are open or we have at least one comment, load up the comment template
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							
						endif; ?>

					<?php endwhile; // End of the loop. ?>

				</div> <!-- .posts-content -->
			</div> <!-- .col-# -->

			<div class="col-md-4 col-md-pull-8 col-sm-4 col-sm-pull-8">
				<div class="tt-sidebar-wrapper left-sidebar" role="complementary">
					<?php dynamic_sidebar( 'nominee-page-sidebar' ); ?>
				</div>
			</div> <!-- .col-# -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .content-wrapper -->
<?php get_footer(); ?>