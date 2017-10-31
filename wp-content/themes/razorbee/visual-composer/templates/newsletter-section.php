<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_newsletter_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Newsletter Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_newsletter_section';

	ob_start();
	?>[vc_row full_width="stretch_row" parallax="content-moving" parallax_image="172" overlay_color="yes" css=".vc_custom_1444067788363{margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 100px !important;}" el_class="newsletter-section"][vc_column][tt_section_title title_alignment="text-center" title_color_option="custom-color" description_color_option="custom-color" section_separator="no" title="Get update via newsletter" title_color="#ffffff" description_color="#ffffff" css=".vc_custom_1444068747281{margin-bottom: 45px !important;}"]Sign up to be the first to hear about us[/tt_section_title][tt_newsletter][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_newsletter_section' );