<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_counting_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Counting Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_counting_section';

	ob_start();
	?>[vc_row full_width="stretch_row" parallax="content-moving-fade" parallax_image="100" overlay_color="yes" css=".vc_custom_1442594672083{margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][tt_counts][tt_count counted_number="6606" subtitle="Volontaires" flaticon_list="flaticon-earth206"][/tt_count][tt_count counted_number="6606" subtitle="Volontaires" flaticon_list="flaticon-share11"][/tt_count][tt_count counted_number="6606" subtitle="Volontaires" flaticon_list="flaticon-male75"][/tt_count][tt_count counted_number="6606" subtitle="Volontaires" flaticon_list="flaticon-lifeline5"][/tt_count][/tt_counts][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_counting_section' );