<?php
/**
 * URI CAREERS SHORTCODES
 *
 * @package uri-careers
 */

 /**
  * Create a shortcode for the toggle.
  */

function uri_careers_toggle_shortcode( $attributes ) {
	// normalize attribute keys, lowercase
	$attributes = array_change_key_case( (array) $attributes, CASE_LOWER );

	// default attributes
	$attributes = shortcode_atts(
	  array(
		  'careers_link' => null,
	  ),
	 $attributes,
	 );

	if ( null !== $attributes['careers_link'] ) {
		return uri_careers_toggle( $attributes['careers_link'] );
	}
}

  add_shortcode( 'uri-careers-toggle', 'uri_careers_toggle_shortcode' );
