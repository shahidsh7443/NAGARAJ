<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_testimonial_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Testimonial Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_testimonial_section';

	ob_start();
	?>[vc_row full_width="stretch_row" parallax="content-moving-fade" parallax_image="86" overlay_color="yes" css=".vc_custom_1442516614922{margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][tt_testimonials][tt_testimonial photo_option="no" client_name="BIN BURHAN" client_designation="CNN" client_org="CNN"]Uniquely facilitate client-based metrics for B2B quality vectors. Interactively monetize adaptive applications for real-time e-services. Intrinsicly strategize tactical platforms.[/tt_testimonial][tt_testimonial photo_option="no" client_name="BIN BURHAN" client_designation="CNN" client_org="CNN"]Uniquely facilitate client-based metrics for B2B quality vectors. Interactively monetize adaptive applications for real-time e-services. Intrinsicly strategize tactical platforms.[/tt_testimonial][tt_testimonial photo_option="no" client_name="BIN BURHAN" client_designation="CNN" client_org="CNN"]Uniquely facilitate client-based metrics for B2B quality vectors. Interactively monetize adaptive applications for real-time e-services. Intrinsicly strategize tactical platforms.[/tt_testimonial][/tt_testimonials][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_testimonial_section' );