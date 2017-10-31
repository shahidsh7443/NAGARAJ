<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_address_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Address Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_address_section';

	ob_start();
	?>[vc_row section_content_width="container-fullwidth" full_width="stretch_row_content_no_spaces" css=".vc_custom_1450542270392{margin-bottom: 0px !important;background-color: #f4f4f4 !important;}"][vc_column width="1/2"][tt_google_map tt_latitude="40.712784" tt_longitude="-74.005941" map_marker="183"][/vc_column][vc_column width="1/2" el_class="location-info"][vc_column_text]<strong>Head Office</strong>
795 Folsom Ave, Suite 600
San Francisco, CA 94107[/vc_column_text][vc_column_text]<strong>Phone</strong>
+00 456-7890
+00 456-7890[/vc_column_text][vc_column_text]<strong>Email</strong>
<a href="mailto:first.last@example.com">first.last@example.com</a>
<a href="mailto:your.name@example.com">your.name@example.com</a>[/vc_column_text][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_address_section' );