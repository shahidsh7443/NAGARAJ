<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_single_event_page( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Single Event Page', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_single_event_page';

	ob_start();
	?>[vc_row css=".vc_custom_1447772594645{margin-bottom: 0px !important;padding-bottom: 100px !important;}"][vc_column width="1/2"][vc_column_text]
<h2>WELCOME TO OUR EVENT</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1447772606270{margin-bottom: 30px !important;}"]Progressively fabricate principle-centered potentialities whereas mission-critical networks. Interactively repurpose magnetic testing procedures with intermandated schemas. Competently incentivize standards compliant meta-services without low-risk high-yield architectures. Competently fashion low-risk high-yield architectures via emerging relationships. Conveniently provide access to tactical architectures for state of the art processes. Intrinsicly disintermediate user-centric meta-services vis-a-vis inexpensive interfaces. Progressively orchestrate high-payoff core competencies via mission-critical catalysts for change. Seamlessly architect enabled paradigms vis-a-vis plug-and-play best practices. Intrinsicly coordinate market-driven paradigms with exceptional catalysts for change. Holisticly predominate cost effective best practices before ethical networks.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_single_image image="2270" img_size="full"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1450504742628{margin-bottom: 0px !important;padding-top: 130px !important;padding-bottom: 80px !important;background-color: #f4f4f4 !important;}"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="LEGEND SPEAKERS" css=".vc_custom_1450460147936{margin-bottom: 80px !important;}"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][vc_row_inner gap="30"][vc_column_inner width="1/3"][tt_event_speaker speaker_list="2453" bio_visibility="visible-bio" designation_visibility="visible-designation"][/vc_column_inner][vc_column_inner width="1/3"][tt_event_speaker speaker_list="2433" bio_visibility="visible-bio" designation_visibility="visible-designation"][/vc_column_inner][vc_column_inner width="1/3"][tt_event_speaker speaker_list="2432" bio_visibility="visible-bio" designation_visibility="visible-designation"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1447773233109{margin-bottom: 0px !important;padding-top: 130px !important;padding-bottom: 130px !important;}"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="AGENDA AND SCHEDULE" css=".vc_custom_1450460161918{margin-bottom: 80px !important;}"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][vc_row_inner css=".vc_custom_1450460358343{margin-bottom: 30px !important;}"][vc_column_inner width="1/2"][tt_event_schedule speaker_name="Jonathon Bin" speaker_photo="209" speech_subject="Introducing Speech" speech_time="10:00AM - 11:00AM"]Phosfluorescently expedite functional products via premium action items.[/tt_event_schedule][/vc_column_inner][vc_column_inner width="1/2"][tt_event_schedule speaker_name="John William" speaker_photo="2272" speech_subject="Describe election agenda" speech_time="11:00AM - 12:00PM"]Phosfluorescently expedite functional products via premium action items.[/tt_event_schedule][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/2"][tt_event_schedule speaker_name="Emma Bin" speaker_photo="2273" speech_subject="Parliamentarian speech" speech_time="12:00PM - 12:30PM"]Phosfluorescently expedite functional products via premium action items.[/tt_event_schedule][/vc_column_inner][vc_column_inner width="1/2"][tt_event_schedule speaker_name="Bin Tomas" speaker_photo="2274" speech_subject="Politics for humanities" speech_time="12:30PM - 01:00PM"]Phosfluorescently expedite functional products via premium action items.[/tt_event_schedule][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1450459784094{margin-bottom: 0px !important;padding-top: 125px !important;padding-bottom: 130px !important;background-color: #222222 !important;}" el_class="text-center white-text"][vc_column][vc_column_text]
<h2>YOUR DONATION MAKE HELP US!</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1450460061508{margin-bottom: 0px !important;}"]Conveniently disseminate quality niche markets after just in time results. Seamlessly exploit synergistic technologies whereas customer
directed "outside the box" thinking. Conveniently revolutionize resource sucking schemas vis-a-vis equity invested sources.
technologies whereas customer directed invested sources.[/vc_column_text][tt_donation title_alignment="text-center" title_color_option="custom-color" title="Your donation make help us!" title_color="#ef4836"][/vc_column][/vc_row][vc_row css=".vc_custom_1444593994450{margin-bottom: 0px !important;padding-top: 130px !important;}"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="upcoming campaing" css=".vc_custom_1450460190909{margin-bottom: 80px !important;}"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][tt_upcoming_event event_limit="3" start_event_month="11" end_event_month="11" event_year="2016" grid_column="4" event_month="10"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_single_event_page' );