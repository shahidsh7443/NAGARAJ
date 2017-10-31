<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_contact_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Contact Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_contact_section';

	ob_start();
	?>[vc_row css=".vc_custom_1444149999677{margin-bottom: 0px !important;padding-top: 130px !important;padding-bottom: 130px !important;}" el_id="contact"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="Get in touch" css=".vc_custom_1444144735904{margin-bottom: 70px !important;}"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][contact-form-7 id="4"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_contact_section' );