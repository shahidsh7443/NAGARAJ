<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_reformation_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Reformation Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_reformation_section';

	ob_start();
	?>[vc_row section_content_width="container-fullwidth" full_width="stretch_row_content_no_spaces" css=".vc_custom_1449948631797{margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 100px !important;}" el_id="reformation"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="Reformation"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][tt_reformation filter_visibility="visible" post_limit="-1" word_limit="8" grid_column="3" reformation_button="show" button_link="url:http%3A%2F%2Ftrendytheme.net%2Fdemo%2Fwp%2Fnominee%2Fonepage%2Freformation%2F||"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_reformation_section' );