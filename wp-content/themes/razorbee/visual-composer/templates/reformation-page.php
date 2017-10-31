<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_reformation_page( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Reformation Page', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_reformation_page';

	ob_start();
	?>[vc_row section_content_width="container-fullwidth" full_width="stretch_row_content_no_spaces" css=".vc_custom_1450543279414{margin-bottom: 0px !important;padding-bottom: 100px !important;}"][vc_column][tt_reformation filter_visibility="visible" post_limit="-1" word_limit="10" grid_column="3"][/vc_column][/vc_row][vc_row css=".vc_custom_1446482321133{margin-bottom: 0px !important;padding-bottom: 100px !important;}"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="Get In Touch"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][contact-form-7 id="2537"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_reformation_page' );