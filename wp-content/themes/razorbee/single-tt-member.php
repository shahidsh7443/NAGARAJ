<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>
<div class="page-wrapper single-member-page">
	<div class="container">
		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
					
					<div class="col-md-5 col-sm-5">
						<?php if ( has_post_thumbnail() ) : ?>
		  					<div class="member-thumb">
								<?php the_post_thumbnail( 'nominee-member', array( 'class' => 'img-responsive', 'alt' => get_the_title())); ?>
							</div> <!-- .member-thumb -->
						<?php endif; ?>
					</div> <!-- .col -->
	  				
	  				<div class="col-md-7 col-sm-7">
						<div class="member-content">
							<h2><?php the_title(); ?></h2>

							<?php if (function_exists('rwmb_meta')) :
	                            $member_designation = rwmb_meta('nominee_member_designaion');
	                            if ($member_designation) : ?>
	                                <span class="designation"><?php echo esc_html($member_designation); ?></span>
	                            <?php endif;
	                        endif; ?>

	                        <?php if (function_exists('rwmb_meta')) : ?>
                            
	                            <div class="team-social">
	                                <ul class="list-inline">
	                                    <?php
	                                    
	                                    $facebook_link = rwmb_meta('nominee_facebook_link');
	                                    if ($facebook_link) : ?>
	                                        <li>
	                                            <a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook"></i></a>
	                                        </li>
	                                    <?php endif; 

	                                    $twitter_link = rwmb_meta('nominee_twitter_link');
	                                    if ($twitter_link) : ?>
	                                        <li>
	                                            <a href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter"></i></a>
	                                        </li>
	                                    <?php endif; 

	                                    $google_plus_link = rwmb_meta('nominee_google_plus_link');
	                                    if ($google_plus_link) : ?>
	                                        <li>
	                                            <a href="<?php echo esc_url($google_plus_link); ?>"><i class="fa fa-google-plus"></i></a>
	                                        </li>
	                                    <?php endif; 

	                                    $linkedin_link = rwmb_meta('nominee_linkedin_link');
	                                    if ($linkedin_link) : ?>
	                                        <li>
	                                            <a href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin"></i></a>
	                                        </li>
	                                    <?php endif;

	                                    $flickr_link = rwmb_meta('nominee_flickr_link');
	                                    if ($flickr_link) : ?>
	                                        <li>
	                                            <a href="<?php echo esc_url($flickr_link); ?>"><i class="fa fa-flickr"></i></a>
	                                        </li>
	                                    <?php endif;

	                                    $youtube_link = rwmb_meta('nominee_youtube_link');
	                                    if ($youtube_link) : ?>
	                                        <li>
	                                            <a href="<?php echo esc_url($youtube_link); ?>"><i class="fa fa-youtube"></i></a>
	                                        </li>
	                                    <?php endif; ?>
	                                </ul>
	                            </div> <!-- .team-social -->

	                        <?php endif; ?>

							<?php the_content(); ?>

							<?php if (function_exists('rwmb_meta')) : ?>

								<?php if (rwmb_meta('nominee_educational_qualification')): ?>
									<div class="educational-qualification">
										<?php echo rwmb_meta('nominee_educational_qualification'); ?>
									</div>
								<?php endif ?>
								
								<?php if (rwmb_meta('nominee_member_address')): ?>
									<address>
										<?php echo rwmb_meta('nominee_member_address'); ?>
									</address>
								<?php endif ?>
								
							<?php endif; ?>

						</div> <!-- .member-content -->
					</div> <!-- .col-# -->
		  			
				</div> <!-- #post-# -->

			<?php endwhile; // end of the loop. ?>
		</div> <!-- .row -->

		<?php if (nominee_option('more-member', false, true)) : ?>
			<div class="row">
				<?php       
					$args = array(
						'post_type' => 'tt-member',
						'post_status' => 'publish',
						'posts_per_page' => 4, // you may edit this number
						'orderby' => 'rand',
						'post__not_in' => array ($post->ID)
					);

					$member_post = new WP_Query( $args ); ?>

					<?php if ( $member_post->have_posts() ) : ?>
						<div class="more-member member-wrapper clearfix">
							<div class="section-intro">
								<?php if (nominee_option('more-staff-text')): ?>
									<h2><?php echo esc_html(nominee_option('more-staff-text', false, true)); ?></h2>
									<span class="separator"><span></span></span>
								<?php endif ?>
							</div>
							<?php while ( $member_post->have_posts() ) : $member_post->the_post(); ?>
								
								<div class="col-md-3 col-sm-6 col-xs-12">
									<figure class="thumbnail">
					                    <div class="thumb-wrapper">
					                        <?php the_post_thumbnail('nominee-member', array('alt'=> get_the_title(), 'class' => 'img-responsive' ));?>
					                        
					                        <?php if (function_exists('rwmb_meta')) : ?>
					                            
					                            <div class="team-social">
					                                <ul class="list-inline">
					                                    <?php
					                                    
					                                    $facebook_link = rwmb_meta('nominee_facebook_link');
					                                    if ($facebook_link) : ?>
					                                        <li>
					                                            <a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook"></i></a>
					                                        </li>
					                                    <?php endif; 

					                                    $twitter_link = rwmb_meta('nominee_twitter_link');
					                                    if ($twitter_link) : ?>
					                                        <li>
					                                            <a href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter"></i></a>
					                                        </li>
					                                    <?php endif; 

					                                    $google_plus_link = rwmb_meta('nominee_google_plus_link');
					                                    if ($google_plus_link) : ?>
					                                        <li>
					                                            <a href="<?php echo esc_url($google_plus_link); ?>"><i class="fa fa-google-plus"></i></a>
					                                        </li>
					                                    <?php endif; 

					                                    $linkedin_link = rwmb_meta('nominee_linkedin_link');
					                                    if ($linkedin_link) : ?>
					                                        <li>
					                                            <a href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin"></i></a>
					                                        </li>
					                                    <?php endif;

					                                    $flickr_link = rwmb_meta('nominee_flickr_link');
					                                    if ($flickr_link) : ?>
					                                        <li>
					                                            <a href="<?php echo esc_url($flickr_link); ?>"><i class="fa fa-flickr"></i></a>
					                                        </li>
					                                    <?php endif;

					                                    $youtube_link = rwmb_meta('nominee_youtube_link');
					                                    if ($youtube_link) : ?>
					                                        <li>
					                                            <a href="<?php echo esc_url($youtube_link); ?>"><i class="fa fa-youtube"></i></a>
					                                        </li>
					                                    <?php endif; ?>
					                                </ul>
					                            </div> <!-- .team-social -->

					                        <?php endif; ?>

					                    </div> <!-- .thumb-wrapper -->
					                  
					                    <figcaption class="caption text-center">
					                        
					                        <h3><?php the_title(); ?></h3>

					                        <?php if (function_exists('rwmb_meta')) :
					                            $member_designation = rwmb_meta('nominee_member_designaion');
					                            if ($member_designation) : ?>
					                                <span><?php echo esc_html($member_designation); ?></span>
					                            <?php endif; 
					                        endif; ?>
					                        <div class="member-biography">
					                            <a href="<?php the_permalink();?>"><?php esc_html_e('Biography', 'nominee');?><i class="fa fa-long-arrow-right"></i></a>
					                        </div>
					                    </figcaption>
					                </figure>
									
								</div>

							<?php endwhile; ?>

						</div>

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
						<p><?php esc_html_e( 'Member not found !', 'nominee' ); ?></p>
					<?php endif; ?>

			</div> <!-- .row -->
		<?php endif; ?>
	</div> <!-- .container -->
</div><!-- .single-member-page -->

<?php get_footer(); ?>