<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_twitter_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Twitter Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_twitter_section';

	ob_start();
	?>[vc_row section_content_width="container-fullwidth" parallax="content-moving" parallax_image="126" overlay_color="yes" full_width="stretch_row_content_no_spaces" css=".vc_custom_1450544122076{margin-bottom: 0px !important;}"][vc_column][vc_row_inner][vc_column_inner width="2/3" css=".vc_custom_1443254125193{margin-bottom: 0px !important;padding-top: 100px !important;padding-right: 100px !important;padding-bottom: 100px !important;padding-left: 100px !important;}"][tt_twitter_feed twitter_id="613424231099953152" twitter_number="4"][/vc_column_inner][vc_column_inner width="1/3" css=".vc_custom_1447175184254{margin-bottom: 0px !important;background-color: #222222 !important;}"][tt_social_count_plus][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_twitter_section' );