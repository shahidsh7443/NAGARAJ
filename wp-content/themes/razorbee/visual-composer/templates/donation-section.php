<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_donation_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Donation Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_donation_section';

	ob_start();
	?>[vc_row section_content_width="container-fullwidth" full_width="stretch_row_content_no_spaces" css=".vc_custom_1450429839956{margin-bottom: 0px !important;}" el_class="donation-section" el_id="donate-section"][vc_column width="1/2" el_class="donation-intro"][vc_column_text css=".vc_custom_1449859018075{margin-bottom: 30px !important;}"]
<h2>YOUR DONATION MAKE HELP US!</h2>
[/vc_column_text][vc_column_text css=".vc_custom_1449859008241{margin-bottom: 0px !important;}"]Conveniently disseminate quality niche markets after just in time results. Seamlessly exploit synergistic technologies whereas customer directed "outside the box" thinking. Conveniently revolutionize resource sucking schemas vis-a-vis equity invested sources. technologies whereas customer directed invested sources.[/vc_column_text][tt_donation title_alignment="text-left" title="Your donation make help us!"][/vc_column][vc_column width="1/2" css=".vc_custom_1450418411532{padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;background-image: url(http://trendytheme.net/demo/wp/nominee/onepage/wp-content/uploads/sites/2/2015/11/donate-bg.jpg?id=2503) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}" el_class="donation-thumb"][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_donation_section' );