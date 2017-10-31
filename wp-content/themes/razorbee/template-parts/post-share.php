<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif; ?>

<div class="post-share">
	<i class="fa fa-share-alt"></i>
	<ul class="list-inline">
		<?php if ( nominee_option( 'tt-share-button', 'facebook', TRUE ) ) : ?>
			<!--Facebook-->
			<li>
				<a class="facebook" href="//www.facebook.com/sharer.php?u=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;t=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Facebook!', 'nominee' ); ?>" target="_blank" data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( nominee_option( 'tt-share-button', 'twitter', TRUE ) ) : ?>
			<!--Twitter-->
			<li>
				<a class="twitter" href="//twitter.com/home?status=<?php echo rawurlencode( sprintf( esc_html__( 'Reading: %s', 'nominee' ), get_the_permalink() ) ) ?>" title="<?php esc_html_e( 'Share on Twitter!', 'nominee' ); ?>" target="_blank" data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( nominee_option( 'tt-share-button', 'google', TRUE ) ) : ?>
			<!--Google Plus-->
			<li>
				<a class="google-plus" href="//plus.google.com/share?url=<?php echo rawurlencode( get_the_permalink() ) ?>" title="<?php esc_html_e( 'Share on Google+!', 'nominee' ); ?>" target="_blank" data-toggle="tooltip" data-placement="top"><i class="fa fa-google-plus"></i></a>
			</li>
		<?php endif; ?>

		<?php if ( nominee_option( 'tt-share-button', 'linkedin', TRUE ) ) : ?>
			<!--Linkedin-->
			<li>
				<a class="linkedin" href="//www.linkedin.com/shareArticle?url=<?php echo rawurlencode( get_the_permalink() ) ?>&amp;mini=true&amp;title=<?php echo rawurlencode( get_the_title() ) ?>" title="<?php esc_html_e( 'Share on Linkedin!', 'nominee' ); ?>" target="_blank" data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
			</li>
		<?php endif; ?>
	</ul>
</div> <!-- .post-share -->