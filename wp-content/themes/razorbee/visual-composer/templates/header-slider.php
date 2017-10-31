<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_header_slider( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Header Slider', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_header_slider';

	ob_start();
	?>[vc_row section_content_width="container-fullwidth" full_height="yes" overlay_color="yes" full_width="stretch_row_content_no_spaces" css=".vc_custom_1450541081978{margin-bottom: 0px !important;}"][vc_column][tt_home_slides][tt_home_slide intro_title_animation="fadeInDown" intro_title_ani_delay="delay-1" title_part1_animation="fadeInUp" title_part1_ani_delay="delay-3" title_part2_animation="fadeInUp" title_part2_ani_delay="delay-4" slider_image="2465" title_part1="Creating a country" title_part2=" for every citizen"]<span class="intro-sub">Hey! I am <span class="clored-text">nom<span style="color: #ffffff;">i</span>nee</span></span>[/tt_home_slide][tt_home_slide intro_title_animation="fadeInDown" intro_title_ani_delay="delay-1" title_part1_animation="fadeInUp" title_part1_ani_delay="delay-3" title_part2_animation="fadeInUp" title_part2_ani_delay="delay-4" button_visibility="visible" button_animation="fadeInDown" button_ani_delay="delay-5" slider_image="2466" title_part1="Ideological Leader" title_part2="for youth generation" button_link="url:%23||"]<span class="intro-sub">Hey! I am <span class="clored-text">nom<span style="color: #ffffff;">i</span>nee</span></span>[/tt_home_slide][/tt_home_slides][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_header_slider' );