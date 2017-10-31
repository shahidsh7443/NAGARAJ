<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_header_parallax( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Header Parallax', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_header_parallax';

	ob_start();
	?>[vc_row full_height="yes" parallax="content-moving" parallax_image="2466" overlay_color="yes" full_width="stretch_row_content_no_spaces" css=".vc_custom_1450540601212{margin-bottom: 0px !important;}"][vc_column][tt_home_banner title=""]<span class="intro-sub">Hey! I am <span class="clored-text">nom<span style="color: #ffffff;">i</span>nee</span></span>

<hr class="colored" />

<h1>Creating a country
for every citizen</h1>
[/tt_home_banner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_header_parallax' );