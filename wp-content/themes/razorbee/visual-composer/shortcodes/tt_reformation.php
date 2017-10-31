<?php
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

	ob_start();

	// vc_link
	$link     = vc_build_link($tt_atts['button_link']);
  	$a_href   = $link['url'];
  	$a_title  = $link['title'];
  	$a_target = trim($link['target']);

  	$target = '';
  	$title = '';

  	if ($a_target) :
  		$target = 'target='.$a_target.'';
  	endif;

  	if ($a_title) :
  		$title = 'title='.$a_title.'';
  	endif;

  	$taxonomy  = 'tt-reformation-cat';
	$tax_terms = get_terms( $taxonomy );
?>
		
	<div class="reformation-wrap <?php echo esc_attr($tt_atts['el_class']);?>">
		<?php if ($tt_atts['filter_visibility'] == 'visible') : ?>
			<div class="tt-filter-wrap text-center">
				<ul class="tt-filter">
					<li><button class="active" data-group="all"><?php esc_html_e('All', 'nominee');?></button></li>
					<?php foreach ( $tax_terms as $term_id ) :
						$term = get_term( $term_id, 'tt-reformation-cat' ); ?>
						<li>
							<button data-group="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></button>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<div class="row">
			<div class="tt-grid">
				<?php
				$args = array(
					'post_type'      => 'tt-reformation',
					'posts_per_page' => $tt_atts['post_limit'],
					'post_status'    => 'publish',
				);


				$query = new WP_Query( $args ); ?>

				<?php if ( $query->have_posts() ) : ?>

					<!-- the loop -->
					<?php while ( $query->have_posts() ) : $query->the_post(); 

					$terms = wp_get_post_terms( get_the_ID(), 'tt-reformation-cat' );
					$term = array();

					foreach ( $terms as $t ) :
						$term[ ] = '"'. $t->slug .'"';
					endforeach;

					?>
						<div class="tt-item reformation-padding col-lg-<?php echo esc_attr($tt_atts['grid_column'] .' '. $tt_atts['grid_padding']);?> col-md-4 col-sm-6 col-xs-12" data-groups='[<?php echo implode( ',', $term ); ?>]'>

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

							            <p>
					                        <?php
					                            $trim_word = $tt_atts['word_limit'];
					                            $tt_content = get_the_content();
					                            echo wp_trim_words( $tt_content, $trim_word);
					                        ?>
					                    </p>
							      	</div>
							    </figcaption>
							</figure>

						</div> <!-- /tt-item -->
					<?php endwhile; ?>
					<!-- end of the loop -->

					<?php wp_reset_postdata(); ?>

				<?php else : ?>
					<p><?php esc_html_e( 'Sorry, reformation not found !', 'nominee' ); ?></p>
				<?php endif; ?>
				
			</div> <!-- .tt-grid -->
		</div> <!-- .row -->

		<?php if ($tt_atts['reformation_button'] == 'show') : ?>
			<div class="text-center lodemore">
	        	<a href="<?php echo esc_url($a_href);?>" class="btn btn-primary btn-lg" <?php echo esc_attr($title.' '.$target);?>><?php echo esc_html($tt_atts['button_text']);?></a>
	        </div>
		<?php endif; ?>

	</div> <!-- .reformation-wrap -->

<?php echo ob_get_clean();