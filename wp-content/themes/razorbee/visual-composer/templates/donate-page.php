<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_donate_page( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Donate Page', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_donate_page';

	ob_start();
	?>[vc_row css=".vc_custom_1452796893417{padding-bottom: 112px !important;}"][vc_column][vc_row_inner equal_height="yes" content_placement="middle" css=".vc_custom_1452022137160{margin: 0px !important;}"][vc_column_inner css=".vc_custom_1452104240428{padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}" offset="vc_col-md-6"][vc_single_image image="2928" img_size="full" alignment="center" css=".vc_custom_1452758955723{margin-bottom: 0px !important;}"][/vc_column_inner][vc_column_inner css=".vc_custom_1452104365114{padding-top: 50px !important;padding-right: 50px !important;padding-bottom: 50px !important;padding-left: 90px !important;background-color: #222222 !important;}" offset="vc_col-md-6"][vc_column_text el_class="white-text"]
<h3>Your Donation Makes Help Us</h3>
[/vc_column_text][vc_column_text el_class="white-text"]intrinsic e-enable open-source e-tailers whereas virtual technologies. Uniquely orchestrate excellent "outside the box" thinking whereas fully researched intellectual capital. Rapidiously revolutionize one-to-one portals after standards compliant services. Uniquely pursue performance-based sources whereas 24/365 e-markets. Objectively revolutionize user-centric processes and market positioning e-tailers.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row css=".vc_custom_1452103441842{padding-bottom: 120px !important;}"][vc_column][tt_section_title title_alignment="text-center" section_separator="no" title="Donate-Information"]Our campaign has come a long way, but there is still a lot of road ahead. Now is the time for us to push on and continue
this incredible movement. Please make a donation now and help us win![/tt_section_title][tt_donation_form][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_donate_page' );