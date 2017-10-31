<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>
<div class="page-wrapper single-story-page">
	<div class="container">
		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	  				<div class="col-md-12">
						<div class="entry-content">
							<h2><?php the_title(); ?></h2>

							<?php the_content(); ?>

							<?php if (nominee_option('reformation-share', false, true)) :
								get_template_part( 'template-parts/post', 'share');
							endif; ?>

						</div>
					</div>
				</div> <!-- #post-# -->

			<?php endwhile; // end of the loop. ?>
		</div> <!-- .row -->
	</div> <!-- .container -->
</div><!-- .single-story-page -->
<?php get_footer(); ?>