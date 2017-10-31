<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

get_header(); ?>

	<div class="page-wrapper content-wrapper">
		<div class="container">
			<div class="row">
				
				<div class="col-md-12">
					<div id="main" class="posts-content" role="main">

						<?php if ( have_posts() ) : 
							woocommerce_content();
						endif; ?>

					</div> <!-- .posts-content -->
				</div> <!-- .col-## -->

			</div> <!-- .row -->	
		</div> <!-- .container -->
	</div> <!-- .content-wrapper -->

<?php get_footer(); ?>