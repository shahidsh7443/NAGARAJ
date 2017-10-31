<?php 
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;


function tt_find_add_key( $url, $original_url, $_context ) {
	$key = get_option( 'tt_google_map_api_key' );

	// If no key added no point in checking
	if ( ! $key ) {
		return $url;
	}

	if ( strstr( $url, "maps.google.com/maps/api/js" ) !== false || strstr( $url, "maps.googleapis.com/maps/api/js" ) !== false ) {// it's a Google maps url

		if ( strstr( $url, "key=" ) === false ) {// it needs a key
			$url = add_query_arg( 'key',$key,$url);
			$url = str_replace( "&#038;", "&amp;", $url ); // or $url = $original_url
		}
	}

	return $url;
}
add_filter( 'clean_url', 'tt_find_add_key', 99, 3 );


function tt_add_admin_menu() {
	add_submenu_page( 'options-general.php', 'Google Map API Key', 'Google Map API Key', 'manage_options', 'gmaps-api-key', 'tt_add_admin_menu_html' );
}
add_action( 'admin_menu', 'tt_add_admin_menu' );


/**
 * The html output for the settings page.
 */
function tt_add_admin_menu_html() {
	$updated = false;
	if ( isset( $_POST['tt_google_map_api_key'] ) ) {
		$key     = esc_attr( $_POST['tt_google_map_api_key'] );
		$updated = update_option( 'tt_google_map_api_key', $key );
	}

	if ( $updated ) {
		echo '<div class="updated fade"><p><strong>' . esc_html__( 'Kay Updated!', 'tt-pl-textdomain' ) . '</strong></p></div>';

	}
	?>
	<div class="wrap">

		<h2><?php esc_html_e( 'Add Google Maps API KEY', 'tt-pl-textdomain' ); ?></h2>
		<p><?php esc_html_e( 'This option will attempt to add your Google API KEY to any Google Maps JS file that has properly been enqueue.', 'tt-pl-textdomain' ); ?></p>
		<p><?php echo sprintf( esc_html__( 'To Get a Google Maps API KEY %sclick here%s', 'geodirectory' ), '<a target="_blank" href=\'https://console.developers.google.com/flows/enableapi?apiid=maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true\'>', '</a>' ) ?></p>

		<form method="post" action="options-general.php?page=gmaps-api-key">
			<label for="tt_google_map_api_key"><?php esc_html_e( 'Enter Google Maps API KEY', 'tt-pl-textdomain' ); ?></label>
			<input title="<?php esc_html_e( 'Add Google Maps API KEY', 'tt-pl-textdomain' ); ?>" type="text"
			       name="tt_google_map_api_key" id="tt_google_map_api_key"
			       value="<?php echo esc_attr( get_option( 'tt_google_map_api_key' ) ); ?>"/>
			<?php

			submit_button();

			?>
		</form>

	</div><!-- /.wrap -->
	<?php
}
