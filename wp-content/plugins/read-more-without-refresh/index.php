<?php
/*
Plugin Name: Read More Without Refresh
Version: 2.3
Plugin URI: https://en.wordpress.org/plugins/read-more-without-refresh/
Description: Boost your SEO without affecting user experience. A simple plugin that will use Javascript actions to show/hide extra text, through a shortcode call.
Author: George Gkouvousis
Author URI: http://8web.gr/
*/

/* Usage: [read more="Click here to Read More" less="Read Less"]My Hidden Paragraph Here[/read] */

/* load necessary stuff */
define('READ_PLUGIN_URL', WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)));
define('READ_PLUGIN_PATH', WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)));
define('READ_VERSION', '2.0');

/* generate wp-admin menu */
add_action('admin_menu', 'readmore_menu');
function readmore_menu(){
    add_menu_page( 'Read More', 'Read More', 'manage_options', 'read-more-without-refresh', 'readmore_settings' );
}


function readmore_settings(){
    include "readmoreoptions.php";
}


/* register shortcodes */
function read_register_shortcodes() {
   add_shortcode('read', 'read_main');
}

/* do magic */
function read_main($atts, $content = null) {
	extract(shortcode_atts(array(
		'more' => 'READ MORE',
		'less' => 'READ LESS'
	), $atts));

	mt_srand((double)microtime() * 1000000);
	$rnum = mt_rand();

	$new_string = '<span><a onclick="read_toggle(' . $rnum . ', \'' . addslashes($more) . '\', \'' . addslashes($less) . '\'); return false;" class="read-link" id="readlink' . $rnum . '" style="readlink" href="#">' . addslashes($more) . '</a></span>' . "\n";
	$new_string .= '<div class="read_div" id="read' . $rnum . '" style="display: none;">' . do_shortcode($content) . '</div>';

	return $new_string;
}

function read_javascript() {
	echo '<script>
	function expand(param) {
		param.style.display = (param.style.display == "none") ? "block" : "none";
	}
	function read_toggle(id, more, less) {
		el = document.getElementById("readlink" + id);
		el.innerHTML = (el.innerHTML == more) ? less : more;
		expand(document.getElementById("read" + id));
	}
	</script>';
}

/* load CSS */
function rmwr_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style', $plugin_url . 'style.css' );
}
add_action( 'wp_enqueue_scripts', 'rmwr_load_plugin_css' );

/* header actions */
add_action('wp_head', 'read_javascript');
add_action('init', 'read_register_shortcodes');
?>