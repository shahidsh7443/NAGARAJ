<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>
<div class="page-wrapper single-reformation-page">
	<div class="container">
		
		<?php if (nominee_option('reformation-navigation', false, true)) : ?>
			<div class="reformation-navigation text-center">
				<ul class="list-inline">
					<li><?php previous_post_link('<div class="previous">%link</div>', '<i class="fa fa-angle-left"></i>'); ?></li>
					<?php 
						$tt_reformation_link = nominee_option('all-reformation-link');
					?>
					<li><a href="<?php echo esc_url(get_page_link($tt_reformation_link)); ?>"><i class="fa fa-th-large"></i></a></li>
					
					<li><?php next_post_link('<div class="next">%link</div>', '<i class="fa fa-angle-right"></i>'); ?></li>
				</ul>
			</div>
		<?php endif; ?>

		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
					
					<div class="col-md-7">
						<?php if ( has_post_thumbnail() ) : ?>
		  					<div class="reformation-thumb">
							<?php the_post_thumbnail( 'nominee-reformation-thumb', array( 'class' => 'img-responsive' ) ); ?>
							</div> <!-- .reformation-thumb -->
						<?php endif; ?>
					</div> <!-- .col -->
	  				
	  				<div class="col-md-5">
						<div class="entry-content">
							<?php the_content(); ?>

							<?php if (nominee_option('reformation-share', false, true)) :
								get_template_part( 'template-parts/post', 'share');
							endif; ?>

						</div>
					</div>
		  			
				</div> <!-- #post-# -->

			<?php endwhile; // end of the loop. ?>
		</div> <!-- .row -->

		<?php if (nominee_option('related-reformation', false, true)) : ?>
			<div class="row">
				<?php       
					$tt_reformation_cat = wp_get_object_terms( $post->ID, 'tt-reformation-cat', array('fields' => 'ids') );
					// arguments
					$args = array(
					'post_type' => 'tt-reformation',
					'post_status' => 'publish',
					'posts_per_page' => 3, // you may edit this number
					'orderby' => 'rand',
					'tax_query' => array(
						array(
						  'taxonomy' => 'tt-reformation-cat',
						  'field' => 'id',
						  'terms' => $tt_reformation_cat
						)
					),
					'post__not_in' => array ($post->ID),
					);
					$related_post = new WP_Query( $args ); ?>

					<?php if ( $related_post->have_posts() ) : ?>

						<?php do_action('nominee_before_related_reformation');?>

						<div class="related-reformation clearfix">

							<?php /* Start the Loop */ ?>
							<?php while ( $related_post->have_posts() ) : $related_post->the_post(); ?>
								
								<div class="tt-item reformation-padding col-md-4 col-sm-6 col-xs-12">

									<figure class="tt-effect">
										<?php
											echo get_the_post_thumbnail( get_the_ID(), 'nominee-reformation-thumb', array( 'class' => 'img-responsive', 'alt' => get_the_title()));
										?>
									    <figcaption>
									      	<div class="content">
									            <div class="links">
									            	<?php
										            	$tt_attachment_id = get_post_thumbnail_id(get_the_ID());
														$tt_image_attr = wp_get_attachment_image_src($tt_attachment_id, 'full' );
									            	?>
									            	<a class="image-link" href="<?php echo esc_url($tt_image_attr[0]); ?>"><i class="fa fa-search-plus"></i></a>
									            	<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>                          
									            </div><!-- /.links -->
									      	</div>
									    </figcaption>
									</figure>
								</div>

							<?php endwhile; ?>

						</div>

						<?php do_action('nominee_after_related_reformation');?>

					<?php endif; ?>

					<?php wp_reset_postdata(); 
				?>
			</div> <!-- .row -->
		<?php endif; ?>
	</div> <!-- .container -->
</div><!-- .single-reformation-page -->

<?php get_footer(); ?>