<?php if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

$tt_page_template = basename( get_page_template_slug() );

$page_header_visibility = NULL;

if (function_exists('rwmb_meta')) :
    $page_header_visibility = rwmb_meta('nominee_page_header_visibility');
endif;


if ($page_header_visibility == 'header-section-show' || $page_header_visibility == NULL) :

	$page_title_visibility = NULL;
	if (function_exists('rwmb_meta')) :
	    $page_title_visibility = rwmb_meta('nominee_page_title_visibility');
	endif;

	$overlay_visibility = NULL;
	if (function_exists('rwmb_meta')) :
	    $overlay_visibility = rwmb_meta('nominee_background_overlay');
	endif;

	if ( is_page() and $tt_page_template != 'template-home.php' ) : ?>
		<div class="page-header-section" style="background-image: url('<?php echo esc_url(nominee_page_header_background('http://placehold.it/1920x450')); ?>');" role="banner">
			
			<?php if ($overlay_visibility == 'bg_overlay_enable' || $overlay_visibility == NULL) : ?>
		        <div class="tt-overlay"></div>
		    <?php endif; ?>

			<div class="container">
				<div class="page-header">

					<?php if ($page_title_visibility == 'page-title-show' || $page_title_visibility == NULL) : ?>
				        <h2><?php echo esc_html( nominee_page_header_section_title() ); ?></h2>
				    <?php endif; ?>

					<?php if (nominee_option('tt-breadcrumb', false, true)) :
						nominee_breadcrumbs(); 
					endif; ?>
				</div><!-- /.page-header -->
			</div> <!-- /.container -->
		</div> <!-- .page-header-section -->
	<?php endif; ?>

	<?php if ( ! is_page() && ! is_singular('tt-event') ) : ?>
		<div class="page-header-section" style="background-image: url('<?php echo esc_url(nominee_page_header_background('http://placehold.it/1920x450')); ?>');" role="banner">
			<?php if ($overlay_visibility == 'bg_overlay_enable' || $overlay_visibility == NULL) : ?>
		        <div class="tt-overlay"></div>
		    <?php endif; ?>
			<div class="container">
				<div class="page-header">
					<?php if ($page_title_visibility == 'page-title-show' || $page_title_visibility == NULL) : ?>
				        <h2><?php echo esc_html( nominee_page_header_section_title() ); ?></h2>
				    <?php endif; ?>

					<?php if (nominee_option('tt-breadcrumb', false, true) && ! is_singular('post')) :
						nominee_breadcrumbs(); 
					endif; ?>
				</div><!-- /.page-header -->
			</div> <!-- /.container -->
		</div> <!-- .page-header-section -->
	<?php endif; ?>
<?php endif; ?>