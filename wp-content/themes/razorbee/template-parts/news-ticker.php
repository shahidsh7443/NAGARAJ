<div class="news-ticker-wrapper">
    <span><i class="fa fa-rss"></i> <?php esc_html_e('Press :', 'nominee' );?> </span>
    <ul class="news-ticker">
    	<?php 
    	$args  = array(
			'posts_per_page' => nominee_option('news-feed-limit', false, true),
			'post_type'      => 'post',
			'post_status'    => 'publish'
		);
		$query = new WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php $title_limit = nominee_option('news-feed-title-limit', false, true); ?>

				<li><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $title_limit); ?></a></li>

			<?php endwhile; ?>

		<?php wp_reset_postdata();

		else : ?>
			<p><?php esc_html_e( 'Post not found !', 'nominee' ); ?></p>
		<?php endif; ?>
    </ul>
</div>