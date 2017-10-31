<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_archivement_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'Archivement Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_archivement_section';

	ob_start();
	?>[vc_row full_width="stretch_row" parallax="content-moving-fade" parallax_image="114" overlay_color="yes" css=".vc_custom_1443118633892{margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 100px !important;}"][vc_column][tt_section_title title_alignment="text-center" title_color_option="custom-color" section_separator="no" title="Some of my achievement" title_color="#ffffff"][/tt_section_title][tt_archivements][tt_archivement show_icon="yes" icon_option="fonticon" font_icon="flaticon-medal47" title="Business book of the year award 2015"]Enthusiastically synthesize open-source e-business via intuitive channels. Credibly synthesize stand-alone outsourcing and process-centric leadership skills.[/tt_archivement][tt_archivement show_icon="yes" icon_option="fonticon" font_icon="flaticon-medal47" title="Business book of the year award 2014"]Enthusiastically synthesize open-source e-business via intuitive channels. Credibly synthesize stand-alone outsourcing and process-centric leadership skills.[/tt_archivement][tt_archivement show_icon="yes" icon_option="fonticon" font_icon="flaticon-medal47" title="Business book of the year award 2013"]Enthusiastically synthesize open-source e-business via intuitive channels. Credibly synthesize stand-alone outsourcing and process-centric leadership skills.[/tt_archivement][/tt_archivements][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_archivement_section' );