<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_about_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'About Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_about_section';

	ob_start();
	?>[vc_row css=".vc_custom_1447173861514{margin-bottom: 0px !important;padding-top: 135px !important;padding-bottom: 100px !important;}" el_id="about"][vc_column][tt_section_title title_alignment="text-center" section_separator="yes" separator_position="after_title" title="A little bit about me"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][vc_row_inner css=".vc_custom_1442425128475{margin-bottom: 0px !important;}"][vc_column_inner width="1/2" css=".vc_custom_1447173784119{margin-bottom: 30px !important;}"][vc_column_text]
<h3>MY PROFILE OVERVIEW</h3>
[/vc_column_text][vc_column_text]Competently incentivize cross-unit value with end-to-end infrastructures. coordinate bricks-and-clicks architectures for highly efficient catalysts for change. Enthusiastically aggregate client-focused content without flexible sources. Holistically actualize efficient portals for highly efficient materials. Seamlessly reintermediate ubiquitous catalysts for change before fully researched initiatives.[/vc_column_text][vc_column_text]Synergistically disintermediate efficient intellectual capital for customized process improvements.[/vc_column_text][tt_social_links][tt_social_link fontawesome_icon="fa fa-facebook" link="url:%23|title:Facebook|target:%20_blank"][/tt_social_link][tt_social_link fontawesome_icon="fa fa-twitter" link="url:%23|title:Twitter|target:%20_blank"][/tt_social_link][tt_social_link fontawesome_icon="fa fa-google-plus" link="url:%23|title:Google|target:%20_blank"][/tt_social_link][tt_social_link fontawesome_icon="fa fa-instagram" link="url:%23|title:Instagram|target:%20_blank"][/tt_social_link][tt_social_link fontawesome_icon="fa fa-flickr" link="url:%23|title:Flickr|target:%20_blank"][/tt_social_link][/tt_social_links][/vc_column_inner][vc_column_inner width="1/2"][tt_popup cover_image="2511" source_url="https://www.youtube.com/watch?v=e9j4_tghBlc"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_about_section' );