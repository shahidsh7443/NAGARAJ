<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_mission_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Mission Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_mission_section';

	ob_start();
	?>[vc_row css=".vc_custom_1443117950390{margin-bottom: 0px !important;padding-top: 130px !important;padding-bottom: 130px !important;}" el_id="mission"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="My mission and vision"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][vc_row_inner css=".vc_custom_1447174641155{margin-bottom: 50px !important;}"][vc_column_inner width="1/3"][tt_icon_block show_icon="yes" icon_type="flat-icon" icon_position="icon-position-left" flat_icon="flaticon-house121" title="Economic"]Efficiently orchestrate resource sucking human capital whereas future-proof outsourcing. Credibly actualize one-to-one meta-services.[/tt_icon_block][/vc_column_inner][vc_column_inner width="1/3"][tt_icon_block show_icon="yes" icon_type="flat-icon" icon_position="icon-position-left" flat_icon="flaticon-lifeline5" title="Medical"]Efficiently orchestrate resource sucking human capital whereas future-proof outsourcing. Credibly actualize one-to-one meta-services.[/tt_icon_block][/vc_column_inner][vc_column_inner width="1/3"][tt_icon_block show_icon="yes" icon_type="flat-icon" icon_position="icon-position-left" flat_icon="flaticon-share11" title="Social"]Efficiently orchestrate resource sucking human capital whereas future-proof outsourcing. Credibly actualize one-to-one meta-services.[/tt_icon_block][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1447174648075{margin-bottom: 0px !important;}"][vc_column_inner width="1/3"][tt_icon_block show_icon="yes" icon_type="flat-icon" icon_position="icon-position-left" flat_icon="flaticon-earth206" title="Foreign policy"]Efficiently orchestrate resource sucking human capital whereas future-proof outsourcing. Credibly actualize one-to-one meta-services.[/tt_icon_block][/vc_column_inner][vc_column_inner width="1/3"][tt_icon_block show_icon="yes" icon_type="flat-icon" icon_position="icon-position-left" flat_icon="flaticon-graduate37" title="Education"]Efficiently orchestrate resource sucking human capital whereas future-proof outsourcing. Credibly actualize one-to-one meta-services.[/tt_icon_block][/vc_column_inner][vc_column_inner width="1/3"][tt_icon_block show_icon="yes" icon_type="flat-icon" icon_position="icon-position-left" flat_icon="flaticon-home166" title="Family"]Efficiently orchestrate resource sucking human capital whereas future-proof outsourcing. Credibly actualize one-to-one meta-services.[/tt_icon_block][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_mission_section' );