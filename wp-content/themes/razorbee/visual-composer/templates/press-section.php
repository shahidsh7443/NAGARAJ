<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_press_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Press Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_press_section';

	ob_start();
	?>[vc_row full_width="stretch_row" el_id="press" css=".vc_custom_1443896297382{margin-bottom: 0px !important;padding-top: 130px !important;padding-bottom: 100px !important;background-color: #f4f4f4 !important;}"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="Press release"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][tt_latest_post post_limit="3" grid_column="4" word_limit="15" show_all_button="yes" custom_link="url:%23||"][tt_client_carousel on_click_action="custom_link" images="163,164,165,166,167,168" links="http://link.com,http://link2.com" css=".vc_custom_1443986562013{margin-bottom: 0px !important;padding-top: 100px !important;}"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_press_section' );