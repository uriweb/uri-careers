<?php
/**
 * Plugin Name: URI Careers
 * Plugin URI: http://www.uri.edu
 * Description: A plugin to display Major and Career data
 * Version: 1.0.6
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

define( 'URI_CAREERS_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Returns version from package.json to be used for cache busting
 *
 * @return str
 */
function uri_careers_cache_buster() {
	static $cache_buster;
	if ( empty( $cache_buster ) && function_exists( 'get_plugin_data' ) ) {
		$values = get_plugin_data( URI_CAREERS_PATH . 'uri-careers.php', false );
		$cache_buster = $values['Version'];
	} else {
		$cache_buster = gmdate( 'Ymd', strtotime( 'now' ) );
	}
	return $cache_buster;
}

/**
 * Include css and js
 */
function uri_careers_enqueues() {

	wp_register_style( 'uri-careers-css', plugins_url( '/css/style.built.css', __FILE__ ), array(), uri_cl_cache_buster(), 'all' );
	wp_enqueue_style( 'uri-careers-css' );

	wp_register_script( 'uri-careers-js', plugins_url( '/js/script.built.js', __FILE__ ), array(), uri_cl_cache_buster(), true );
	wp_enqueue_script( 'uri-careers-js' );

}
add_action( 'wp_enqueue_scripts', 'uri_careers_enqueues' );

 // require the individual field definitions from a different file
require_once dirname( __FILE__ ) . '/inc/uri-careers-fields.php';

// require the templating functions
require_once dirname( __FILE__ ) . '/inc/uri-careers-templating.php';

// require the helper functions
require_once dirname( __FILE__ ) . '/inc/uri-careers-helpers.php';

// include shortcode
include( URI_CAREERS_PATH . 'inc/uri-careers-shortcode.php' );

// include toggle
include( URI_CAREERS_PATH . 'templates/toggle.php' );
