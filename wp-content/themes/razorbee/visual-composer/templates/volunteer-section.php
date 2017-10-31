<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_volunteer_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Volunteer Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_volunteer_section';

	ob_start();
	?>[vc_row parallax="content-moving" parallax_image="151" overlay_color="yes" full_width="stretch_row" css=".vc_custom_1450539200531{margin-bottom: 0px !important;padding-top: 110px !important;padding-bottom: 110px !important;}" el_class="volunteer-section"][vc_column width="2/3" offset="vc_col-lg-offset-2 vc_col-md-offset-2"][tt_section_title title_alignment="text-center" title_color_option="custom-color" section_separator="no" title="Join the volunteers!" title_color="#ffffff"][/tt_section_title][vc_column_text css=".vc_custom_1443849512222{margin-bottom: 50px !important;}"]<span style="color: #ffffff;">Conveniently disseminate quality niche markets after just in time results. Seamlessly exploit synergistic technologies whereas customer directed "outside the box" thinking. Conveniently revolutionize resource sucking schemas vis-a-vis equity invested sources. technologies whereas customer directed invested sources.</span>[/vc_column_text][vc_raw_html]JTNDYSUyMGhyZWYlM0QlMjIlMjNjb250YWN0JTIyJTIwY2xhc3MlM0QlMjJ0dC1zY3JvbGwlMjBidG4lMjBidG4tZGVmYXVsdCUyMiUzRUpvaW4lMjBOb3clMjElM0MlMkZhJTNF[/vc_raw_html][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_volunteer_section' );