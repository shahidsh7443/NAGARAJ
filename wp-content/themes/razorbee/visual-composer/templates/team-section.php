<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_team_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Team Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_team_section';

	ob_start();
	?>[vc_row full_width="stretch_row" css=".vc_custom_1443884688748{margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 100px !important;background-color: #f4f4f4 !important;}"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="Responsible team"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][tt_member_carousel post_limit="-1" bio_visibility="visible-bio" member_order="ASC" designation_visibility="visible-designation"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_team_section' );