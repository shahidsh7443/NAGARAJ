<?php

    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

	$term_id = $tt_atts[ 'category_id' ];

	ob_start(); ?>

		<div class="post-category-wrapper">
			<?php if ($tt_atts['title_visibility'] == 'visible') : ?>
				<h2><?php echo get_cat_name( $term_id );?></h2>
			<?php endif; ?>
			
			<?php
			$args = array(
				'post_type'			=> 'post',
				'posts_per_page'	=> $tt_atts['post_limit'],
				'cat'				=> $term_id,
				'post_status'		=> 'publish'
			);
			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>
				
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					
					<div class="media">
						<?php if (has_post_thumbnail() and $tt_atts['thumbnail_visibility'] == 'visible' ) : ?>
							<a class="media-left" href="<?php the_permalink(); ?>">
								<?php echo get_the_post_thumbnail( get_the_ID(), 'nominee-category-post-thumb', array( 'class' => 'img-responsive', 'alt' => get_the_title())); ?>
							</a>
						<?php endif; ?>
						

						<div class="media-body">
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
							<div class="entry-meta">
                                <ul class="list-inline">
                                    <li>
                                        <?php printf('<a class="url fn n" href="%1$s">%2$s</a>', esc_url(get_author_posts_url(get_the_author_meta('ID'))), esc_html(get_the_author())) ?>
                                    </li>
                                    <li>
                                        <?php the_time(get_option( 'date_format' )) ?>
                                    </li>
                                </ul>
                            </div>
						</div> <!-- /.media-body -->
					</div> <!-- .media -->

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php esc_html_e( 'Post not found !', 'nominee' ); ?></p>
			<?php endif; ?>

			<?php if ($tt_atts['view_all_visibility'] == 'visible'): ?>
				<div class="all-category-links">
					<a href="<?php echo esc_url(get_category_link( $term_id ));?>"><i class="fa fa-list"></i><?php esc_html_e('View All', 'nominee');?></a>
				</div>
			<?php endif; ?>
			
		</div> <!-- .post-category-wrapper -->

	<?php echo ob_get_clean();