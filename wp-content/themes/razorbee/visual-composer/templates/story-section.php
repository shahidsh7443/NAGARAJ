<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;

function nominee_vc_template_story_section( $data ) {
	$template                   = array();
	$template[ 'name' ]         = esc_html__( 'story Section', 'nominee');
	$template[ 'custom_class' ] = 'nominee_vc_template_story_section';

	ob_start();
	?>[vc_row css=".vc_custom_1443118008661{margin-bottom: 0px !important;padding-top: 100px !important;padding-bottom: 100px !important;}" el_id="stories"][vc_column][tt_section_title title_alignment="text-center" title="A little story"]Collaboratively disseminate wireless innovation with standards compliant e-business.
Phosfluorescently expedite functional products via premium action items.[/tt_section_title][tt_stories][tt_story link_visibility="visible" story_year="2010" title="Creating the party's brand" link="url:%23||"]Collaboratively transition 24/7 data after high-payoff opportunities Seamlessly streamline flexible innovation whereas functional[/tt_story][tt_story content_positon="timeline-inverted" link_visibility="visible" story_year="2011" title="Registering political party" link="url:%23||"]Collaboratively transition 24/7 data after high-payoff opportunities Seamlessly streamline flexible innovation whereas functional[/tt_story][tt_story link_visibility="visible" story_year="2012" title="Making a better manifesto" link="url:%23||"]Collaboratively transition 24/7 data after high-payoff opportunities Seamlessly streamline flexible innovation whereas functional[/tt_story][tt_story content_positon="timeline-inverted" link_visibility="visible" story_year="2013" title="Joining Electoral Commission" link="url:%23||"]Collaboratively transition 24/7 data after high-payoff opportunities Seamlessly streamline flexible innovation whereas functional[/tt_story][tt_story link_visibility="visible" story_year="2014" title="Leading the party" link="url:%23||"]Collaboratively transition 24/7 data after high-payoff opportunities Seamlessly streamline flexible innovation whereas functional[/tt_story][/tt_stories][/vc_column][/vc_row]
	<?php
	$template[ 'content' ] = ob_get_clean();
	array_unshift( $data, $template );
	return $data;
}
add_filter( 'vc_load_default_templates', 'nominee_vc_template_story_section' );