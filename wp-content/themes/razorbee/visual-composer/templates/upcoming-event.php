<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_upcoming_event_page( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Upcoming event page', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_upcoming_event_page';

	ob_start();
	?>[vc_row css=".vc_custom_1447341157459{margin-bottom: 0px !important;padding-bottom: 100px !important;}"][vc_column][tt_upcoming_event event_limit="3" start_event_month="01" end_event_month="12" event_year="2016" grid_column="4"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1450522752820{margin-bottom: 0px !important;padding-top: 130px !important;padding-bottom: 80px !important;background-color: #f4f4f4 !important;}"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="Legend Speakers"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][vc_row_inner gap="30"][vc_column_inner width="1/3"][tt_event_speaker speaker_list="2452" bio_visibility="visible-bio" designation_visibility="visible-designation"][/vc_column_inner][vc_column_inner width="1/3"][tt_event_speaker speaker_list="2447" bio_visibility="visible-bio" designation_visibility="visible-designation"][/vc_column_inner][vc_column_inner width="1/3"][tt_event_speaker speaker_list="2433" bio_visibility="visible-bio" designation_visibility="visible-designation"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1446483384727{margin-bottom: 0px !important;padding-top: 130px !important;padding-bottom: 130px !important;}"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="AGENDA AND SCHEDULE"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][vc_row_inner][vc_column_inner width="1/2"][tt_event_schedule speaker_name=" Jonathon Bin" speaker_photo="209" speech_subject="Introducing Speech" speech_time="10:00AM - 11:00AM"]Phosfluorescently expedite functional products via premium action items.[/tt_event_schedule][/vc_column_inner][vc_column_inner width="1/2"][tt_event_schedule speaker_name="Emma Bin" speaker_photo="2273" speech_subject="Describe election agenda" speech_time="11:00AM - 12:00PM"]Phosfluorescently expedite functional products via premium action items.[/tt_event_schedule][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_upcoming_event_page' );