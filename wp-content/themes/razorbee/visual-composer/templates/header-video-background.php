<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_header_video_background( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Header Video Background', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_header_video_background';

	ob_start();
	?>[vc_row full_height="yes" video_bg="yes" video_bg_url="https://www.youtube.com/watch?v=wHyT68JRB28" overlay_color="yes" full_width="stretch_row" css=".vc_custom_1450541578645{margin-bottom: 0px !important;background-image: url(http://trendytheme.net/demo/wp/nominee/onepage/wp-content/uploads/sites/2/2015/11/slider-1.jpg?id=2351) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][vc_column][tt_home_banner title=""]<span class="intro-sub">Hey! I am <span class="clored-text">nom<span style="color: #ffffff;">i</span>nee</span></span>

<hr class="colored" />

<h1>Creating a country
for every citizen</h1>
[/tt_home_banner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_header_video_background' );