<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_campaign_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Campaign Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_campaign_section';

	ob_start();
	?>[vc_row el_id="event" css=".vc_custom_1450542524033{margin-bottom: 0px !important;padding-top: 130px !important;}"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="Campaign"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][/vc_column][/vc_row][vc_row css=".vc_custom_1447779242230{margin-bottom: 0px !important;padding-bottom: 100px !important;}"][vc_column offset="vc_col-md-6"][tt_featured_event event_lists="205"][/vc_column][vc_column offset="vc_col-md-6"][tt_upcoming_event event_limit="4" start_event_month="01" end_event_month="12" event_year="2016" grid_column="6"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_campaign_section' );