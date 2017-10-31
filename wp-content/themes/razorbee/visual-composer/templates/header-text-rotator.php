<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_text_rotator_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Header Text Rotator', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_text_rotator_section';

	ob_start();
	?>[vc_row full_height="yes" overlay_color="yes" full_width="stretch_row" css=".vc_custom_1450541345089{margin-bottom: 0px !important;background-image: url(http://trendytheme.net/demo/wp/nominee/onepage/wp-content/uploads/sites/2/2015/09/slide-5.jpg?id=58) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][tt_text_rotator animation="dissolve" animation_speed="3000" title="Creating a country | for every citizen | leading people | to better quality life"]Hey! I am <span class="clored-text">nom<span style="color: #ffffff;">i</span>nee</span>[/tt_text_rotator][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_text_rotator_section' );