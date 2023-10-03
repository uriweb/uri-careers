<?php
/**
 * Plugin Name: URI Careers
 * Plugin URI: http://www.uri.edu
 * Description: A plugin to display Major and Career data
 * Version: 0.1.0
 * Author: URI Web Communications
 * Author URI: https://today.uri.edu/
 *
 * @author: Brandon Fuller <bjcfuller@uri.edu>
 * @author: Alexandra Gauss <alexandra_gauss@uri.edu>
 * @author: Sarah Pucino <sarah.pucino@uri.edu>
 * @package uri-careers
 */

// Block direct requests
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Include css and js
 */
function uri_careers_enqueues() {

	wp_register_style( 'uri-careers-css', plugins_url( '/css/style.built.css', __FILE__ ) );
	wp_enqueue_style( 'uri-careers-css' );

	wp_register_script( 'uri-careers-js', plugins_url( '/js/script.built.js', __FILE__ ) );
	wp_enqueue_script( 'uri-careers-js' );

}
add_action( 'wp_enqueue_scripts', 'uri_careers_enqueues' );

/**
 * Create a shortcode.
 * The shortcode accepts arguments: before, after
 * e.g. [uri-careers]
 */

 function uri_careers_shortcode($attributes, $shortcode) {
	// normalize attribute keys, lowercase
    $attributes = array_change_key_case((array)$attributes, CASE_LOWER);

	// default attributes
    $attributes = shortcode_atts(array(
			'before' => '<div class="uri-careers">',
			'after' => '</div>',
    ), $attributes, $shortcode);

	ob_start();
	$output = ob_get_clean();
	return $output;
 }

 add_shortcode( 'uri-careers', 'uri_careers_shortcode' );

 // require the individual field definitions from a different file
require_once dirname(__FILE__) . '/inc/uri-careers-fields.php';

// require the templating functions
require_once dirname(__FILE__) . '/inc/uri-careers-templating.php';
