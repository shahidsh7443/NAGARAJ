<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_spotlight_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Spotlight Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_spotlight_section';

	ob_start();
	?>[vc_row full_width="stretch_row" css=".vc_custom_1442509077747{margin-bottom: 0px !important;padding-top: 130px !important;padding-bottom: 130px !important;background-color: #f7f7f7 !important;}"][vc_column width="1/2" offset="vc_col-md-4"][tt_spotlight_block show_button="yes" image="2497" title="Manifesto" custom_link="url:http%3A%2F%2Ftrendytheme.net%2Fdemo%2Fwp%2Fnominee%2Fonepage%2Fmanifesto%2F||"]Rapidiously integrate plug-and-play channels rather than cost effective ideas.[/tt_spotlight_block][/vc_column][vc_column width="1/2" offset="vc_col-md-4"][tt_spotlight_block show_button="yes" image="2499" title="Issues" custom_link="url:http%3A%2F%2Ftrendytheme.net%2Fdemo%2Fwp%2Fnominee%2Fonepage%2Fissue-right-sidebar%2F||"]Rapidiously integrate plug-and-play channels rather than cost effective ideas.[/tt_spotlight_block][/vc_column][vc_column width="1/2" offset="vc_col-md-4"][tt_spotlight_block show_button="yes" image="2501" title="Donation" custom_link="url:%23donate-section||" button_class="tt-scroll"]Rapidiously integrate plug-and-play channels rather than cost effective ideas.[/tt_spotlight_block][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_spotlight_section' );