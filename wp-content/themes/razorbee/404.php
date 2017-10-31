<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>
<div class="error-page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="not-found-icon text-center">
					<i class="fa fa-dropbox"></i>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="error-message">
				    <h2><?php esc_html_e( '404', 'nominee' ); ?></h2>

				    <h3><?php esc_html_e( 'Page Not Found!', 'nominee' ); ?></h3>

				    <p><?php esc_html_e( 'Sorry, we couldn\'t find the content you were looking for.', 'nominee' ); ?></p>

				    <a href="<?php echo esc_url(home_url('/'));?>"><i class="fa fa-reply-all"></i><?php esc_html_e( 'Go Back Home', 'nominee' ); ?></a>
				</div> <!-- /notfound-page -->
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div><!-- /.container -->
</div> <!-- /.content-wrapper -->
<?php get_footer(); ?>
