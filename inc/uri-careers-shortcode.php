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
		  'advising_link' => null,
		  'careers_link' => null,
	  ),
	 $attributes,
	 );

	if ( null === $attributes['advising_link'] && null === $attributes['careers_link'] ) {
		$link_careers = get_permalink();
		$link_advising = get_permalink();
		$button_style = array( 'disabled', 'disabled' );
	}

	if ( null !== $attributes['advising_link'] && null === $attributes['careers_link'] ) {
		$link_careers = get_permalink();
		$link_advising = $attributes['advising_link'];
		$button_style = array( 'prominent', 'disabled' );
	}
	if ( null !== $attributes['careers_link'] && null === $attributes['advising_link'] ) {
		$link_careers = $attributes['careers_link'];
		$link_advising = get_permalink();
		$button_style = array( 'disabled', 'prominent' );
	}
	return uri_careers_toggle( $link_careers, $link_advising, $button_style );

}

  add_shortcode( 'uri-careers-toggle', 'uri_careers_toggle_shortcode' );
