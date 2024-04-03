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
		  'major' => null,
		  'career' => null,
	  ),
	 $attributes,
		$shortcode
	 );

	if ( null === $attributes['major'] && null === $attributes['career'] ) {
		$button_career = get_permalink();
		$button_major = get_permalink();
		$button_style = array( 'disabled', 'disabled' );
	}

	if ( null !== $attributes['major'] && null === $attributes['career'] ) {
		$button_career = get_permalink();
		$button_major = $attributes['major'];
		$button_style = array( '', 'prominent' );
		$style_class = array( 'on', 'off' );
	}
	if ( null !== $attributes['career'] && null === $attributes['major'] ) {
		$button_career = $attributes['career'];
		$button_major = get_permalink();
		$button_style = array( 'prominent', '' );
		$style_class = array( 'off', 'on' );
	}
	return uri_careers_toggle( $button_career, $button_major, $button_style, $style_class );

}

  add_shortcode( 'uri-careers-toggle', 'uri_careers_toggle_shortcode' );
