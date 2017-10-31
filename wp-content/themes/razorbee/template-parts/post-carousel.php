<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<!-- Carousel post -->
<div class="post-carousel-wrapper blog-carousel">
	
	<div class="latest-post-carousel">
		<?php $posts_per_page = nominee_option('post-per-page', false, true);

		$tt_cats = nominee_option('carousel-cat-post', false, false);

		if (nominee_option('carousel-post-query') == true) :
			$args = array(
				'posts_per_page' => $posts_per_page,
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'post__not_in'	 => get_option('sticky_posts')
			);
		else :
			$args = array(
				'posts_per_page' => $posts_per_page,
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'category__in' 	 => $tt_cats,
				'post__not_in'	 => get_option('sticky_posts')
			);
		endif;
		
		$carousel_query = new WP_Query( $args );

		if ( $carousel_query->have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $carousel_query->have_posts() ) : $carousel_query->the_post(); ?>
				
				<div class="item">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="carousel-post-thumbnail">
							<?php the_post_thumbnail('nominee-carousel-post', array('class' => 'img-responsive', 'alt' => get_the_title()));?>
							
							<div class="entry-content">
								<div class="entry-meta">
									<?php nominee_posted_on();?>
								</div>
								<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							</div>
						</div>
					</div>
			    </div>

			<?php 

			endwhile; ?>

		<?php else : ?>

			<p><?php esc_html_e('No post found !', 'nominee');?></p>

		<?php endif;

		wp_reset_postdata(); ?>
	</div>
</div>