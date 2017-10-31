<?php
/*
Template Name: Blog Grid
*/

if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

<div class="blog-wrapper blog-grid content-wrapper">
	<?php if (nominee_option('blog-carousel-visibility') == true) : ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php get_template_part('template-parts/post', 'carousel');?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<div id="main" class="posts-content masonry-wrap clearfix" role="main">
				<?php
				// grid post $args
				$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
				$args  = array(
					'posts_per_page' => get_option( 'posts_per_page' ),
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'paged'          => $paged
				);
				$query = new WP_Query( $args );
				?>
				<?php if ( $query->have_posts() ) : ?>

					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-md-4 col-sm-6 col-xs-12 masonry-column">
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
						</div>
					<?php endwhile; ?>

					<div class="col-md-12 text-center">
						<?php nominee_list_posts_pagination(); ?>
					</div>

				<?php wp_reset_postdata();

				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
				
			</div><!-- .posts-content -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</div> <!-- .blog-wrapper -->
<?php get_footer();