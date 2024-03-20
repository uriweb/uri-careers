<?php
/**
 * URI CAREERS SHORTCODES
 *
 * @package uri-careers
 */

 /**
  * Create a shortcode for the toggle.
  */
function uri_careers_toggle_shortcode( $attributes, $shortcode ) {
	// normalize attribute keys, lowercase
	$attributes = array_change_key_case( (array) $attributes, CASE_LOWER );

	// default attributes
	$attributes = shortcode_atts(
	  array(
		  'majors' => null,
		  'careers' => null,
	  ),
	 $attributes,
		$shortcode
	 );

	if ( null === $attributes['majors'] && null === $attributes['careers'] ) {
		$button_careers = get_permalink();
		$button_majors = get_permalink();
		$button_style = array( 'disabled', 'disabled' );
	}

	if ( null !== $attributes['majors'] && null === $attributes['careers'] ) {
		$button_careers = get_permalink();
		$button_majors = $attributes['majors'];
		$button_style = array( '', 'prominent' );
		$style_class = array( 'on', 'off' );
	}
	if ( null !== $attributes['careers'] && null === $attributes['majors'] ) {
		$button_careers = $attributes['careers'];
		$button_majors = get_permalink();
		$button_style = array( 'prominent', '' );
		$style_class = array( 'off', 'on' );
	}
	return uri_careers_toggle( $button_careers, $button_majors, $button_style, $style_class );

}

  add_shortcode( 'uri-careers-toggle', 'uri_careers_toggle_shortcode' );
